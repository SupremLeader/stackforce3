<!DOCTYPE html>
<?php
//session_start();
?>
<html lang="fr">

    <head>

        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="description" content="projet">

        <meta name="keywords" content="HTML5, Bootstrap, Responsive, projet">

        <meta name="author" content="KLQSY">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= $this->e($title) ?></title>

        <link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <link rel="stylesheet" href="<?= $this->assetUrl('css/style_form.css') ?>">

        <?= $this->section('stylesheets') ?>

        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    </head>
    <style>
        .higuy {
            color: white;

        }
        .white {color: white;}

        #bonjour{
            padding-top: 9%;
            padding-bottom: 2%;
        }
    </style>
    <body>
        <div id="wrapper" class="container-fluid">

            <div id="header" class="container-fluid">
                <header>
                    <!-- NAVBAR -->
                    <nav class="navbar navbar-fixed-top navbar-inverse">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="<?php echo $this->url('home') ?>">StackForce 3</a>
                            </div>
                            <div id="navbar" class="collapse navbar-collapse navbar-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?= $this->url('home') ?>" class="">Accueil</a></li>




                                    <!-- Si la variable globale $_SESSION n'existe pas, alors affichage des menus connexion et inscription -->
                                    <?php if (!isset($_SESSION['user'])) { ?>
                                    <li>
                                         <a id="modalTriggerLogin"  class="" href="#modal_login">Connexion</a>
                                    </li>
                                    <li>
                                        <a id="modal_trigger" class="" href="#modal">Inscription</a>

                                    </li>
                                    <!-- Si elle existe, l'utilisateur est connecté donc affichage du menu de déconnexion-->
                                    <?php } else { ?>
                                    <li>
                                        <a href="<?= $this->url('profil', ['id' => $_SESSION['user']['id']]) ?>">Mon Profil</a>
                                    </li>
                                    <li>
                                        <a href="<?= $this->url('logout') ?>">Déconnexion</a>
                                    </li>

                                    <?php } ?>                                  

                                    

                                    <!-- Si l'utilisateur connecté est un user, alors on lui dit bonjour parce qu'on est poli -->
                                    <?php if (isset($_SESSION['user']))
{
    switch ($_SESSION['user']['role'])
    {
        case 'user':?>
                                    <!--<li>
                                    <div id="bonjour">
                                        <p class="higuy">Bonjour <?= $_SESSION['user']['pseudo']. ' !'?></p>
                                    </div>
                                    </li>  -->
                                    <?php break;
        case 'admin':?> 
                                    <li>
                                        <a class="white" href="<?= $this->url('adminpanel') ?>">Panneau d'administration</a>
                                    </li>
                                    <?php break;
    }
} ?>                         

                                </ul>
                                <form action="<?= $this->url('recup')?>" method="post" class="navbar-form inline-form navbar-right" role="Recherche">
                                        <div class="form-group">
                                            <input type="text" name="result" class="input-sm form-control" placeholder="Votre recherche" required>
                                        </div>
                                        <button type="submit" name="search" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-eye-open"></span> Chercher</button>
                                </form>
                            </div><!-- /.nav-collapse -->
                        </div><!-- /.container -->
                    </nav>
                    <!-- /.NAVBAR -->
                </header>

            </div>
            
            <section>
                <div id="modal" class="popupContainer" style="display:none;">
                    <header class="popupHeader">
                        <span class="header_title">S'inscrire</span>
                        <span class="modal_close"><i class="fa fa-times"></i></span>
                    </header>

                    <section class="popupBody">

                        <!-- DEBUT DU FORMULAIRE D'INSCRIPTION -->

                        <div class="user_register" id="register_form">

                            <!-- FORM -->
                            <form action="<?= $this->url('register') ?>" class="form-horizontal vertical-center" method="POST" enctype="multipart/form-data">

                                <!-- CONTAINER -->
                                <div class="container">

                                    <!-- --------------------------- // NOM // -------------------------- -->

                                    <div class="form-group">  

                                        <label for="nom" class="col-sm-2 control-label">Nom</label>

                                        <!-- INPUT NOM -->
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputNom" placeholder="Entrez votre nom" name="nom" required>
                                        </div><!-- FIN INPUT NOM -->

                                    </div>
                                    <!-- FIN NOM  -->


                                    <!-- -------------------------- // PRENOM // -------------------------- -->

                                    <div class="form-group">

                                        <label class="col-sm-2 control-label">Prénom</label>

                                        <!-- INPUT PRENOM -->
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPrenom" placeholder="Entrez votre prénom" name="prenom" required>
                                        </div><!-- FIN INPUT PRENOM -->

                                    </div>

                                    <!-- FIN PRENOM -->

                                    <!-- --------------------------- // PSEUDO // -------------------------- -->

                                    <div class="form-group">

                                        <label class="col-sm-2 control-label">Pseudo</label>

                                        <!-- INPUT PSEUDO -->
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPseudo" placeholder="Entrez votre pseudo" name="myform[pseudo]" required>
                                        </div><!-- FIN INPUT PSEUDO -->

                                    </div>

                                    <!-- FIN PSEUDO -->

                                    <!-- --------------------------- // EMAIL // -------------------------- -->

                                    <div class="form-group">

                                        <label for="email" class="col-sm-2 control-label">Email</label>

                                        <!-- INPUT MAIL -->
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail" placeholder="Ex: francis.dupond@mail.fr" name="myform[mail]" required>

                                        </div> <!-- FIN INPUT MAIL  -->

                                    </div>
                                    <!-- FIN EMAIL -->


                                    <!-- --------------------------- // VERIFICATION EMAIL // -------------------------- -->
                                    <div class="form-group">

                                        <label for="email" class="col-sm-2 control-label">Confirmation Email</label>

                                        <!-- INPUT VERIF MAIL -->
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail" placeholder="Ex: francis.dupond@mail.fr" name="remail" required>
                                        </div><!-- FIN INPUT VERIF EMAIL -->

                                    </div>
                                    <!-- FIN VERIF EMAIL -->

                                    <!-- --------------------------- // MOT DE PASSE // -------------------------- -->
                                    <div class="form-group">

                                        <label class="col-sm-2 control-label">Mot de passe</label>

                                        <!-- INPUT MOT DE PASSE -->
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputPassword" name="myform[mdp]" placeholder="Votre mot de passe" required>
                                        </div>

                                    </div>
                                    <!-- FIN MOT DE PASSE -->

                                    <!-- --------------------------- // VERIFICATION MOT DE PASSE // -------------------------- -->
                                    <div class="form-group">

                                        <label class="col-sm-2 control-label">Confirmation Mot de passe</label>

                                        <!-- INPUT MOT DE PASSE -->
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputPassword" name="remdp" placeholder="Votre mot de passe" required>
                                        </div>

                                    </div>
                                    <!-- FIN VERIF MOT DE PASSE -->

                                    <!-- --------------------------- // ENREGISTRER // -------------------------- -->
                                  <div class="row text-center"> 
