<?php
/* Smarty version 4.3.0, created on 2023-06-17 20:37:19
  from 'C:\xampp\htdocs\typowanieME\app\views\Admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_648dfd5fbb2e27_87977337',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '07ab28b3cf70fe13a29183b08b4d7a59aea906b6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\typowanieME\\app\\views\\Admin.tpl',
      1 => 1687027019,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_648dfd5fbb2e27_87977337 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1559975486648dfd5fb9c432_63413886', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "adminTMP.tpl");
}
/* {block 'content'} */
class Block_1559975486648dfd5fb9c432_63413886 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1559975486648dfd5fb9c432_63413886',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div id="#wyniki_meczy">
        <center><h2>Wprowadź/Aktualizuj wynik meczu</h2></center>
        <form method="post" action="wstawWynikMeczu">
            <table>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab']->value, 'linia');
$_smarty_tpl->tpl_vars['linia']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['linia']->value) {
$_smarty_tpl->tpl_vars['linia']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['linia']->value["druz1"];?>
</td>
                    <td><input type="text" name="wynik<?php echo $_smarty_tpl->tpl_vars['linia']->value["id_mecz"];?>
" style="text-align: center;" value="<?php echo $_smarty_tpl->tpl_vars['linia']->value["wynik"];?>
"></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linia']->value["druz2"];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linia']->value["data"];?>
</td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
            <center><input type="submit" value="Ustaw wyniki"></center>  
        </form>
    </div>
            
    <div id="#mecze">
        <center><h2>Usuń mecz</h2></center>
        <form method="post" action="usunMecz">
            <table>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab']->value, 'linia');
$_smarty_tpl->tpl_vars['linia']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['linia']->value) {
$_smarty_tpl->tpl_vars['linia']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['linia']->value["druz1"];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linia']->value["wynik"];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linia']->value["druz2"];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linia']->value["data"];?>
</td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
            <input list="doUsuniecia" style="width: 40%;" name="doUsuniecia"/>
            <datalist id="doUsuniecia">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab']->value, 'linia');
$_smarty_tpl->tpl_vars['linia']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['linia']->value) {
$_smarty_tpl->tpl_vars['linia']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['linia']->value["data"];?>
 => <?php echo $_smarty_tpl->tpl_vars['linia']->value["druz1"];?>
-<?php echo $_smarty_tpl->tpl_vars['linia']->value["druz2"];?>
 <?php echo $_smarty_tpl->tpl_vars['linia']->value["id_mecz"];?>
">
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </datalist>
            <input type="submit" value="Usuń Mecz">  
        </form>
        
        <center><h2>Dodaj mecz</h2></center>
        <form method="post" action="dodajMecz">
            <input list="druzyna_1" name="druzyna_1"/>
            <datalist id="druzyna_1">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab']->value, 'linia');
$_smarty_tpl->tpl_vars['linia']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['linia']->value) {
$_smarty_tpl->tpl_vars['linia']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['linia']->value["druz1"];?>
">
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </datalist>
            <input list="druzyna_2" name="druzyna_2"/>
            <datalist id="druzyna_2">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab']->value, 'linia');
$_smarty_tpl->tpl_vars['linia']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['linia']->value) {
$_smarty_tpl->tpl_vars['linia']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['linia']->value["druz1"];?>
">
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </datalist>
            <input type="datetime-local" name="data"><br><br>
            <input type="submit" value="Dodaj Mecz">  
        </form>            
    </div>
            
    <div id="#gracze_i_role">
                <center><h2>Usuń użytkownika/rolę</h2></center>
                <table>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['uzytk']->value, 'linia');
$_smarty_tpl->tpl_vars['linia']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['linia']->value) {
$_smarty_tpl->tpl_vars['linia']->do_else = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['linia']->value["id_uzytkownik"];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['linia']->value["nick"];?>
</td>
                        <td><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['linia']->value["rola"], 'linia2');
