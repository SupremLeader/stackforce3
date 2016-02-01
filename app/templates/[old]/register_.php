<?php $this->layout('layout', ['title' => 'S\'enregistrer']) ?>

<?php $this->start('main_content'); if (!isset($_SESSION['user'])){ ?>
<!-- DEBUT SECTION ENREGISTREMENT -->
<style>
    .register {
        margin-top: 80px;
    }
</style>
<!-- DEBUT DU FORMULAIRE D'INSCRIPTION -->

<form class="form-horizontal vertical-center" method="POST">

    <div class="container register">

        <div class="form-group">
            <label for="annonce" class="col-sm-2 control-label" name="nom">Nom</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputNom" placeholder="Entrez votre nom" name="nom" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label" name="prenom">Prénom</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPrenom" placeholder="Entrez votre prénom" name="prenom" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label" name="pseudo">Pseudo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPseudo" placeholder="Entrez votre pseudo" name="myform[pseudo]" required>
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col-sm-2 control-label" name="mail">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail" placeholder="Ex: francis.dupond@mail.fr" name="myform[mail]" required>
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col-sm-2 control-label" name="remail">Confirmation Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail" placeholder="Ex: francis.dupond@mail.fr" name="remail" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label" name="password">Mot de passe</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" name="myform[mdp]" placeholder="Votre mot de passe" required>
            </div>
        </div>

       <?php    
    if (empty($errors) && ($flag === 1)) 
    {
        echo '<br /><div class="col-md-6 col-md-offset-3">';
        echo '<div class="alert alert-success">Le nouvel utilisateur a été ajouté avec succès.</div>';
        echo '</div><br />'; ?>
        <div><a href="<?= $this->url('login') ?>"><button>Me connecter</button></a></div>
    <?php }
elseif (!empty($errors))
{
    echo '<div class="row text-center"><button type="submit" class="btn tf-btn btn-info" name="registerform">Inscription</button></div>';
    echo '<br /><div class="col-md-6 col-md-offset-3">';
    echo '<div class="alert alert-danger">'.implode('<br>', $errors).'</div>';
    echo '</div><br>';
}
else
{
    echo '<div class="row text-center"><button type="submit" class="btn tf-btn btn-info" name="registerform">Inscription</button></div>';
}
        ?>
    </div>

</form>

<!-- FIN DU FORMULAIRE D'INSCRIPTION -->
<?php } $this->stop('main_content') ?>