<?php
	$titre="Liste des films";
	ob_start();
	echo '<h1>'.$titre.'</h1>';
	echo $count.' film(s) trouvé(s) dans la base de données';
	echo '<div class="datagrid">';
		echo '<TABLE>';
			echo '<tr>';
				echo '<th> Titre </th>';
				echo '<th> Annee </th>';
				echo '<th> Score </th>';
				echo '<th> Votes </th>';
				echo '<th>  </th>';
			echo '</tr>';
			foreach($results as $ligne){
				echo '<tr>';
					echo '<td>'.$ligne['Titre'].'</td>';
					echo '<td>'.$ligne['Annee'].'</td>';
					echo '<td>'.$ligne['Score'].'</td>';
					echo '<td>'.$ligne['Votes'].'</td>';
					echo '<td> <a href="index.php?movieid='.$ligne['MovieId'].'">details</a></td>';
				echo '</tr>';
			}
		echo '</TABLE>';
	echo '</div>';
	$contenu=ob_get_clean();
	require("Views/layout.php");
?>