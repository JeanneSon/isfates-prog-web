<!DOCTPYE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Triangle 5</title>
	</head>
	
	<body>
		<p>Triangle : </p>
		<?php
			if (isset($_GET["size"]))
			{
				$size=$_GET["size"];
			
				function triangle($Size) 
				{
					$counter = 0;
					$char = "*";
					if ($Size > 20)
						echo "Triangle trop grand.\n";
					else
						{
							if ($Size == 0)
								$Size = 10;
				
							for ($i=1; $i<=$Size; $i++)
							{
								echo str_repeat($char, $i)."<br></br>\n";
								$counter += $i;
							}
						}
					return ($counter);
				}
				echo "\t\t<p>Le nombre d’étoiles que comporte le triangle : ".triangle($size)."</p>\n";
			}
		?>
		<form action="./saisieTailleTriangle.php">
			<input type="submit" value="Relancer avec une autre taille." />
		</form>
	</body>
</html>
	