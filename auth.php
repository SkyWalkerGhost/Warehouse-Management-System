<?php session_start() ?>
<?php require_once('DB/conf.php');?>
<?php require_once('session.php');?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ავტორიზაცია</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <script src="main.js"></script>
</head>
<body>

<div class="login-page">
  <div class="form">
  
    <form class="login-form" method="POST" >
        <span> <?php if(isset($wrongmsg)) { ?> <?php echo $wrongmsg; ?> <?php } ?> </span>
        <span> <?php if(isset($warning)) { ?> <?php echo $warning; ?> <?php } ?> </span>
        <input class="input" type="text" placeholder="მომხმარებელი" name="user_name"/>
        <input class="input" type="password" placeholder="პაროლი"   name="user_password"/>
        <input type="submit" class="button" value="შესვლა" name='login'>
        <p class="message">არ ხართ რეგისტრირებული? <a href="register.php" style="background:none;">ახალი ანგარიშის შექმნა</a></p>
    </form>

  </div>
</div>
</body>
</html>