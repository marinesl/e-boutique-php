<div class="row">
	<div class="col-lg-push-3 col-lg-5">
		<h1>Mon compte</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-push-3 col-lg-5">
		<p><font color="red">
			<?php
				if(isset($_GET["id"])) {
					if($_GET["id"] == "ok") {
						echo "<br>Les modifications ont été enregistrées !";
						$error = "";
					}
				}
			?>
		</font></p>
	</div>
</div>

<br>

<div class="row">
	<form class="form-horizontal col-lg-push-1 col-lg-8" action="index.php?ctrl=User&action=doEdit" method="post">
		<div class="form-group">
			<div class="row">
				<label class="col-lg-4">E-mail</label>
				<div class="col-lg-5">
					<input class="form-control" type="text" name="email_user" value="<?php echo $result_userById[0]["email_user"]; ?>" required>
				</div>
			</div>
			<div class="row">
				<label class="col-lg-4">Nouveau mot de passe</label>
				<div class="col-lg-5">
					<input class="form-control" type="password" name="password_user" required>
				</div>
			</div>
			<div class="row">
				<label class="col-lg-4">Prénom</label>
				<div class="col-lg-5">
					<input class="form-control" type="text" name="first_name_user" value="<?php echo $result_userById[0]["first_name_user"]; ?>">
				</div>
			</div>
			<div class="row">
				<label class="col-lg-4">Nom</label>
				<div class="col-lg-5">
					<input class="form-control" type="text" name="last_name_user" value="<?php echo $result_userById[0]["last_name_user"]; ?>">
				</div>
			</div>
			<div class="row">
				<label class="col-lg-4">Pseudo</label>
				<div class="col-lg-5">
					<input class="form-control" type="text" name="pseudo_user" value="<?php echo $result_userById[0]["pseudo_user"]; ?>">
				</div>
			</div>
			<div class="row">
				<label class="col-lg-4">Adresse</label>
				<div class="col-lg-5">
					<input class="form-control" type="text" name="address_user" value="<?php echo $result_userById[0]["address_user"]; ?>" required>
				</div>
			</div>
			<div class="row">
				<label class="col-lg-4">Code postal</label>
				<div class="col-lg-5">
					<input class="form-control" type="text" name="postal_code_user" value="<?php echo $result_userById[0]["postal_code_user"]; ?>" required>
				</div>
			</div>
			<div class="row">
				<label class="col-lg-4">Ville</label>
				<div class="col-lg-5">
					<input class="form-control" type="text" name="city_user" value="<?php echo $result_userById[0]["city_user"]; ?>" required>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-push-6 col-lg-1">
					<button class="btn btn-primary" name="edit">Modifier</button>
				</div>
			</div>
		</div>
	</form>
</div>