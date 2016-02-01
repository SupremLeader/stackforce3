<?php $this->layout('layout', ['title' => 'Erreur 403']) ?>

<?php $this->start('stylesheets') ?>
 	<style>
		.bottom80 {
			margin-top: 80px;
		}
	</style>
<?php $this->stop('stylesheets') ?>

<?php $this->start('main_content'); ?>
	<h1 class="bottom80">403. Nothing to see here.</h1>
<?php $this->stop('main_content'); ?>
