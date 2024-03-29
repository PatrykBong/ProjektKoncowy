<?php
/* Smarty version 4.3.0, created on 2023-06-17 21:04:30
  from 'C:\xampp\htdocs\typowanieME\app\views\templates\mainTMP.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_648e03be838340_83432137',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e513b3ee096fd20811cb69e01dcad05bcde1797a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\typowanieME\\app\\views\\templates\\mainTMP.tpl',
      1 => 1687028657,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_648e03be838340_83432137 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Typowanie Mistrzostw Europy</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/../lib/css/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/../lib/css/assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<a href="index.html" class="logo">Typowanie Mistrzostw Europy</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
                                                <?php if (\core\RoleUtils::inRole("admin")) {?>
						<ul class="links" style="font-size: 1px;">
                                                <?php } else { ?>
                                                <ul class="links">   
                                                <?php }?>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
start">Start</a></li>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
mojeTypy">Moje typy</a></li>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
typyInnychGraczy">Typy innych graczy</a></li>
                                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
tabela">Tabela</a></li>
                                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
typowanieMistrza">Typowanie mistrza</a></li>
                                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
regulamin">Regulamin</a></li>
                                                        <?php if (\core\RoleUtils::inRole("admin") || \core\RoleUtils::inRole("user-typer") || \core\RoleUtils::inRole("user-mistrz")) {?>
                                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout">Wyloguj</a></li>
                                                        <?php } else { ?>
                                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login">Zaloguj</a></li>
                                                        <?php }?>
                                                        <?php if (\core\RoleUtils::inRole("admin")) {?>
                                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
admin">Admin mode</a></li>
                                                        <?php }?> 
						</ul>
                                        </nav>

				<!-- Main -->
					<div id="main">
                                            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_151705904648e03be836fa2_45002465', 'content');
?>

					</div>

				<!-- Footer -->
					<footer id="footer">
						<section class="split contact">
							<section class="alt">
								<h3>Address</h3>
								<p>1234 Somewhere Road #87257<br />
								Nashville, TN 00000-0000</p>
							</section>
							<section>
								<h3>Phone</h3>
								<p><a href="#">(000) 000-0000</a></p>
							</section>
						</section>
						<section class="split contact">
							<section>
								<h3>Email</h3>
								<p><a href="#">info@untitled.tld</a></p>
							</section>
							<section>
								<h3>Social</h3>
								<ul class="icons alt">
									<li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
								</ul>
							</section>
						</section>
					</footer>

				<!-- Copyright -->
					<div id="copyright">
                                            <ul><li>&copy; Typowanie Mistrzostw Europy</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li><li>PBonk2023</li></ul>
					</div>

			</div>

		<!-- Scripts -->
			<?php echo '<script'; ?>
 src="assets/js/jquery.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/jquery.scrolly.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/browser.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/util.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/main.js"><?php echo '</script'; ?>
>

	</body>
</html><?php }
/* {block 'content'} */
class Block_151705904648e03be836fa2_45002465 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_151705904648e03be836fa2_45002465',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
}
