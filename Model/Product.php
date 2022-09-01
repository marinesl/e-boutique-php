<?php

	class Product {
		
		private $db;
		
		public function __construct($pdobuilder){
			$this->db = $pdobuilder->get_connection();
		}
		
		public function newProduct() {
			$select = $this->db->prepare('SELECT product.*, category.id_category, category.name_category 
											FROM product,category 
											WHERE type = "new" 
											AND product.id_category = category.id_category');
			$select->execute();
			$count = $select->rowCount();
			if($count === 0){
				return 0;
			}
			return $select->fetchAll();
		}
		
		public function productById($id) {
			$select = $this->db->prepare('SELECT product.*, category.id_category, category.name_category 
											FROM product,category 
											WHERE id_product = ? 
											AND product.id_category = category.id_category');
			$select->execute(array($id));
			$count = $select->rowCount();
			if($count === 0){
				return 0;
			}
			return $select->fetchAll();
		}
		
		public function productByCategory($category) {
			$select = $this->db->prepare('SELECT product.*, category.id_category, category.name_category 
											FROM product,category 
											WHERE name_category = ? 
											AND product.id_category = category.id_category');
			$select->execute(array($category));
			$count = $select->rowCount();
			if($count === 0){
				return 0;
			}
			return $select->fetchAll();
		}
		
		public function orderlines($user) {
			$select = $this->db->prepare("SELECT date_order,quantity_order,name_product,price_product,id_order,total_order,description_product,product.id_product
											FROM `order`,`user`,`product`
											WHERE `order`.email_user=`user`.email_user
											AND `user`.email_user = ?
											AND `order`.id_product=product.id_product");
			$select->execute(array($user));
			$count = $select->rowCount();
			if($count === 0){
				return 0;
			}
			return $select->fetchAll();
		}
		
		public function ifOrder($user,$id) {
			$select = $this->db->prepare('SELECT *
											FROM `order`
											WHERE email_user = ?
											AND id_product = ?');
			$select->execute(array($user,$id));
			$count = $select->rowCount();
			if($count === 0){
				return 0;
			}
			return $select->fetchAll();
		}
		
		public function orderProduct($user,$id) {
			$ifOrder = $this->ifOrder($user,$id);
			$product = $this->productById($id);
			$total = $product[0]["price_product"];
			if($ifOrder !== 0) {
				$update = $this->db->prepare('UPDATE `order`
												SET quantity_order = quantity_order + 1,
												total_order = quantity_order * ?
												WHERE email_user = ?
												AND id_product = ?');
				$update->execute(array($total,$user,$id));
			}
			else {
				$total *= 1;
				$insert = $this->db->prepare('INSERT INTO `order`(date_order,email_user,id_product,quantity_order,total_order)
												VALUES(NOW(),?,?,?,?)');
				$insert->execute(array($user,$id,1,$total));
			}
		}
		
		public function deleteOrder($id) {
			$delete = $this->db->prepare('DELETE FROM `order`
											WHERE id_order = ?');
			$delete->execute(array($id));
		}
		
		public function refresh($user,$id,$quantity) {
			$product = $this->productById($id);
			$total = $product[0]["price_product"] * $quantity;
			$update = $this->db->prepare('UPDATE `order`
											SET quantity_order = ?,
											total_order =  ?
											WHERE email_user = ?
											AND id_product = ?');
			$update->execute(array($quantity,$total,$user,$id));
		}
		
	}

?>