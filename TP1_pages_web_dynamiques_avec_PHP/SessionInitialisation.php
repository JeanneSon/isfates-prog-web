<?php
    session_start();
    $_SESSION["MyVariable"] = 1;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Session premier pas</title>
</head>
<body>
    <p>Ma variable de session vaut <?php echo $_SESSION["MyVariable"]; ?></p>
    <a href="./SessionIncrementation.php">Incrémenter</a>
</body>
</html>