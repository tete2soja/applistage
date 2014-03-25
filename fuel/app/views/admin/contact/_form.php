<?php echo Form::open(array("class"=>"form-horizontal")); ?>
<style type="text/css">
fieldset {
    margin-right: 15px;
    margin-left: 15px;
}
</style>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Nom', 'nom', array('class'=>'control-label')); ?>

				<?php echo Form::input('nom', Input::post('nom', isset($contact) ? $contact->nom : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Nom')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Prénom', 'prenom', array('class'=>'control-label')); ?>

				<?php echo Form::input('prenom', Input::post('prenom', isset($contact) ? $contact->prenom : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Prenom')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Téléphone', 'telephone', array('class'=>'control-label')); ?>

				<?php echo Form::input('telephone', Input::post('telephone', isset($contact->telephone) ? $contact->telephone : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Telephone')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($contact->telephone) ? $contact->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Ville', 'ville', array('class'=>'control-label')); ?>

				<?php echo Form::input('ville', Input::post('ville', isset($contact) ? $contact->ville : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Ville')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Code Postal', 'code_postal', array('class'=>'control-label')); ?>

				<?php echo Form::input('code_postal', Input::post('code_postal', isset($contact) ? $contact->code_postal : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Code Postal')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Pays', 'pays', array('class'=>'control-label')); ?>

				<?php echo Form::input('pays', Input::post('pays', isset($contact) ? $contact->pays : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Pays')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Entreprise', 'entreprise', array('class'=>'control-label')); ?>

				<?php echo Form::input('entreprise', Input::post('entreprise', isset($contact) ? $contact->ent_nom : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Entreprise')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Encadre', 'encadre', array('class'=>'control-label')); ?>

				<?php echo Form::input('encadre', Input::post('encadre', isset($contact) ? $contact->encadre : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Encadre')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Signe', 'signe', array('class'=>'control-label')); ?>

				<?php echo Form::input('signe', Input::post('signe', isset($contact) ? $contact->signe : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Signe')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Propose', 'propose', array('class'=>'control-label')); ?>

				<?php echo Form::input('propose', Input::post('propose', isset($contact) ? $contact->propose : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Propose')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Sauver', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>