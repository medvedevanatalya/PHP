<?php


namespace App\Models;


use ActiveRecord\Model;

/**
 * Class Todo
 * @package App\Models
 *
 * @property-read $id
 * @property $user_id
 * @property $done
 * @property $name
 */
class Todo extends Model
{
    public static $table_name = 'items';
}