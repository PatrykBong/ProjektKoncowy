<?php
/* Smarty version 4.3.0, created on 2023-06-11 22:34:24
  from 'C:\xampp\htdocs\typowanieME\app\views\Start.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64862fd04dc5e2_49145159',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4c66f63ca92fcbb2c2430013b2e8e8244c63616' => 
    array (
      0 => 'C:\\xampp\\htdocs\\typowanieME\\app\\views\\Start.tpl',
      1 => 1686515661,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64862fd04dc5e2_49145159 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_163187775064862fd04cbe10_70678522', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "mainTMP.tpl");
}
/* {block 'content'} */
class Block_163187775064862fd04cbe10_70678522 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_163187775064862fd04cbe10_70678522',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div  style="all: unset; width: 65%; float: left; padding-left: 8px;">
        Witaj 
        <?php if ((isset($_smarty_tpl->tpl_vars['imieGracza']->value))) {?>
            <?php echo $_smarty_tpl->tpl_vars['imieGracza']->value;?>

        <?php } else { ?>
            Gościu
        <?php }?>
        , witamy na naszej stronie, czas wytypować parę wyników :)<br><br>
        <?php if ((isset($_smarty_tpl->tpl_vars['punktyGracza']->value))) {?>
            <h4>Twoje punkty: <?php echo $_smarty_tpl->tpl_vars['punktyGracza']->value;?>
</h4>
        <?php } else { ?>
            Zapraszamy do <a style="all: unset; color:red;" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login">zalogowania się</a>
        <?php }?>
        
    </div>
    <div  style="all: unset; float: left;">
        <center>
        <ul style="list-style-type:none;">
            <li><h2>Najbliższe mecze:</h2></li>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['przyszleMecze']->value, 'mecz');
$_smarty_tpl->tpl_vars['mecz']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mecz']->value) {
$_smarty_tpl->tpl_vars['mecz']->do_else = false;
?>
            <li><h6><?php echo $_smarty_tpl->tpl_vars['mecz']->value["druz1"];?>
-<?php echo $_smarty_tpl->tpl_vars['mecz']->value["druz2"];?>
 <?php echo $_smarty_tpl->tpl_vars['mecz']->value["data"];?>
</h6></li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul></center>
    </div>
        <br><br><br><br><br><br>
<?php
}
}
/* {/block 'content'} */
}
