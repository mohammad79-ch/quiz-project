<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'is_admin',
        'profile',
        'aboutMe'

    ];
    use HasApiTokens, HasFactory, Notifiable;


    public function questions()
    {
        return $this->belongsToMany(Question::class,'question_user')
            ->withPivot(['is_correct','select_level']);
    }

    public function subQuestions()
    {
        return $this->belongsToMany(SubQuestion::class,'sub_question_user');
    }

    public function TotalAnswer()
    {
        return $this->questions->count();
    }

    public function getCorrectAnswer()
    {
        $correctCount = $this->questions->filter(fn($q) => $q->pivot->is_correct)->count();

        return $correctCount;
    }

    public function getWrongAnswer()
    {
        $correctCount = $this->questions->filter(fn($q) => !$q->pivot->is_correct)->count();

        return $correctCount;
    }


    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
