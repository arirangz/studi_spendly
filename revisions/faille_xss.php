<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Super article</h1>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime voluptas, laborum in eius non corporis cumque fugit aut provident neque tenetur modi perspiciatis rem atque incidunt alias fugiat voluptatem dolorem!</p>

    <h2>Commentaires</h2>
    <form action="" method="post">
        <textarea name="comment" id="comment"></textarea>
        <p>
            <input type="submit" value="Commenter">
        </p>
    </form>

    <?php if (isset($_POST["comment"])): ?>
        <?=htmlspecialchars($_POST["comment"])  ?>
    <?php endif; ?>
</body>
</html>