<?php echo Form::open(array("class"=>"form-horizontal")); ?>
<style type="text/css">
fieldset {
    margin-right: 15px;
    margin-left: 15px;
}
</style>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('No etudiant', 'no_etudiant', array('class'=>'control-label')); ?>

				<?php echo Form::input('no_etudiant', Input::post('no_etudiant', isset($etudiant) ? $etudiant->no_etudiant : ''), array('class' => 'col-md-4 form-control', 'disabled', 'placeholder'=>'No etudiant')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Nom', 'nom', array('class'=>'control-label')); ?>

				<?php echo Form::input('nom', Input::post('nom', isset($etudiant) ? $etudiant->nom : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Nom')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Prénom', 'prenom', array('class'=>'control-label')); ?>

				<?php echo Form::input('prenom', Input::post('prenom', isset($etudiant) ? $etudiant->prenom : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Prenom')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Date de naissance', 'datenaissance', array('class'=>'control-label')); ?>

				<?php echo Form::input('datedenaissance', Input::post('datenaissance', isset($etudiant) ? $etudiant->datenaissance : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Datedenaissance')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Sexe', 'sexe', array('class'=>'control-label')); ?>

				<?php echo Form::input('sexe', Input::post('sexe', isset($etudiant) ? $etudiant->sexe : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Sexe')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Bac', 'bac', array('class'=>'control-label')); ?>

				<?php echo Form::input('bac', Input::post('bac', isset($etudiant) ? $etudiant->bac : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Bac')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Bac mention', 'bac_mention', array('class'=>'control-label')); ?>

				<?php echo Form::input('mention', Input::post('bac_mention', isset($etudiant) ? $etudiant->bac_mention : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Mention')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Bac année', 'bac_annee', array('class'=>'control-label')); ?>

				<?php echo Form::input('bac_annee', Input::post('bac_annee', isset($etudiant) ? $etudiant->bac_annee : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Bac annee')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($etudiant) ? $etudiant->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Adresse1', 'adresse1', array('class'=>'control-label')); ?>

				<?php echo Form::input('adresse1', Input::post('adresse1', isset($etudiant) ? $etudiant->adresse1 : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Adresse1')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Ville1', 'ville1', array('class'=>'control-label')); ?>

				<?php echo Form::input('ville1', Input::post('ville1', isset($etudiant) ? $etudiant->ville1 : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Ville1')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Adresse2', 'adresse2', array('class'=>'control-label')); ?>

				<?php echo Form::input('adresse2', Input::post('adresse2', isset($etudiant) ? $etudiant->adresse2 : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Adresse2')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Ville2', 'ville2', array('class'=>'control-label')); ?>

				<?php echo Form::input('ville2', Input::post('ville2', isset($etudiant) ? $etudiant->ville2 : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Ville2')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Telephone1', 'telephone1', array('class'=>'control-label')); ?>

				<?php echo Form::input('telephone1', Input::post('telephone1', isset($etudiant) ? $etudiant->telephone1 : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Telephone1')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Telephone2', 'telephone2', array('class'=>'control-label')); ?>

				<?php echo Form::input('telephone2', Input::post('telephone2', isset($etudiant) ? $etudiant->telephone2 : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Telephone2')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Iut année', 'iut_annee', array('class'=>'control-label')); ?>

				<?php echo Form::input('iut_annee', Input::post('iut_annee', isset($etudiant) ? $etudiant->iut_annee : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Iut annee')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Sauver', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>