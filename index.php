
<?php  
 //account.php 
 session_start();  
    
    if(isset($_SESSION["user_name"])) {  
     
    }else{  
      header("location: auth.php");  
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
    <a class="nav-link active" href="index.php">მთავარი /</a>
  </li>


  <li class="nav-item">
    <a class="nav-link " href="#" style="color:orangered;"> <?php echo $_SESSION["user_name"]?>/</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="l.php">გასვლა</a>
  </li>
  <li class="nav-item">
  
  <form class="form-inline" method="POST">
  <div class="form-group mx-sm-3 mb-2">
    <input type="text" class="form-control"  placeholder="კატეგორიის დამატება" name="addcategory">
  </div>
  <button type="submit" class="btn btn-primary mb-2">კატეგორიის დამატება</button>
  </form>
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





<!-- SECTION Small INFO START -->
<div class="container" style="display:inline-flex;background:none;">
<?php foreach($ProductAllPoints as $points) : ?>
<div class="card text-white bg-primary mb-3" style="max-width: 18rem;margin-right:10px;">
  <div class="card-header"> მარაგი</div>
  <div class="card-body">
    <h5 class="card-title"><?=$points->AllProductPoints();?></h5>
    <p class="card-text">საცავში არსებული ყველა პროდუქციის რაოდენობა</p>
  </div>
</div>
<?php endforeach ?>
<?php foreach($PRODUCT_CATEGORIES as $price) : ?>
<div class="card text-white bg-success mb-3" style="max-width: 18rem;margin-right:10px;">
  <div class="card-header"> კატეგორია</div>
  <div class="card-body">
    <h5 class="card-title"><?=$price->PRODUCT_CATEGORIES();?></h5>
    <p class="card-text">პროდუქციის ყველა სახეობა</p>
  </div>
</div> 
<?php endforeach ?>
<?php foreach($ProductAllTotalPRice as $price) : ?>
<div class="card text-white bg-danger mb-3" style="max-width: 18rem;margin-right:10px;">
  <div class="card-header"> ფასი</div>
  <div class="card-body">
    <h5 class="card-title"><?=$price->product_total_price();?></h5>
    <p class="card-text">პროდუქციის მთლიანი ღირებულება (₾)</p>
  </div>
</div>
<?php endforeach ?> 
<?php foreach($PRODUCTPOINT as $pointallproduct) : ?>
<div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
  <div class="card-header">პროდუქცია</div>
  <div class="card-body">
    <h5 class="card-title"><?=$pointallproduct->allproduct();?></h5>
    <p class="card-text">პროდუქციის მთლიანი რაოდენობა (ერთეული)</p>
  </div>
</div>
<?php endforeach ?>
</div>
<!-- SECTION Small INFO FINISH -->



<!-- SECTION SEARCH AND ADD PRODUCT START -->
<div class="container" style="padding: 20px;    margin-bottom: 25px;">
       <button class="btn btn-Primary" style="float:right;background:#007bff;"><a href="addproduct.php" style="color:white;text-decoration:none">პროდუქციის დამატება</a></button>
     <form method="POST"> 
      <div class="form-row">
          <div class="col-11">
           <input type="text" class="form-control"  name="searchkey" id="table_search"
            placeholder="შეიყვანეთ პროდუქციის სახელი , კატეგორიის სახელი ან რაოდენობა" style="text-align: center;">
          </div> 
     </div> 
    </form>
</div>
<!-- SECTION SEARCH AND ADD PRODUCT FINISH -->

<!-- SECTION TABLE START -->

<table class="table table-striped  table-dark">
  <thead class="thead-dark">
    <tr>
      <th scope="col" style="font-size:14px;">#ID</th>
      <th scope="col" style="font-size:14px;">პროდუქციის. დას.</th>
      <th scope="col" style="font-size:14px;">კატეგორია</th>
      <th scope="col" style="font-size:14px;">მარაგი </th>
      <th scope="col" style="font-size:14px;">თვით. (₾)</th>
      <th scope="col" style="font-size:14px;">მთ. პროდ. ფასი (₾)</th>
      <th scope="col" style="font-size:14px;">გამ. თარიღი</th>
      <th scope="col" style="font-size:14px;">ვადა გასდის</th>
      <th scope="col" style="font-size:14px;">ატვ.დრო</th>
      <th scope="col" style="font-size:14px;">რედ.</th>
      <th scope="col" style="font-size:14px;">წაშლა</th>
   
    </tr>
  </thead>
  <tbody>

      <?php foreach($product as $listproduct) : ?>
    <tr>
      <th><?=$listproduct->product_id();?></th>
      <td><b><?=$listproduct->product_name();?></b></td>
      <td><?=$listproduct->product_cat();?></td>
      <td><?=$listproduct->product_points()  ;?> </td>
      <td><?=$listproduct->product_price()  ;?> (₾)</td>
      <td><?=$listproduct->total_price()  ;?> (₾)</td>
      <td><?=$listproduct->product_release_date()  ;?> </td>
      <td><?=$listproduct->product_expires()  ;?> </td>
      <td><?=$listproduct->product_upload_time()  ;?> </td>
      <td><a href="update.php?product_id=<?= $listproduct->product_id() ?>" class="btn btn-success" > 
          <i class="fa fa-edit" style="font-size:20px;color:white"></i> რედ. </a>
      </td>
      <td><a href="delete.php?product_id=<?= $listproduct->product_id() ?>" class="btn btn-danger" > 
          <i class="fa fa-remove" style="font-size:20px;color:white"></i> წაშლა </a>
      </td>
    </tr>
 <?php endforeach ?>
    
  </tbody>
</table>
<!-- SECTION TABLE FINISH -->
</body>
</html>

<!-- 
<script>
var myVar = setInterval(myTimer, 1000);

function myTimer() {
  var d = new Date();
  document.getElementById("demo").innerHTML = d.toLocaleTimeString();
}
</script>

 -->

<script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>



<script>
 $("#table_search").on('keyup keydown paste',function(){
 var myval = this;
 $.each($(".table-striped tbody tr"), function(){
 if($(this).text().toLowerCase().indexOf($(myval).val().toLowerCase()) === -1)
 $(this).hide(); 
 else
 $(this).show(); 
 });
 });
</script>
