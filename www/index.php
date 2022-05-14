<html>
<head>
	<title>Hello Techverito!</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<style>
	body {
		background-color: white;
		text-align: center;
		padding: 50px;
		font-family: "Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
	}

	#logo {
		margin-bottom: 40px;
	}
	</style>
</head>
<body>
<?php
	// echo "<pre>";
	// var_dump($_ENV);
	// echo "</pre>";
?>
	<img id="logo" src="logo.png" />
	<h1><?php echo "Hello ".($_ENV["NAME"]?$_ENV["NAME"]:"TechVerito")."!"; ?></h1>
	<?php if($_ENV["HOSTNAME"]) {?><h3>My hostname is <?php echo $_ENV["HOSTNAME"]; ?></h3><?php } ?>
	<?php
	$links = [];
	foreach($_ENV as $key => $value) {
		if(preg_match("/^(.*)_PORT_([0-9]*)_(TCP|UDP)$/", $key, $matches)) {
			$links[] = [
				"name" => $matches[1],
				"port" => $matches[2],
				"proto" => $matches[3],
				"value" => $value
			];
		}
	}
	if($links) {
	?>
		<h3>Links found</h3>
		<?php
		foreach($links as $link) {
			?>
			<b><?php echo $link["name"]; ?></b> listening in <?php echo $link["port"]+"/"+$link["proto"]; ?> available at <?php echo $link["value"]; ?><br />
			<?php
		}
		?>
	<?php
	}

	if($_ENV["TechVerito_AUTH"]) {
		?>
		<h3>I have TechVerito API powers!</h3>
		<?php
	}
	?>
</body>
</html>
