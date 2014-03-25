<?php echo Form::open(array("class"=>"form-horizontal")); ?>
<style type="text/css">
fieldset {
    margin-right: 15px;
    margin-left: 15px;
}
</style>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Etudiant', 'etudiant', array('class'=>'control-label')); ?>

				<?php echo Form::input('etudiant', Input::post('etudiant', isset($convention) ? $convention->no_etudiant : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Etudiant')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Sujet', 'sujet', array('class'=>'control-label')); ?>

				<?php echo Form::input('sujet', Input::post('sujet', isset($convention) ? $convention->sujet : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Sujet')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Déscription stage', 'description_stage', array('class'=>'control-label')); ?>

				<?php echo Form::input('description_stage', Input::post('description_stage', isset($convention) ? $convention->description_stage : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Description stage')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Environnement dev', 'environnement_dev', array('class'=>'control-label')); ?>

				<?php echo Form::input('environnement_dev', Input::post('environnement_dev', isset($convention) ? $convention->environnement_dev : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Environnement dev')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Observations resp', 'observations_resp', array('class'=>'control-label')); ?>

				<?php echo Form::input('observations_resp', Input::post('observations_resp', isset($convention) ? $convention->observations_resp : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Observations resp')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Indémnite', 'indemnite', array('class'=>'control-label')); ?>

				<?php echo Form::input('indemnite', Input::post('indemnite', isset($convention) ? $convention->indemnite : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Indemnite')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Entreprise', 'entreprise', array('class'=>'control-label')); ?>

				<?php echo Form::input('entreprise', Input::post('entreprise', isset($convention) ? $convention->ent_nom : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Entreprise')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Responsable légal', 'responsable_legal', array('class'=>'control-label')); ?>

				<?php echo Form::input('responsable_legal', Input::post('responsable_legal', isset($convention) ? $convention->responsable_tech_np : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Responsable legal')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Responsable adm', 'responsable_adm', array('class'=>'control-label')); ?>

				<?php echo Form::input('responsable_adm', Input::post('responsable_adm', isset($convention) ? $convention->responsable_adm_np : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Responsable adm')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Contact urgence', 'contact_urgence', array('class'=>'control-label')); ?>

				<?php echo Form::input('contact_urgence', Input::post('contact_urgence', isset($convention) ? $convention->contact_urgence : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Contact urgence')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Représentant légal', 'rpz_np', array('class'=>'control-label')); ?>

				<?php echo Form::input('rpz_np', Input::post('rpz_np', isset($convention) ? $convention->rpz_np : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Rpz np')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Représentant légal adresse', 'rpz_adresse', array('class'=>'control-label')); ?>

				<?php echo Form::input('rpz_adresse', Input::post('rpz_adresse', isset($convention) ? $convention->rpz_adresse : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Rpz adresse')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Représentant légal tel', 'rpz_tel', array('class'=>'control-label')); ?>

				<?php echo Form::input('rpz_tel', Input::post('rpz_tel', isset($convention) ? $convention->rpz_tel : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Rpz tel')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Origine offre', 'origine_offre', array('class'=>'control-label')); ?>

				<?php echo Form::input('origine_offre', Input::post('origine_offre', isset($convention) ? $convention->origine_offre : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Origine offre')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Type', 'type', array('class'=>'control-label')); ?>

				<?php echo Form::input('type', Input::post('type', isset($convention) ? $convention->type : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Type')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Langue', 'langue', array('class'=>'control-label')); ?>

				<?php echo Form::input('langue', Input::post('langue', isset($convention) ? $convention->langue : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Langue')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Durée', 'duree', array('class'=>'control-label')); ?>

				<?php echo Form::input('duree', Input::post('duree', isset($convention) ? $convention->duree : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Duree')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Date début', 'date_debut', array('class'=>'control-label')); ?>

				<?php echo Form::input('date_debut', Input::post('date_debut', isset($convention) ? $convention->date_debut : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Date debut')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Date fin', 'date_fin', array('class'=>'control-label')); ?>

				<?php echo Form::input('date_fin', Input::post('date_fin', isset($convention) ? $convention->date_fin : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Date fin')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Allongée', 'allongee', array('class'=>'control-label')); ?>

				<?php echo Form::input('allongee', Input::post('allongee', isset($convention) ? $convention->allongee : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Allongee')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Nb jour semaine', 'nb_jour_semaine', array('class'=>'control-label')); ?>

				<?php echo Form::input('nb_jour_semaine', Input::post('nb_jour_semaine', isset($convention) ? $convention->nb_jour_semaine : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Nb jour semaine')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Horaire hebdo', 'horaire_hebdo', array('class'=>'control-label')); ?>

				<?php echo Form::input('horaire_hebdo', Input::post('horaire_hebdo', isset($convention) ? $convention->horaire_hebdo : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Horaire hebdo')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Rétribution', 'retribution', array('class'=>'control-label')); ?>

				<?php echo Form::input('retribution', Input::post('retribution', isset($convention) ? $convention->retribution : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Retribution')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Nature', 'nature', array('class'=>'control-label')); ?>

				<?php echo Form::input('nature', Input::post('nature', isset($convention) ? $convention->nature : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Nature')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Etat', 'etat', array('class'=>'control-label')); ?>

				<?php echo Form::input('etat', Input::post('etat', isset($convention) ? $convention->etat : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Etat')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Sauver', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>