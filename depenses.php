<?php
require_once "templates/header.php";
require_once "libs/exepense.php";

if (!isset($_SESSION["user"])) {
    header("location: login.php");
}

$expenses = getExpenses($pdo, $_SESSION["user"]["id_user"]);
?>
<div class="container col-xxl-8 px-4 py-5">
    <h1 class="mb-3">Mes dépenses</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Montant</th>
                <th scope="col">Date</th>
                <th scope="col">Catégorie</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($expenses as $expense): ?>
                <tr>
                    <td><?= htmlspecialchars($expense["title"]) ?></td>
                    <td><?= htmlspecialchars($expense["amount"]) ?></td>
                    <td><?= htmlspecialchars($expense["expense_date"]) ?></td>
                    <td><?= htmlspecialchars($expense["id_category"]) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php require_once "templates/footer.php" ?>