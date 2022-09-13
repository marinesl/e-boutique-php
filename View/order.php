<div class="row">
	<div class="col-lg-5">
		<h1>Mon panier</h1>
	</div>
</div>

<?php
	if($result_orderlines !== 0) {
?>
	<div class="row">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Date</th>
					<th>Nom</th>
					<th>Prix</th>
					<th>Quantité</th>
					<th>Actualiser</th>
					<th>Prix total</th>
					<th>Supprimer</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$total = 0;
					for($i = 0 ; $i < count($result_orderlines); $i++) {
						$total += $result_orderlines[$i]["total_order"];
				?>
					<tr>
						<td width="40%"><?php echo $result_orderlines[$i]["date_order"]; ?></td>
						<td width="60%"><?php echo utf8_encode($result_orderlines[$i]["name_product"]); ?><br><?php echo utf8_encode($result_orderlines[$i]["description_product"]); ?></td>
						<td><?php echo $result_orderlines[$i]["price_product"]; ?>€</td>
						<form class="form-horizontal" action="index.php?ctrl=Product&action=refresh&id=<?php echo $result_orderlines[$i]["id_product"]; ?>" method="post">
							<td><input type="number" name="quantity" value="<?php echo $result_orderlines[$i]["quantity_order"]; ?>"></td>
							<td width="10%"><button type="submit"><i class="fa-solid fa-check"></i></button></td>
						</form>						
						<td width=""><center><?php echo $result_orderlines[$i]["total_order"]; ?>€</center></td>
						<td><a href="javascript:if(confirm('Etes-vous sûr(e) de vouloir supprimer <?php echo utf8_encode($result_orderlines[$i]["name_product"]); ?> de votre panier ?'))document.location.href='index.php?ctrl=Product&action=deleteOrder&id=<?php echo $result_orderlines[$i]["id_order"]; ?>'"><i class="fa-solid fa-trash"></i></a></td>
					</tr>
				<?php 
					} 
				?>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>Total de la commande</td>
					<td></td>
					<td><?php echo $total; ?>€</td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="row">
		<div class="col-lg-push-9 col-lg-2">
			<a class="btn btn-primary" href="javascript:if(confirm('Voulez-vous confirmer votre commande ?'))document.location.href='index.php?ctrl=Product&action=order'">Confirmer la commande</a>
		</div>
	</div>
	<br>
<?php
	}
	else {
?>
	<div class="row">
		<p>Votre panier est vide.</p>
	</div>
<?php
	}
?>