<?php
       require_once ('DB/conf.php'); // ბაზასთან დაკავშირება
  
  
      if($_SERVER['REQUEST_METHOD'] === 'POST') {

      if(isset($_POST['addcategory'])) {

        $addcategory  = trim(htmlentities(filter_var($_POST['addcategory'],FILTER_SANITIZE_STRIPPED)));

        if(empty($addcategory)){
          $catMSG =  'შეცდომა : კატეგორია არ მიგითითებიათ !';
        }


        $cat_check = "SELECT `category` FROM `product_categories` WHERE `category` = ? ";
        $cat_check = $PDO -> prepare($cat_check);
        $cat_check->bindValue( 1, $addcategory );
        $cat_check->execute();
        
        if( $cat_check->rowCount() > 0 ) { 
            $cat_checkMSG =  'ეს კატეგორია უკვე არსებობს !';
          
      
        } else {
                           
        if(mb_strlen($addcategory) !=0 ) {
        $CatAdd = " INSERT INTO product_categories (`category` ) VALUES( :fcategory)";
        $CatAdd = $PDO -> prepare($CatAdd);
        $CatAdd->bindParam(':fcategory'    ,  $addcategory);
                    
        if($CatAdd->execute())  {
            $CatAddsuccess =  ' კატეგორია დამატებულია ..... ';
            header("refresh:1; index.php");
           
        
        } // execute()
      }//mb_strlen()
    }//else
  }//isset()
}//server


?>