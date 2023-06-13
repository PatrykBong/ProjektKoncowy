<?php
/* Smarty version 4.3.0, created on 2023-06-13 20:17:33
  from 'C:\xampp\htdocs\typowanieME\app\views\typyInnychGraczy.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6488b2bd2cb221_29818610',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e5ef93323b6bba88fdcf0edd18f7c77fe556de9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\typowanieME\\app\\views\\typyInnychGraczy.tpl',
      1 => 1686680243,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6488b2bd2cb221_29818610 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15586641586488b2bd2b6de8_47591046', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "mainTMP.tpl");
}
/* {block 'content'} */
class Block_15586641586488b2bd2b6de8_47591046 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_15586641586488b2bd2b6de8_47591046',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <style>
        table, tr, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
    
    <table>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tabela']->value, 'linia');
$_smarty_tpl->tpl_vars['linia']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['linia']->value) {
$_smarty_tpl->tpl_vars['linia']->do_else = false;
?>
        <tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['linia']->value, 'li');
$_smarty_tpl->tpl_vars['li']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['li']->value) {
$_smarty_tpl->tpl_vars['li']->do_else = false;
?>
        <td colspan="2" style="width:11%;"><?php echo $_smarty_tpl->tpl_vars['li']->value;?>
</td>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tabela2']->value, 'linia2');
$_smarty_tpl->tpl_vars['linia2']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['linia2']->value) {
$_smarty_tpl->tpl_vars['linia2']->do_else = false;
?>
        <tr>
        <?php $_smarty_tpl->_assignInScope('new', 0);?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['linia2']->value, 'li2');
$_smarty_tpl->tpl_vars['li2']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['li2']->value) {
$_smarty_tpl->tpl_vars['li2']->do_else = false;
?>
            <?php if ($_smarty_tpl->tpl_vars['new']->value > 1) {?>
                <?php if ($_smarty_tpl->tpl_vars['li2']->value == 3) {?>
                <td style="background-color:#ff9900;    "><?php echo $_smarty_tpl->tpl_vars['li2']->value;?>
</td>
                <?php } elseif ($_smarty_tpl->tpl_vars['li2']->value == 1) {?>
                <td style="background-color:#ffff66;"><?php echo $_smarty_tpl->tpl_vars['li2']->value;?>
</td>
                <?php } elseif ($_smarty_tpl->tpl_vars['li2']->value == 0) {?>
                <td style="background-color:#ffd6d6;"><?php echo $_smarty_tpl->tpl_vars['li2']->value;?>
</td>
                <?php } else { ?>
                <td><?php echo $_smarty_tpl->tpl_vars['li2']->value;?>
</td>
                <?php }?>
            <?php } else { ?>
                <?php if (is_numeric($_smarty_tpl->tpl_vars['li2']->value)) {?>
                    <td style="background-color:#6fff66;"><?php echo $_smarty_tpl->tpl_vars['li2']->value;?>
</td>
                <?php } else { ?>
                    <td><?php echo $_smarty_tpl->tpl_vars['li2']->value;?>
</td>
                <?php }?>
            <?php }?>
        <p style="display: none"><?php echo $_smarty_tpl->tpl_vars['new']->value++;?>
</p>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>}
<?php
}
}
/* {/block 'content'} */
}
