<?php session_start() ?>
<?php
// ფაილის გამოძახება
require 'DB/conf.php';
require 'query.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 

</head>
<body>

<div class="login-page">
  <div class="form">
    <form  method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name='myform' onsubmit="validateform()">
       
        <span style="color:green;">
          <?php if(isset($uploadSuccessfuly)) { ?> 
          <?php echo $uploadSuccessfuly;?> 
          <?php } ?>
        </span> 
        <span style="color:green;">
          <?php if(isset($ReDirectPage)) { ?> 
          <?php echo $ReDirectPage;?> 
          <?php }?>
        </span> 
       
      <input class="input" type="text"      name="user_name"     placeholder="სახელი" />
      <span><?php if(isset($dataname )) { echo $dataname ; }?>   </span>
      <input class="input" type="text"      name="user_mail"     placeholder="ელ-ფოსტა"/> 
      <span><?php if(isset($dataEmail))  {echo $dataEmail; }?>   </span>
      <span><?php if(isset($emailcheck)) {echo $emailcheck;}?>   </span>
      <input class="input" type="password"  name="user_password" placeholder="პაროლი" />
      <span><?php if(isset($Pass )) {echo $Pass ; }?>            </span> 
      <span><?php if(isset($smallPass )) { echo $smallPass ;}?>  </span> 
     
      
      <input type="submit" class="button" value="შექმნა" name='submit'>
      <p class="message">უკვე დარეგისტრირებული ხარ? <a href="auth.php" style="background:none;">ავტორიზაცია</a></p>
    </form>
    
    
  </div>
</div>

</body>
</html>

























