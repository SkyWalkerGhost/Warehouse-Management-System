<?php require_once('DB/conf.php');?>

<?php
        if($_SERVER['REQUEST_METHOD'] === 'POST')  {
            if(isset($_POST['login']) && isset($_POST['user_name']) && isset($_POST['user_password'])) {
                $user_name = $_POST['user_name'];
                $userPass  = md5($_POST['user_password']);
                if(empty($user_name) || empty($userPass)) {
                    $warning = 'საჭიროა ველების შევსება';
                } else {
                    $LogedUser = "  SELECT * 
                                    FROM user_info 
                                    WHERE user_name = :user_name 
                                    AND user_password = :user_password  ";
                    $LogedUser = $PDO -> prepare($LogedUser);
                    $LogedUser -> execute(
                                array(
                                        'user_name'     => $user_name,
                                        'user_password' => $userPass
                                    )
                                );
                    $count = $LogedUser -> rowCount(); 
                    if($count > 0 ) {
                        $_SESSION['user_name'] = $user_name;
                        header('location:index.php');
                    } else {
                        $wrongmsg =  'არასწორი მონაცემები';
                    }
                }
            }
        }
?>