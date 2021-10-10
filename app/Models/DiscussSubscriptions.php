<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscussSubscriptions extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id','discuss_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function discuss()
    {
        return $this->belongsTo(Discuss::class);
    }
}
