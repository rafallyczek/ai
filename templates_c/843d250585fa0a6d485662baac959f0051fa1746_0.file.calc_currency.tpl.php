<?php
/* Smarty version 3.1.39, created on 2021-06-21 11:46:31
  from 'C:\xampp\htdocs\ai\app\views\calc_currency.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60d05ff7dc0328_54699591',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '843d250585fa0a6d485662baac959f0051fa1746' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ai\\app\\views\\calc_currency.tpl',
      1 => 1622807561,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60d05ff7dc0328_54699591 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_73711348760d05ff7d82486_43625700', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_73711348760d05ff7d82486_43625700 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_73711348760d05ff7d82486_43625700',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
    <div class="title">Kalkulator</div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-12-medium">

                <!-- Form -->
                <section>
                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['config']->value->action_root;?>
calcCurrency">
                        <div class="row gtr-50">
                            <div class="col-6 col-12-small">
                                <label for="amount">Kwota: </label>
                                <input type="text" name="amount" id="amount" placeholder="PLN" <?php if ((isset($_smarty_tpl->tpl_vars['form']->value->amount))) {?>value="<?php echo $_smarty_tpl->tpl_vars['form']->value->amount;?>
"<?php }?>/>
                                <label for="currency">Waluta: </label>
                                <select id="currency" name="currency">
                                    <option value="EUR"<?php if (((isset($_smarty_tpl->tpl_vars['form']->value->currency)) && $_smarty_tpl->tpl_vars['form']->value->currency == 'EUR')) {?>selected<?php }?>>Euro</option>
                                    <option value="USD"<?php if (((isset($_smarty_tpl->tpl_vars['form']->value->currency)) && $_smarty_tpl->tpl_vars['form']->value->currency == 'USD')) {?>selected<?php }?>>Dolar amerykański</option>
                                    <option value="JPY"<?php if (((isset($_smarty_tpl->tpl_vars['form']->value->currency)) && $_smarty_tpl->tpl_vars['form']->value->currency == 'JPY')) {?>selected<?php }?>>Jen</option>
                                    <option value="GBP"<?php if (((isset($_smarty_tpl->tpl_vars['form']->value->currency)) && $_smarty_tpl->tpl_vars['form']->value->currency == 'GBP')) {?>selected<?php }?>>Brytyjski funt szterling</option>
                                </select>
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
                                
                                <?php if ((isset($_smarty_tpl->tpl_vars['result']->value))) {?>
                                <label for="result">Wynik: </label> 
                                <div id="result" style="padding: 10px; border-radius: 5px; background-color: #4d94ff; color:#fff; width:300px;">
                                    <p style="margin: 0;"><?php echo $_smarty_tpl->tpl_vars['form']->value->amount;?>
 PLN to: <?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['form']->value->currency;?>
</p>
                                </div>
                                <?php }?>

                            </div>
                            <div class="col-6 col-12-small">
                                <ul class="actions">
                                    <li><input type="submit" class="green" value="Oblicz" /></li>
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
