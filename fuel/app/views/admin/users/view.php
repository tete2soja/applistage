<h2>Voir #<?php echo $user->id; ?></h2>

<p>
	<strong>Username:</strong>
	<?php echo $user->username; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $user->email; ?></p>
<p>
	<strong>Password:</strong>
	<?php echo $user->password; ?></p>
<p>
	<strong>Telephone:</strong>
	<?php echo $user->telephone; ?></p>
<p>
	<strong>Group:</strong>
	<?php echo $user->group; ?></p>
<p>
	<strong>Last login:</strong>
	<?php echo $user->last_login; ?></p>
<p>
	<strong>Login hash:</strong>
	<?php echo $user->login_hash; ?></p>
<p>
	<strong>Updated at:</strong>
	<?php echo $user->updated_at; ?></p>
<p>
	<strong>Profile fields:</strong>
	<?php echo $user->profile_fields; ?></p>
<p>
	<strong>Created at:</strong>
	<?php echo $user->created_at; ?></p>

<?php echo Html::anchor('admin/users/edit/'.$user->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/users', 'Back'); ?>