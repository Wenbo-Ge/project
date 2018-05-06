<?php
header("Content-Type:application/json");
/*require_once "data.php";*/

if($_REQUEST['action']=="search"&&!empty($_REQUEST['name']))
{
	$name=$_REQUEST['name'];
	try{
		$conn = new PDO("mysql:host=localhost;dbname=BarcaShop", "root", "root");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT * FROM Players where name=$name"); 
	    $stmt->execute();
	    while($row = $stmt->fetch()){
			echo $row['description']."\n";
		}
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
}else{
	echo "Please check the doucment of this API again.";
}







