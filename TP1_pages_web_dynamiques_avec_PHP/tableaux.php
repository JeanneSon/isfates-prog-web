<?php 
    // TP 1 - exo 6.1
    $PotesDePromo = array("Nina", "Michelle", "Aurianne", "Sonia");

    // TP 1 - exo 6.4
    $Menus = array(
        "Lundi"     => array("Salade", "Boudin/Purée", "Mousse au chocolat"),
        "Mardi"     => array("Tomates", "Couscous", "Glace"),
        "Mercredi"  => array("Sardines", "Steack/Frites", "Yaourt"),
        "Jeudi"     => array("Jambon", "Paella", "Gâteau"),
        "Vendredi"  => array("Poireaux vinaigrette", "Poisson/Riz", "Pomme")
    );
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableaux</title>

    <style>
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid powderblue;
        }
    </style>
</head>
<body>
    <h1>Tableaux</h1>
    <h2>Parcours - boucle pour (TP 1 - exo 6.2)</h2>
    <ul>
        <?php
            $max = count($PotesDePromo);
            for ($i = 0; $i < $max; $i++) {
                echo "<li>$PotesDePromo[$i]</li>\n";
            }
        ?>
    </ul>

    <h2>Parcours - boucle pour-chaque (TP 1 - exo 6.3)</h2>
    <ul>
        <?php
            foreach ($PotesDePromo as $friend) {
                echo "<li>$friend</li>\n";
            }
        ?>
    </ul>

    <h2>Parcours - array de 2 dimensions (TP 1 - exo 6.4)</h2>
    <table>
        <tr>
            <td></td> <!-- https://www.w3.org/WAI/tutorials/tables/two-headers/ -->
            <th>Entrée</th>
            <th>Plat</th>
            <th>Dessert</th>
        </tr>
        <?php
            foreach ($Menus as $day => $menu) {
                echo "<tr>\n\t<th>$day</th>\n";
                foreach ($Menus[$day] as $food) {
                    echo "\t<td>$food</td>\n";
                }
                echo "</tr>\n";
            }
        ?>
    </table>
</body>
</html>