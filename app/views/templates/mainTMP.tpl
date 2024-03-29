<!DOCTYPE HTML>

<html>
	<head>
		<title>Typowanie Mistrzostw Europy</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{$conf->app_root}/../lib/css/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="{$conf->app_root}/../lib/css/assets/css/noscript.css" /></noscript>
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
                                                {if \core\RoleUtils::inRole("admin")}
						<ul class="links" style="font-size: 1px;">
                                                {else}
                                                <ul class="links">   
                                                {/if}
							<li><a href="{$conf->action_url}start">Start</a></li>
							<li><a href="{$conf->action_url}mojeTypy">Moje typy</a></li>
							<li><a href="{$conf->action_url}typyInnychGraczy">Typy innych graczy</a></li>
                                                        <li><a href="{$conf->action_url}tabela">Tabela</a></li>
                                                        <li><a href="{$conf->action_url}typowanieMistrza">Typowanie mistrza</a></li>
                                                        <li><a href="{$conf->action_url}regulamin">Regulamin</a></li>
                                                        {if \core\RoleUtils::inRole("admin") || \core\RoleUtils::inRole("user-typer") || \core\RoleUtils::inRole("user-mistrz")}
                                                        <li><a href="{$conf->action_url}logout">Wyloguj</a></li>
                                                        {else}
                                                        <li><a href="{$conf->action_url}login">Zaloguj</a></li>
                                                        {/if}
                                                        {if \core\RoleUtils::inRole("admin")}
                                                        <li><a href="{$conf->action_url}admin">Admin mode</a></li>
                                                        {/if} 
						</ul>
                                        </nav>

				<!-- Main -->
					<div id="main">
                                            {block name=content} Domyślna treść zawartości .... {/block}
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
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>