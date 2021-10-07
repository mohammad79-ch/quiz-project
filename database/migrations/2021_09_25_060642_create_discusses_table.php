<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discusses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->integer('parent_id')->default(0);
            $table->integer('is_answer')->default(0);
            $table->integer('vote')->default(0);
            $table->foreignId('category_id')->constrained('categories','id');
            $table->foreignId('user_id')->constrained('users','id');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('discuss_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('discuss_id')->constrained('discusses','id');
            $table->foreignId('tag_id')->constrained('tags','id');
            $table->timestamps();
        });

        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('discuss_id')->constrained('discusses','id');
            $table->foreignId('user_id')->constrained('users','id');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discuss_tag');
        Schema::dropIfExists('discuss_user');
        Schema::dropIfExists('discusses');
    }
}
