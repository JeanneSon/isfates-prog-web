<!DOCTPYE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Triangle 5</title>
	</head>
	
	<body>
		<p>Triangle de taille ?</p>
		<?php
			if (isset($_GET["taille"]))
				$taille=$_GET["taille"];
			else
				$taille = 0;
			$char = "*";
			if ($taille > 20)
				echo "Triangle trop grand";
			else
				{
					if ($taille == 0)
						$taille = 10;
		
					for ($i=1; $i<=$taille; $i++)
					{
						echo str_repeat($char, $i)."<br></br>\n";
					}
				}
		?>
	</body>
</html>
	