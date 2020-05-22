<ul class="list-group">
        {foreach $todos as $todo}
                <li class="list-group-item d-flex align-items-center">

                        <div class="toggle-checkbox custom-control custom-checkbox mr-3 position-relative" data-target="toggle-form-{$todo->id}">
                                <div class="position-absolute" style="top: 0;left: 0; z-index: 999; width: 100%; height: 100%;">
                                </div>
                                <input type="checkbox" class="custom-control-input" id="toggle-{$todo->id}" {if $todo->done}checked{/if}>
                                <label class="custom-control-label" for="toggle-{$todo->id}"></label>
                        </div>

                        <form id="toggle-form-{$todo->id}" action="/todos/toggle/{$todo->id}" method="POST"></form>

                        <input {if $todo->done} style="text-decoration: line-through" {/if} type="text" class="pl-0 border-0 shadow-none update-todo form-control mr-3" value="{$todo->name}" required placeholder="Пусто..." >

                        <form action="/todos/update/{$todo->id}" method="POST">
                                <input class="update-input" type="hidden" name="name" value="" required>
                                <button class="update-btn btn btn-secondary mr-3" disabled>
                                        <svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.502 1.94a.5.5 0 010 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 01.707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 00-.121.196l-.805 2.414a.25.25 0 00.316.316l2.414-.805a.5.5 0 00.196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 002.5 15h11a1.5 1.5 0 001.5-1.5v-6a.5.5 0 00-1 0v6a.5.5 0 01-.5.5h-11a.5.5 0 01-.5-.5v-11a.5.5 0 01.5-.5H9a.5.5 0 000-1H2.5A1.5 1.5 0 001 2.5v11z" clip-rule="evenodd"/>
                                        </svg>
                                </button>
                        </form>

                        <form class="ml-auto" action="/todos/delete/{$todo->id}" method="POST">
                                <button class="btn btn-danger">
                                        <svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M2.5 1a1 1 0 00-1 1v1a1 1 0 001 1H3v9a2 2 0 002 2h6a2 2 0 002-2V4h.5a1 1 0 001-1V2a1 1 0 00-1-1H10a1 1 0 00-1-1H7a1 1 0 00-1 1H2.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM8 5a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 018 5zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"/>
                                        </svg>
                                </button>
                        </form>
                </li>
        {/foreach}
</ul>

<script>
        $('.update-todo').on('input', function () {
                $(this)
                        .closest('li')
                        .find('.update-btn')
                        .removeClass('btn-secondary')
                        .addClass('btn-info')
                        .attr('disabled', false);

                let input = $(this)
                        .closest('li')
                        .find('.update-input')[0];

                input.value = this.value;
        });

        $('.toggle-checkbox').on('click', function () {

                let target = this.dataset.target;
                document.getElementById(target).submit();

        });

</script>