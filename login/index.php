<!DOCTYPE html>
<?php 
require_once('session.php');

$session = new session();
$user = $_POST['user'];
$password = $_POST['password'];
$session->set('user', $user);
$session->set('password', $password);


?>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta charset="utf-8" />
</head>
<body>
    <div style="width:500px;margin:0 auto;padding:20px;">
        <form action="index.php" method="POST">
            用户名：<input name="user" value="<?php echo $user?$user:''?>" ><br><br>
            密码：<input name="password" value="<?php echo $password?$password:''?>" ><br>
            <input type="submit" value="登陆">
        </form>
    </div>
    
</body>

</html>
