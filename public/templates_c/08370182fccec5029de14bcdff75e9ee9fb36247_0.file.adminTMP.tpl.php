<?php
/* Smarty version 4.3.0, created on 2023-06-17 15:26:51
  from 'C:\xampp\htdocs\typowanieME\app\views\templates\adminTMP.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_648db49b4f9a76_13473014',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08370182fccec5029de14bcdff75e9ee9fb36247' => 
    array (
      0 => 'C:\\xampp\\htdocs\\typowanieME\\app\\views\\templates\\adminTMP.tpl',
      1 => 1687008382,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_648db49b4f9a76_13473014 (Smarty_Internal_Template $_smarty_tpl) {
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
						<ul class="links" style="font-size: 1px;">
							<li><a href="#wyniki_meczy">Wprowadź/Aktualizuj wynik</a></li>
							<li><a href="#mecze">Dodaj/Usuń mecz</a></li>
							<li><a href="#gracze_i_role">Dodaj/Usuń gracza i role</a></li>
                                                        <li><a href="#reprezentacje">Dodaj/Usuń reprezentacje</a></li>
                                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout">Wyloguj</a></li>                                                        
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
                                            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2090895083648db49b4f9009_10681866', 'content');
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
class Block_2090895083648db49b4f9009_10681866 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2090895083648db49b4f9009_10681866',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
}
