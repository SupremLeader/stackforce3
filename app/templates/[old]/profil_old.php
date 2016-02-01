<?php $this->layout('layout', ['title' => 'Profil']) ?>

<?php $this->start('stylesheets') ?>
 	<link rel="stylesheet" href="<?= $this->assetUrl('css/profil.css') ?>">
<?php $this->stop('stylesheets') ?>


<?php $this->start('main_content'); if (isset($_SESSION['user'])){ ?>
<!-- DEBUT SECTION PROFIL -->
<style>
		.bottom80 {
			margin-top: 80px;
		}
	</style>

<div class="bottom80">
 <?php                                                           
debug($profil);  echo $profil['pseudo'];
?>
<?= $profil['pseudo'].'<br />' ?>
<?= $profil['mail'].'<br />' ?>
<?= $profil['nom'].'<br />' ?>
<?= $profil['prenom'].'<br />' ?>
<?= $profil['img'].'<br />' ?>
<?= $profil['inscritdepuis'].'<br />' ?>

</div>
<!-- FIN SECTION PROFIL -->
<?php } $this->stop('main_content') ?>