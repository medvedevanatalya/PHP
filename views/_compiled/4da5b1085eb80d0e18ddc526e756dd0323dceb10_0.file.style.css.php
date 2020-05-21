<?php
/* Smarty version 3.1.36, created on 2020-05-21 21:11:21
  from 'C:\OPServer\OpenServer\domains\mvc.loc\css\style.css' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ec6c449119959_77081710',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4da5b1085eb80d0e18ddc526e756dd0323dceb10' => 
    array (
      0 => 'C:\\OPServer\\OpenServer\\domains\\mvc.loc\\css\\style.css',
      1 => 1590084679,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec6c449119959_77081710 (Smarty_Internal_Template $_smarty_tpl) {
?>input[type=text], select {
    width: auto;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=text]:focus {
    border: 3px solid #555;
}
button{
    width: auto;
}

.btn-create {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-create:hover {
    background-color: #45a049;
}

.btn-delete {
    display: flex;
    background-color: #FB3F51;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-delete:hover {
    background-color: #B92E3B;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    margin: 30px;
}


ul {
    counter-reset: li;
    list-style: none;
    font: 14px "Trebuchet MS", "Lucida Sans";
    padding: 0;
    text-shadow: 0 1px 0 rgba(255,255,255,.5);
}
ul li {
    position: relative;
    display: block;
    padding: .4em .4em .4em 2em;
    margin: .5em 0;
    background: #DAD2CA;
    color: #444;
    text-decoration: none;
    border-radius: .3em;
    transition: .3s ease-out;
}
ul li:hover {
    background: #E9E4E0;
}
ul li:hover:before {
    transform: rotate(360deg);
}
ul li:before {
    content: counter(li);
    counter-increment: li;
    position: absolute;
    left: -1.3em;
    top: 50%;
    margin-top: -1.3em;
    background: #8FD4C1;
    height: 2em;
    width: 2em;
    line-height: 2em;
    border: .3em solid white;
    text-align: center;
    font-weight: bold;
    border-radius: 2em;
    transition: all .3s ease-out;
}
<?php }
}
