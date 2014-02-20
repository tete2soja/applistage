<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($monkey) ? $monkey->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Code postal', 'code_postal', array('class'=>'control-label')); ?>

				<?php echo Form::input('code_postal', Input::post('code_postal', isset($monkey) ? $monkey->code_postal : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Code postal')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Pays', 'pays', array('class'=>'control-label')); ?>

				<?php echo Form::input('pays', Input::post('pays', isset($monkey) ? $monkey->pays : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Pays')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>