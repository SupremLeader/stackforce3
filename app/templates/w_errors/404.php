<?php $this->layout('layout', ['title' => 'Perdu ?']) ?>

<?php $this->start('stylesheets') ?>
 	<style>
		.bottom80 {
			margin-top: 80px;
			font-size: 800px;
			font-weight: bold;
			text-align: center;
		}
	</style>
<?php $this->stop('stylesheets') ?>

<?php $this->start('main_content'); ?>
	<h1 class="bottom80">404</h1>
<?php $this->stop('main_content'); ?>
