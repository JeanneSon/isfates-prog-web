<?php
    session_start();
    $_SESSION["MyVariable"]++;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Session duexième pas</title>
</head>
<body>
    <p>Ma variable de session vaut <?php echo $_SESSION["MyVariable"]; ?></p>
    <a href="./SessionIncrementation.php">Incrémenter</a>
    <p>L'identifiant de session est passé par les cookies.</p>
</body>
</html>