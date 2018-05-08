<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="style.css" rel="stylesheet" type="text/css"/>

    <title>Profile</title>
  </head>
  <body>
    


    

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
								    	
								    	?>
											<h1>Profile of <?php echo $row['name'] ?></h1>
											<div class="card col-md-3 col-sm-6 col-12">
											  <img class="card-img-top" src="<?php echo $row['url'] ?>">
											  <div class="card-body">
											  	<h5 class="card-title"><?php echo $row['name'] ?> </h5>
											    <p class="card-text"><?php echo $row['description'] ?></p>
											  </div>
											</div>
				<?php 
												}
			   	 }
			   
			}catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
		}else{
			echo "Check API document!";
		}


		?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>