<button type="submit" class="btn tf-btn btn-info" name="registerform">Inscription</button>
</div>

                                    <!-- FIN ENREGISTRER -->

                                </div><!-- --------------------------- // FIN CONTAINER // -------------------------- -->

                            </form>
                        </div>
                    </section>
                </div>

                 <!-- HEADER POP UP CONNEXION -->

    <div id="modal_login" class="popupContainer" style="display:none;">
        <header class="popupHeader">
            <span class="header_title">Se connecter</span>
            <span class="modal_close"><i class="fa fa-times"></i></span>
        </header>

        <section class="popupBody">

            <!-- DEBUT DU FORMULAIRE DE CONNEXION -->

            <div class="user_login" id="login_form">

                <!-- FORM -->
                <form action="<?= $this->url('login') ?>" class="form-horizontal vertical-center" method="POST">

                    <!-- CONTAINER -->
                    <div class="container">




                        <!-- --------------------------- // EMAIL // -------------------------- -->

                        <div class="form-group">

                            <label for="email" class="col-sm-2 control-label">Email</label>

                            <!-- INPUT MAIL -->
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail" placeholder="Ex: francis.dupond@mail.fr" name="myform[mail]" required>

                            </div> <!-- FIN INPUT MAIL  -->

                        </div>
                        <!-- FIN EMAIL -->



                        <!-- --------------------------- // MOT DE PASSE // -------------------------- -->
                        <div class="form-group">

                            <label class="col-sm-2 control-label">Mot de passe</label>

                            <!-- INPUT MOT DE PASSE -->
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword" name="myform[mdp]" placeholder="Votre mot de passe" required>
                            </div>

                        </div>
                        <!-- FIN MOT DE PASSE -->

                        <!-- --------------------------- // ENREGISTRER // -------------------------- -->

                        <div class="row text-center">
                            <button type="submit" class="btn tf-btn btn-info" name="loginform">Se connecter</button>
                        </div>

                        <!-- FIN ENREGISTRER -->

                    </div><!-- --------------------------- // FIN CONTAINER // -------------------------- -->

                </form>
            </div>
        </section>
    </div>










                <?= $this->section('main_content') ?>
                    <!-- DEBUT SCROLL TO TOP -->
                      <p><a class="btn btn-danger scrollToTop" href="#" role="button">Haut de page</a></p>
                    <!-- FIN SCROLL TO TOP -->
            </section>


            
            <?= $this->section('footer') ?>
            


        </div> <!-- End wrapper -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        
        <!-- POPUP FORM -->
        <script type="text/javascript" src="<?= $this->assetUrl('js/scriptForm.js') ?>"></script>     
        <script type="text/javascript" src="<?= $this->assetUrl('js/jquery.leanModal.min.js') ?>"></script>
        <script type="text/javascript" src="<?= $this->assetUrl('js/scripts.js') ?>"></script>
        <?= $this->section('javascripts') ?>

    </body>

</html>