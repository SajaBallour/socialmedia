<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\softDeletes;
use Laravel\Passport\HasApiTokens;
use App\Notifications\ResetPassword as ResetPasswordNotification;
class User extends Authenticatable
{
    use HasFactory, Notifiable,softDeletes,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    /*public function posts()
    {
        return $this->hasMany(Post::class,foreignKey:'user_id');
    }*/
    public function comments()
    {
        return $this->hasMany(Comment::class,foreignKey:'post_id');
    }
   /* public function likes()
    {
        return $this->belongsTo(Like::class,foreignKey('post_id'));
    }*/
    public function friends()
{
    return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id');
}
public function posts()
    {
        return $this->hasMany(Post::class);
    }

public function likes()
    {
        return $this->hasMany(Like::class);
    }
public function favorite()
{
    return $this->hasOne( Favorite::class);
}
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
 * Send the password reset notification.
 *
 * @param  string  $token
 * @return void
 */
    public function sendPasswordResetNotification($token)
{
    $this->notify(new ResetPasswordNotification($token));
}
}
