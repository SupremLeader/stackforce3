<?php $this->layout('layout', ['title' => 'Accueil StackForce 3']) ?>


<?php $this->start('stylesheets') ?>
  <link rel="stylesheet" href="<?= $this->assetUrl('css/padding.css') ?>">
  <link rel="stylesheet" href="<?= $this->assetUrl('css/margin.css') ?>">
  <link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
<?php $this->stop('stylesheets') ?>


<?php $this->start('main_content') ?>
    <div class="container"> <!-- DEBUT CONTAINER -->

      <div class="row row-offcanvas row-offcanvas-right">

          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Utilisateurs</button>
          </p>

          <div class="jumbotron text-center">
            <h1><?php echo $question['titre']; ?></h1>
            <p>Postée par <?php echo $question['pseudo']; ?> le $date</p>
            <div class="row">
              <div class="col-xs-12 text-center">
                <button type="button" class="btn btn-primary">Nombre de réponses</button>
              </div>
              </div>
          </div>


          <div class="col-xs-12 col-sm-9">
            <div class="row">
              <div class="col-xs-12 question">
                <h2>Détails de la question</h2>
                <br/>
                <p><?php echo $question['description']; ?></p>
                <div class="row">
                  <div class="col-xs-12 col-md-3">
                    <p><a class="btn btn-default" href="#" role="button">Répondre &raquo;</a></p>
                  </div>
                  <div class="col-xs-12 col-md-9 text-right">

                  <?php

                  foreach ($tags as $tag) {
                    if ($tag['id'] == $question['questions_id']) {
                      echo '<button type="button" class="btn btn-info tag">' . $tag['type'] . '</button>';
                    }
                  }

                  ?>

                  </div>
                </div>
              </div>



            <!-- DEBUT DU FORMULAIRE DE RESPONSE -->
            <div class="row">
              <div class="col-xs-12 question">
                <form method="post">
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
                    <textarea class="form-control" rows="8" id="reponse"></textarea>
                    <br/>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- FIN DU FORMULAIRE DE REPONSE -->



            <!-- DEBUT NAV FONCTION TRI -->
            <div class="row">
              <div class="col-xs-12">
                <ul class="nav nav-tabs">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Vote</a>
                  <li class="nav-item">
                  <a class="nav-link" href="#">Date</a>
                  </li>
                </ul>
              </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row-->
            <!-- FIN NAV FONCTION TRI -->



            <!-- REPONSES -->
            <div class="row">
              <div class="col-xs-2 col-sm-1">
                  <div class="btn-group-vertical" role="group" aria-label="...">
                    <button type="button" class="btn btn-default"><i class="fa fa-thumbs-up"></i></button>
                  <div class="text-center">
                    <h3><strong>21</strong></h3>
                  </div>
                    <button type="button" class="btn btn-default"><i class="fa fa-thumbs-down"></i></button>
                  <div class="btnchecked">
                    <button type="button" class="btn btn-success"><i class="fa fa-check"></i></button>
                  </div>
                </div>
              </div>

              <div class="col-xs-10 col-sm-11 question">
                <h2>Réponse de $pseudo<span><small><i> le $date</i></small></span></h2>
                <!-- TAGS DU MEC QUI REPOND -->
                <div class="row">
                  <div class="col-xs-12 col-md-12">
                    <button type="button" class="btn btn-warning btnreponse">HTML</button>
                    <button type="button" class="btn btn-warning btnreponse">CSS</button>
                    <button type="button" class="btn btn-warning btnreponse">Javascript</button>
                    <button type="button" class="btn btn-warning btnreponse">PHP</button>
                    <button type="button" class="btn btn-warning btnreponse">SQL</button>
                    <button type="button" class="btn btn-warning btnreponse">Bootstrap</button>
                    <button type="button" class="btn btn-warning btnreponse">jQuery</button>
                  </div> <!-- /.col-xs-9 text-right -->
                </div> <!-- /.row -->
                <br/>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-3 text-justify">
                    <p><a type="submit" class="btn btn-success btnreponse" href="#" role="button">Meilleure réponse !</a></p> <!-- CACHER AVEC JQUERY ET AFFICHER AU SURVOL -->
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-9 text-right">
                    <p><a class="btn btn-default" href="#" role="button">Commenter &raquo;</a></p>
                  </div> <!-- /.col-xs-3 -->
                </div>
              </div><!-- /.col-xs-12 question -->
            </div> <!-- /.row -->
            <!-- FIN DES REPONSES -->

          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->

        <!-- DEBUT OFFCANVAS -->
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <div class="list-group-item active">Utilisateurs</div>
            
            <a href="#" class="list-group-item">
              <div class="row">   
                <div class="col-lg-4 hidden-md hidden-sm hidden-xs">
                  <img src="img/img.png" class="img-responsive" alt="">
                </div>
                <div class="col-xs-12 col-lg-8">
                  <p class="text-justify" style="word-wrap: break-word;">PseudogeroPseudogeroPseudogero (Yoann Moreau)</p>
           <!--    <button type="button" class="btn btn-info">Connecté</button> -->
                </div>
              </div>
            </a>

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
<?php $this->stop('main_content') ?>


<?php $this->start('footer') ?>
  <div class="text-center">
    <p>&copy; 2016 StackForce 3, Inc.</p>
  </div> <!-- /.text-center -->
<?php $this->stop('footer') ?>


<?php $this->start('javascripts') ?>
  <script src="<?= $this->assetUrl('js/offcanvas.js') ?>"></script>

  <!-- SCRIPT AFFICHAGE QUESTIONS -->
  <script>
  $(document).ready(function() {
      
      /* Every time the window is scrolled ... */
      $(window).scroll( function(){
      
          /* Check the location of each desired element */
          $('.question').each( function(i){
              
              var bottom_of_object = $(this).offset().top + $(this).outerHeight();
              var bottom_of_window = $(window).scrollTop() + $(window).height();
              
              /* If the object is completely visible in the window, fade it it */
              if( bottom_of_window > bottom_of_object ){
                  
                  $(this).animate({'opacity':'1'},600);
                      
              }
              
          }); 
      
      });
      

  });

  </script>

  <script src="<?= $this->assetUrl('js/script.js') ?>"></script>
<?php $this->stop('javascripts') ?>