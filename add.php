<?php
include("check.php");
include("connect.php") ;

if(!empty($_POST['txt_name'])&&!empty($_POST['txt_gpa']))
{
    $name=  $conn->escape_string($_POST['txt_name']);
    $gpa=  $conn->escape_string($_POST['txt_gpa']);

    $sql ="insert into student set std_name='$name',gpa='$gpa'";
    $rs = $conn->query($sql);
    if($rs)
    {
        echo"เพิ่มข้อมูลเรียบร้อย <a href='index.php'>ย้อนกลับ</a>";
    }else{
        echo"ไม่สามารถเพิ่มข้อมูล <a href='index.php'>ย้อนกลับ</a>";
    }
}else{
    echo"ข้อมูลไม่ครบ <a href='index.php'>ย้อนกลับ</a>";
}

?>