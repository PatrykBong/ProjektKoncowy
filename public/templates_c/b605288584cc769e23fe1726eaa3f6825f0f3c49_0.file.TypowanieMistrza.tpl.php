<?php
/* Smarty version 4.3.0, created on 2023-06-17 14:46:39
  from 'C:\xampp\htdocs\typowanieME\app\views\TypowanieMistrza.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_648dab2f80a671_07932920',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b605288584cc769e23fe1726eaa3f6825f0f3c49' => 
    array (
      0 => 'C:\\xampp\\htdocs\\typowanieME\\app\\views\\TypowanieMistrza.tpl',
      1 => 1687005979,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_648dab2f80a671_07932920 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_380743995648dab2f7f2b94_24746148', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "mainTMP.tpl");
}
/* {block 'content'} */
class Block_380743995648dab2f7f2b94_24746148 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_380743995648dab2f7f2b94_24746148',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form method="post" action="typujMistrza">
	<div class="fields">
            <div class="field">
                <?php if ((isset($_smarty_tpl->tpl_vars['typMUzytkownika']->value))) {?>
                <input list="druzyna" name="druzyna" value="<?php echo $_smarty_tpl->tpl_vars['typMUzytkownika']->value;?>
"/>
                <?php } else { ?>
                <input list="druzyna" name="druzyna"/>
                <?php }?>
                <datalist id="druzyna">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listaReprezentacji']->value, 'linia');
$_smarty_tpl->tpl_vars['linia']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['linia']->value) {
$_smarty_tpl->tpl_vars['linia']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['linia']->value["nazwa"];?>
">
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </datalist>
            </div>
	</div>
	<ul class="actions">
            <?php if (strtotime($_smarty_tpl->tpl_vars['dataPierwszegoMeczu']->value)-strtotime(date("Y:m:d H:i:s")) < 3600) {?>
                <li><input type="submit" disabled="disabled" value="Typuj" /></li>
                <!--<li><input type="submit" value="Typuj" /></li>-->
            <?php } else { ?>
                <li><input type="submit" value="Typuj" /></li>
            <?php }?>
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
    <?php }?>
    
    <?php if (strtotime($_smarty_tpl->tpl_vars['dataPierwszegoMeczu']->value)-strtotime(date("Y:m:d H:i:s")) < 3600) {?>
        <table>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tabelaTNM']->value, 'linia');
$_smarty_tpl->tpl_vars['linia']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['linia']->value) {
$_smarty_tpl->tpl_vars['linia']->do_else = false;
?>
            <?php if ($_smarty_tpl->tpl_vars['linia']->value["w_turnieju"] == 1) {?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['linia']->value["nazwa"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['linia']->value["ile"];?>
</td>
                </tr>
            <?php } else { ?>
                <tr style="background-color: #ffbb99">
                    <td><?php echo $_smarty_tpl->tpl_vars['linia']->value["nazwa"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['linia']->value["ile"];?>
</td>
                </tr>
            <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>    
    <?php }
}
}
/* {/block 'content'} */
}
