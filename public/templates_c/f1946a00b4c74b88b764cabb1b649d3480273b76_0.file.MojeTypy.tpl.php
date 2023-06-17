<?php
/* Smarty version 4.3.0, created on 2023-06-17 20:28:22
  from 'C:\xampp\htdocs\typowanieME\app\views\MojeTypy.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_648dfb460ce7e1_18012044',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1946a00b4c74b88b764cabb1b649d3480273b76' => 
    array (
      0 => 'C:\\xampp\\htdocs\\typowanieME\\app\\views\\MojeTypy.tpl',
      1 => 1687012408,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_648dfb460ce7e1_18012044 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1621605317648dfb460b7a80_53340735', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "mainTMP.tpl");
}
/* {block 'content'} */
class Block_1621605317648dfb460b7a80_53340735 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1621605317648dfb460b7a80_53340735',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form method="post" action="typuj">
        <table>
        <tr><td>mecz</td><td>typ</td><td>data</td><td></td></tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tabela']->value, 'linia');
$_smarty_tpl->tpl_vars['linia']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['linia']->value) {
$_smarty_tpl->tpl_vars['linia']->do_else = false;
?>
                <tr>
                    <td style="display: none;"><input type="text" name="id<?php echo $_smarty_tpl->tpl_vars['linia']->value["id_mecz"];?>
" value="<?php echo $_smarty_tpl->tpl_vars['linia']->value["id_mecz"];?>
"></td>
                    <td style="display: none;"><input type="text" name="data<?php echo $_smarty_tpl->tpl_vars['linia']->value["id_mecz"];?>
" value="<?php echo $_smarty_tpl->tpl_vars['linia']->value["data"];?>
"></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linia']->value["druz1"];?>
-<?php echo $_smarty_tpl->tpl_vars['linia']->value["druz2"];?>
</td>
                    <td><?php if ((strtotime($_smarty_tpl->tpl_vars['linia']->value['data']))-strtotime(date("Y:m:d H:i:s")) > 3600) {?>
                            <input type="text" name="wynik<?php echo $_smarty_tpl->tpl_vars['linia']->value["id_mecz"];?>
" value="<?php echo $_smarty_tpl->tpl_vars['linia']->value["typ"];?>
">
                        <?php } else { ?>
                            <input disabled='disabled' style='background-color: #848484;' type="text" name="wynik<?php echo $_smarty_tpl->tpl_vars['linia']->value["id_mecz"];?>
" value="<?php echo $_smarty_tpl->tpl_vars['linia']->value["typ"];?>
 <czas na typowanie minął>">
                        <?php }?></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linia']->value["data"];?>
</td>
                    <td><?php if ((strtotime($_smarty_tpl->tpl_vars['linia']->value['data']))-strtotime(date("Y:m:d H:i:s")) > 3600) {?>
                            <input type="submit" value="Wyślij wynik" />
                        <?php } else { ?>
                            <input disabled='disabled' style='background-color: #848484;' type="submit" value="Wyślij wynik" />
                        <?php }?></td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>
    </form>
<?php
}
}
/* {/block 'content'} */
}
