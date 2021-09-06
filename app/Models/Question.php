<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['title','rate','level','person_id'];

    public function subQuestion()
    {
        return $this->hasMany(SubQuestion::class,'question_id');
    }

    public function user()
    {
        return $this->hasMany(User::class,'person_id');
    }



}
