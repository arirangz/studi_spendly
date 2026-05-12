<?php
try
{
    $dbSettings = parse_ini_file(_APP_ENV_);
 
    $pdo = new PDO("mysql:dbname={$dbSettings["db_name"]};host={$dbSettings["db_host"]}:{$dbSettings["db_port"]};charset=utf8mb4", $dbSettings["db_user"], $dbSettings["db_password"]);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
