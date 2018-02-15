<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PHP+MySQL test</title>
		<!-- import Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="form-validation.css" rel="stylesheet">
		<!-- import jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- import Bootstrap -->
		<script src="js/bootstrap.min.js"></script>
	</head>

	<body class="bg-light">
    <div class="col-md-8 ordere-md-1">
		<h2> Hello! Mr. <?=$_POST["first_name"];?> <?=$_POST["last_name"];?> <br> </h2>
		</div>

	<?php

	$db_host = "webapp-shiiki-mysqldbserver2.mysql.database.azure.com";
	$db_name = "mysqldatabase57520";
	$db_user = "mysqldbuser@webapp-shiiki-mysqldbserver2";
	$db_pass = "elec2EYoh";
	$db_type = "mysql";
	$dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";

	try {
		$pdo = new PDO($dsn,$db_user,$db_pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		print"successed to connect<br>";
	}catch(PDOException $Exception){
		die();
	?>
		<div class="col-md-8 ordere-md-1">
		<h2> failed to connect database : <br> </h2>
		</div>
	<?php
	}

	try {
		$pdo->beginTransaction();
		$sql = "INSERT INTO test (last_name, first_name) VALUES ( :last_name, :first_name)";
		$stmh = $pdo->prepare($sql);
		$stmh->bindValue(':last_name',$_POST['last_name'],PDO::PARAM_STR );
		$stmh->bindValue(':first_name',$_POST['first_name'],PDO::PARAM_STR );
		$stmh->execute();
		$pdo->commit();
		print $stmh->rowCount()." datas are inserted.<br>";
	}catch (PDOException $Exception){
		$pdo->rollBack();
		print "failed to insert new data : ".$Exception->getMessage();
	}

	?>

	</body>
</html>
