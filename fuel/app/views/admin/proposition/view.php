<h2>Viewing #<?php echo $proposition->id; ?></h2>

<p>
	<strong>Sujet:</strong>
	<?php echo $proposition->sujet; ?></p>
<p>
	<strong>Nomcontact:</strong>
	<?php echo $proposition->nomcontact; ?></p>
<p>
	<strong>Publicproposition:</strong>
	<?php echo $proposition->publicproposition; ?></p>
<p>
	<strong>Contextestage:</strong>
	<?php echo $proposition->contextestage; ?></p>
<p>
	<strong>Conditionstage:</strong>
	<?php echo $proposition->conditionstage; ?></p>
<p>
	<strong>Proposition:</strong>
	<?php echo $proposition->proposition; ?></p>
<p>
	<strong>Indemnite:</strong>
	<?php echo $proposition->indemnite; ?></p>
<p>
	<strong>Public:</strong>
	<?php echo $proposition->public; ?></p>
<p>
	<strong>Entreprise:</strong>
	<?php echo $proposition->entreprise; ?></p>

<?php echo Html::anchor('admin/proposition/edit/'.$proposition->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/proposition', 'Back'); ?>