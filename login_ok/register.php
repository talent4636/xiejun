<?php
//插入连接数据库的相关信息
require_once 'config.php';

$error_msg = "";
if(!isset($_SESSION['user_id'])){
    if(isset($_POST['submit'])){//用户提交登录表单时执行如下代码
        $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $user_username = mysqli_real_escape_string($dbc,trim($_POST['username']));
        $user_password = mysqli_real_escape_string($dbc,trim($_POST['password']));

        if(!empty($user_username)&&!empty($user_password)){
            //MySql中的SHA()函数用于对字符串进行单向加密
            $query = "SELECT user_id, username FROM mismatch_user WHERE username = '$user_username' AND "."password = SHA('$user_password')";
            //用用户名和密码进行查询
            $data = mysqli_query($dbc,$query);
            //若查到的记录正好为一条，则设置SESSION，同时进行页面重定向
            if(mysqli_num_rows($data)==1){
                $row = mysqli_fetch_array($data);
                $_SESSION['user_id']=$row['user_id'];
                $_SESSION['username']=$row['username'];
                $home_url = 'loged.php';
                header('Location: '.$home_url);
            }else{//若查到的记录不对，则设置错误信息
                $error_msg = 'Sorry, you must enter a valid username and password to log in.';
            }
        }else{
            $error_msg = 'Sorry, you must enter a valid username and password to log in.';
        }
    }
}else{//如果用户已经登录，则直接跳转到已经登录页面
    $home_url = 'loged.php';
    header('Location: '.$home_url);
}
?>
<html>
    <head>
        <title>Mismatch - 注册</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <h3>Msimatch - 注册  <a href="login.php">去登陆</a></h3>
        
        <form method = "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <fieldset>
                <legend>注册</legend>

                <label for="username">Username:</label>
                <!-- 如果用户已输过用户名，则回显用户名 -->
                <input type="text" id="username" name="username"
                value="" />

                <br/>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password"/>

            </fieldset>
            <input type="submit" value="提交" name="submit"/>
        </form>
       
    </body>
</html>