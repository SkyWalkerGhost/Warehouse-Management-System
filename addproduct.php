<?php  
 //account.php 
 session_start();  
    
    if(isset($_SESSION["user_name"])) {  
     
    }else{  
      header("location: auth.php");  
    }  
 ?>


<?php  require_once ('DB/conf.php'); // ბაზასთან დაკავშირება ?>


<?php 

  if($_SERVER['REQUEST_METHOD'] === 'POST') {

      if(isset($_POST['product_name'])   && isset($_POST['product_cat']) && 
         isset($_POST['product_points']) && isset($_POST['product_price'])  && isset($_POST['product_release_date'])  && isset($_POST['product_expires']) ) {

          $product_name           = trim(htmlentities(filter_var($_POST['product_name'],FILTER_SANITIZE_STRIPPED)));
          $product_cat            = trim(htmlentities(filter_var($_POST['product_cat'],FILTER_SANITIZE_STRIPPED)));
          $product_points         = trim(htmlentities(filter_var($_POST['product_points'],FILTER_SANITIZE_STRIPPED)));
          $product_price          = trim(htmlentities(filter_var($_POST['product_price'],FILTER_SANITIZE_STRIPPED)));
          $product_release_date   = trim(htmlentities(filter_var($_POST['product_release_date'],FILTER_SANITIZE_STRIPPED)));
          $product_expires        = trim(htmlentities(filter_var($_POST['product_expires'],FILTER_SANITIZE_STRIPPED)));
          $product_total_price = $product_points * $product_price;
        
        

          if(empty($product_name)) {
            $n = '<span style="background:none;color:red;padding:5px;">პროდუქციის სახელი მითითებული არაა</span>';
          }else if (empty($product_points)) {
            $p = '<span style="background:none;color:red;padding:5px;">რაოდენობა მითითებული არაა</span>';
          }else if (empty($product_price)) {
            $pr = '<span style="background:none;color:red;padding:5px;">ფასი მითითებული არაა</span>';
          }

         //get date and time
          date_default_timezone_set("Asia/Tbilisi");
          $Time = date("H:i:s A");
          $Date = date("D-d-M-Y");
          $DateTime = $Date. ' '. $Time;
       
          if(strlen($product_name) !=0  && strlen($product_points) !=0  && strlen($product_price) !=0 ) {

            $productADD = "INSERT INTO product(product_name,
                                               product_cat,
                                               product_points,
                                               product_price,
                                               total_price,
                                               product_release_date,
                                               product_expires, 
                                               product_upload_time)
                                      VALUES (:fproduct_name, 
                                              :fproduct_cat, 
                                              :fproduct_points, 
                                              :fproduct_price, 
                                              :ftotal_price, 
                                              :fproduct_release_date, 
                                              :fproduct_expires,
                                              :fproduct_upload_time)";

            $productADD = $PDO -> prepare($productADD);

            $productADD -> bindParam('fproduct_name'         , $product_name);
            $productADD -> bindParam('fproduct_cat'          , $product_cat);
            $productADD -> bindParam('fproduct_points'       , $product_points);
            $productADD -> bindParam('fproduct_price'        , $product_price);
            $productADD -> bindParam('ftotal_price'          , $product_total_price);
            $productADD -> bindParam('fproduct_release_date' , $product_release_date);
            $productADD -> bindParam('fproduct_expires'      , $product_expires);
            $productADD -> bindParam('fproduct_upload_time'  , $DateTime);

            if($productADD -> execute()) {
              echo "<h4 style='color:green;font-size:25px;'> პროდუქცია წარმატებით დაემატა </h4>";
               header("refresh:2;index.php");
            }else{
              echo "<h4 style='color:red;font-size:25px;'> მონაცემების დამატება ვერ ხერხდება</h4>";
            }
          } 
         
      }
  } 

?>



<?php  

class PRODUCT_CAT {

  protected $productcat_id;
  protected $category;
  protected $product_size;

  
   public function productcat_id(){
    return $this->productcat_id;
    }
  
    public function category(){
      return $this->category;
  }

  public function product_size(){
    return $this->product_size;
    }

}

  $allproduct = "SELECT `productcat_id`, `category` , `product_size` FROM `product_categories` ORDER BY productcat_id DESC ";
  $productcategory = $PDO->query($allproduct);
  $productcategory->setFetchMode(PDO::FETCH_CLASS, 'PRODUCT_CAT');


  
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




<div class="  bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"> შეიყვანეთ მონაცემები</h5>
     
      </div>
    <form method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label >პროდუქციის დასახელება</label>
      <input type="text" class="form-control" placeholder="პროდუქციის სახელი" name='product_name'>
      <span style="background:none;color:red;"><?php if(isset($n)){echo $n;}?></span>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">პროდ. კატეგორია</label>
      <select id="inputState" class="form-control" name='product_cat'>
     
       <?php foreach($productcategory as $category) :?>
        <option><?=$category->category();?></option>]
        <?php endforeach ?>
      </select>
    </div>
  </div> 
  
    <div class="form-row">
     <div class="form-group col-md-6">
      <label >რაოდენობა </label>
      <input type="text" class="form-control" placeholder="რაოდენობა()" name='product_points'>
      <span style="background:none;color:red;"><?php if(isset($p)){echo $p;}?></span>
    </div>

    <div class="form-group col-md-6">
      <label >თვითღირებულება (₾)</label>
      <input type="text" class="form-control" placeholder="ფასი(₾)" name='product_price'>
      <span style="background:none;color:red;"><?php if(isset($pr)){echo $pr;}?></span>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label >გამოშვების თარიღი </label>
      <input type="text" class="form-control" placeholder="დამზადებულია" name='product_release_date'>
    </div>

    <div class="form-group col-md-6">
      <label >ვარგისია</label>
      <input type="text" class="form-control" placeholder="ვადა გასდის" name='product_expires'>
    </div>
  </div>


       <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">გასუფთავება</button>
        <button type="submit" class="btn btn-primary">დამატება</button>
      </div>
</form>
    </div>
  </div>
</div>


</body>
</html>




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
