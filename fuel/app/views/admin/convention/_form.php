<?php echo Form::open(array("class"=>"form-horizontal")); ?>
<style type="text/css">
fieldset {
    margin-right: 15px;
    margin-left: 15px;
}
</style>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Observations resp', 'observations_resp', array('class'=>'control-label')); ?>

				<?php echo Form::input('observations_resp', Input::post('observations_resp', isset($convention) ? $convention->observations_resp : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Observations resp')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Sauver', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>