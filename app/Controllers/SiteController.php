<?php


namespace App\Controllers;


use App\Models\Book;

class SiteController
{

    function index()
    {
        return view('index', [
            'books' => Book::all()
        ]);
    }

}
