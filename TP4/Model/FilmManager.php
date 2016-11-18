<?php
class FilmManager extends Model{

		public function getFilms() {
			$casa=$this -> executerRequete('SELECT MovieId, Titre, Annee, Score, Votes from Movie',array());
			return $casa->fetchAll(PDO::FETCH_ASSOC);
		}
		
		public function getCasting($movieid) {
			$casa=$this -> executerRequete('SELECT * from Casting C,Movie M, Actor A where C.MovieId=M.MovieId and C.ActorId=A.ActorId and M.MovieId=? order by C.Ordinal', array($movieid));
			return $casa->fetchAll(PDO::FETCH_ASSOC);
		}
		
		public function getFilmDetails($movieid) {
			$casa=$this -> executerRequete('SELECT * from Movie where MovieId=?', array($movieid));
			return $casa->fetch(PDO::FETCH_ASSOC);
		}
		
		public function getPass($login, $mdp){
			$casa=$this -> executerRequete('SELECT Pass from User where Login=? and Pass=?', array($login,$mdp));
			return $casa->fetch(PDO::FETCH_ASSOC);
		}
		
		public function getUserId($login) {
			$casa=$this -> executerRequete('SELECT UserId from User where Login=?', array($login));
			$res=$casa->fetch(PDO::FETCH_ASSOC);
			return $res["UserId"];
		}
		
		public function getVote($movieid, $userid){
			$casa=$this -> executerRequete('SELECT * from Vote where MovieId=? and UserId=?', array($movieid, $userid));
			return $casa->fetch(PDO::FETCH_ASSOC);
		}
		
		public function incrementVote($movieid){
			$this -> executerRequete('UPDATE Movie SET Votes=Votes+1 WHERE MovieId=?', array($movieid));
		}
		
		public function updateVote($movieid, $userid){
			$this -> executerRequete('INSERT INTO Vote VALUES(?,?)', array($movieid,$userid));
		}
		public function inscription($login, $mdp, $name, $mail){
			$this -> executerRequete('INSERT INTO User(Login,Pass,Nom,Mail) VALUES(?,?,?,?)', array($login,$mdp,$name,$mail));
		}
		
		public function getProfile($login){
			$casa=$this -> executerRequete('SELECT * from User where Login=?', array($login));
			return $casa->fetch(PDO::FETCH_ASSOC);
		}
		
		public function updateProfile($login, $mdp, $name, $mail,$userid){
			$this -> executerRequete('UPDATE User SET Login=?, Pass=?,Nom=?,Mail=? where UserID=?', array($login,$mdp,$name,$mail,$userid));
		}
	}
?>