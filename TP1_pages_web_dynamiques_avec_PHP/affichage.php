<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Affichage</title>
		<meta charset="utf-8"/>
	</head>
	
	<body>
		<?php 
			echo "<p>Mes premières pas en PHP</p>\n\t\t<p>Vive le PHP !</p>\n";
			$promo = 2014;
			echo "\t\t$promo\n";
			echo "\t\t<p>Je fais partie de la promo $promo</p>\n";
			echo "\t\t<center><p><b>Université de Lorraine</b></p></center>\n";
		?>
	</body>
</html>

<!-- à améliorer :
	Mettre toutes les parties du code qui sont statiques dans le code HTML directement


<body>
	<p>Mes premières pas en PHP</p>
	<?php $promo = 2014; ?>
	<p>Je fais partie de la promo <?php echo $promo ?></p>
	<p style="text-align: center"><strong>Université de Lorraine</strong></p>
</body>
-->