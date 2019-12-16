<?php
	session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Votre panier</title>
	</head>
	<body>

		<form method="post" action="index.php?action=panier">
			<table style="width: 400px">
				<tr>
					<td colspan="4">Votre panier</td>
				</tr>
				<tr>
					<td>Libellé</td>
					<td>Quantité</td>
					<td>Prix Unitaire</td>
					<td>Action</td>
				</tr>


	<?php
		require "./controlerOTD/Cpanier.php";
		if (creationPanier())
		{
			$nbArticles=count($_SESSION['numpa']['nomprod']);
			if ($nbArticles <= 0)
				echo "<tr><td>Votre panier est vide </ td></tr>";
		else
		{
			for ($i=0 ;$i < $nbArticles ; $i++)
			{
				echo "<tr>";
				echo "<td>".htmlspecialchars($_SESSION['numpa']['nomprod'][$i])."</ td>";
				echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['numpa']['qteProduit'][$i])."\"/></td>";
				echo "<td>".htmlspecialchars($_SESSION['numpa']['prix'][$i])."</td>";
				echo "<td><a href=\"".htmlspecialchars("actOTD.php?action=panier&l=".rawurlencode($_SESSION['numpa']['nomprod'][$i]))."\">XX</a></td>";
				echo "</tr>";
			}

			echo "<tr><td colspan=\"2\"> </td>";
			echo "<td colspan=\"2\">";
			echo "Total : ".MontantGlobal();
			echo "</td></tr>";

			echo "<tr><td colspan=\"4\">";
			echo "<input type=\"submit\" value=\"Rafraichir\"/>";
			echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

			echo "</td></tr>";
		}
		}
	?>
			</table>
		</form>
	</body>
</html>