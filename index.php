<?php include 'yonetim/islemler/baglan.php';


$sorgu=$db->prepare("SELECT * FROM sayfalar");
$sorgu->execute();
$sayfa=$sorgu->fetch(PDO::FETCH_ASSOC); ?>
<!DOCTYPE HTML>
<!--
	Dimension by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	<title><?php echo $ayarcek['site_baslik'] ?></title>
	<link rel="shortcut icon" type="image/png" href="yonetim/dosyalar/<?php echo $ayarcek['site_logo'] ?>">
	<meta name="description" content="<?php echo $ayarcek['site_baslik'] ?>">

	<style type="text/css" media="screen">
		#bg:after {
			background-image: url("yonetim/dosyalar/<?php echo $ayarcek['site_arkaplan'] ?>");
			background-position: center;
			background-size: cover;
			background-repeat: no-repeat;
			z-index: 1;
		}
	</style>
</head>
<body class="is-preload">

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header -->
		<header id="header">
			<div class="logo">
				<img class="img-fluid" style="width: 85%; margin-top: 5px" src="yonetim/dosyalar/<?php echo $ayarcek['site_logo'] ?>" alt="">
			</div>
			<div class="content">
				<div class="inner">
					<h1><?php echo $ayarcek['site_baslik'] ?></h1>
					<p><?php echo $ayarcek['site_anasayfa_aciklama'] ?></p>
				</div>
			</div>
			<nav>
				<ul>
					<li><a href="#intro">Tanıtım</a></li>
					<li><a href="#work">Çalışmalarım</a></li>
					<li><a href="#about">Hakkımda</a></li>
					<li><a href="#contact">İletişim</a></li>
					<!--<li><a href="#elements">Elements</a></li>-->
				</ul>
			</nav>
		</header>

		<!-- Main -->
		<div id="main">

			<!-- Intro -->
			<article id="intro">
				<h2 class="major">Tanıtım</h2>
				
				<?php echo $sayfa['tanitim_sayfasi'] ?>
			</article>

			<!-- Work -->
			<article id="work">
				<h2 class="major">Çalışmalarım</h2>

				<?php echo $sayfa['calismalarim_sayfasi'] ?>
			</article>

			<!-- About -->
			<article id="about">
				<h2 class="major">Hakkımda</h2>
				
				<?php echo $sayfa['hakkimda_sayfasi'] ?>
			</article>

			<!-- Contact -->
			<article id="contact">
				<h2 class="major">İletişim</h2>
				<form method="post" action="yonetim/islemler/ajax.php">
					<div class="fields">
						<div class="field half">
							<label for="name">İsim</label>
							<input type="text" name="form_isim" id="name" />
						</div>
						<div class="field half">
							<label for="email">Email</label>
							<input type="text" name="form_mail" id="email" />
						</div>
						<div class="field">
							<label for="message">Mesajınız</label>
							<textarea name="message" id="form_mesaj" rows="4"></textarea>
						</div>
					</div>
					<ul class="actions">
						<li><input type="submit" value="Gönder" class="primary" /></li>
						<li><input type="reset" value="Temizle" /></li>
					</ul>
				</form>
				<ul class="icons">
					<li><a href="<?php echo $ayarcek['twitter'] ?>" rel="nofollow" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="<?php echo $ayarcek['facebook'] ?>" rel="nofollow" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
					<li><a href="<?php echo $ayarcek['instagram'] ?>" rel="nofollow" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="<?php echo $ayarcek['github'] ?>" rel="nofollow" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
				</ul>
			</article>

		</div>

		<!-- Footer -->
		<footer id="footer">
			<p class="copyright"><?php echo $ayarcek['site_baslik'] ?></p>
		</footer>

		<!-- Footer -->
		<!--<footer id="footer">
			<p class="copyright">&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
		</footer>-->

	</div>

	<!-- BG -->
	<div id="bg"></div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>
</html>
