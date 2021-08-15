<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Post extends Model
{
    use HasFactory,softDeletes;
    /*public function User()
    {
        return $this->belongsTo(User::class,foreignKey('user_id'));
    }
    public function posts()
    {
        return $this->hasMany(Post::class,foreignKey:'user_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class,foreignKey:'user_id');
    }*/
    public function user()
    {
        return $this->belongsTo(User::class);
    }

	public function likes()
    {
        return $this->hasMany(Like::class);
    }
//مراجعة
    
}
