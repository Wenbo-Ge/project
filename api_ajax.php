<?php
		// header("Content-Type:application/json");


		if($_REQUEST['action']=="search"&&!empty($_REQUEST['jerseyNumber']))
		{
			$jerseyNumber=$_REQUEST['jerseyNumber'];
			try{
				$conn = new PDO("mysql:host=localhost;dbname=BarcaShop;charset=utf8mb4", "root", "root");

				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $conn->prepare("SELECT * FROM Players where jerseyNumber=$jerseyNumber"); 
			    $stmt->execute();
			    if($stmt->rowCount()==0){
			    	echo "No player is currently wearing this jersey, try another number!";
			    }else{
					 while($row = $stmt->fetch()){
				
				header('Access-Control-Allow-Origin:*');//加*是允许所有人来请求
				header('Content-Type:application/json; charset=UTF-8');		    	
				echo json_encode(array('content'=>$row['name']. $row['description'])) ;
											
				
												}
			   	 }
			   
			}catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
		}else{
			echo "Check API document!";
		}


		?>