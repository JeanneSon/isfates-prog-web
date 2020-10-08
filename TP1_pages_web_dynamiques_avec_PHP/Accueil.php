<?php 
    $displayForm = true;
    $message = "Bonjour, je ne vous connais pas, c’est la 1ère fois que
                vous accédez à cette page. Veuillez saisir votre prénom";
    if (isset($_POST["username"])) {
        $username = trim($_POST["username"]);
        setcookie("username", $username, time() + 86400, '/; samesite=strict');
        $_COOKIE['username'] = $username;
    }
    if (isset($_COOKIE['username'])) {
        $displayForm = false;
        $message = "Bonjour " . $_COOKIE['username'];
        
        if (isset($_COOKIE['counter'])) {
            if ($_COOKIE['counter'] < 6) {
                $message .= ", c’est la " . $_COOKIE['counter'] . "-ème fois que tu accèdes à mon site";
                setcookie("counter", ++$_COOKIE['counter'], time() + 86400, '/; samesite=strict');
                /*
                /; samesite=strict
                cf. https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie/SameSite
                 and https://stackoverflow.com/questions/39750906/php-setcookie-samesite-strict
                */
            }
            else {
                $message = "Salut " . $_COOKIE["username"] . ", bienvenu sur mon site";
            }
        }
        else {
            $message .= ", je suis ravi de faire votre connaissance";
            setcookie("counter", 3, time() + 86400, '/; samesite=strict'); //the counter is always one ahead
        }
    }
    else {
        if (isset($_POST["username"])) {
            setcookie("username", trim($_POST["username"]), time() + 86400, '/; samesite=strict');
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <style>
        td  {
            border-left-style: dotted;
        }
        table {
            padding-top: 3%;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <p><?php echo $message ?></p>
    <?php 
        if ($displayForm) {
    ?>
    <form action="#" method="post">
        <input type="text" name="username" required="required" placeholder="votre prénom" />
        <input type="submit" value="Valider" />
    </form>
    <?php 
        }
    ?>
    <table>
        <tr>
            <th>Cas</th>
            <td>1<sup>ère</sup>connexion</td>
            <td>2<sup>ème</sup>connexion</td>
            <td>Connexion n°3, 4 et 5</td>
            <td>Connexions suivantes</td>
        </tr>
        <tr>
            <th>Test</th>
            <td>isset Cookie Username ou Post</td>
            <td>isset Cookie Counter</td>
            <td>is Cookie Counter <  6</td>
            <td>is Cookie Counter >= 6 </td>
        </tr>
        <tr>
            <th>Cookie à déposer</th>
            <td>ici : pas de cookie</td>
            <td>username</td>
            <td>counter(3), update counter (4, 5)</td>
            <td>pas de cookie</td>
        </tr>
    </table>
</body>
</html>