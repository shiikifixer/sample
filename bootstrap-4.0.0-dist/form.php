<html>
<head>
<title>php test</title>
</head>

<body>
<?php
print "Hello! Mr. ".$_POST["first_name"]." ".$_POST["last_name"];
print "Registered your information!";
try {
	$pdo = new PDO('mysql:host=webapp-shiiki-mysqldbserver2.mysql.database.azure.com;dbname=mysqldatabase57520;charset=utf8','mysqldbuser@webapp-shiiki-mysqldbserver2','elec2EYoh');
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	print"successed to connect";
}catch(PDOException $Exception){
	die('failed to connect:'.$Exception->getMessage());
}

?>

</body>
</html>
