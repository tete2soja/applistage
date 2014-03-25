<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Nom', 'nom', array('class'=>'control-label')); ?>

				<?php echo Form::input('nom', Input::post('nom', isset($enseignant) ? $enseignant->nom : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Nom')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Prénom', 'prenom', array('class'=>'control-label')); ?>

				<?php echo Form::input('prenom', Input::post('prenom', isset($enseignant) ? $enseignant->prenom : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Prenom')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($enseignant) ? $enseignant->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Sauver', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>