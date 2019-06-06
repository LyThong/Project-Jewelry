<?php  
	
	@session_start();
	require_once __DIR__. "/../libraries/Database.php";
	require_once __DIR__. "/../libraries/Function.php";
	$db = new Database;

	
	define("ROOT", $_SERVER['DOCUMENT_ROOT']."/BanVang/tutphp/public/uploads/");
	
	$category = $db->fetchALL("category");
	$sqlnew="SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 3";
	$productNew=$db->fetchsql($sqlnew);
	
	$sqlPay="SELECT * FROM product WHERE 1 ORDER BY PAY DESC LIMIT 3";	
	$productPay=$db->fetchsql($sqlPay);
?>
