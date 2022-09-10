<?php
include("check.php");
include("connect.php");
$rs = $conn->query("select * from student");
$page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
if (!empty($_POST['q_name'])) {
  $sql_search = " where std_name like '%" . $_POST['q_name'] . "%' ";
} else {
  $sql_search = '';
}

//get total rows
$rs = $conn->query("select count(Id) as num from student $sql_search ");
$totalRow =  $rs->fetch_array()['num'];
$rowPerPage = 10;

if ($totalRow == 0)
  $totalPage = 1;
else
  $totalPage = ceil($totalRow / $rowPerPage);

$startRow = ($page - 1) * $rowPerPage;

$rs = $conn->query("select * from student $sql_search limit $startRow,$rowPerPage ");

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <!--link href="bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet" />
  <link href="bootstrap/css/font-awesome.css" type="text/css" rel="stylesheet" />
  <link href="bootstrap/css/s2-docs.css" type="text/css" rel="stylesheet"-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script>
    function del(id) {
      if (confirm("ยืนยันการลบข้อมูลในตาราง")) {
        window.location = "delete.php?id=" + id;
      } else {
        return false;
      }
    }
  </script>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Student List</h2>
        <form class="form-inline d-flex" action="index.php" method="post">
          
            <input type="text" class="form-control" name="q_name" placeholder="name">
          
          <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <table class="table">
          <tr>
            <th>ID</th>
            <th>name</th>
            <th>GPA</th>
            <th></th>
          </tr>
          <?php
          if (mysqli_num_rows($rs)) {
            while ($row = mysqli_fetch_assoc($rs)) {
          ?>
              <tr>
                <td>
                  <?php echo $row["Id"] ?>
                </td>
                <td>
                  <?php echo $row["std_name"] ?>
                </td>
                <td>
                  <?php echo $row["gpa"] ?>
                </td>
                <td>
                  <a href="edit.php?id=<?php echo $row['Id']; ?>">
                  <i class="bi bi-pencil-fill"> edit</i>
                  </a>
                  | <a href="#" onclick="del('<?php echo $row['Id'] ?>')">
                    <i class="bi bi-archive-fill"> delete</i>
                </td>
              </tr>
          <?php
            }
          }
          ?>

        </table>
        <!-- bootstrap pagination -->
        <ul class="pagination">
          <li class="disabled"><a href="#"><?php echo 'TotalRows:', $totalRow, '/TotalPages:', $totalPage; ?></a></li>
          <?php
          for ($i = 1; $i <= $totalPage; $i++) {
          ?>
            <li <?php echo ($i == $page) ? ' class="active"' : '' ?>><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php
          }
          ?>
        </ul>
      </div>
      <div class="col-md-6">
        <h2>Insert Student </h2>
        <form method="post" action="add.php" class="form-horizontal">

          <div class="form-group">
            <label for="txt_name" class="col-1 col-form-label">Name</label>
            <div class="col-5">
              <input class="form-control" type="text" id="txt_name" name="txt_name">
            </div>
          </div>
          <div class="form-group">
            <label for="txt_gpa" class="col-1 col-form-label">GPA</label>
            <div class="col-5">
              <input class="form-control" type="number" id="txt_gpa" name="txt_gpa">
            </div>
          </div>
          <div class="form-group">
            <label for="bt" class="col-1 col-form-label"></label>
            <div class="col-5">
              <button class="btn btn-primary" id="bt">Submit</button>
            </div>
          </div>
          <a href="logout.php" class="link-danger"> ออกจากระบบ </a>
        </form>
      </div>
    </div>
  </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>