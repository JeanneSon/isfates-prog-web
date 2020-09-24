<!DOCTYPE html>
<html>

<head>
      <title>Vérification du formulaire</title>
	  <meta charset="utf-8" />
</head>

<body>
    <h1>Vérification du formulaire</h1>
    <h2>Affichage des données reçues</h2>
    <?php 
        print_r($_POST);
    ?>
    <h2>Rapport d'erreurs</h2>
    <ul>
        <li>Sexe : <?php   
            if (isset($_POST["sexe"])) {
                $Sexe = $_POST["sexe"];
                if ($Sexe == "h" || $Sexe == "f")
                    echo "OK";
                else 
                    echo "différent de f ou h";
            }
            else 
                echo "absent";
            ?>
        </li>

        <li>Nom : <?php
            if (isset($_POST["nom"])) {
                $Nom = trim($_POST["nom"]);
                $Nom_valide = strlen(str_replace(" ", "", $Nom)) > 1;
                if ($Nom_valide)
                    echo "OK";
                else
                    echo "trop court";
            }
            else
                echo "absent";
            ?>
        </li>

        <li>Prénom : <?php
            if (isset($_POST["prenom"])) {
                $Prenom = trim($_POST["prenom"]);
                $Prenom_valide = ctype_alpha($Prenom);
                if ($Prenom_valide)
                    echo "OK";
                else 
                    echo "contient autre chose que des lettres (a-z)";
            }
            else 
                echo "absent";
            ?>
        </li>

        <li>Date de naissance : <?php
            if (isset($_POST["naissance"])) {
                $Date = $_POST["naissance"];
                list($annee, $mois, $jour) = explode("-", $Date);
                $Date_valide = checkdate($mois, $jour, $annee);
                if ($Date_valide)
                    echo "OK";
                else 
                    echo "Date invalide";
            }
            else
                echo "absent";
            ?>
        </li>

        <li>Pays : <?php
            if (isset($_POST["pays"])) {
                $Pays = trim($_POST["pays"]);
                $Pays_possible = ["Allemagne", "Belgique", "Chine", "France", "Maroc", "Tunisie"];
                if (in_array($Pays, $Pays_possible)) {
                    echo "OK";
                }
                else
                    echo "pays non valide";
            }
            else
                echo "absent";
            ?>
        </li>
    </ul>
</body>
</html>