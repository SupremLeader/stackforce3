<?php $this->layout('layout', ['title' => 'Recherche : ' . $result]) ?>


<?php $this->start('stylesheets') ?>
 	<link rel="stylesheet" href="<?= $this->assetUrl('css/padding.css') ?>">
 	<link rel="stylesheet" href="<?= $this->assetUrl('css/margin.css') ?>">
 	<link rel="stylesheet" href="<?= $this->assetUrl('css/detail.css') ?>"> 
 	<link rel="stylesheet" href="<?= $this->assetUrl('css/search.css') ?>">
<?php $this->stop('stylesheets') ?>


<?php $this->start('main_content') ?>
	<div class="container bottom80">';

		<div class="row row-offcanvas row-offcanvas-right">

	 	<div class="jumbotron">
          <h1>Bienvenue sur le site StackForce 3</h1>
          <p>Venez poser vos questions concernant vos problèmes rencontrés en développement web.</p>
          <div class="row">
            <div class="col-xs-12 text-center">
              <button type="button" class="btn btn-default">275 questions posées</button>
              <button type="button" class="btn btn-primary">Poser votre question</button>
            </div> <!-- /.col-xs-12 text-center -->
            </div> <!-- /.row -->
        </div> <!-- /.jumbotron -->

        <!-- DEBUT NAV FONCTION TRI -->
        <div class="row">
          <div class="col-xs-12 col-sm-9">
            <ul class="nav nav-tabs">
              <li class="nav-item active">
                <a href="<?= $this->url('search2', ['result' => $result, 'orderby' => 'titre']); ?>">Par titre</a>
              </li>
              <li class="nav-item">
                <a href="<?= $this->url('search2', ['result' => $result, 'orderby' => 'description']); ?>">Par description</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Mois</a>
              </li>
              <li class="nav-item">
               <a class="nav-link" href="#">Date</a>
              </li>
            </ul>
          </div> <!-- /.col-xs-12 col-sm-9 -->
        </div> <!-- /.row -->
        <!-- FIN NAV FONCTION TRI -->
    <div class="col-xs-12 col-sm-9">
    	<div class="row">

	<?php

	foreach ($search as $key => $result) {
		echo '<div class="col-xs-12 question">';
		    echo '<h2>' . $result['titre'] . '</h2>';
		    echo '<p>Posté par ' . $result['pseudo'] . '</p>';
		    echo '<p>' . $result['description'] . '</p>';
		    echo '<div class="row">';
		        echo '<div class="col-xs-12 col-md-3">';
		            echo '<p><p><a class="btn btn-default" href="' . $this->url('question', ['id' => $result['id']]) . '" role="button">Voir details &raquo;</a></p></p>';
		        echo '</div>';
		                
		        echo '<div class="col-xs-12 col-md-9 text-right">';
		            foreach ($tags as $questionTags) {
                		foreach ($questionTags as $tag) {
                			if ($tag['id'] == $result['id']) {
		                  		echo '<button type="button" class="btn btn-info tag">' . $tag['type'] . '</button>';
		                  	}
		                }
		            }
		        echo '</div>';
		    echo '</div>';
	    echo '</div>';
	}

	?>

	</div>
	</div>

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <div class="list-group-item active">Utilisateurs</div>

            <?php

            foreach ($profils as $user) {
              echo '<a href="#" class="list-group-item">';
                echo '<div class="row">';  
                  echo '<div class="col-lg-4 hidden-md hidden-sm hidden-xs">';
                    echo '<img src="' . $this->assetUrl('img/' . $user['img']) . '" class="img-responsive" alt="">';
                  echo '</div>';
                  echo '<div class="col-xs-12 col-lg-8">';
                    echo '<p class="text-justify" style="word-wrap: break-word;">' . $user['pseudo'] . '<br/>(' . $user['nom'] . ' ' . $user['prenom'] . ')</p>';
                    if ($user['online'] == 1) {
                      echo '<div class="text-right">En ligne</div>';
                    } else {
                      echo '<div class="text-right">Hors ligne</div>';
                    }
                  echo '</div>';
                echo '</div>';
              echo '</a>';
            }

            ?>

            <!-- A SUPPRIMER APRES PHP -->
            <a href="#" class="list-group-item">Utilisateur</a>
            <a href="#" class="list-group-item">Utilisateur</a>
            <a href="#" class="list-group-item">Utilisateur</a>
            <a href="#" class="list-group-item">Utilisateur</a>
            <a href="#" class="list-group-item">Utilisateur</a>
            <a href="#" class="list-group-item">Utilisateur</a>
            <a href="#" class="list-group-item">Utilisateur</a>
            <a href="#" class="list-group-item">Utilisateur</a>
            <a href="#" class="list-group-item">Utilisateur</a>
            <a href="#" class="list-group-item">Utilisateur</a>
            <a href="#" class="list-group-item">Utilisateur</a>
            <a href="#" class="list-group-item">Utilisateur</a>
            <a href="#" class="list-group-item">Utilisateur</a>
            <a href="#" class="list-group-item">Utilisateur</a>
            <!-- FIN DE LA SUPPRESSION -->

          </div> <!-- /.list-group -->
        </div><!--/.col-xs-6 col-sm-3 sidebar-offcanvas-->
      </div><!--/row-->
    </div><!--/.container-->
    <hr>

	?>
<?php $this->stop('main_content') ?>


<?php $this->start('footer') ?>
  <div class="text-center">
    <p>&copy; 2016 StackForce 3, Inc.</p>
  </div> <!-- /.text-center -->
<?php $this->stop('footer') ?>


<?php $this->start('javascripts') ?>
	<script src="<?= $this->assetUrl('js/offcanvas.js') ?>"></script>
<?php $this->stop('javascripts') ?>