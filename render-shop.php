<?php
require_once('database-shop.php');
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>SHOP</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style type="text/css">
    	.card-text{
    		text-align: center;
    		color:blue;
    		font-weight: bold;
    	}
    	.card-title{
    		font-weight: bold;
        text-align: center;
    	}
    	

    </style>
  </head>
  <body>
    <h1 style="color: blue;text-align: center">FC Barcelona Store</h1>

<div class="container">
  <div class="row">
<?php
  $db=new DBConnection();
  $result=$db->getAllItemsReturnObj();
    foreach ($result as $value) {
?>
        <div class="col">
            <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?php echo $value->getImg_url(); ?>" alt="Card image cap">
            <div class="card-body">
              <p class="card-title"><?php
                  echo $value->getType();
                  ?></p>
              <p class="card-text"><?php
                  echo $value->getPrice();
                  ?></p>
              <div class="text-right">
              
                <button class="btn btn-success" onclick="addPrice('<?php echo $value->getPrice();?>')">Purchase</button>

              </div>
              
            <div class="text-left" style="overflow: scroll; height: 20vh; display: none;">
              <?php echo $value->getDescription(); ?>
            </div>
            </div>
            </div>
        </div>

        
<?php
}
?>
  </div>
</div>



<div style="background-color: #ddd; position:fixed; right: 2rem; bottom: 3rem; padding: 1rem 2.5rem; border-radius: 1rem">
          Total: <span class="TotalPrice">0</span>
</div>
<button class="btn btn-primary submit" style="position:fixed; right: 2rem; bottom: 0.5rem; border-radius: 1rem" onclick="submitTotal()">Submit</button>

<script type="text/javascript">
// 什么时候用$(document).ready(function(){})?????


  // 定义了price
  function addPrice(price){
    // 用console来测试
    // 这里使用了price
    // console.log(price);
    // text抓取数据，html可以加东西，val用在input里
    // .html('<h1>ni hao</h>');
    var current_price=$('.TotalPrice').text();
    // parseInt将字符变成整数，
    // parseFloat将字符变成数。
    $('.TotalPrice').text((parseFloat(current_price)+parseFloat(price)).toFixed(2));
  }

  function submitTotal(){
    var submit=$('.TotalPrice').text();
    console.log(submit);
    $.ajax({
      url:'ajax.php',
      type:'POST',
      data:{submitInfo:submit},
      dataType:'json',
      success: function(data){
        alert(data.res);
      }
    })
  }
 


  

 

  


</script>
	




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>