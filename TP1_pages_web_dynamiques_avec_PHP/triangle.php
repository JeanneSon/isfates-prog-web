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
			
			function triangle($Taille) 
			{
				$char = "*";
				if ($Taille > 20)
					echo "Triangle trop grand";
				else
					{
						if ($Taille == 0)
							$Taille = 10;
			
						for ($i=1; $i<=$Taille; $i++)
						{
							echo str_repeat($char, $i)."<br></br>\n";
						}
					}
			}
			triangle(7);
			
		?>
	</body>
</html>
	