<?php $this->layout('layout', ['title' => 'Détail']) ?>

<?php $this->start('main_content') ?>
	<h2>Détail du post id = <?= $post['id']?></h2>
	<hr />
	<h2><?= $post['titre']?></h5>
	<div>
		<?= $post['corps']?>
	</div>
	<hr />
	<a href="<?= $this->url('edit', ['id' => $post['id']]) ?>">editer</a>
	<a href="<?= $this->url('delete', ['id' => $post['id']]) ?>">supprimer</a>
	<a href="<?= $this->url('home') ?>">retour</a>
<?php $this->stop('main_content') ?>
