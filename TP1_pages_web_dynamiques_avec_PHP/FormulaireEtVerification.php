<!DOCTYPE html>
<html>

<head>
        <title>Vos données</title>
        <meta charset="utf-8" />

        <style>
            .ok {
            }
            .error {
                background-color: red;
            }
        </style>
</head>

<body>
<?php
    $okay = [
        "gender"    => true,
        "lastname"  => true,
        "firstname" => true,
        "date"      => true,
        "country"   => true
    ];

    include("TabPays.inc.php");

    function okayXORError($status) {
        return $status ? "ok" : "error";
    }

    function allTrue($array_) {
        $result = true;
        foreach ($array_ as $elem) {
            $result &= $elem;
        }
        return $result;
    }
    
    if (isset($_POST["submit"])) {
        foreach ($okay as $field => $status) {
            $okay[$field] = false;
        }
        if (isset($_POST["sexe"])) {
            $gender = trim($_POST["sexe"]);
            if ($gender == "h" || $gender == "f")
                $okay["gender"] = true;
            else
            $okay["gender"] = false;
        }
        if (isset($_POST["prenom"])) {
            $firstname = trim($_POST["prenom"]);
            $okay["firstname"] = ctype_alpha($firstname);
        }
        if (isset($_POST["nom"])) {
            $lastname = trim($_POST["nom"]);
            $okay["lastname"] = strlen(str_replace(" ", "", $lastname)) > 1;
        }
        if (isset($_POST["naissance"]) && strlen($_POST["naissance"]) == strlen("yyyy-mm-dd")) {
            $date = $_POST["naissance"];
            list($year, $month, $day) = explode("-", $date);
            $okay["date"] = checkdate((int) $month, (int) $day, (int) $year);
        }
        if (isset($_POST["pays"])) {
            $country = trim($_POST["pays"]);
            $okay["country"] = in_array($country, $possible_countries);
        }
        $all_okay = allTrue($okay);
        if ($all_okay) {
            ?>  <h1>Vous avez rempli le formulaire correctement. Merci et au revoir!</h1>
                <p>
                    <?php
                        $collected = ucfirst(strtolower($firstname))." ";
                        $collected .= ucfirst(strtolower($lastname));
                        $collected .= ", né le ".$day."/".$month."/".$year." (";
                        $collected .= $country.")";
                        echo $collected;
                    ?>
        <?php
            exit;
        }
    }?>

<h1>Vos données</h1>

<form method="post" action="#">
<fieldset>
    <legend>Informations personnelles</legend>
	Vous êtes :
    <span class="<?php echo okayXORError($okay['gender']);?>">  
        <input type="radio" name="sexe" value="f"
            <?php 
                if (isset($_POST["sexe"]) && $_POST["sexe"] == "f")
                    echo ' checked="checked"';
            ?>
        /> une femme
        <input type="radio" name="sexe" value="h"
        <?php 
                if (isset($_POST["sexe"]) && $_POST["sexe"] == "h")
                    echo ' checked="checked"';
            ?>
        /> un homme
    </span><br />
    Nom :    
	<input 
        type="text" name="nom" required="required"
        class="<?php echo okayXORError($okay['lastname']);?>"
        value="<?php if (isset($_POST["nom"])) echo $_POST["nom"]; ?>"
    /><br />   
    Prénom : 
	<input 
        type="text" name="prenom" 
        class="<?php echo okayXORError($okay['firstname']);?>"
        value="<?php if (isset($_POST["prenom"])) echo $_POST["prenom"]; ?>"
    /><br /> 	
    Date de naissance : 
	<input 
        type="date" id="naissance" name="naissance"
        class="<?php echo okayXORError($okay['date']);?>"
        value="<?php if (isset($_POST["naissance"])) echo $_POST["naissance"]; ?>"
    /><br />
	Pays d'origine :
    <input 
        name="pays" list="pays"
        class="<?php echo okayXORError($okay['country']);?>"
        value="<?php if (isset($_POST["pays"])) echo $_POST["pays"]; ?>"
    />
	<datalist id="pays" >
        <?php 
			foreach ($possible_countries as $country) {
				echo "<option value='$country' />";
			}
		?>
	</datalist> 	
	
</fieldset>


	<br />
<input type="submit" name="submit" value="Valider" />
         
</form>

<?php 
    if (isset($_POST["submit"]) && !$all_okay) {
?>
    <p>Merci de remplir correctement les champs ci-dessous :</p>
    <ul>
        <?php
            foreach ($okay as $field => $status) {
                if (!$status)
                    echo "<li>$field</li>\n";
            }
        ?>
    </ul>
<?php
    }
?>
</body>
</html>