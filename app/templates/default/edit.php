<?php $this->layout('layout', ['title' => 'Editer']) ?>

<?php $this->start('main_content') ?>
	<h2>Edition du post id = <?= $post['id']?></h2>
	<hr />
	<form method="POST">
		Titre : <input type="text" name="myform[titre]" value="<?= $post['titre'] ?>"><br />
		Corps : <textarea name="myform[corps]"><?= $post['corps'] ?></textarea><br />
		<input type="submit" name="edit" value="Valider">
	</form>
	<hr />
	<a href="<?= $this->url('home') ?>">Retour à la liste</a>
<?php $this->stop('main_content') ?>