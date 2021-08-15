<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Like extends Model
{
    use HasFactory,softDeletes;
   /* public function post(){
        return $this->belongsTo(Post::class,'post_id') ;
    }*/
    public function comment()
    {
        return $this->belongsTo(Comment::class,'comment_id') ;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

   public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
