<?php


namespace App\Models;


use ActiveRecord\Model;

/**s
 * Class Book
 * @package App\Models
 *
 * @property-read  $id
 * @property $name
 * @property $author
 */
class Book extends Model
{
    public static $table_name = 'books';
    public static $primary_key = 'id';
}