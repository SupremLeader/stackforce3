<?php $this->layout('layout', ['title' => 'Créer']) ?>

<?php $this->start('main_content') ?>
	<h2>Création d'un post</h2>
	<hr />
	<form method="POST">
		Titre : <input type="text" name="myform[titre]"><br />
		Corps : <textarea name="myform[corps]"></textarea><br />
		<input type="submit" name="create" value="Valider">
	</form>
	<hr />
	<a href="<?= $this->url('home') ?>">Retour à la liste</a>
<?php $this->stop('main_content') ?>