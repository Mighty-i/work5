<?php
include("connect.php") ;
session_start() ;
if(!empty($_POST['txt_login']) && !empty($_POST['txt_password']))
{
  $password = sha1($_POST['txt_password']) ;

  $login = $conn->escape_string($_POST['txt_login']) ;

  $rs = $conn->query("select * from users where login='".$login . "' and password='". $password ."' limit 1") ;

  if($login == $rs->fetch_array()['login'])

  {

    $_SESSION['logStatus'] = 1;
    header("location:index.php") ;
  }
  else {
    echo "รหัสผ่านไม่ถูกต้อง <a href='login.php'>ย้อนกลับ</a>" ;
  }
}
else {
  echo "ข้อมูลไม่ครบ <a href='login.php'>ย้อนกลับ</a>" ;
}
?>