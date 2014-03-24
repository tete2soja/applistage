<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Nom', 'nom', array('class'=>'control-label')); ?>

				<?php echo Form::input('nom', Input::post('nom', isset($entreprise) ? $entreprise->nom : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Nom')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Adresse', 'adresse', array('class'=>'control-label')); ?>

				<?php echo Form::input('adresse', Input::post('adresse', isset($entreprise) ? $entreprise->adresse : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Adresse')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Ville', 'ville', array('class'=>'control-label')); ?>

				<?php echo Form::input('ville', Input::post('ville', isset($entreprise) ? $entreprise->ville : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Ville')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Pays', 'pays', array('class'=>'control-label')); ?>

				<?php echo Form::input('pays', Input::post('pays', isset($entreprise) ? $entreprise->pays : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Pays')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Url entreprise', 'url_entreprise', array('class'=>'control-label')); ?>

				<?php echo Form::input('url_entreprise', Input::post('url_entreprise', isset($entreprise) ? $entreprise->url_entreprise : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Url entreprise')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Stagiaire', 'stagiaire', array('class'=>'control-label')); ?>

				<?php echo Form::input('stagiaire', Input::post('stagiaire', isset($entreprise->stagiaire) ? $entreprise->stagiaire : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Stagiaire')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Sauver', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>