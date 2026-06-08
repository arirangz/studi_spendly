<?php

function getExpenses(PDO $pdo, int $userId):array
{
    $sql = "SELECT e.id_expense, e.amount, 
            e.title, e.expense_date, e.id_category, c.name as category_name 
            FROM expense e
            JOIN category c ON e.id_category = c.id_category
            WHERE e.id_user =  :userId";

    $query = $pdo->prepare($sql);

    $query->bindValue(":userId", $userId, PDO::PARAM_INT);

    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
    
}

function saveExpense(PDO $pdo, string $title, float $amount, string $expenseDate, int $idCategory, int $idUser):bool
{
    $query = $pdo->prepare("INSERT INTO expense (title, amount, expense_date, id_category, id_user)
                            VALUES (:title, :amount, :expense_date, :id_category, :id_user)");

    $query->bindValue(":title", $title, PDO::PARAM_STR);
    $query->bindValue(":amount", $amount, PDO::PARAM_STR);
    $query->bindValue(":expense_date", $expenseDate, PDO::PARAM_STR);
    $query->bindValue(":id_category", $idCategory, PDO::PARAM_INT);
    $query->bindValue(":id_user", $idUser, PDO::PARAM_INT);

    return $query->execute();
}