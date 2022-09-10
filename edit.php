<?php
include("check.php");
include("connect.php") ;
if(!empty($_GET['id']))
{
  $id = $_GET['id'];
  $sql = "select * from student where Id='".$id."' limit 1";
  $rs = $conn->query($sql);
  $row = $rs->fetch_array();
}
else{
  echo"ข้อมูลไม่ครบ";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="bootstrap/css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="bootstrap/css/s2-docs.css" type="text/css" rel="stylesheet">
  </head>
  <body>
    
    <div class="container">
    <div class="col-md-6">
        <h2>Edit Information</h2>
        <form  method="post" action="update.php" class="form-horizontal">
          <div class="form-group">
            <label for="txt_name" class="col-1 col-form-label">Name</label>
            <div class="col-5">
              <input class="form-control" type="text" id="txt_name" name="txt_name" value="<?php echo $row['std_name'];?>">
            </div>
          </div>
          <div class="form-group">
            <label for="txt_gpa" class="col-1 col-form-label">GPA</label>
            <div class="col-5">
              <input class="form-control" type="number" id="txt_gpa" name="txt_gpa" setp="any" value="<?php echo $row['gpa'];?>">
            </div>
          </div>
          <div class="form-group">
            <label for="bt" class="col-1 col-form-label"></label>
            <div class="col-5">
              <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
             <button class="btn btn-primary" id="bt">Submit</button>
            </div>
          </div>
        </form>
    </div>
  </div>
  </body>
</html>
