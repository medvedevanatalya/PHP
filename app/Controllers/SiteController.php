<?php


namespace App\Controllers;


use App\Models\Book;

class SiteController
{
    function index()
    {
//        $books = Book::all();
//        var_dump($books);


//        /** @var Book $book */
//        $book = Book::find_by_name('Гарри потер');
//        $book->name = 'Дары смерти';
//        $book->save();


//        $book = new Book();
//        $book->name = 'Гарри потер';
//        $book->author = 'Джоанн Роллинг';
//        $book->save();
//        return  $book->id;


        return view('index', [
            "books" => Book::all()
        ]);
    }
}