<?php  require_once ('DB/conf.php'); // ბაზასთან დაკავშირება ?>

<?php  
 //account.php 
 session_start();  
    
    if(isset($_SESSION["user_name"])) {  
     
    }else{  
      header("location: auth.php");  
    }  
 ?>


<?php

        $update_product = (int)$_GET['product_id'] ;
        $UPDATE = "SELECT * 
                   FROM product 
                   WHERE product_id = :product_id";

        $UPDATE = $PDO -> prepare($UPDATE);
        $UPDATE -> execute(['product_id' => $update_product]);
        $UPDATEDATA = $UPDATE->fetch(PDO::FETCH_OBJ);
        
        if(isset($_POST['product_name']) && isset($_POST['product_cat']) && isset($_POST['product_price']) && isset($_POST['product_points'])) {

            $product_name   = trim(htmlentities(filter_var($_POST['product_name'],FILTER_SANITIZE_STRIPPED)));
            $product_cat    = trim(htmlentities(filter_var($_POST['product_cat'],FILTER_SANITIZE_STRIPPED)));
            $product_price  = trim(htmlentities(filter_var($_POST['product_price'],FILTER_SANITIZE_STRIPPED)));
            $product_points = trim(htmlentities(filter_var($_POST['product_points'],FILTER_SANITIZE_STRIPPED)));

            //მთლიანი პროდუქციის ფასის გაგება მარაგს ემატება თვითღირებულების საფასური
            $product_total_price = $product_points * $product_price;

            $PRODUCT_UPD = "UPDATE product
                            SET  product_name = :product_name, 
                                 product_cat = :product_cat ,
                                 product_price = :product_price , 
                                 product_points = :product_points, 
                                 total_price = :total_price
                            WHERE 
                                 product_id =  :product_id";
            $PRODUCT_UPD = $PDO -> prepare($PRODUCT_UPD);

            if($PRODUCT_UPD -> execute(['product_name'   => $product_name,
                                        'product_cat'    => $product_cat,
                                        'product_price'  => $product_price,
                                        'product_points' => $product_points,
                                        'total_price'    => $product_total_price,
                                        'product_id'     => $update_product ] )) {

                $updateMsg =  'მონაცემები განახლებულია';
                header("refresh:1;index.php");
            }
        }


?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>საწყობი</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);


body {
  background: #76b852; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}

.container {
        margin: auto;
        background:white;
        margin-top: 1% ;
}




.footer{
  background:black;
  color:whitesmoke;
  padding: 49px;
  text-align: center;
  font-size:30px;
 
}


#table_search:focus{
  border:1px solid red;
  outline:none;
  box-shadow: none;
}
</style>
</head>
<body onload="startTime()">
  <?php require_once('addcategory.php'); ?>
  <?php require_once('product.php'); /*all product  code here  */?> 

<!-- SECTION Header START-->
<nav class="navbar navbar-inline navbar-expand-lg navbar-dark  bg-dark " style=" padding: 5px;">
<ul class="nav justify-content-end">

<li class="nav-item">
    <a class="nav-link active" href="index.php">მოგესალმებით /</a>
  </li>


  <li class="nav-item">
    <a class="nav-link " href="#" style="color:orangered;"> <?php echo $_SESSION["user_name"]?>/</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="l.php">გასვლა</a>
  </li>


  <li class="nav-item">
  <a class="nav-link active" href="#">
   <span style='color:white; margin-left:10px;'>
   <?php if(isset($catMSG)) { echo $catMSG; }?></span>
   <?php if(isset($CatAddsuccess)) { echo $CatAddsuccess; }?>
   <span style='color:#ffc107; margin-left:10px;'><?php if(isset($cat_checkMSG)) { echo $cat_checkMSG; }?> </span>
   </span>
   </a>
  </li>
<li class="nav-item">
  <a href="#" class="nav-link" style="color:white;" id="txt"></a>
</li>
</ul>
</nav>
<!-- SECTION Header FINISH-->
    

<div class="container">

<table class="table">
<thead class="thead-dark">
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">პროდუქციის დას.</th>
      <th scope="col">კატეგორია</th>
      <th scope="col">თვითღირ, (₾) </th>
      <th scope="col"> მარაგი</th>
      <th scope="col">მთ. პროდ. ფასი (₾)</th>
      <th scope="col"></th>
    
   
    </tr>
  </thead>
  <tbody>
  <form method="POST">
    <tr>
      <th scope="row"><?= $UPDATEDATA->product_id; ?> </th>
      <td><input type="text" name="product_name" id="" value="<?= $UPDATEDATA->product_name; ?>" class="form-control"></td>

      <td><input type="text" name="product_cat" id="" value="<?= $UPDATEDATA->product_cat; ?>" class="form-control" style="text-align:center;"></td>

      <td><input type="text" name="product_price" id="" value="<?= $UPDATEDATA->product_price; ?>" class="form-control" style="text-align:center;"></td>

      <td><input type="text" name="product_points" id="" value="<?= $UPDATEDATA->product_points; ?>" class="form-control" style="text-align:center;"></td>

    

      <td><button type="submit" class="btn btn-primary">განახლება</button></td>
        <td>      <?php if(!empty($updateMsg)): ?>
        <span  style="text-align: center; color:green; font-weight:700;">
          <?= $updateMsg; ?>
        </span>
      <?php endif; ?></td>
    </tr>
    </form>
    
  </tbody>
</table>

 </div> <!-- container -->


</body>
</html>











