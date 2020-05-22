{extends file="layouts/app.tpl"}

{block name="content"}
    <h1 class="mb-3">{$title}</h1>

    <div class="card card-body mb-3">

        <form method="POST" action="/todos/store" class="form-inline ">
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Новая задача...">
            </div>
            <div class="col-auto my-1">
                <div class="custom-control custom-checkbox mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="done" name="done">
                    <label class="custom-control-label" for="done">Выполнено?</label>
                </div>
            </div>


            <button class="btn btn-success">Создать</button>
        </form>



    </div>

    {include file="todo_list.tpl"}

{/block}