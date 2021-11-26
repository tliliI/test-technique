<?php
	class Liste {
		private $_idListe;
		private $_titre;
		private $_idSliste;
		private $_idUser;
				
		public function setIdL($idList)
		{
			$this->_idListe = (int) $idList;
		}
				
		public function setTitre($titre)
		{
			$this->_titre = $titre;
		}
		
		public function setIdSL($idSList)
		{
			$this->_idSListe = (int) $idSList;
		}
		
		public function setIdUser($idUser)
		{
			$this->_idUser = (int) $idUser;
		}
		
		public function getIdL()
		{
			return $this->idListe;
		}
				
		public function getTitre()
		{
			return $this->titre;
		}
		
		public function getIdSL()
		{
			return $this->idSListe;
		}
		
		public function getIdUser()
		{
			return $this->idUser;
		}
	}	


?>