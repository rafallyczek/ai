<?php
/* Smarty version 3.1.39, created on 2021-06-21 11:46:07
  from 'C:\xampp\htdocs\ai\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60d05fdfa776f4_45140062',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8bfca2abf84b1d0136812b02a8e8714ed97837de' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ai\\app\\views\\templates\\main.tpl',
      1 => 1622810068,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60d05fdfa776f4_45140062 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<html>
    
<head>
    <title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "Tytuł domyślny" : $tmp);?>
</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value->app_url;?>
/css/main.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value->app_url;?>
/css/my-styles.css" />
</head>
<body class="homepage is-preload">
    <div id="page-wrapper">
        
        <!-- Header -->
	<section id="header" class="wrapper">

            <!-- Logo -->
            <div id="logo">
		<h1><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "Tytuł domyślny" : $tmp);?>
</h1>
		<p><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_description']->value)===null||$tmp==='' ? "Opis domyślny" : $tmp);?>
</p>
            </div>
            
            <?php if (!(isset($_smarty_tpl->tpl_vars['login']->value))) {?>
            <!-- Nav -->
            <nav id="nav">
		<ul class="red">
                    <li class="current"><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value->action_root;?>
logout">Wyloguj</a></li>
		</ul>
            </nav>
            <?php }?>
                    
	</section>
                
        <section id="footer" class="wrapper">
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12562543760d05fdfa75cf2_92089521', 'content');
?>

        </section>
        
    </div>
</body>    
</html><?php }
/* {block 'content'} */
class Block_12562543760d05fdfa75cf2_92089521 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_12562543760d05fdfa75cf2_92089521',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
}
