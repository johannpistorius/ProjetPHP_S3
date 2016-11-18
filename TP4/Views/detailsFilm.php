<?php
	$titre="Liste des films";
	ob_start();
	echo '<h1> Détails du film : </h1>';
	echo '<h2> Informations sur le film : </h2>';
	echo '<ul>';
	echo '<li> annee de tournage : '.$results['Annee'].'</li>';
	echo '<li> score du film : '.$results['Score'].'</li>';
	echo '<li> nombre de votes : '.$results['Votes'].'</li>';
	echo '</ul>';
	//vote
	if(ISSET($_SESSION["utilisateur"])){
		if($vote==NULL){
			echo '<form method="post" action="index.php?action=voter&movieid='.$_GET['movieid'].'">';
			echo '<p><input type="submit" value="Voter"></p>';
			echo '</form>';
		}
		else{
			echo '<div class="voter">';
				echo '<p class="voter">Vous avez déjà vote</p>';
				echo '</div>';
		}
		
	}
	
	echo '<h2> Casting du film : </h2>';
	
	echo '<div class="datagrid">';
		echo '<TABLE>';
			echo '<tr>';
				echo '<td> </td>';
				echo '<td>Nom</td>';
			echo '</tr>';
			foreach($casting as $ligne){
				echo '<tr>';
					echo '<td>'.$ligne['Ordinal'].'</td>';
					echo '<td>'.$ligne['Nom'].'</td>';
				echo '</tr>';
			}
		echo '</TABLE>';
	echo '</div>';
	$contenu=ob_get_clean();
	require("Views/layout.php");
?>