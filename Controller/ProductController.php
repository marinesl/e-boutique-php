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
	

		/**
		 * Affichage de la page d'accueil
		 */
		public function home() {
			$page = "home";
			$result_newProduct = $this->product->newProduct();
			require ("View/default.php");
		}
		

		/**
		 * Affichage de la page des nouveaux produits
		 */
		public function newProduct() {
			$page = "newProduct";
			$result_newProduct = $this->product->newProduct();
			require ("View/default.php");
		}
		

		/**
		 * Affichage de la page des produits de la catégorie Ballerine
		 */
		public function Ballerine() {
			$page = "Ballerine";
			$result_productByCategory = $this->product->productByCategory("Ballerine");
			require ("View/default.php");
		}
		

		/**
		 * Affichage de la page des produits de la catégorie Basse
		 */
		public function Basse() {
			$page = "Basse";
			$result_productByCategory = $this->product->productByCategory("Basse");
			require ("View/default.php");
		}
		

		/**
		 * Affichage de la page des produits de la catégorie Haute
		 */
		public function Haute() {
			$page = "Haute";
			$result_productByCategory = $this->product->productByCategory("Haute");
			require ("View/default.php");
		}
		

		/**
		 * Affichage de la page des produits de la catégorie Original
		 */
		public function Original() {
			$page = "Original";
			$result_productByCategory = $this->product->productByCategory("Original");
			require ("View/default.php");
		}
		

		/**
		 * Affichage de la page des produits de la catégorie Swag
		 */
		public function Swag() {
			$page = "Swag";
			$result_productByCategory = $this->product->productByCategory("Swag");
			require ("View/default.php");
		}
		

		/**
		 * Affichage de la page du produit
		 */
		public function product() {
			$page = "product";
			$result_productById = $this->product->productById($_GET['id']);
			require ("View/default.php");
		}
		

		/**
		 * Affichage de la page du formulaire de contact
		 */
		public function contact() {
			$page = "contact";
			require ("View/default.php");
		}
		

		/**
		 * Affichage de la page du panier
		 */
		public function order() {
			$page = "order";
			$result_orderlines = $this->product->orderlines($_SESSION["user"]);
			require ("View/default.php");
		}
		

		/**
		 * Ajout d'un produit dans le panier
		 */
		public function doOrder() {
			$this->product->orderProduct($_SESSION["user"],$_GET['id']);
			header("Location:index.php?ctrl=Product&action=order");
		}
		

		/**
		 * Suppression d'un produit dans le panier
		 */
		public function deleteOrder() {
			$this->product->deleteOrder($_GET['id']);
			header("Location:index.php?ctrl=Product&action=order");
		}
		

		/**
		 * Rafraichissement du panier en fonction du nombre de quantité de produit
		 */
		public function refresh() {
			$this->product->refresh($_SESSION["user"],$_GET["id"],$_POST["quantity"]);
			header("Location:index.php?ctrl=Product&action=order&pro=".$_GET["id"]."&qu=".$_POST["quantity"]);
		}
	}

?>