<div class="row">
	<div class="col-lg-push-1 col-lg-5">
		<h1>Créer un compte</h1>
	</div>
</div>

<br>

<div class="row">
	<?php 
		if(isset($_GET["id"])) {
	?>
		<form class="form-horizontal col-lg-push-1 col-lg-8" action="index.php?ctrl=User&action=doCreate&id=<?php echo $_GET["id"]; ?>" method="post">
	<?php
		} else {
	?>
		<form class="form-horizontal col-lg-push-1 col-lg-8" action="index.php?ctrl=User&action=doCreate" method="post">
	<?php
		}
	?>
		<div class="form-group">
			<div class="row">
				<label class="col-lg-3">E-mail</label>
				<div class="col-lg-5">
					<input class="form-control" type="text" name="email_user" required>
				</div>
			</div>
			<div class="row">
				<label class="col-lg-3">Mot de passe</label>
				<div class="col-lg-5">
					<input class="form-control" type="password" name="password_user" required>
				</div>
			</div>
			<div class="row">
				<label class="col-lg-3">Prénom</label>
				<div class="col-lg-5">
					<input class="form-control" type="text" name="first_name_user">
				</div>
			</div>
			<div class="row">
				<label class="col-lg-3">Nom</label>
				<div class="col-lg-5">
					<input class="form-control" type="text" name="last_name_user">
				</div>
			</div>
			<div class="row">
				<label class="col-lg-3">Pseudo</label>
				<div class="col-lg-5">
					<input class="form-control" type="text" name="pseudo_user">
				</div>
			</div>
			<div class="row">
				<label class="col-lg-3">Adresse</label>
				<div class="col-lg-5">
					<input class="form-control" type="text" name="address_user" required>
				</div>
			</div>
			<div class="row">
				<label class="col-lg-3">Code postal</label>
				<div class="col-lg-5">
					<input class="form-control" type="text" name="postal_code_user" required>
				</div>
			</div>
			<div class="row">
				<label class="col-lg-3">Ville</label>
				<div class="col-lg-5">
					<input class="form-control" type="text" name="city_user"required>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-push-6 col-lg-1">
					<button class="btn btn-primary" name="create">Créer</button>
				</div>
			</div>
		</div>
	</form>
</div>