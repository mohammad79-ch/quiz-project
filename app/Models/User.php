<?php

namespace App\Models;

use App\service\followable\Follow;
use App\service\questions\DetailQuestion;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
    use HasApiTokens, HasFactory, Notifiable,Follow,DetailQuestion;

    protected $with = ['questions'];


    public function images() : HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function articles() : HasMany
    {
        return $this->hasMany(Article::class);
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
