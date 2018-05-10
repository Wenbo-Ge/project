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
			    	echo json_encode(array('description'=>"No player is currently wearing this jersey, try another number!",
			    		'image'=>'https://media-public.fcbarcelona.com/20157/28952/947008/1.0/947008.png?t=1525034444000',
			    		'name'=>'Whoops....'
			    )) ;
			    }else{
					 while($row = $stmt->fetch()){
				
				header('Access-Control-Allow-Origin:*');//加*是允许所有人来请求
				header('Content-Type:application/json; charset=UTF-8');		    	
				echo json_encode(array('description'=>$row['description'],
										'image'=>$row['url'],
										'name'=>$row['name']
										)) ;
											
				
												}
			   	 }
			   
			}catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
		}else{
			echo "Check API document!";
		}


		?>