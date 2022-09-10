<?php
include("connect.php") ;

if(!empty($_POST['txt_name']) && !empty($_POST['id']))
{
    $id = $_POST['id'];
    $sql = "update student set std_name='".$conn->escape_string($_POST['txt_name'])."',gpa=".
    $conn->escape_string($_POST['txt_gpa'])." where Id='".$id."'";
    $rs = $conn->query($sql);
    if($rs)
    {
        echo"แก้ไขข้อมูลเรียบร้อย <a href='index.php'> ย้อนกลับ </a>";
    }
    else
    {
        echo"แก้ไขข้อมูลไม่ได้ <a href='index.php'>ย้อนกลับ</a>";
    }
}
else{
    echo"ข้อมูลไม่ครบ <a href='index.php'>ย้อนกลับ</a>";
}

?>