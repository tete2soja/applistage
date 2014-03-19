<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Sujet', 'sujet', array('class'=>'control-label')); ?>

				<?php echo Form::input('sujet', Input::post('sujet', isset($proposition) ? $proposition->sujet : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Sujet')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Nomcontact', 'nomcontact', array('class'=>'control-label')); ?>

				<?php echo Form::input('nomcontact', Input::post('nomcontact', isset($proposition) ? $proposition->nomcontact : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Nomcontact')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Publicproposition', 'publicproposition', array('class'=>'control-label')); ?>

				<?php echo Form::input('publicproposition', Input::post('publicproposition', isset($proposition) ? $proposition->publicproposition : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Publicproposition')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Contextestage', 'contextestage', array('class'=>'control-label')); ?>

				<?php echo Form::input('contextestage', Input::post('contextestage', isset($proposition) ? $proposition->contextestage : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Contextestage')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Conditionstage', 'conditionstage', array('class'=>'control-label')); ?>

				<?php echo Form::input('conditionstage', Input::post('conditionstage', isset($proposition) ? $proposition->conditionstage : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Conditionstage')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Proposition', 'proposition', array('class'=>'control-label')); ?>

				<?php echo Form::input('proposition', Input::post('proposition', isset($proposition) ? $proposition->proposition : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Proposition')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Indemnite', 'indemnite', array('class'=>'control-label')); ?>

				<?php echo Form::input('indemnite', Input::post('indemnite', isset($proposition) ? $proposition->indemnite : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Indemnite')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Public', 'public', array('class'=>'control-label')); ?>

				<?php echo Form::input('public', Input::post('public', isset($proposition) ? $proposition->public : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Public')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Entreprise', 'entreprise', array('class'=>'control-label')); ?>

				<?php echo Form::input('entreprise', Input::post('entreprise', isset($proposition) ? $proposition->entreprise : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Entreprise')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>