<?php if (isset($result)) { $this->layout('layout', ['title' => 'Recherche : ' . $result]); } else { $this->layout('layout', ['title' => 'Accueil StackForce 3']); } ?>


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
        <?php 
    //debug($error);debug($_SESSION);
    if (isset($error) && !empty($error)) 
    {
        echo '<div class="alert alert-danger">'. $error.'</div>';
    }
if (isset($errormsg) && !empty($errormsg)) 
    {
        echo '<div class="alert alert-danger">'. $errormsg.'</div>';
    }
//debug($errors);debug($flag);
if (empty($errors) && isset($flag) && ($flag === 1)) 
{
    echo '<br /><div class="col-md-6 col-md-offset-3">';
    echo '<div class="alert alert-success">Le nouvel utilisateur a été ajouté avec succès. Un mail vous a été envoyé pour l\'activation de votre compte</div>';
    echo '</div><br />'; 
}
elseif (!empty($errors))
{
    echo '<br /><div class="col-md-6 col-md-offset-3">';
    echo '<div class="alert alert-danger">'.implode('<br>', $errors).'</div>';
    echo '</div><br>';
} ?>
        <div class="jumbotron">
            <h1>Bienvenue sur le site StackForce 3</h1>
            <p class="text-center">Venez poser vos questions concernant vos problèmes rencontrés en développement web.</p>
            <div class="row">
                <div class="col-xs-12 text-center">
                    <?php $questionsCount = 0; foreach ($questions as $question) { $questionsCount++; } ?>
                    <button type="button" class="btn btn-default"><?= $questionsCount; ?> question(s) trouvée(s)</button>
                    
                    <?php
    if (isset($_SESSION['user']['id'])){
        echo '<button type="button" class="btn btn-primary jsrepondre">Posez votre question</button>';
    } else {
        echo '</br><br/><p>Connectez-vous pour poser une question !</p>';
    } ?>
        
                
                </div> <!-- /.col-xs-12 text-center -->
            </div> <!-- /.row -->
        </div> <!-- /.jumbotron -->

        <!-- DEBUT SECTION CONNEXION -->
<section id="question" class="manage_reply" >

    <form class="jumbotron questionpost form-horizontal vertical-center" action="<?= $this->url('newQ') ?>" method="POST">
        <div class="text-center">
          <h3>Posez votre question</h3>
        </div>
        <div class="form-group">
          <div class="row">
            <label for="inputIntitule" class="col-xs-12 col-sm-2 control-label ">Intitulé</label>
            <div class="col-xs-12 col-sm-10">
              <input type="text" class="form-control" id="inputIntitule" placeholder="Intitulé de votre question" name="newqtitre" required>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <label for="message" class="col-xs-12 col-sm-2 control-label">Message</label>
            <div class="col-xs-12 col-sm-10">
              <textarea class="form-control" rows="5" id="message" placeholder="Votre message détaillé" name="newqdesc" required><?= (isset($_SESSION['msg']['desc']) ? $_SESSION['msg']['desc'] : '' ) ?></textarea>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <label class="col-xs-12 col-sm-2 control-label">Langages concernés</label>
            <div class="col-xs-12 col-sm-10">
              <label class="checkbox-inline"><input type="checkbox" name="tag[]" value="1">HTML</label>
              <label class="checkbox-inline"><input type="checkbox" name="tag[]" value="3">CSS</label>
              <label class="checkbox-inline"><input type="checkbox" name="tag[]" value="2">PHP</label>
              <label class="checkbox-inline"><input type="checkbox" name="tag[]" value="4">JavaScript</label>
              <label class="checkbox-inline"><input type="checkbox" name="tag[]" value="6">AJAX</label>
              <label class="checkbox-inline"><input type="checkbox" name="tag[]" value="7">SQL</label>
              <label class="checkbox-inline"><input type="checkbox" name="tag[]" value="5">jQuery</label>
            </div>
          </div>
        </div>

        <div class="row text-center">
          <div class="col-xs-12">
            <button type="submit" name="newquestionform" class="btn tf-btn btn-info">Envoyer</button>
          </div>
        </div>
  </form>

</section>
<!-- FIN SECTION QUESTION -->
        <!-- DEBUT NAV FONCTION TRI -->
        <div class="row">
            <div id="onglets" class="col-xs-12 col-sm-9">
                <ul class="nav nav-tabs">
                    <li class="nav-item <?php if (isset($orderby)) { if ($orderby === '' || $orderby === 'date') { echo 'active'; } else { echo ''; } } else { echo 'active'; } ?>">
                        <a class="nav-link" href="<?php if (isset($result)) { echo $this->url('search2', ['result' => $result, 'orderby' => 'date']); } else { echo $this->url('orderby', ['orderby' => 'date']); } ?>">Date</a>
                    </li>
                    <li class="nav-item <?= ($orderby === 'titre') ? 'active' : '' ?>">
                        <a href="<?php if (isset($result)) { echo $this->url('search2', ['result' => $result, 'orderby' => 'titre']); } else { echo $this->url('orderby', ['orderby' => 'titre']); } ?>">Titre</a>
                    </li>
                    <li class="nav-item <?= ($orderby === 'description') ? 'active' : '' ?>">
                        <a href="<?php if (isset($result)) { echo $this->url('search2', ['result' => $result, 'orderby' => 'description']); } else { echo $this->url('orderby', ['orderby' => 'description']); } ?>">Description</a>
                    </li>
                    <li class="nav-item <?= ($orderby === 'nbreponses') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?php if (isset($result)) { echo $this->url('search2', ['result' => $result, 'orderby' => 'nbreponses']); } else { echo $this->url('orderby', ['orderby' => 'nbreponses']); } ?>">Nombre de réponses</a>
                    </li>
                </ul>
            </div> <!-- /.col-xs-12 col-sm-9 -->
        </div> <!-- /.row -->
        <!-- FIN NAV FONCTION TRI -->

        <div class="col-xs-12 col-sm-9">
            <div class="row">

                <?php

                foreach ($questions as $question) {
                    $date = date('d/m/Y', strtotime($question['date']));
                    echo '<div class="col-xs-12 question blockqr">';
                        echo '<h2>' . $question['titre'] . '</h2>';
                        echo '<p class="text-right">Nombre de réponses : ' . $question['nbreponses'] . '</p>';
                        echo '<p>' . $question['description'] . '</p>';
                        echo '<p class="text-right">Posté par ' . $question['pseudo'] . ' le ' . $date . '</p>';
                        echo '<div class="row">';
                            echo '<div class="col-xs-12 col-md-3">';
                                echo '<p><a class="btn btn-default" href="' . $this->url('question', ['id' => $question['id']]) . '" role="button">Voir details &raquo;</a></p>';
                            echo '</div>';
                            echo '<div class="col-xs-12 col-md-9 text-right">';
                                foreach ($tags as $questionTags) {
                                    foreach ($questionTags as $tag) {
                                        if ($tag['id'] == $question['id']) {
                                            echo '<a href="' . $this->url('search', ['result' => $tag['type']]) . '"><button type="button" class="btn btn-info tag">' . $tag['type'] . '</button></a>';
                                        }
                                    }
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }

                ?>





            </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->

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
                <!-- <a href="#" class="list-group-item">Utilisateur</a>
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
<footer>
<div class="text-center">
    <p>&copy; 2016 StackForce 3, Inc.</p>
</div> <!-- /.text-center -->
</footer>
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
<?php $this->stop('javascripts') ?>