<html>
<head>
<title>php test</title>
</head>

<body>
<?php
print "Hello! Mr. ".$_POST["first_name"]." ".$_POST["last_name"];
print "Registered your information!";
$db_host = "mysql:host=webapp-shiiki-mysqldbserver2.mysql.database.azure.com";
$db_name = "mysqldatabase57520";
$db_user = "mysqldbuser@webapp-shiiki-mysqldbserver2";
$db_pass = "elec2EYoh";
$db_type = "mysql";
$dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";

try {
	$pdo = new PDO($dsn,$db_user,$db__pass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	print"successed to connect<br>";
}catch(PDOException $Exception){
	die('failed to connect database : '.$Exception->getMessage());
}

try {
	$pdo->beginTransaction();
	$sql = "INSERT INTO test (last_name, first_name) VALUES ( :last_name, :first_name)";
	$stmh = $pdo->prepare($sql);
	$stmh->bindValue(':last_name',$_POST['last_name'],PDO::PARAM STR );
	$stmh->bindValue(':first_name',$_POST['first_name'],PDO::PARAM STR );
	$stmh->execute();
	$pdo->commit();
	print $stmh->rowCount()." datas are inputed.<br>";
}catch (PDOException $Exception){
	$pdo->rollBack();
	print "failed to insert new data : ".$Exception->getMessage();
}

?>

</body>
</html>
