<?php echo Form::open(array("class"=>"form-horizontal")); ?>
<style type="text/css">
fieldset {
    margin-right: 15px;
    margin-left: 15px;
}
</style>
	<div class="row">
		<div class="form-group">
			<?php echo Form::label('Etudiant', 'etudiant', array('class'=>'control-label')); ?>

				<?php echo Form::input('etudiant', Input::post('etudiant', isset($stage->no_etudiant) ? $stage->no_etudiant : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Etudiant')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Contact', 'contact', array('class'=>'control-label')); ?>

				<?php echo Form::input('contact', Input::post('contact', isset($stage) ? $stage->contact_nom : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Contact')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Enseignant', 'enseignant', array('class'=>'control-label')); ?>

				<?php echo Form::input('enseignant', Input::post('enseignant', isset($stage->enseignant_nom) ? $stage->enseignant_nom : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Enseignant')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Entreprise', 'entreprise', array('class'=>'control-label')); ?>

				<?php echo Form::input('entreprise', Input::post('entreprise', isset($stage) ? $stage->ent_nom : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Entreprise')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Sujet', 'sujet', array('class'=>'control-label')); ?>

				<?php echo Form::input('sujet', Input::post('sujet', isset($stage) ? $stage->sujet : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Sujet')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Ville', 'ville', array('class'=>'control-label')); ?>

				<?php echo Form::input('ville', Input::post('ville', isset($stage) ? $stage->ent_ville : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Ville')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Code Postal', 'code_postal', array('class'=>'control-label')); ?>

				<?php echo Form::input('code_postal', Input::post('code_postal', isset($stage) ? $stage->ent_code : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Code Postal')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Pays', 'pays', array('class'=>'control-label')); ?>

				<?php echo Form::input('pays', Input::post('pays', isset($stage) ? $stage->ent_pays : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Pays')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Visibilite', 'visibilite', array('class'=>'control-label')); ?>

				<?php echo Form::input('visibilite', Input::post('visibilite', isset($stage) ? $stage->visibilite : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Visibilite')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Contexte', 'contexte', array('class'=>'control-label')); ?>

				<?php echo Form::input('contexte', Input::post('contexte', isset($stage) ? $stage->contexte : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Contexte')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Resultats', 'resultats', array('class'=>'control-label')); ?>

				<?php echo Form::input('resultats', Input::post('resultats', isset($stage) ? $stage->resultats : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Resultats')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Conditions', 'conditions', array('class'=>'control-label')); ?>

				<?php echo Form::input('conditions', Input::post('conditions', isset($stage) ? $stage->conditions : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Conditions')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Url doc', 'url_doc', array('class'=>'control-label')); ?>

				<?php echo Form::input('url_doc', Input::post('url_doc', isset($stage) ? $stage->url_doc : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Url doc')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Public', 'public', array('class'=>'control-label')); ?>

				<?php echo Form::input('public', Input::post('public', isset($stage) ? $stage->public : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Public')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Valide', 'valide', array('class'=>'control-label')); ?>

				<?php echo Form::input('valide', Input::post('valide', isset($stage->valide) ? $stage->valide : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Valide')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Date', 'date', array('class'=>'control-label')); ?>

				<?php echo Form::input('date', Input::post('date', isset($stage) ? $stage->date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Date')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Sauver', array('class' => 'btn btn-primary')); ?>		</div>
	</div>
<?php echo Form::close(); ?>