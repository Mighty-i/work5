<?php
include("check.php");
include("connect.php");
header("Content-Type: text/html; charset=UTF-8");

if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "delete from student where Id='".$id."' limit 1";
    $rs = mysqli_query($conn, $sql);
    if($rs)
    {
        echo"ลบข้อมูลเรียบร้อย <a href='index.php'>ย้อนกลับ</a>";
    }
    else
    {
        echo"ลบข้อมูลไม่ได้ <a href='index.php'>ย้อนกลับ</a>";
    }
}
else{
    echo"ข้อมูลไม่ครบ <a href='index.php'>ย้อนกลับ</a>";
}
?>
