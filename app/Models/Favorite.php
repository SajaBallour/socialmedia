<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Favorite extends Model
{
    use HasFactory,softDeletes;
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }
}
