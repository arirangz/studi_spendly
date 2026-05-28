<?php

function getExpenses(PDO $pdo, int $userId):array
{
    $sql = "SELECT expense.id_expense, expense.amount, 
            expense.title, expense.expense_date, expense.id_category 
            FROM expense
            WHERE expense.id_user = :userId";

    $query = $pdo->prepare($sql);

    $query->bindValue(":userId", $userId, PDO::PARAM_INT);

    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
    
}