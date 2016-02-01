<?php $this->layout('layout', ['title' => 'Profil de ' . $profil['pseudo']]) ?>


<?php $this->start('stylesheets') ?>
    <link rel="stylesheet" href="<?= $this->assetUrl('css/padding.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/margin.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/detail.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/profil.css') ?>">
<?php $this->stop('stylesheets') ?>


<?php $this->start('main_content') ?>
<!-- DEBUT SECTION PROFIL -->
<?php if (isset($_SESSION['user'])){ ?>


 <?php                                                           
//debug($profil);
//debug($profilskill);
?>

<div class="container conteneur"><!-- debut container-->
        <div class="row"> <!-- debut row-->
            <div class="col-xs-12" > <!-- Debut V card -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 " id="portrait" >
                        <div class="media ">
                            <img src="<?= $this->assetUrl('img/'.$profil['img'])?>" alt="portrait" class="img-responsive  ">
                            <?php $date = date('d/m/Y', strtotime($profil['inscritdepuis'])); ?>
                            <p><small>Inscrit depuis le <?= $date ?></small></p>
                           

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-left">
                        <form class="form-horizontal" method="POST" action="<?= $this->url('profilModif') ?>">
                         <!--<?= $flag ?>-->
                     <h4>Pseudo : <?= $profil['pseudo']?></h4>
                        <h4>Nom : <?= $profil['nom']?></h4>
                        <h4>Prénom : <?= $profil['prenom']?></h4>
                        <h4><i class="fa fa-envelope-o"></i> <?= $profil['mail'] ?></h4>
                        <h4><i class="fa fa-phone"></i> <?= $profil['telephone'] ?></h4><br/>
                            <input type="hidden" name="id" class="form-control disparition" value="<?= $profil['wusers_id']?>">
                         <!--<h4 class="disparition modifs">Mot de passe : </h4><input type="password" name="password" class="form-control disparition" placeholder="mot de passe" >-->
                         <h4 class="disparition modifs">Mon adresse mail : </h4><input type="email" name="mail" class="form-control disparition" placeholder="<?= $profil['mail']?>" autofocus>
                         <h4 class="disparition modifs">Mon numéro de téléphone : </h4><input type="tel" name="telephone" class="form-control disparition" placeholder="<?= $profil['telephone']?>">
                         <h4 class="disparition modifs">Mon Facebook : </h4><input type="url" name="facebook" class="form-control disparition" placeholder="<?= $profil['facebook']?>">
                         <h4 class="disparition modifs">Mon Twitter : </h4><input type="url" name="twitter" class="form-control disparition"  placeholder="<?= $profil['twitter']?>">
                         <h4 class="disparition modifs">Mon Google+ : </h4><input type="url" name="googleplus" class="form-control disparition"  placeholder="<?= $profil['googleplus']?>">
                         <h4 class="disparition modifs">Mon Linkedin : </h4><input type="url" name="linkedin" class="form-control disparition"  placeholder="<?= $profil['linkedin']?>">
                         <h4 class="disparition modifs">Mon GitHub : </h4><input type="url" name="github" class="form-control disparition"  placeholder="<?= $profil['github']?>"><br/>
                         <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" >
                             <button class="btn btn-info disparition " type="submit" name="valider" id="valider">Valider les modifications</button>
                         </div>
                         
                        </form>
                        <br/><br/>
                    </div>

                    
                    
            
                    <div  class="col-xs-12 col-sm-12 col-md-2 col-lg-2 text-center" id="bouton">
                    <?php
                    if ($_SESSION['user']['id'] === $profil['wusers_id']) {
                        echo '<button class="btn btn-info " type="submit" name="modifier" id="modifier">Modifier mon profil</button>';
                    }
                    ?>
                        <!-- $this->url('modifierProfil', ['id' => $_SESSION['user']['id']]) -->
                    </div>
                    
                 
                </div>
            </div> <!-- fin V card -->
        </div> <!-- fin row-->
    <!--</div>-->   <!-- fin container-->  
    <!-- <div class="container"> --> <!--debut container-->
        <div class="row"> <!--debut row-->
            <div class="col-xs-12 " > <!--debut rubrique me suivre-->
                <div id="me_suivre">
                    <h2 class="text-center" >Me suivre</h2>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-center"><!--icone reseaux sociaux-->
                        <ul class="social-links">
               <?php if (!empty($profil['facebook'])) { ?><li><a href="<?= $profil['facebook'] ?>" target="blank"><i class="fa fa-facebook icone" alt="facebook"></i></a></li><?php } ?>
               <?php if (!empty($profil['twitter'])) { ?><li><a href="<?= $profil['twitter'] ?>" target="blank" ><i class="fa fa-twitter icone"></i></a></li><?php } ?>
               <?php if (!empty($profil['googleplus'])) { ?><li><a href="<?= $profil['googleplus'] ?>" target="blank"><i class="fa fa-google-plus icone"></i></a></li><?php } ?>
               <?php if (!empty($profil['linkedin'])) { ?><li><a href="<?= $profil['linkedin'] ?>" target="blank"><i class="fa fa-linkedin icone"></i></a></li><?php } ?>
               <?php if (!empty($profil['github'])) { ?><li><a href="<?= $profil['github'] ?>" target="blank"><i class="fa fa-github icone"></i></a></li><?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
    <!-- <div class="container"> --> <!--debut container-->
        <div class="row"> <!--debut row-->
            <div class="col-xs-12 " id="badges"  > <!--debut rubrique skills-->
                <div id="skills">
                    <h2 class="text-center">Mes badges</h2>
                </div>
                
            <div class="row">
                <div class="col-xs-12 text-center" id="boutons">
                <?php
                foreach ($badges as $badge) {
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
                </div>
            </div>
        </div>
    </div>
</div> <!-- FIN CONTAINER -->
<!-- FIN SECTION PROFIL -->
<?php } ?>
<?php $this->stop('main_content') ?>


<?php $this->start('footer') ?>

<?php $this->stop('footer') ?>


<?php $this->start('javascripts') ?>

<?php $this->stop('javascripts') ?>