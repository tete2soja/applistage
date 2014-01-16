<h2>Viewing #<?php echo $note->id; ?></h2>

<p>
	<strong>Titre:</strong>
	<?php echo $note->titre; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $note->description; ?></p>

<?php echo Html::anchor('notes/edit/'.$note->id, 'Edit'); ?> |
<?php echo Html::anchor('notes', 'Back'); ?>