<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Titre', 'titre', array('class'=>'control-label')); ?>

				<?php echo Form::input('titre', Input::post('titre', isset($note) ? $note->titre : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Titre')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('description', Input::post('description', isset($note) ? $note->description : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Description')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>