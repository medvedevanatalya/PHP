<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //возвращает посты пользователя
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //возвращает комментарии пользователя
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // может ли пользователь создавать посты
    public function can_post()
    {
        $role = $this->role;
        if($role == 'author' || $role == 'admin')
        {
            return true;
        }
        return false;
    }

    //проверка на админа
    public function is_admin()
    {
        $role = $this->role;

        if($role == 'admin')
        {
            return true;
        }

        return false;
    }
}
