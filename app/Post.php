<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Post
 * @package App
 *
 * @property-read  $id
 * @property  $title
 * @property  $slug
 * @property boolean $publish
 * @property  $post
 * @property  $user_id
 * @property-read $created_at
 * @property-read $updated_at
 *
 * @property User $user
 * @property Tag[] $tags
 * @property Comment[] $comments
 */
class Post extends Model
{
    protected $fillable = [
        'title', 'user_id', 'body', 'slug', 'publish',
    ];

    protected $casts = [
        'publish' => 'boolean',
    ];

    function isPublish()
    {
        return $this->publish;
    }

    // возвращает все комментарии к посту
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    // возвращает все тэги поста
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

    // возвращает автора поста
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
