<!DOCTYPE html>
<html>

<head>
      <title>Vos données</title>
	  <meta charset="utf-8" />
</head>

<body>
<?php
    $gender_okay = false;
    $lastname_okay = true;
    $firstname_okay = true;
    $date_okay = true;
    $country_okay = true;

    if (isset($_POST)) {
        echo print_r($_POST);
        if (isset($_POST["sexe"])) {
            $gender = $_POST["sexe"];
            if ($gender == "h" || $gender == "f")
                $gender_okay = true;
            else
                $gender_okay = false;
        }
        if (isset($_POST["prenom"])) {
            $firstname = trim($_POST["prenom"]);
            $firstname_okay = ctype_alpha($firstname);
        }
        if (isset($_POST["nom"])) {
            $lastname = trim($_POST["nom"]);
            $firstname_okay = strlen(str_replace(" ", "", $lastname)) > 1;
        }
        if (isset($_POST["naissance"]) && strlen($_POST["naissance"]) == strlen("yyyy-mm-dd")) {
            $date = $_POST["naissance"];
            list($year, $month, $day) = explode("-", $date);
            $date_okay = checkdate((int) $month, (int) $day, (int) $year);
        }
        if (isset($_POST["pays"])) {
            $country = trim($_POST["pays"]);
            $possible_countries = ["Allemagne", "Belgique", "Chine", "France", "Maroc", "Tunisie"];
            $country_okay = in_array($country, $possible_countries);
        }
        $all_okay = $gender_okay && $lastname_okay && $firstname_okay && $date_okay && $country_okay;
        /* if ($all_okay) {
            ?><h1>Vous avez rempli le formulaire correctement. Merci et au revoir!</h1><?php 
        }
        else { */
            ?> 
<h1>Vos données</h1>

<form method="post" action="#">
<fieldset>
    <legend>Informations personnelles</legend>
	Vous êtes :
    <span <?php if (!$gender_okay) echo 'style="border: 1px solid red"' ?>>  
        <input type="radio" name="sexe" value="f"/> une femme 	
        <input type="radio" name="sexe" value="h"/> un homme
    </span><br />
    Nom :    
	<input type="text" name="nom" required="required" /><br />   
    Prénom : 
	<input type="text" name="prenom" /><br /> 	
    Date de naissance : 
	<input type="date" id="naissance" name="naissance" /><br />
	Pays d'origine :
    <input name="pays" list="pays" />
	<datalist id="pays">
		<option value="Allemagne" />
		<option value="Belgique" />
		<option value="Chine" />
		<option value="France" />
		<option value="Maroc" />
		<option value="Tunisie" />
	</datalist> 	
	
</fieldset>


	<br />
<input type="submit" value="Valider" />
         
</form>
        <!-- <?php } ?> -->
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