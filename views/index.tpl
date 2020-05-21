
<body>
    <div>
        <form action="/books" method="POST">

            <input type="text" name="name" placeholder="Название...">
            <input type="text" name="author" placeholder="Автор...">
            <button class="btn-create">Создать</button>

        </form>
    </div>

    <div>
        <ul>
            {foreach $books as $book}
                <li>
                    {$book->author}, "{$book->name}"
                    <form action="/books/delete/{$book->id}" method="POST">
                        <button class="btn-delete">Удалить</button>
                    </form>
                </li>
            {/foreach}
        </ul>
    </div>
</body>
<style>
    {include "../css/style.css"}
</style>