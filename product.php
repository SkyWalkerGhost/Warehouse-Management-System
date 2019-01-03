<?php  






class PRODUCT {

  protected $product_upload_time;
  protected $product_expires;
  protected $product_release_date;
  protected $total_price;
  protected $product_cat;
  protected $product_name;
  protected $product_points;
  protected $product_price;
  protected $product_id;

 
  public function product_upload_time(){
    return $this->product_upload_time;
  }


  public function product_expires(){
    return $this->product_expires;
  }

  public function product_release_date(){
    return $this->product_release_date;
  }
    public function total_price(){
      return $this->total_price;
    }

    public function product_cat(){
      return $this->product_cat;
  }

    public function product_name(){
      return $this->product_name;
  }


   public function product_points(){
      return $this->product_points;
  }

    public function product_price(){
       return $this->product_price;
  }
  
   public function product_id(){
      return $this->product_id;
  }
 

 
}

  $allproduct = "SELECT `product_id`, 
                        `product_name`, 
                        `product_cat`, 
                        `product_points`, 
                        `product_price`, 
                        `total_price`,                        
                        `product_release_date`, 
                        `product_expires`,
                        `product_upload_time`                   
                        FROM `product`  
                        ORDER BY product_id DESC";
  $product = $PDO->query($allproduct);
  $product->setFetchMode(PDO::FETCH_CLASS, 'PRODUCT');


  
?>










<!-- SECTION Small INFO Code -->
<?php  

//this are points
  class PRODUCT_ALL_POINTS {

  protected $AllProductPoints;
  
   public function AllProductPoints(){
    return $this->AllProductPoints;
    }
 
}
  
  $productSUM = "SELECT product_points, SUM(product_points) AS AllProductPoints FROM `product` ";
  $ProductAllPoints = $PDO->query($productSUM);
  $ProductAllPoints->setFetchMode(PDO::FETCH_CLASS, 'PRODUCT_ALL_POINTS');

?>

<?php  
//this are total price
  class PRODUCT_TOTAL_PRICE{

  protected $product_total_price;
  
   public function product_total_price(){
    return $this->product_total_price;
    }
 
}

  $totalPRICE = "SELECT total_price, SUM(total_price) AS product_total_price FROM `product` ";
  $ProductAllTotalPRice = $PDO->query($totalPRICE);
  $ProductAllTotalPRice->setFetchMode(PDO::FETCH_CLASS, 'PRODUCT_TOTAL_PRICE');

?>



<?php  

  class PRODUCT_CATEGORIES {
  protected $PRODUCT_CATEGORIES;
  
   public function PRODUCT_CATEGORIES(){
    return $this->PRODUCT_CATEGORIES;
    }
 
}
 
  $product_cat = "SELECT category, COUNT(category) AS PRODUCT_CATEGORIES FROM `product_categories` ";
  $PRODUCT_CATEGORIES = $PDO->query($product_cat);
  $PRODUCT_CATEGORIES -> setFetchMode(PDO::FETCH_CLASS, 'PRODUCT_CATEGORIES');

?>

<?php  

  class PRODUCT_P {
  protected $allproduct;
  
   public function allproduct(){
    return $this->allproduct;
    }
 
}
 
  $product_pointid = "SELECT product_id, COUNT(product_id) AS allproduct FROM `product` ";
  $PRODUCTPOINT = $PDO->query($product_pointid);
  $PRODUCTPOINT -> setFetchMode(PDO::FETCH_CLASS, 'PRODUCT_P');

?>
<!-- SECTION Small INFO Code -->