<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Comment extends Model
{
    use HasFactory,softDeletes;
    public function User()
    {
        return $this->belongsTo(User::class,foreignKey('user_id'));
    }
    public function post()
{
    return $this->belongsTo(Post::class, 'post_id');
}
public function likes()
    {
        return $this->hasMany(Like::class,'comment_id','id') ;
    }
}
