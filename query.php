<?php require_once('DB/conf.php');?>
<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST')   {
       
        if(isset($_POST['user_name']) && isset($_POST['user_mail']) && isset($_POST['user_password']))  {
       
        $user_name     = trim(strip_tags(htmlentities(filter_var($_POST['user_name'],FILTER_SANITIZE_STRIPPED))));
        $user_mail     = trim(strip_tags(htmlentities(filter_var($_POST['user_mail'],FILTER_SANITIZE_EMAIL))));
        $user_password = trim(strip_tags(htmlentities(filter_var($_POST['user_password'],FILTER_SANITIZE_STRIPPED))));
        
         
       
        if(empty($user_name)) {
                $dataname  = 'სახელი მითითებული არაა';
        } else if(empty(filter_var($user_mail,FILTER_SANITIZE_EMAIL))) {
                $dataEmail = 'ელ-ფოსტა შეყვანილი არაა';
        } else if(empty($user_password)) {
                $Pass      = 'მიუთითეთ პაროლი';
        } else if(mb_strlen($user_password) >=6 ){
        } else {
                $smallPass =  'პაროლი სუსტია';
        }
           
            $Email_check = "SELECT `user_mail` FROM `user_info` WHERE `user_mail` = ? ";
            $Email_check = $PDO -> prepare($Email_check);
            $Email_check -> bindValue( 1, $user_mail );
            $Email_check -> execute();
            
            if( $Email_check->rowCount() > 0 ) { 
                $emailcheck =  'ეს ელ-ფოსტა დაკავებულია სცადეთ სხვა !';
           
            } else {
                
            $user_password = md5($user_password);   
            if(mb_strlen($user_name) !=0 && mb_strlen($user_mail) !=0 && mb_strlen($user_password) >=6 !=0  ) {
                
            $AddNewData=" INSERT INTO user_info (`user_name`,  
                                                 `user_mail`,
                                                 `user_password`)
                          VALUES( :fuser_name, 
                                  :fuser_mail,
                                  :fuser_password)";
            
            $AddNewData = $PDO -> prepare($AddNewData);
            $AddNewData -> bindParam(':fuser_name'    ,  $user_name);
            $AddNewData -> bindParam(':fuser_mail'    ,  $user_mail);
            $AddNewData -> bindParam(':fuser_password',  $user_password);
                        
            if($AddNewData->execute())  {
             
               $uploadSuccessfuly =  ' რეგისტრაცია წარმატებით გაიარეთ ..... ';
               $ReDirectPage      =  'გადამისამართება ავტორიზაციის გვერდზე ';
                  
                header("refresh:2; auth.php");
               
            
                } // execute()
            } // mb_strlen()
        } // else
    } //isset()
} //server ()
    
?>