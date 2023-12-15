<html>
	<head>
		<title>TAVOLA PITAGORICA MANCINI-TANSELLA</title>
		<link rel="stylesheet" type="text/css"href="CSS/Stile1.css"/> 
	</head>
	<body>
	
		<h1>Tavola pitagorica Mancini - Tansella</h1>
		<table border="1" cellspacing="3" cellpadding="2">
		<?php
			$nrighe = 10;
			$ncolonne = 10;

			for ($riga=1; $riga<=$nrighe; $riga++)
			{
				echo "<tr>";
					for($colonna=1; $colonna<=$ncolonne;$colonna++ )
					{
						$valore = $riga * $colonna;
						echo "<td align=\"center\">"; echo $valore; echo "</td>";
					}
				echo "</tr>";
			}
		?>
		</table>
	</body>
</html>


