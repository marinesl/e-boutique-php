<?php 

	class UserController {
		
		private $connect;
		private $user;

		public function __construct() {
			require "Model/Connection.php";
			require "Model/User.php";
			$this->connect = new Connection();
			$this->user = new user($this->connect);
			$this->connect->get_connection();
		}	
		

		/**
		 * Affichage de la page de connexion de l'utilisateur
		 */
		public function login() {
			$page = "login";
			require ("View/default.php");
		}
		

		/**
		 * Connexion de l'utilisateur
		 */
		public function doLogin() {
			if(isset($_POST) && isset($_POST["email_user"]) && isset($_POST["password_user"])){
				$result_user = $this->user->login($_POST["email_user"],md5($_POST["password_user"]));
				if($result_user !== 0) {
					$_SESSION['user'] = $result_user[0]['email_user'];
					if(isset($_GET["id"])) {
						header('location:index.php?ctrl=Product&action=product&id='.$_GET["id"]);
					}
					else 
						header('location:index.php?ctrl=Product&action=home');
				}
				else {
					$error = "Utilisateur non trouv� !";
					$page = "login";
					require("View/default.php");
				}
			}
		}
		

		/**
		 * Déconnexion de l'utilisateur
		 */
		public function logout(){
			unset($_SESSION["user"]);
			header('location:index.php');
		}
	

		/**
		 * Affichage de la page du formulaire de création d'un nouvel utilisateur
		 */
		public function create(){
			$page = "createaccount";
			require("View/default.php");
		}
		

		/**
		 * Création d'un nouvel utilisateur
		 */
		public function doCreate(){
			if(isset($_POST) && isset($_POST["password_user"]) && isset($_POST["email_user"]) && isset($_POST["first_name_user"]) && isset($_POST["last_name_user"]) && isset($_POST["pseudo_user"]) && isset($_POST["address_user"]) && isset($_POST["postal_code_user"]) && isset($_POST["city_user"])){
				$user["pseudo_user"] = $_POST["pseudo_user"];				
				$user["last_name_user"] = $_POST["last_name_user"];
				$user["first_name_user"] = $_POST["first_name_user"];				
				$user["password_user"] = md5($_POST["password_user"]);
				$user["address_user"] = $_POST["address_user"];
				$user["postal_code_user"] = $_POST["postal_code_user"];
				$user["city_user"] = $_POST["city_user"];
				$user["email_user"] = $_POST["email_user"];
				
				$this->user->create($user);				
			}
			header("Location:index.php?ctrl=User&action=login&id=".$_GET["id"]);
		}
		

		/**
		 * Affichage de la page du formulaire de mofication des informations de l'utilisateur
		 */
		public function edit(){
			$page = "edit";
			$result_userById = $this->user->userById($_SESSION['user']);
			require("View/default.php");
		}


		/**
		 * Modification des informations de l'utlisateur
		 */
		public function doEdit(){
			if(isset($_POST) && isset($_POST["password_user"]) && isset($_POST["email_user"]) && isset($_POST["first_name_user"]) && isset($_POST["last_name_user"]) && isset($_POST["pseudo_user"]) && isset($_POST["address_user"]) && isset($_POST["postal_code_user"]) && isset($_POST["city_user"])){
				$user["pseudo_user"] = $_POST["pseudo_user"];				
				$user["last_name_user"] = $_POST["last_name_user"];
				$user["first_name_user"] = $_POST["first_name_user"];				
				$user["password_user"] = md5($_POST["password_user"]);
				$user["address_user"] = $_POST["address_user"];
				$user["postal_code_user"] = $_POST["postal_code_user"];
				$user["city_user"] = $_POST["city_user"];
				$user["email_user"] = $_POST["email_user"];
				
				$this->user->edit($user);				
			}
			header("Location:index.php?ctrl=User&action=edit&id=ok");
		}
	}

?>