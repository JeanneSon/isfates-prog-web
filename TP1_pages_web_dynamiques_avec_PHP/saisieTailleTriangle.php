<!DOCTPYE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Triangle 5</title>
	</head>
	
	<body>
		<p>Triangle de taille : </p>
		<form action="./triangle.php" method="get">
			<input type="number" name="size" min="1" value="
				<?php 
					if (isset($_GET["size"])) 
					{
						$size=$_GET["size"];
						echo $size;				
					} 
				?>"
			/>
			<input type="submit" value="Afficher">
		</form>
	</body>
</html>
	