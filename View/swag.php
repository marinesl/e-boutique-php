<center>
	<h1>Swag</h1>
	<br>
</center>



<?php
	if($result_productByCategory !== 0) {
		for($i = 0 ; $i < count($result_productByCategory) ; $i++) {
?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title"><?php echo utf8_encode($result_productByCategory[$i]["name_product"]); ?></h1>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-3">
							<ul class="list-unstyled">
								<li><a href="index.php?ctrl=Product&action=product&id=<?php echo $result_productByCategory[$i]["id_product"]; ?>"><img width="170" height="150" alt="image" src="Model/images/<?php echo $result_productByCategory[$i]["image_product"]; ?>"></a></li>
							</ul>
						</div>
						<div class="col-lg-6">
							<br><br>
							<ul class="list-unstyled">
								<li>Description : <?php echo utf8_encode($result_productByCategory[$i]["description_product"]); ?></li>
								<li>Prix : <?php echo $result_productByCategory[$i]["price_product"]; ?>€</li>
								<li>Catégorie : <?php echo $result_productByCategory[$i]["name_category"]; ?></li>
							</ul>
						</div>
						<div class="col-lg-2">
							<?php 
								if(isset($_SESSION["user"])) {
							?> 
								<br><br><br>
								<a class="btn btn-default" href="javascript:if(confirm('Etes-vous sûr(e) de vouloir ajouter <?php echo utf8_encode($result_productByCategory[$i]["name_product"]); ?> à votre panier ?'))document.location.href='index.php?ctrl=Product&action=doOrder&id=<?php echo $result_productByCategory[$i]["id_product"]; ?>'"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;Ajouter au panier</a>
							<?php
								}
								else {
							?>
								<br>
								<p>Vous devez vous <a href="index.php?ctrl=User&action=login&id=<?php echo utf8_encode($result_productByCategory[$i]["id_product"]); ?>">connecter</a> ou vous <a href="index.php?ctrl=User&action=create&id=<?php echo utf8_encode($result_productByCategory[$i]["id_product"]); ?>">inscrire</a> pour ajouter cet article à votre panier.</p>
							<?php
								}
							?>
						</div>
					</div>
				</div>
			</div>
			
<?php
		}
	}
?>