<?php

require __DIR__.'/../.env.php';

	class Connection {
		
		private $host;
		private $dbname;
		private $username;
		private $password;
		private $port;

		public function __construct() {
			$this->host = BDD_HOST;
			$this->dbname = BDD_NAME;
			$this->username = BDD_USER;
			$this->password = BDD_PASSWORD;
			$this->port = BDD_PORT;
		}
		
		// cette méthode établie une connexion à la BDD à l'aide de l'objet PDO
		// elle retourne l'identifant de la connexion (pointeur)
		public function get_connection() {
			$dsn = "mysql:$this->host;port=$this->port;dbname=$this->dbname";

			try {
				$dbh = new PDO($dsn, $this->username, $this->password);
				$dbh->exec("set character set utf8");
			} catch (PDOException $e) {
				die("Erreur! :" . $e->getMessage());
			}

			return $dbh;
		}
	}
	
?>