$_smarty_tpl->tpl_vars['linia2']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['linia2']->value) {
$_smarty_tpl->tpl_vars['linia2']->do_else = false;
echo $_smarty_tpl->tpl_vars['linia2']->value;?>
 <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['linia']->value["imie"];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['linia']->value["nazwisko"];?>
</td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </table>
                <form method="post" action="usunUzytkownika">
                    <input list="usunUzytkownik" name="usunUzytkownik"/>
                    <datalist id="usunUzytkownik">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pureUzytk']->value, 'linia');
$_smarty_tpl->tpl_vars['linia']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['linia']->value) {
$_smarty_tpl->tpl_vars['linia']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['linia']->value["nick"];?>
 => <?php echo $_smarty_tpl->tpl_vars['linia']->value["id_uzytkownik"];?>
">
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </datalist>
                    <input type="submit" value="Usuń użytkownika">
                </form>
                <form method="post" action="usunRole">
                    <input list="komuOdebracRole" name="komuOdebracRole"/>
                    <datalist id="komuOdebracRole">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pureUzytk']->value, 'linia');
$_smarty_tpl->tpl_vars['linia']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['linia']->value) {
$_smarty_tpl->tpl_vars['linia']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['linia']->value["nick"];?>
 => <?php echo $_smarty_tpl->tpl_vars['linia']->value["id_uzytkownik"];?>
">
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </datalist>
                    <input list="jakaOdebracRole" name="jakaOdebracRole"/>
                    <datalist id="jakaOdebracRole">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['role']->value, 'linia');
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
                    <input type="submit" value="Usuń rolę">
                </form>
                <center><h2>Dodaj użytkownika/rolę</h2></center>
                <form method="post" action="dodajUzytkownika">
                    <input type="text" style="width: 30%;" name="nowyUzytkownikNick" value="podaj nazwę użytkownika"/>
                    <input type="text" style="width: 30%;" name="nowyUzytkownikImie" value="podaj imię użytkownika"/>
                    <input type="text" style="width: 30%;" name="nowyUzytkownikNazwisko" value="podaj nazwisko użytkownika"/>
                    <input type="text" style="width: 30%;" name="nowyUzytkownikHaslo" value="podaj hasło użytkownika"/><br><br>
                    <input type="submit" value="Dodaj użytkownika">
                </form><br><br>
                <form method="post" action="dodajRole">
                    <input list="komuDodacRole" name="komuDodacRole"/>
                    <datalist id="komuDodacRole">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pureUzytk']->value, 'linia');
$_smarty_tpl->tpl_vars['linia']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['linia']->value) {
$_smarty_tpl->tpl_vars['linia']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['linia']->value["nick"];?>
 => <?php echo $_smarty_tpl->tpl_vars['linia']->value["id_uzytkownik"];?>
">
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </datalist>
                    <input list="jakaDodacRole" name="jakaDodacRole"/>
                    <datalist id="jakaDodacRole">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['role']->value, 'linia');
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
                    <input type="submit" value="Dodaj rolę">
                </form>
    </div>
            
    <div id="#reprezentacje">
        <center><h2>Usuń reprezentacje</h2></center>
        <form method="post" action="usunReprezentacje">
            <table>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rep']->value, 'linia');
$_smarty_tpl->tpl_vars['linia']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['linia']->value) {
$_smarty_tpl->tpl_vars['linia']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['linia']->value;?>
</td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
            <input list="usunRep" style="width: 30%;" name="usunRep"/>
            <datalist id="usunRep">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rep']->value, 'linia');
$_smarty_tpl->tpl_vars['linia']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['linia']->value) {
$_smarty_tpl->tpl_vars['linia']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['linia']->value;?>
">
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </datalist><br><br>
            <input type="submit" value="Usuń reprezentacje">
        </form>
        
        <center><h2>Dodaj reprezentacje</h2></center>
        <form method="post" action="dodajReprezentacje">
            <input type="text" style="width: 30%;" name="nowaDruzyna" value="podaj nazwę reprezentacji"/><br><br>
            <input type="submit" value="Dodaj Reprezentacje">  
        </form>
    </div>
<?php
}
}
/* {/block 'content'} */
}
