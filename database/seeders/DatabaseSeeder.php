<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\SubQuestion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Question::factory(1)->create();
        SubQuestion::factory(4)->create();
    }
}
