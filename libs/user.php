<?php

function addUser(PDO $pdo, string $email, string $password):bool
{
    // On prépare la requête
    $query = $pdo->prepare("INSERT INTO user (email, password) VALUES (:email, :password)");

    // On hash le mdp
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // On passe les données
    $query->bindValue(":email", $email, $pdo::PARAM_STR);
    $query->bindValue(":password", $passwordHash, $pdo::PARAM_STR);

    // On exécute la requête
    return $query->execute();
}

function verifyUserLogin(PDO $pdo, string $email, string $password):bool|array
{
    $query = $pdo->prepare("SELECT id_user, email, password FROM user WHERE email = :email");
    $query->bindValue(":email", $email, $pdo::PARAM_STR);
    $query->execute();

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["password"])) {
        return $user;
    } else {
        return false;
    }

}