<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Todo
 * @package App
 *
 * @property-read $id
 * @property $title
 * @property $description
 * @property boolean $done
 * @property $user_id
 * @property-read $created_at
 * @property-read $updated_at
 * @property User $user
 */
class Todo extends Model
{
    protected $fillable = [
        'title', 'description', 'done', 'user_id'
    ];

    protected $casts = [
        'done' => 'boolean'
    ];

    function isComplete()
    {
        return $this->done;
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
