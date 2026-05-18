<?php
require_once "libs/config.php";
require_once "libs/pdo.php";

$mainMenu = [
    "index.php" => "Accueil",
    "a-propos.php" => "A propos"
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/override-bootstrap.css">
</head>

<body>

    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <div class="col-md-3 mb-2 mb-md-0"> <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img src="/assets/images/spendly.svg" alt="Logo spendly" width="150">
                </a> </div>
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <?php foreach ($mainMenu as $page => $title) { ?>
                        <li class="nav-item"><a href="<?= $page ?>" class="nav-link px-2"><?=$title ?></a></li>
                <?php } ?>
            </ul>
            <div class="col-md-3 text-end"> <button type="button" class="btn btn-outline-primary me-2">Login</button> <a href="inscription.php" class="btn btn-primary">Inscription</a> </div>
        </header>
    </div>

    <main>