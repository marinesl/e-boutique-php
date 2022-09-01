<?php
	class User {

		private $db;
		
		public function __construct($pdobuilder){
			$this->db = $pdobuilder->get_connection();
		}
		
		public function login($email,$password){
			$select = $this->db->prepare('SELECT *
										   FROM user
										   WHERE email_user = ?
										   AND password_user = ?');
			$select->execute(array($email,$password));
			$count = $select->rowCount();
			if($count === 0){
				return 0;
			}
			return $select->fetchAll();
		}
		
		public function create($user) {
			$insert = $this->db->prepare('INSERT INTO user (pseudo_user,last_name_user,first_name_user,password_user,address_user,postal_code_user,city_user,email_user)
											VALUES(?,?,?,?,?,?,?,?)');
			$insert->execute(array($user["pseudo_user"],$user["last_name_user"],$user["first_name_user"],$user["password_user"],$user["address_user"],$user["postal_code_user"],$user["city_user"],$user["email_user"]));	
		}
		
		public function userById($id){
			$select = $this->db->prepare('SELECT *
										   FROM user
										   WHERE email_user = ?');
			$select->execute(array($id));
			$count = $select->rowCount();
			if($count === 0){
				return 0;
			}
			return $select->fetchAll();
		}
		
		public function edit($user) {
			$update = $this->db->prepare('UPDATE user
											SET pseudo_user = ?,
												last_name_user = ?,
												first_name_user = ?,
												password_user = ?,
												address_user = ?,
												postal_code_user = ?,
												city_user = ?,
												email_user = ?
											WHERE email_user = ?');
			$update->execute(array($user["pseudo_user"],$user["last_name_user"],$user["first_name_user"],$user["password_user"],$user["address_user"],$user["postal_code_user"],$user["city_user"],$user["email_user"],$user["email_user"]));	
		}
	}

?>