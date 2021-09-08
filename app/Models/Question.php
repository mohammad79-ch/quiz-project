<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['title','rate','level','user_id'];

    public function subQuestion()
    {
        return $this->hasMany(SubQuestion::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'question_user')->withPivot('is_correct');
    }



}
