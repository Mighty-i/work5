<?php
include("connect.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <!--link href="bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="bootstrap/css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="bootstrap/css/s2-docs.css" type="text/css" rel="stylesheet"-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <div class="d-flex justify-content-center">
      <div class="col-center">
        <div class="text-center"><br/>
          <h2>Login Page</h2>
        </div>
        <form method="post" action="checklogin.php" class="form-horizontal">
          <div class="form-group">
            <br />
            <div class="form-center">
              <div class="col-center">
                <input class="form-control" type="text" id="txt_login" name="txt_login" placeholder="UserName" required="true">
              </div>
            </div>
          </div>
          <div class="form-group">
            <br />
            <div class="col-center">
              <input class="form-control" type="password" id="txt_password" name="txt_password" placeholder="Password" required="true">
            </div>
          </div>
          <div class="text-center">
            <div class="form-group">
              <label for="bt" class="col-1 col-form-label"></label>
              <div>
                <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                <button class="btn btn-primary" id="bt">Login</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</html>