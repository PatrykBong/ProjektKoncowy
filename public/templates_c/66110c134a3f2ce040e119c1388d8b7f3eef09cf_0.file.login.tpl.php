<?php
/* Smarty version 4.3.0, created on 2023-06-17 12:30:46
  from 'C:\xampp\htdocs\typowanieME\app\views\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_648d8b56a1d355_13391273',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66110c134a3f2ce040e119c1388d8b7f3eef09cf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\typowanieME\\app\\views\\login.tpl',
      1 => 1686587563,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_648d8b56a1d355_13391273 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1545947660648d8b56a08048_10310189', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "loginTMP.tpl");
}
/* {block 'content'} */
class Block_1545947660648d8b56a08048_10310189 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1545947660648d8b56a08048_10310189',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form method="post" action="login">
	<div class="fields">
            <div class="field">
                <label for="name">Login:</label>
                <input type="text" name="login" id="name" />
            </div>
            <div class="field">
                <label for="email">Hasło:</label>
                <input type="password" name="haslo" id="email" />
            </div>
	</div>
	<ul class="actions">
            <li><input type="submit" value="Zaloguj" /></li>
	</ul>
    </form>
    <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo() || $_smarty_tpl->tpl_vars['msgs']->value->isError() || $_smarty_tpl->tpl_vars['msgs']->value->isWarning()) {?>
        <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
            <li><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
    <?php }
}
}
/* {/block 'content'} */
}
