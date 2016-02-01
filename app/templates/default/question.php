<?php $this->layout('layout', ['title' => $question['titre']]) ?>


<?php $this->start('stylesheets') ?>
  <link rel="stylesheet" href="<?= $this->assetUrl('css/padding.css') ?>">
  <link rel="stylesheet" href="<?= $this->assetUrl('css/margin.css') ?>">
  <link rel="stylesheet" href="<?= $this->assetUrl('css/detail.css') ?>">
<?php $this->stop('stylesheets') ?>


<?php $this->start('main_content') ?>
    <div class="container"> <!-- DEBUT CONTAINER -->

      <div class="row row-offcanvas row-offcanvas-right">

          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Utilisateurs</button>
          </p>
        <?php $date = date('d/m/Y', strtotime($question['date'])); ?>
        <div class="jumbotron text-center">
          <h1><?php echo $question['titre']; ?></h1>
          <p>Postée par <?php echo $question['pseudo']; ?> le <?= $date ?></p>
          <div class="row">
            <div class="col-xs-12 text-center">
              <a class="js-scrollTo" href="#reponses"><button type="button" class="btn btn-primary"><?= $question['nbreponses'] ?> réponse(s)</button></a>
            </div> <!-- /.col-xs-12 text-center -->
            </div> <!-- /.row -->
        </div> <!-- /.jumbotron -->


        <div class="col-xs-12 col-sm-9">
          <div class="row">
            <!-- DEBUT DETAILS DE LA QUESTION -->
            <div class="col-xs-12 details">
              <h2>Détails de la question</h2>
              <br />
              <p><?php echo $question['description']; ?></p>
              <div class="row">
                <div class="col-xs-12 col-md-3">
                  <button class="btn btn-default jsrepondre" role="button">Répondre &raquo;</button>
                </div> <!-- /.col-xs-3 -->
                
                <div class="col-xs-12 col-md-9 text-right"> <!-- aligne les tags a droite -->

                  <?php

                  foreach ($tags as $tag) {
                    if ($tag['id'] == $question['questions_id']) {
                      echo '<button type="button" class="btn btn-info tag">' . $tag['type'] . '</button>';
                    }
                  }

                  ?>

                </div> <!-- /.col-xs-9 text-right -->
              </div>
            </div><!-- /.col-xs-12 question -->
            <!-- FIN DETAILS DE LA QUESTION -->



            <!-- DEBUT DU FORMULAIRE DE RESPONSE -->
            <div class="row">
              <div class="col-xs-12 question manage_reply">
                <form id="manage_reply" method="post" action="<?= $this->url('newR') ?>">
                  <div class="form-group">
                    <label for="reponse">Réponse:</label>
                      <!-- DEBUT BOUTONS DE STYLE -->
                      <!-- <button type="button" class="btn btn-default" aria-label="Left Align">
                      <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
                      </button>
                      <button type="button" class="btn btn-default" aria-label="Center Align">
                      <span class="glyphicon glyphicon-align-center" aria-hidden="true"></span>
                      </button>
                      <button type="button" class="btn btn-default" aria-label="Justify Align">
                      <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>
                      </button>
                      <button type="button" class="btn btn-default" aria-label="Right Align">
                      <span class="glyphicon glyphicon-align-right" aria-hidden="true"></span>
                      </button>
                      <button type="button" class="btn btn-default" aria-label="Bold">
                      <span class="glyphicon glyphicon-bold" aria-hidden="true"></span>
                      </button>
                      <button type="button" class="btn btn-default" aria-label="Italic">
                      <span class="glyphicon glyphicon-italic" aria-hidden="true"></span>
                      </button>
                      <button type="button" class="btn btn-default" aria-label="List">
                      <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                      </button> -->
                      <!-- FIN BOUTONS DE STYLE -->
                      <input type="hidden" value="<?= $question['questions_id'] ?>" name="id">                    <textarea class="form-control" rows="8" id="reponse" name="reponsearea" required></textarea>
                    <br/>
                    <button type="submit" name="newreponseform" class="btn btn-primary">Envoyer</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- FIN DU FORMULAIRE DE REPONSE -->



            <!-- DEBUT NAV FONCTION TRI -->
            <div class="row">
              <div class="col-xs-12">
                <!--<ul class="nav nav-tabs">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Vote</a>
                  <li class="nav-item">
                  <a class="nav-link" href="#">Date</a>
                  </li>
                </ul>-->
              </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row-->
            <!-- FIN NAV FONCTION TRI -->



            <!-- REPONSES -->

            <?php foreach ($answers as $answer) { ?>
            <?php $date = date('d/m/Y', strtotime($answer['date'])); ?>

            <section id="reponses">
              <div class="row blockqr">
                <div class="col-xs-2 col-sm-1">
                  <div class="btn-group-vertical" role="group" aria-label="...">
                      <form action="<?= $this->url('recupVote')?>" method="post">
                        <input type="hidden" name="qid" value="<?php echo $answer['questions_id']; ?>">
                        <input type="hidden" name="aid" value="<?php echo $answer['id']; ?>">
                        <input type="hidden" name="vote" value="1">
                        <button type="submit" class="btn btn-default" name="submit"><i class="fa fa-thumbs-up"></i></button>
                      </form>
                      <div class="text-center"> 
                          <h3><strong><?php echo $answer['nbvote']; ?></strong></h3>
                      </div>
                      <form action="<?= $this->url('recupVote')?>" method="post">
                        <input type="hidden" name="qid" value="<?php echo $answer['questions_id']; ?>">
                        <input type="hidden" name="aid" value="<?php echo $answer['id']; ?>">
                        <input type="hidden" name="vote" value="-1">
                        <button type="submit" class="btn btn-default" name="submit2"><i class="fa fa-thumbs-down"></i></button>
                      </form>
                      <!--<div class="btnchecked">
                          <button type="button" id="" class="btn btn-success btnchecked"><i class="fa fa-check"></i></button>
                      </div>-->
                  </div>
                </div>

                <div class="col-xs-10 col-sm-11 reponse">
                  <h2>Réponse de <?php foreach ($profils as $user) { if ($user['wusers_id'] == $answer['wusers_id']) { echo $user['pseudo']; } } ?><span><small><i> le <?php echo $date; ?></i></small></span></h2>
                  <!-- TAGS DU MEC QUI REPOND -->
                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <?php
                    foreach ($badges[$answer['id']] as $badge) {
                        if ($badge['level'] >= 5) {
                            echo '<button type="button" class="btn ';
                            if ($badge['level'] < 10) {
                                echo 'btnbronze ';
                            } elseif ($badge['level'] >= 10 && $badge['level'] < 15) {
                                echo 'btnargent ';
                            } elseif ($badge['level'] >= 15) {
                                echo 'btnor ';
                            } 
                            echo 'btnreponse tag">' . $badge['type'] . '</button>';
                        }
                    }
                    ?>
                    </div> <!-- /.col-xs-9 text-right -->
                  </div> <!-- /.row -->
                  <br/>
                  <p><?php echo $answer['message']; ?></p>
                  <!--<div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3 text-justify">
                      <p><button type="submit" class="btn btn-success btnreponse" id="check" href="#" role="button">Meilleure réponse !</button></p>--> <!-- CACHER AVEC JQUERY ET AFFICHER AU SURVOL -->
                    <!--</div>
                    <div class="col-xs-12 col-sm-6 col-md-9 text-right">
                      <p><a class="btn btn-default" href="#" role="button">Commenter &raquo;</a></p>
                    </div>--> <!-- /.col-xs-3 -->
                  <!--</div>-->
                </div><!-- /.col-xs-12 question -->
              </div> <!-- /.row -->
            </section>

            <?php } ?>

            <!-- FIN DES REPONSES -->

          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->

        <!-- DEBUT OFFCANVAS -->
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <div class="list-group-item active">Utilisateurs</div>
            
            <?php

            foreach ($profils as $user) {
              echo '<a href="' . $this->url('profil', ['id' => $user['id']]) . '" class="list-group-item">';
                echo '<div class="row">';  
                  echo '<div class="col-lg-4 hidden-md hidden-sm hidden-xs">';
                    echo '<img src="' . $this->assetUrl('img/' . $user['img']) . '" class="img-responsive" alt="">';
                  echo '</div>';
                  echo '<div class="col-xs-12 col-lg-8">';
                    echo '<p class="text-justify" style="word-wrap: break-word;">' . $user['pseudo'] . '<br/>(' . $user['prenom'] . ' ' . $user['nom'] . ')</p>';
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
           <!--  <a href="#" class="list-group-item">Utilisateur</a>
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
            <a href="#" class="list-group-item">Utilisateur</a> -->
            <!-- FIN DE LA SUPPRESSION -->

          </div> <!-- /.list-group -->
        </div><!--/.col-xs-6 col-sm-3 sidebar-offcanvas-->
      </div><!--/row-->
    </div><!--/.container-->
    <hr>
<?php $this->stop('main_content') ?>


<?php $this->start('footer') ?>
  <div class="text-center">
    <p>&copy; 2016 StackForce 3, Inc.</p>
  </div> <!-- /.text-center -->
<?php $this->stop('footer') ?>


<?php $this->start('javascripts') ?>
  <script src="<?= $this->assetUrl('js/offcanvas.js') ?>"></script>
<?php $this->stop('javascripts') ?>