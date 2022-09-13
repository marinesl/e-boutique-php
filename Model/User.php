<?php
	class User {

		private $db;
		
		/**
		 * Connexion à la base de données
		 */
		public function __construct($pdobuilder){
			$this->db = $pdobuilder->get_connection();
		}
		

		/**
		 * Connexion de l'utilisateur
		 * @param email email de l'utilisateur
		 * @param password mot de passe de l'utilisateur
		 */
		public function login($email, $password) {
			$sql = 'SELECT *
					FROM e_boutique_php_user
					WHERE email_user = ?
					AND password_user = ?';

			$select = $this->db->prepare($sql);
			$select->execute(array($email, $password));
			$count = $select->rowCount();
			
			return ($count === 0) ? 0 : $select->fetchAll();
		}
		

		/**
		 * Création d'un utilisateur
		 * @param user tableau des informations de l'utilisateur
		 */
		public function create($user) {
			$sql = 'INSERT INTO e_boutique_php_user (pseudo_user, last_name_user, first_name_user, password_user, address_user, postal_code_user, city_user, email_user)
					VALUES(?,?,?,?,?,?,?,?)';

			$insert = $this->db->prepare($sql);
			$insert->execute(array($user["pseudo_user"],$user["last_name_user"],$user["first_name_user"],$user["password_user"],$user["address_user"],$user["postal_code_user"],$user["city_user"],$user["email_user"]));	
		}
		

		/**
		 * Retourne les utilisateurs par identifiant
		 * @param id identifiant de l'utilisateur
		 */
		public function userById($id) {
			$sql = 'SELECT *
					FROM e_boutique_php_user
					WHERE email_user = ?';

			$select = $this->db->prepare($sql);
			$select->execute(array($id));
			$count = $select->rowCount();
			
			return ($count === 0) ? 0 : $select->fetchAll();
		}
		

		/**
		 * Modification des informations de l'utilisateur
		 * @param user tableau des informations de l'utilisateur
		 */
		public function edit($user) {
			$sql = 'UPDATE e_boutique_php_user
					SET pseudo_user = ?, last_name_user = ?, first_name_user = ?, password_user = ?, address_user = ?, postal_code_user = ?, city_user = ?, email_user = ?
					WHERE email_user = ?';

			$update = $this->db->prepare($sql);
			$update->execute(array($user["pseudo_user"],$user["last_name_user"],$user["first_name_user"],$user["password_user"],$user["address_user"],$user["postal_code_user"],$user["city_user"],$user["email_user"],$user["email_user"]));	
		}
	}

?>