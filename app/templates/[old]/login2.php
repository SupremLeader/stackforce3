<?php $this->layout('layout', ['title' => 'S\'enregistrer']) ?>


<?php $this->start('stylesheets') ?>
    <style>
        .plusbas {
            margin-top: 80px;
        }
    </style>
    <link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/style_form.css') ?>">
<?php $this->stop('stylesheets') ?>


<?php $this->start('main_content'); if (!isset($_SESSION['user'])){ ?>
<!-- DEBUT SECTION ENREGISTREMENT -->

<div class="container plusbas">
    <a id="modal_trigger_register" href="#modal" class="btn">Se connecter</a>


    <!-- HEADER POP UP -->

    <div id="modal" class="popupContainer" style="display:none;">
        <header class="popupHeader">
            <span class="header_title">Se connecter</span>
            <span class="modal_close"><i class="fa fa-times"></i></span>
        </header>

        <section class="popupBody">

            <!-- DEBUT DU FORMULAIRE DE CONNEXION -->

            <div class="user_login" id="login_form">

                <!-- FORM -->
                <form action="" class="form-horizontal vertical-center" method="POST" enctype="multipart/form-data">

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
                                <input type="text" class="form-control" id="inputPseudo" placeholder="Entrez votre pseudo" name="pseudo" required>
                            </div><!-- FIN INPUT PSEUDO -->

                        </div>

                        <!-- FIN PSEUDO -->

                        <!-- --------------------------- // EMAIL // -------------------------- -->

                        <div class="form-group">

                            <label for="email" class="col-sm-2 control-label">Email</label>

                            <!-- INPUT MAIL -->
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail" placeholder="Ex: francis.dupond@mail.fr" name="email" required>

                            </div> <!-- FIN INPUT MAIL  -->

                        </div>
                        <!-- FIN EMAIL -->


                        <!-- --------------------------- // VERIFICATION EMAIL // -------------------------- -->
                        <div class="form-group">

                            <label for="email" class="col-sm-2 control-label">Email</label>

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
                                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Votre mot de passe" required>
                            </div>

                        </div>
                        <!-- FIN MOT DE PASSE -->

                        <!-- --------------------------- // ENREGISTRER // -------------------------- -->

                        <div class="row text-center">
                            <button type="submit" class="btn tf-btn btn-info" name="register">Inscription</button>
                            <button type="reset" class="btn tf-btn btn-default">Reset</button>
                        </div>

                        <!-- FIN ENREGISTRER -->

                    </div><!-- --------------------------- // FIN CONTAINER // -------------------------- -->

                </form>
            </div>
        </section>
    </div>
</div>

        <!-- FIN DU FORMULAIRE D'INSCRIPTION -->


        <!-- FIN SECTION ENREGISTREMENT -->
<?php } $this->stop('main_content') ?>


<?php $this->start('javascripts') ?>
    <script type="text/javascript" src="<?= $this->assetUrl('js/scriptForm.js') ?>"></script>     
    <script type="text/javascript" src="<?= $this->assetUrl('js/jquery.leanModal.min.js') ?>"></script>
<?php $this->stop('javascripts') ?>