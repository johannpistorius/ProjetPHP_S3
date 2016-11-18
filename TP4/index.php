<?php
	session_start();
	
	require("Model/Model.php");
	require ("Model/FilmManager.php");
	$fm=new FilmManager();
	$results=$fm->getFilms();
	$count= count($results);
	if(isset($_GET["action"])){
		if($_GET["action"]=="connexion"){
			require("Views/connexion.php");
		}
		else if($_GET["action"]=="login"){
			$P=$fm->getPass($_POST["Login"],$_POST["Pass"]);
			if($P==false){
				require("Views/connexion.php");
				echo '<p>Login ou Mot de passe incorrect</p>';
			}
			else {
				$_SESSION["utilisateur"]=$_POST["Login"];
				require("Views/films.php");
			}
		}
		else if($_GET["action"]=="deconnexion"){
			$_SESSION=array();
			session_destroy();
			require("Views/films.php");
		}
		else if($_GET["action"]=="inscription"){
			require("Views/inscription.php");
		}
		else if($_GET["action"]=="subscribe"){
			if ($_POST["Pass"]==$_POST["Pass1"] && !$fm -> getUserid($_POST['Login'])){
				$fm -> inscription($_POST["Login"],$_POST["Pass"],$_POST["Name"],$_POST["Mail"]);
				$_SESSION["utilisateur"]=$_POST["Login"];
				require("Views/films.php");
				
			}else{
				require("Views/inscription.php");
				echo '<p>Champs erronés</p>';
			}

		}
		else if($_GET["action"]=="voter"){
			$userid=$fm->getUserId($_SESSION["utilisateur"]);
			$fm->incrementVote($_GET["movieid"]);
			$fm->updateVote($_GET["movieid"],$userid);
			$results = $fm -> getFilmDetails($_GET["movieid"]);
			$casting = $fm -> getCasting($_GET["movieid"]);
			$vote=TRUE;
			require("Views/detailsFilm.php");
		}
		else if($_GET["action"]=="profile"){
			$results=$fm->getProfile($_SESSION["utilisateur"]);
			require("Views/profile.php");
		}
		else if($_GET["action"]=="modifier"){
			$results=$fm->getProfile($_SESSION["utilisateur"]);
			require("Views/modifier.php");
		}
		else if($_GET["action"]=="update"){
			if ($_POST["Pass"]==$_POST["Pass1"]){
				$userid=$fm->getUserId($_SESSION["utilisateur"]);
				$fm -> updateProfile($_POST["Login"],$_POST["Pass"],$_POST["Nom"],$_POST["Mail"],$userid);
				$results=$fm->getProfile($_SESSION["utilisateur"]);
				require("Views/profile.php");
				
			}else{
				require("Views/modifier.php");
				echo '<p>Champs erronés</p>';
			}
		}
		
		
	}
	
	else{
		if(!isset($_GET["movieid"])){
			require ("Views/films.php");
		}
		else if($results = $fm -> getFilmDetails($_GET["movieid"])){
			$casting = $fm -> getCasting($_GET["movieid"]);
			
			if(ISSET($_SESSION["utilisateur"])){
				$userid=$fm->getUserId($_SESSION["utilisateur"]);
				$vote=$fm->getVote($_GET["movieid"],$userid);
			}
			
			require("Views/detailsFilm.php");
		}
		else {
			require("Views/error.php");
		}
	}
	
?>