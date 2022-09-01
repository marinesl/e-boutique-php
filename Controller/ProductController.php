<?php

	class ProductController {
		
		private $connect;
		private $product;

		public function __construct() {
			require "Model/Connection.php";
			require "Model/Product.php";
			$this->connect = new Connection();
			$this->product = new product($this->connect);
			$this->connect->get_connection();
		}
	
		public function home() {
			$page = "home";
			$result_newProduct = $this->product->newProduct();
			require ("View/default.php");
		}
		
		public function newProduct() {
			$page = "newProduct";
			$result_newProduct = $this->product->newProduct();
			require ("View/default.php");
		}
		
		public function Ballerine() {
			$page = "Ballerine";
			$result_productByCategory = $this->product->productByCategory("Ballerine");
			require ("View/default.php");
		}
		
		public function Basse() {
			$page = "Basse";
			$result_productByCategory = $this->product->productByCategory("Basse");
			require ("View/default.php");
		}
		
		public function Haute() {
			$page = "Haute";
			$result_productByCategory = $this->product->productByCategory("Haute");
			require ("View/default.php");
		}
		
		public function Original() {
			$page = "Original";
			$result_productByCategory = $this->product->productByCategory("Original");
			require ("View/default.php");
		}
		
		public function Swag() {
			$page = "Swag";
			$result_productByCategory = $this->product->productByCategory("Swag");
			require ("View/default.php");
		}
		
		public function product() {
			$page = "product";
			$result_productById = $this->product->productById($_GET['id']);
			require ("View/default.php");
		}
		
		public function contact() {
			$page = "contact";
			require ("View/default.php");
		}
		
		public function order() {
			$page = "order";
			$result_orderlines = $this->product->orderlines($_SESSION["user"]);
			require ("View/default.php");
		}
		
		public function doOrder() {
			$this->product->orderProduct($_SESSION["user"],$_GET['id']);
			header("Location:index.php?ctrl=Product&action=order");
		}
		
		public function deleteOrder() {
			$this->product->deleteOrder($_GET['id']);
			header("Location:index.php?ctrl=Product&action=order");
		}
		
		public function refresh() {
			$this->product->refresh($_SESSION["user"],$_GET["id"],$_POST["quantity"]);
			header("Location:index.php?ctrl=Product&action=order&pro=".$_GET["id"]."&qu=".$_POST["quantity"]);
		}
	
	}

?>