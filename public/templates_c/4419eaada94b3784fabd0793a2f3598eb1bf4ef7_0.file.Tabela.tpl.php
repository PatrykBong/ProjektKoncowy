<?php
/* Smarty version 4.3.0, created on 2023-06-13 20:27:23
  from 'C:\xampp\htdocs\typowanieME\app\views\Tabela.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6488b50b6d6b81_70058129',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4419eaada94b3784fabd0793a2f3598eb1bf4ef7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\typowanieME\\app\\views\\Tabela.tpl',
      1 => 1686680833,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6488b50b6d6b81_70058129 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13855635056488b50b6c90f5_16074106', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "mainTMP.tpl");
}
/* {block 'content'} */
class Block_13855635056488b50b6c90f5_16074106 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_13855635056488b50b6c90f5_16074106',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <center><h1> TABELA WYNIKÓW </h1></center>
    <table>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tabela']->value, 'linia');
$_smarty_tpl->tpl_vars['linia']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['linia']->value) {
$_smarty_tpl->tpl_vars['linia']->do_else = false;
?>
        <tr><td><?php echo $_smarty_tpl->tpl_vars['linia']->value["imie"];?>
 <?php echo $_smarty_tpl->tpl_vars['linia']->value["nazwisko"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['linia']->value["punkty"];?>
</td></tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
<?php
}
}
/* {/block 'content'} */
}
