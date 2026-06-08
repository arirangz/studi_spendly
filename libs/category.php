<?php

function getCategories(PDO $pdo):array
{
    $query = $pdo->prepare("SELECT c.id_category, c.name
                            FROM category c");
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}