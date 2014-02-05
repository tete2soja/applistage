<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		#logo{
			display: block;
			width: 179px;
			height: 45px;
			position: relative;
			top: 15px;
		}
		.jumbotron{
			color: #000;
			height: 150px;
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h1 style="margin-top: -20px;"><a style="text-decoration: none;color:black;"href="./index"><?php echo $main_title; ?></a></h1>
			<?php if (Session::get_flash('success')): ?>
			<div class="alert alert-success">
				<strong>Success</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
				</p>
			</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
			<div class="alert alert-error">
				<strong>Error</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
				</p>
			</div>
<?php endif; ?>
			<p><?php echo $sub_title; ?></p>
		</div>
		<?php echo $content; ?>
		<hr />
		<footer>
			<p class="pull-right">
				<a href="/applistage/public/index" type="button" class="btn btn-link">Retour Accueil</a>
				<a href="/applistage/public/admin/" type="button" class="btn btn-danger">Admin</a></p>
			<p>
				<a href="http://www.iu-vannes.fr/" target="_blank">IUT Vannes</a><br>
				<small>Propulsé par FuelPHP <?php echo Fuel::VERSION; ?></small>
			</p>
		</footer>
	</div>
</body>
</html>