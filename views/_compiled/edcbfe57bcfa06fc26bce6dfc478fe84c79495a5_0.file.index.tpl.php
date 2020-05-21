<?php
/* Smarty version 3.1.36, created on 2020-05-21 21:04:54
  from 'C:\OPServer\OpenServer\domains\mvc.loc\views\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ec6c2c66bf2d0_04225655',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'edcbfe57bcfa06fc26bce6dfc478fe84c79495a5' => 
    array (
      0 => 'C:\\OPServer\\OpenServer\\domains\\mvc.loc\\views\\index.tpl',
      1 => 1590084292,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../css/style.css' => 1,
  ),
),false)) {
function content_5ec6c2c66bf2d0_04225655 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['books']->value, 'book');
$_smarty_tpl->tpl_vars['book']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['book']->value) {
$_smarty_tpl->tpl_vars['book']->do_else = false;
?>
                <li>
                    <?php echo $_smarty_tpl->tpl_vars['book']->value->author;?>
, "<?php echo $_smarty_tpl->tpl_vars['book']->value->name;?>
"
                    <form action="/books/delete/<?php echo $_smarty_tpl->tpl_vars['book']->value->id;?>
" method="POST">
                        <button class="btn-delete">Удалить</button>
                    </form>
                </li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
    </div>
</body>
<style>
    <?php $_smarty_tpl->_subTemplateRender("file:../css/style.css", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</style><?php }
}
