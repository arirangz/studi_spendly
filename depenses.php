<?php
require_once "templates/header.php";
require_once "libs/exepense.php";
require_once "libs/category.php";

if (!isset($_SESSION["user"])) {
    header("location: login.php");
}

$expenses = getExpenses($pdo, $_SESSION["user"]["id_user"]);
$categories = getCategories($pdo);

$errors = [];

if (isset($_POST["saveExpense"])) {
    $title = trim($_POST["title"]);
    $amount = (float)$_POST["amount"];
    $idCategory = (int)$_POST["category"];
    $expenseDate = $_POST["date"];

    if (!is_numeric($amount) || $amount <= 0) {
        $errors[] = "Le montant doit être supérieur à 0";
    }
    if ($title === "") {
        $errors[] = "Le titre est obligatoire";
    }
    if ($idCategory <= 0) {
        $errors[] = "La catégorie est obligatoire";
    }


    if (!$errors) {
        // On peut enregistrer la dépense
        $res = saveExpense($pdo, $title, $amount, $expenseDate, $idCategory, $_SESSION["user"]["id_user"]);
    }
}

var_dump($errors);

?>
<div class="container col-xxl-8 px-4 py-5">
    <h1 class="mb-3">Mes dépenses</h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#expenseModal">
        Ajouter une dépense
    </button>

    <!-- Modal -->
    <div class="modal fade" id="expenseModal" tabindex="-1" aria-labelledby="expenseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="expenseModalLabel">Dépense</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Montant</label>
                            <input type="number" name="amount" id="amount" step=".01" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" name="date" id="date" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Catégorie</label>
                            <select name="category" id="category" class="form-control form-select">
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category["id_category"] ?>"><?= $category["name"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <input name="saveExpense" type="submit" class="btn btn-primary" value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>
    </div>


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
                    <td><?= htmlspecialchars($expense["category_name"]) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php require_once "templates/footer.php" ?>