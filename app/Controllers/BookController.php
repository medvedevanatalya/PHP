<?php


namespace App\Controllers;


use App\Models\Book;

class BookController
{

    function store() {

        $book = new Book();
        $book->name = request()->param('name');
        $book->author = request()->param('author');
        $book->save();

        return response()->redirect('/');
    }

    function delete() {
        $id = request()->param('id');
        /** @var Book $book */
        $book = Book::find_by_id($id);

        if (empty($book))
            return response()->code(404);

        $book->delete();
        return response()->redirect('/');
    }

}
