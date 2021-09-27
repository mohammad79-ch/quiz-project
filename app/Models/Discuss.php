<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discuss extends Model
{
    use HasFactory;

    protected $fillable = [
      'title','content',
      'is_answer','parent_id',
      'category_id','user_id',
      'vote','updated_at'
    ];


    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'votes')->withTimestamps();
    }

    public function category()
    {
     return $this->belongsTo(Category::class);
    }

    public function child()
    {
        return $this->hasMany(Discuss::class,'parent_id','id')->latest();
    }
}
