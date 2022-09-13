<?php

	class Product {
		
		private $db;
		
		/**
		 * Connexion à la base de données
		 */
		public function __construct($pdobuilder) {
			$this->db = $pdobuilder->get_connection();
		}
		

		/**
		 * Retourne les nouveaux produits
		 */
		public function newProduct() {
			$sql = 'SELECT e_boutique_php_product.*, e_boutique_php_category.id_category, e_boutique_php_category.name_category 
					FROM e_boutique_php_product, e_boutique_php_category 
					WHERE type = "new" 
					AND e_boutique_php_product.id_category = e_boutique_php_category.id_category';

			$select = $this->db->prepare($sql);
			$select->execute();
			$count = $select->rowCount();

			return ($count === 0) ? 0 : $select->fetchAll();
		}
		

		/**
		 * Retourne les produits par id
		 * @param id identifiant du produit
		 */
		public function productById($id) {
			$sql = 'SELECT e_boutique_php_product.*, e_boutique_php_category.id_category, e_boutique_php_category.name_category 
					FROM e_boutique_php_product, e_boutique_php_category 
					WHERE id_product = ? 
					AND e_boutique_php_product.id_category = e_boutique_php_category.id_category';

			$select = $this->db->prepare($sql);
			$select->execute(array($id));
			$count = $select->rowCount();

			return ($count === 0) ? 0 : $select->fetchAll();
		}
		

		/**
		 * Retourne les produits par category
		 * @param category nom de la category
		 */
		public function productByCategory($category) {
			$sql = 'SELECT e_boutique_php_product.*, e_boutique_php_category.id_category, e_boutique_php_category.name_category 
					FROM e_boutique_php_product, e_boutique_php_category 
					WHERE name_category = ? 
					AND e_boutique_php_product.id_category = e_boutique_php_category.id_category';

			$select = $this->db->prepare($sql);
			$select->execute(array($category));
			$count = $select->rowCount();

			return ($count === 0) ? 0 : $select->fetchAll();
		}
		

		/**
		 * Retourne les commandes de l'utilisateur
		 * @param user email de l'utilisateur
		 */
		public function orderlines($user) {
			$sql = "SELECT date_order, quantity_order, name_product, price_product, id_order, total_order, description_product, e_boutique_php_product.id_product
					FROM e_boutique_php_order, e_boutique_php_user, e_boutique_php_product
					WHERE e_boutique_php_order.email_user = e_boutique_php_user.email_user
					AND e_boutique_php_user.email_user = ?
					AND e_boutique_php_order.id_product = e_boutique_php_product.id_product";

			$select = $this->db->prepare($sql);
			$select->execute(array($user));
			$count = $select->rowCount();
			
			return ($count === 0) ? 0 : $select->fetchAll();
		}
		

		/**
		 * Retourne les commandes par utilisateur et par produit
		 * @param user email de l'utilisateur
		 * @param id identifiant du produit
		 */
		public function ifOrder($user, $id) {
			$sql = 'SELECT *
					FROM e_boutique_php_order
					WHERE email_user = ?
					AND id_product = ?';

			$select = $this->db->prepare($sql);
			$select->execute(array($user, $id));
			$count = $select->rowCount();
			
			return ($count === 0) ? 0 : $select->fetchAll();
		}
		

		/**
		 * Passer une commande
		 * @param user email de l'utilisateur
		 * @param id identifiant du produit
		 */
		public function orderProduct($user,$id) {
			$ifOrder = $this->ifOrder($user, $id);
			$product = $this->productById($id);
			$total = $product[0]["price_product"];

			// Si le produit a déjà été commandé par l'utilisateur
			if ($ifOrder !== 0) {
				$sql = 'UPDATE e_boutique_php_order
						SET quantity_order = quantity_order + 1, total_order = quantity_order * ?
						WHERE email_user = ?
						AND id_product = ?';

				$update = $this->db->prepare($sql);
				$update->execute(array($total,$user,$id));

			// Si le produit n'a pas encore été commandé par l'utilisateur
			} else {
				$total *= 1;
				$sql = 'INSERT INTO e_boutique_php_order(date_order, email_user, id_product, quantity_order, total_order)
						VALUES(NOW(),?,?,?,?)';
				$insert = $this->db->prepare($sql);
				$insert->execute(array($user, $id, 1, $total));
			}
		}
		

		/**
		 * Suppression d'une commande
		 * @param id identifiant de la commande
		 */
		public function deleteOrder($id) {
			$sql = 'DELETE FROM e_boutique_php_order
					WHERE id_order = ?';

			$delete = $this->db->prepare($sql);
			$delete->execute(array($id));
		}
		

		/**
		 * Mise à jour du nombre de commande pour un produit
		 * @param user email de l'utilisateur
		 * @param id identifiant du produit
		 * @param quantity nombre de commande
		 */
		public function refresh($user, $id, $quantity) {
			$product = $this->productById($id);
			$total = $product[0]["price_product"] * $quantity;

			$sql = 'UPDATE e_boutique_php_order
					SET quantity_order = ?, total_order =  ?
					WHERE email_user = ?
					AND id_product = ?';

			$update = $this->db->prepare($sql);
			$update->execute(array($quantity,$total,$user,$id));
		}
		
	}

?>