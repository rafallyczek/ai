<?php
/* Smarty version 3.1.39, created on 2021-06-21 11:46:07
  from 'C:\xampp\htdocs\ai\app\views\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60d05fdf9c5051_79322318',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '394168867c7c18c266f3c4d1326f399283cc7665' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ai\\app\\views\\login.tpl',
      1 => 1622807578,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60d05fdf9c5051_79322318 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12980905360d05fdf9a8439_02195596', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_12980905360d05fdf9a8439_02195596 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_12980905360d05fdf9a8439_02195596',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
    <div class="title">Logowanie</div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-12-medium">

                <!-- Form -->
		<section>
                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['config']->value->action_root;?>
login">
			<div class="row gtr-50">
                            <div class="col-6 col-12-small">
                                <label for="login">Login: </label>
				<input type="text" name="login" id="login" placeholder="Login" <?php if ((isset($_smarty_tpl->tpl_vars['form']->value->login))) {?>value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
"<?php }?>/>
                                <label for="login">Hasło: </label>
				<input type="text" name="password" id="password" placeholder="Hasło" />
                            </div>
                            <div class="col-6 col-12-small">
                                <?php if ($_smarty_tpl->tpl_vars['messages']->value->isError()) {?>     
                                    <label for="error">Info: </label>
                                    <ol id="error" style="padding: 10px 10px 10px 30px; border-radius: 5px; background-color: rgb(140, 38, 38); color:#fff; width:300px;">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value->getErrors(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
                                            <li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>       
                                    </ol>
                                <?php }?>
                            </div>
                            <div class="col-12">
				<ul class="actions">
                                    <li><input type="submit" class="green" value="Zaloguj" /></li>
				</ul>
                            </div>
			</div>
                    </form>
		</section>

            </div>
        </div>
        <div id="copyright">
            <ul>
                <li>&copy; Rafał Łyczek.</li><li>Projekt szablonu: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </div>
    </div>
    
<?php
}
}
/* {/block 'content'} */
}
