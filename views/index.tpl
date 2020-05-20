<h1>MVC</h1>
<form action="/books" method="POST">
    <input type="text" name="name" placeholder="Название...">
    <input type="text" name="author" placeholder="Автор...">
    <button>Создать</button>
</form>

<ul>
    {foreach $books as $book}
        <li>{$book->author}, "{$book->name}"</li>
        <form action="/books/delete/{$book->id}" method="POST">
            <button>Delete</button>
        </form>
    {/foreach}
</ul>