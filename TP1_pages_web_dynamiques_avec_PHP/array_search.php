<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fonction renvoyant différents types</title>
    <meta charset="UTF-8">
</head>
<body>
    <?php
        if(array_search('a',array('a','b','c'))===false)
            echo "pas trouvé";
        else echo "trouvé";
    ?>
</body>
</html>