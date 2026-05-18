<?php

// ATTENTION : REQUETE NON SECURISEES !!!!!

$pdo = new PDO('mysql:dbname=studi_spendly;host=localhost;charset=utf8mb4', 'root', '');
$id = $_GET['id'];
$query = $pdo->query("SELECT * FROM user WHERE id_user = $id");
$user = $query->fetch(PDO::FETCH_ASSOC);

var_dump($user);
?>
