<?php
	$severname='localhost';
	$username='root';
	$password='';
	$db='webtech';
	try{
		$conn=new PDO("mysql:host=$severname; dbname=$db",$username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo $e->getMessage();
	}
	$conn = null;

	function overlook($info){
		$info=trim($info);
		$info=stripslashes($info);
		$info=htmlspecialchars($info);
		return $info;
	}

	function escape($html){
		return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
	}

?>