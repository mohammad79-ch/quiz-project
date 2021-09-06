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
        return $this->hasMany(SubQuestion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'person_id');
    }



}
