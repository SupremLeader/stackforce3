<?php $this->layout('layout', ['title' => 'Connexion']) ?>


<?php $this->start('main_content'); if (!isset($_SESSION['user'])){ ?>
<!-- DEBUT SECTION CONNEXION -->

<style>
.login {
margin-top: 80px;
    }
</style>
    <form class="form-horizontal vertical-center" method="POST">

        <div class="container login">

            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail" placeholder="Ex: francis.dupond@mail.fr" name="myform[mail]" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Mot de passe</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" name="myform[mdp]" placeholder="Votre mot de passe" required>
                </div>
            </div>

            <div class="row text-center">
                <button type="submit" name="login" c]lass="btn tf-btn btn-info">Connexion</button>
                <?= '<br /><div>' . (!empty($err) ? $err : '') .'</div>'; ?>
            </div>

        </div>
    </form>

<!-- FIN SECTION CONNEXION -->
<?php } $this->stop('main_content') ?>