<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "index" ); ?>'><?php echo Html::anchor('etudiant/index','Index');?></li>
	<li class='<?php echo Arr::get($subnav, "convention" ); ?>'><?php echo Html::anchor('etudiant/convention','Convention');?></li>
	<li class='<?php echo Arr::get($subnav, "realisation" ); ?>'><?php echo Html::anchor('etudiant/realisation','Realisation');?></li>
	<li class='<?php echo Arr::get($subnav, "recherche" ); ?>'><?php echo Html::anchor('etudiant/recherche','Recherche');?></li>
	<li class='<?php echo Arr::get($subnav, "soutenance" ); ?>'><?php echo Html::anchor('etudiant/soutenance','Soutenance');?></li>
	<li class='<?php echo Arr::get($subnav, "formulaire" ); ?>'><?php echo Html::anchor('etudiant/formulaire','Formulaire');?></li>
	<li class='<?php echo Arr::get($subnav, "connexion" ); ?>'><?php echo Html::anchor('etudiant/connexion','Connexion');?></li>

</ul>
<p>Soutenance</p>