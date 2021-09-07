<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['title','is_answer','question_id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'sub_question_user')->withTimestamps();
    }

}
