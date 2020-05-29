<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Todo
 * @package App
 *
 * @property-read $id
 * @property $name
 * @property $animal
 * @property $breed
 * @property $gender
 * @property $age
 * @property $description
 * @property $additional_info
 * @property $user_id
 * @property-read $created_at
 * @property-read $updated_at
 * @property User $user
 */
class Animal extends Model
{
    protected $fillable = [
        'user_id', 'name', 'animal', 'breed', 'gender', 'age', 'description', 'additional_info'
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
