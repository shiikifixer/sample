<html>
	<head>
		<meta http-equiv="Content-Type" contet="text/html;charset=UTF-8"/>
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
			<h3> Hello! Mr. <?=$_POST["first_name"];?> <?=$_POST["last_name"];?> <br> </h3>
			<h3> Bilingual Resource <?=$_POST["bilingual_resource"]?> <br> </h3>		
		</div>

	<?php
	$db_host = "webapp-shiiki-mysqldbserver2.mysql.database.azure.com";
	$db_name = "mysqldatabase57520";
	$db_user = "mysqldbuser@webapp-shiiki-mysqldbserver2";
	$db_pass = "elec2EYoh";
	$db_type = "mysql";
	$dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";;
 
	try {
		$pdo = new PDO($dsn,$db_user,$db_pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		print"successed to connect<br>";
	}catch(PDOException $Exception){
		die('failed to connect database : '.$Exception->getMessage());
	}

	try {
		$pdo->beginTransaction();
		$sql = "INSERT INTO manpowerform (last_name, first_name, email, fixer_project, fixer_department, client_company, client_point, client_contact, project_title, project_description, project_scope, bilingual_resource, project_kickoff, project_deadline, flexible_deadline, html, react, angular, jquery, bootstrap, sass, json, ajax, other_frontend, frontend_technologies, cloud_platform) VALUES ( :last_name, :first_name, :email, :fixer_project, :fixer_department, :client_company, :client_point, :client_contact, :project_title, :project_description, :project_scope, :bilingual_resource, :project_kickoff, :project_deadline, :flexible_deadline, :html, :react, :angular, :jquery, :bootstrap, :sass, :json, :ajax, :other_frontend, :frontend_technologies, :cloud_platform)";
		$stmh = $pdo->prepare($sql);
		$stmh->bindValue(':last_name',$_POST['last_name'],PDO::PARAM_STR );
		$stmh->bindValue(':first_name',$_POST['first_name'],PDO::PARAM_STR );
		$stmh->bindValue(':email',$_POST['email'],PDO::PARAM_STR );
		$stmh->bindValue(':fixer_project',$_POST['fixer_project'],PDO::PARAM_STR );
		$stmh->bindValue(':fixer_department',$_POST['fixer_department'],PDO::PARAM_STR );
		$stmh->bindValue(':client_company',$_POST['client_company'],PDO::PARAM_STR );
		$stmh->bindValue(':client_point',$_POST['client_point'],PDO::PARAM_STR );
		$stmh->bindValue(':client_contact',$_POST['client_contact'],PDO::PARAM_STR );
		$stmh->bindValue(':project_title',$_POST['project_title'],PDO::PARAM_STR );
		$stmh->bindValue(':project_description',$_POST['project_description'],PDO::PARAM_STR );
		$stmh->bindValue(':project_scope',$_POST['project_scope'],PDO::PARAM_STR );
		$stmh->bindValue(':bilingual_resource',$_POST['bilingual_resource'],PDO::PARAM_STR );
		$stmh->bindValue(':project_kickoff',$_POST['project_kickoff'],PDO::PARAM_STR );
		$stmh->bindValue(':project_deadline',$_POST['project_deadline'],PDO::PARAM_STR );
		$stmh->bindValue(':flexible_deadline',$_POST['flexible_deadline'],PDO::PARAM_STR );
		$stmh->bindValue(':html',$_POST['html'],PDO::PARAM_STR );
		$stmh->bindValue(':react',$_POST['react'],PDO::PARAM_STR );
		$stmh->bindValue(':angular',$_POST['angular'],PDO::PARAM_STR );
		$stmh->bindValue(':jquery',$_POST['jquery'],PDO::PARAM_STR );
		$stmh->bindValue(':bootstrap',$_POST['bootstrap'],PDO::PARAM_STR );
		$stmh->bindValue(':sass',$_POST['sass'],PDO::PARAM_STR );
		$stmh->bindValue(':json',$_POST['json'],PDO::PARAM_STR );
		$stmh->bindValue(':ajax',$_POST['ajax'],PDO::PARAM_STR );
		$stmh->bindValue(':other_frontend',$_POST['other_frontend'],PDO::PARAM_STR );
		$stmh->bindValue(':frontend_technologies',$_POST['frontend_technologies'],PDO::PARAM_STR );
		$stmh->bindValue(':cloud_platform',$_POST['cloud_platform'],PDO::PARAM_STR );
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
