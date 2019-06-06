<?php  
	
	session_start();
	require_once __DIR__. "/../../libraries/Database.php";
	require_once __DIR__. "/../../libraries/Function.php";
	$db = new Database;

	if( !isset($_SESSION['id_admin']))
	{
		header("location: /BanVang/tutphp/login/");	
	}

	define("ROOT", $_SERVER['DOCUMENT_ROOT']."/BanVang/tutphp/pulic/uploads/");

	$category = $db->fetchALL("category");

	

	/**
		**Lấy danh sách sản phẩm mới
	*/

		$sqlnew="SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 3";
		$productNew=$db->fetchsql($sqlnew);
?>