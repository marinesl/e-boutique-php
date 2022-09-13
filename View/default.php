<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>E-boutique PHP</title>

	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="View/bootstrap/css/bootstrap.min.css">

	<!-- FONTAWESOME -->
	<link href="View/fontawesome/css/fontawesome.css" rel="stylesheet">
	<link href="View/fontawesome/css/brands.css" rel="stylesheet">
	<link href="View/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>

	<div class="container">
		<?php require("header.php"); ?>
		
		<div class="content">
			<div class="row">
				<div class="col-lg-3">
					<?php require("sidebar.php"); ?>
				</div>
				<div class="col-lg-9">
					<?php
						if (isset($page))
							require("./View/".$page.".php");
					?>
				</div>
			</div>
		</div>
		
		<?php require("footer.php"); ?>
		
	</div>

	<script src="View/bootstrap/js/jquery-3.6.1.min.js"></script>
	<script src="View/bootstrap/js/bootstrap.min.js"></script>
	
</body>

</html>