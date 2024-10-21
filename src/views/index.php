<!DOCTYPE html>
<html>
    <title>PHP Testground</title>
    <body>
        <h1> Home Page </h1>
        <p>This is the home page</p>
        <h2> Users </h2>
        <ol>
            <?php foreach($this->params as $user): ?>
                <li> <?= $user['full_name'] ?> </li>
            <?php endforeach ?>
        </ol>
    </body>
</html>