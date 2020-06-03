<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'post_id', 'comment'
    ];

    //возвращает прокомментрировавшего пользователя
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // возвращает пост любого комментария
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
