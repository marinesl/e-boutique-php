<header>

	<div class="row">
		<nav class="navbar navbar-default">
			<div class="row">
				<br>
				<div class="navbar-header">
					<p class="navbar-brand">
						<div class="col-lg-2">
							<img width="90" height="90" src="Model/images/logo.jpe" alt="logo">
						</div>
						<div class="col-lg-push-1 col-lg-9">
							<h1>Shop Converse</h1>
						</div>
					</p>
				</div>
			</div>
			
			<ul class="nav navbar-nav">
				<li><a href="index.php?ctrl=Product&action=home">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accueil</a></li>
				<li><a href="index.php?ctrl=Product&action=newProduct">Nouveautés</a></li>
				<li><a href="index.php?ctrl=Product&action=contact">Contactez-nous</a></li>
				<?php 
					if(isset($_SESSION["user"])) {
				?>
					<li><a href="index.php?ctrl=User&action=edit">Mon compte</a></li>
					<li><a href="index.php?ctrl=Product&action=order">Mon panier</a></li>
					<li><a href='index.php?ctrl=User&action=logout'>Déconnexion</a></li>
				<?php
					}
					else {
				?>
					<li><a href='index.php?ctrl=User&action=login'>Connexion</a></li>
					<li><a href='index.php?ctrl=User&action=create'>S'inscrire</a></li>
				<?php
					}
				?>
				
			</ul>
			
		</nav>
	</div>
	
</header>