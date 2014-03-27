<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $title; ?></title>
		<?php echo Asset::css('bootstrap.css'); ?>
		<?php echo Asset::css('docs.min.css'); ?>
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
		<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.11.0.js"></script>
		<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
		<?php echo Asset::js('bootstrap.min.js'); ?>
		<?php echo Asset::js('common.js'); ?>
	</head>
	<body>
		<div class="container">
			<div class="jumbotron">
				<h1 style="margin-top: -20px;"><a style="text-decoration: none;color:black;"href="./index"><?php echo $main_title; ?></a></h1>
				<p><?php echo $sub_title; ?></p>
			</div>
			<?php if (Session::get_flash('success')): ?>
				<div class="alert alert-success">
					<strong>Succès</strong>
					<p>
					<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
					</p>
				</div>
	<?php endif; ?>
	<?php if (Session::get_flash('error')): ?>
				<div class="alert alert-error">
					<strong>Erreur</strong>
					<p>
					<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
					</p>
				</div>
	<?php endif; ?>
	<?php if (Session::get_flash('info')): ?>
				<div class="alert alert-info">
					<strong>Information</strong>
					<p>
					<?php echo implode('</p><p>', e((array) Session::get_flash('info'))); ?>
					</p>
				</div>
	<?php endif; ?>
			<?php echo $content; ?>
			<hr />
			<footer>
				<p class="pull-right">
					<?php echo Html::anchor('/', 'Retour Accueil', array('class' => 'btn btn-link')); ?>
					<?php if (Auth::check())
						{							
							echo Html::anchor('util/logout', 'Déconnexion', array('class' => 'btn btn-warning', 'style' => 'padding-top: 5px;'));
							echo Html::anchor('util/compte', 'Mon compte', array('class' => 'btn btn-default', 'style' => 'padding-top: 5px;'));
						}
					?>
					<?php echo Html::anchor('admin/', 'Admin', array('class' => 'btn btn-danger')); ?></p>
				<p>
					<a href="http://www.iu-vannes.fr/" target="_blank">IUT Vannes</a><br>
					<small>Propulsé par FuelPHP <?php echo Fuel::VERSION; ?></small>
				</p>
			</footer>
		</div>
	</body>
</html>