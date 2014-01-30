<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "index" ); ?>'><?php echo Html::anchor('admin/index','Index');?></li>
	<li class='<?php echo Arr::get($subnav, "connexion" ); ?>'><?php echo Html::anchor('admin/connexion','Connexion');?></li>
	<li class='<?php echo Arr::get($subnav, "import" ); ?>'><?php echo Html::anchor('admin/import','Import');?></li>
	<li class='<?php echo Arr::get($subnav, "edit" ); ?>'><?php echo Html::anchor('admin/edit','Edit');?></li>
	<li class='<?php echo Arr::get($subnav, "view" ); ?>'><?php echo Html::anchor('admin/view','View');?></li>
	<li class='<?php echo Arr::get($subnav, "create" ); ?>'><?php echo Html::anchor('admin/create','Create');?></li>
	<li class='<?php echo Arr::get($subnav, "edit" ); ?>'><?php echo Html::anchor('admin/edit','Edit');?></li>
	<li class='<?php echo Arr::get($subnav, "_form" ); ?>'><?php echo Html::anchor('admin/_form',' form');?></li>

</ul>
<p> form</p>