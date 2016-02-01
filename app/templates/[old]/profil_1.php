<?php $this->layout('layout', ['title' => 'Accueil StackForce 3']) ?>


<?php $this->start('stylesheets') ?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/padding.css') ?>">
<link rel="stylesheet" href="<?= $this->assetUrl('css/margin.css') ?>">
<link rel="stylesheet" href="<?= $this->assetUrl('css/profil.css') ?>">
<?php $this->stop('stylesheets') ?>


<?php $this->start('main_content') ?>

<!doctype html>
<html lang=fr>

<head>
    <meta charset="utf-8">
    <title>Profil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="../stackforce3/css/profil.css">
</head>

<body>
    <div class="container"><!-- debut container-->
        <div class="row"> <!-- debut row-->
            <div class="col-xs-12" > <!-- Debut V card -->
                <div class="row"><!-- debut row -->
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 " id="portrait" > <!-- Debut div portrait-->
                        <div class="media "><!--debut div image -->
                            <img src="img/compte.png" alt="portrait" class="img-responsive  ">
                            <p><small><i> inscrit depuis le $date</i></small></p>
                           

                        </div><!-- fin div image -->
                    </div> <!-- fin div portrait-->

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-left"> <!-- debut div form -->
                        <form class="form-horizontal" method="POST"> <!-- debut form-->
                         
                            <h4>$pseudo</h4><input type="text" name="pseudo" class="form-control disparition" placeholder="pseudo" >
                            <h4>$nom</h4>
                            <h4>$prenom</h4>
                            <h4><i class="fa fa-envelope-o "></i></h4><input type="email" name="email" class="form-control disparition" placeholder="email" autofocus>
                            <h4><i class="fa fa-phone "></i></h4><input type="tel" name="telephone" class="form-control disparition" placeholder="telephone" >
                            <h4 class="disparition modifs">Mot de passe</h4><input type="password" name="password" class="form-control disparition" placeholder="mot de passe" >
                            <h4 class="disparition modifs">Mon Facebook</h4><input type="url" name="Facebook" class="form-control disparition" >
                            <h4 class="disparition modifs">Mon Twitter</h4><input type="url" name="Twitter" class="form-control disparition"  >
                            <h4 class="disparition modifs">Mon Google+</h4><input type="url" name="Google+" class="form-control disparition"  >
                            <h4 class="disparition modifs">Mon Linkedin</h4><input type="url" name="Linkedin" class="form-control disparition"  >
                            <h4 class="disparition modifs">Mon Github</h4><input type="url" name="Github" class="form-control disparition"  >
                         
                        </form> <!-- fin form -->
                        </br><br/>
                    </div><!-- fin div form -->

                    
                    
            
                    <div  class="col-xs-12 col-sm-12 col-md-2 col-lg-2 text-center" id="bouton"><!-- div bouton modifier -->
                        <button class="btn btn-info " type="submit" name="modifier" id="modifier">modifier mon profil</button>
                    </div><!-- fin bouton modifier-->
                    
                    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" ><!-- div bouton valider -->
                        <button class="btn btn-info disparition " type="submit" name="valider" id="valider">Valider</button>
                    </div><!-- fin bouton valider-->
                </div><!-- fin row -->
            </div> <!-- fin V card -->
        </div> <!-- fin row-->
    </div>   <!-- fin container-->  
    <div class="container"> <!--debut container-->
        <div class="row"> <!--debut row-->
            <div class="col-xs-12 " > <!--debut rubrique me suivre-->
                <div id="me_suivre"><!-- div titre-->
                    <h2 class="text-center" >Me suivre</h2>
                </div><!-- fin div titre -->
                <div class="row"><!-- debut row -->
                    <div class="col-xs-12 text-center"><!--div reseaux sociaux-->
                        <ul class="social-links">
               <li><a href="https://fr-fr.facebook.com/" target="blank"><i class="fa fa-facebook icone" alt="facebook"></i></a></li>
               <li><a href="https://twitter.com/?lang=fr" target="blank" ><i class="fa fa-twitter icone"></i></a></li>
               <li><a href="https://plus.google.com/" target="blank"><i class="fa fa-google-plus icone"></i></a></li>
               <li><a href="https://www.linkedin.com/" target="blank"><i class="fa fa-linkedin icone"></i></a></li>
               
               <li><a href="https://github.com/" target="blank"><i class="fa fa-github icone"></i></a></li>
               
            </ul>
                    </div><!-- fin div reseaux sociaux -->
                </div><!-- fin row-->
            </div>
        </div>
    </div>
    <div class="container"> <!--debut container-->
        <div class="row"> <!--debut row-->
            <div class="col-xs-12 " id="badges"  > <!--debut rubrique badges-->
                <div id="skills"><!-- div titre -->
                    <h2 class="text-center">Mes Badges</h2>
                </div><!-- fin div titre -->
                
         <div class="row"> <!-- debut row -->
            <div class="col-xs-12 text-center" id="boutons"> <!-- debut badges -->
                <button type="button" class="btn btnor btnreponse">HTML</button>
                <button type="button" class="btn btnargent btnreponse">CSS</button>
                <button type="button" class="btn btnor btnreponse">Javascript</button>
                <button type="button" class="btn btnargent btnreponse">PHP</button>
                <button type="button" class="btn btnargent btnreponse">SQL</button>
                <button type="button" class="btn btnbronze btnreponse">Bootstrap</button>
                <button type="button" class="btn btnor btnreponse">jQuery</button>
                    
            </div><!-- fin badges -->
         </div><!-- fin row -->
            </div><!-- fin rubrique badges-->
        </div><!-- fin row -->
    </div><!-- fin container -->

<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src='../stackforce3/js/profil.js'></script>

</body>

</html>