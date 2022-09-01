<center>

	<div class="row">
		<h1><?php echo utf8_encode($result_productById[0]['name_product']); ?></h1>
	</div>

	<br>
	
	<div class="row">
		<img alt="image" src="Model/images/<?php echo $result_productById[0]["image_product"]; ?>">
	</div>
	
	<br><br>
	
	<div class="row">
		<ul class="list-unstyled">
			<li>Description : <?php echo utf8_encode($result_productById[0]["description_product"]); ?></li>
			<br>
			<li>Prix : <?php echo $result_productById[0]["price_product"]; ?>€</li>
			<br>
			<li>Catégorie : <?php echo $result_productById[0]["name_category"]; ?></li>
			<li>
			<?php 
				if(isset($_SESSION["user"])) {
			?> 
				<br>
				<a class="btn btn-default" href="javascript:if(confirm('Etes-vous sûr(e) de vouloir ajouter <?php echo utf8_encode($result_productById[0]["name_product"]); ?> à votre panier ?'))document.location.href='index.php?ctrl=Product&action=doOrder&id=<?php echo $result_productById[0]["id_product"]; ?>'"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;Ajouter au panier</a>
			<?php
				}
				else {
			?>
				<br>
				<p>Vous devez vous <a href="index.php?ctrl=User&action=login&id=<?php echo utf8_encode($result_productById[0]["id_product"]); ?>">connecter</a> ou vous <a href="index.php?ctrl=User&action=create&id=<?php echo utf8_encode($result_productById[0]["id_product"]); ?>">inscrire</a> pour ajouter cet article à votre panier.</p>
			<?php
				}
			?>
			</li>
		</ul>
	</div>

</center>


