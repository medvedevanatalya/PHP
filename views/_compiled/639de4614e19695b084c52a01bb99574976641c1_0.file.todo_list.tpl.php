<?php
/* Smarty version 3.1.36, created on 2020-05-22 21:02:16
  from 'C:\OPServer\OpenServer\domains\todo.list\views\todo_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ec813a81951c5_74451763',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '639de4614e19695b084c52a01bb99574976641c1' => 
    array (
      0 => 'C:\\OPServer\\OpenServer\\domains\\todo.list\\views\\todo_list.tpl',
      1 => 1590170535,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec813a81951c5_74451763 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="list-group">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['todos']->value, 'todo');
$_smarty_tpl->tpl_vars['todo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['todo']->value) {
$_smarty_tpl->tpl_vars['todo']->do_else = false;
?>
                <li class="list-group-item d-flex align-items-center">

                        <div class="toggle-checkbox custom-control custom-checkbox mr-3 position-relative" data-target="toggle-form-<?php echo $_smarty_tpl->tpl_vars['todo']->value->id;?>
">
                                <div class="position-absolute" style="top: 0;left: 0; z-index: 999; width: 100%; height: 100%;">
                                </div>
                                <input type="checkbox" class="custom-control-input" id="toggle-<?php echo $_smarty_tpl->tpl_vars['todo']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['todo']->value->done) {?>checked<?php }?>>
                                <label class="custom-control-label" for="toggle-<?php echo $_smarty_tpl->tpl_vars['todo']->value->id;?>
"></label>
                        </div>

                        <form id="toggle-form-<?php echo $_smarty_tpl->tpl_vars['todo']->value->id;?>
" action="/todos/toggle/<?php echo $_smarty_tpl->tpl_vars['todo']->value->id;?>
" method="POST"></form>

                        <input <?php if ($_smarty_tpl->tpl_vars['todo']->value->done) {?> style="text-decoration: line-through" <?php }?> type="text" class="pl-0 border-0 shadow-none update-todo form-control mr-3" value="<?php echo $_smarty_tpl->tpl_vars['todo']->value->name;?>
" required placeholder="Пусто..." >

                        <form action="/todos/update/<?php echo $_smarty_tpl->tpl_vars['todo']->value->id;?>
" method="POST">
                                <input class="update-input" type="hidden" name="name" value="" required>
                                <button class="update-btn btn btn-secondary mr-3" disabled>
                                        <svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.502 1.94a.5.5 0 010 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 01.707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 00-.121.196l-.805 2.414a.25.25 0 00.316.316l2.414-.805a.5.5 0 00.196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 002.5 15h11a1.5 1.5 0 001.5-1.5v-6a.5.5 0 00-1 0v6a.5.5 0 01-.5.5h-11a.5.5 0 01-.5-.5v-11a.5.5 0 01.5-.5H9a.5.5 0 000-1H2.5A1.5 1.5 0 001 2.5v11z" clip-rule="evenodd"/>
                                        </svg>
                                </button>
                        </form>

                        <form class="ml-auto" action="/todos/delete/<?php echo $_smarty_tpl->tpl_vars['todo']->value->id;?>
" method="POST">
                                <button class="btn btn-danger">
                                        <svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M2.5 1a1 1 0 00-1 1v1a1 1 0 001 1H3v9a2 2 0 002 2h6a2 2 0 002-2V4h.5a1 1 0 001-1V2a1 1 0 00-1-1H10a1 1 0 00-1-1H7a1 1 0 00-1 1H2.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM8 5a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 018 5zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"/>
                                        </svg>
                                </button>
                        </form>
                </li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>

<?php echo '<script'; ?>
>
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

<?php echo '</script'; ?>
><?php }
}
