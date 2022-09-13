<div class="row">
	<div class="col-lg-push-3 col-lg-5">
		<h1>Connexion</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-push-3 col-lg-5">
		<p><font color="red">
			<?php
				if(isset($error)) {
					echo "<br>".utf8_encode($error);
					$error = "";
				}
			?>
		</font></p>
	</div>
</div>

<br>

<div class="row">
	<?php 
		if(isset($_GET["id"])) {
	?>
		<form class="form-horizontal col-lg-push-1 col-lg-8" action="index.php?ctrl=User&action=doLogin&id=<?php echo $_GET["id"]; ?>" method="post">
	<?php
		} else {
	?>
		<form class="form-horizontal col-lg-push-1 col-lg-8" action="index.php?ctrl=User&action=doLogin" method="post">
	<?php
		}
	?>
		<div class="row">
			<div class="form-group">
				<div class="row">
					<label class="col-lg-3">E-mail</label>
					<div class="col-lg-5">
						<input class="form-control" type="text" name="email_user">
					</div>
				</div>
				<div class="row">
					<label class="col-lg-3">Mot de passe</label>
					<div class="col-lg-5">
						<input class="form-control" type="password" name="password_user">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-push-6 col-lg-1">
						<button class="btn btn-primary" name="login">Connexion</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>