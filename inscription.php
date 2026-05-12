<?php
require_once "templates/header.php";

$errors = [];

if (isset($_POST["email"]) && isset($_POST["password"])) {
    if (empty($_POST["email"])) {
        $errors[] = "L'email est obligatoire";
    }
    if (empty($_POST["password"])) {
        $errors[] = "Le mot de passe est obligatoire";
    }


}


?>


<div class="container col-xxl-8 px-4 py-5">



    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <h1>Inscription</h1>

        <?php foreach ($errors as $key => $error): ?>
            <div class="alert alert-danger">
                <?= $error  ?>
            </div>
        <?php endforeach; ?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <input type="submit" value="envoyer" class="btn btn-primary">
        </form>
    </div>
</div>

<?php require_once "templates/footer.php" ?>