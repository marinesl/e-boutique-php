<!DOCTYPE>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="View/bootstrap/css/bootstrap.min.css">
	<title>E-boutique</title>
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
						if(isset($page))
							require("./View/".$page.".php");
					?>
				</div>
			</div>
		</div>
		
		<?php require("footer.php"); ?>
		
	</div>
	
</body>

</html>