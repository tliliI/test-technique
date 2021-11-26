<?php 
	class ListeManager {

			public function getListe()
			{
				$db = $this->dbConnect();
				$req = $db->prepare('SELECT id_liste , titre, idSliste  FROM liste WHERE idSliste  is NULL');
				$req->execute();
				$data=$req->fetchAll(PDO::FETCH_ASSOC);
				return $data;
				
			}
			
			
			public function getSListe($idListe)
			{
				$db = $this->dbConnect();
				$req = $db->prepare('SELECT id_liste , titre  FROM liste WHERE idSliste = ?');
				$req->execute(array($idListe));
				$data=$req->fetchAll(PDO::FETCH_ASSOC);
				return $data;
				
			}

			//public function postList($userId, $titre, $listId)
			public function postList($titre)
			{
				$db = $this->dbConnect();
				$listes = $db->prepare('INSERT INTO liste(titre) VALUES(?)');
				$todo = $listes->execute(array($titre));
			
			}
			
			public function postSList($Stitre ,$idliste)
			{
				$db = $this->dbConnect();
				$listes = $db->prepare('INSERT INTO liste(titre,idSliste) VALUES (?,?)');
				$todo = $listes->execute(array($Stitre,$idliste));
			}
			
			public function deleteListe( $idListe)
			{
				$db = $this->dbConnect();
				//$listes = $db->prepare('DELETE * FROM liste l , user u  WHERE id_liste = ? and l.id_liste = u.id_liste');
				$listes = $db->prepare('DELETE  FROM liste WHERE id_liste = ?');
				$listes->execute(array($idListe));

				return $listes;
			}

			private function dbConnect()
			{
				$db = new PDO('mysql:host=localhost;dbname=todo;charset=utf8', 'root', '');
				return $db;
			}

		
	}
?>