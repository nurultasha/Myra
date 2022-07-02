<?php
ini_set('display_error', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include("connection.php");

/*if(isset($_POST['searchbtn']))
{
  $secid = $_POST['search'];
  $sqlsearch = "SELECT * FROM `section` WHERE sec_ID = '".$secid."'";
  //echo $sqlsearch;
  $qrysearch = mysqli_query($conn, $sqlsearch);
  $rowsearch = mysqli_num_rows($qrysearch);
  if($rowsearch > 0)
  {
    $d = mysqli_fetch_assoc($qrysearch);
    $secno = $d['sec_ID'];
    $secnumber = $d['sec_number'];
    $sectionMalay = $d['secTitleMalay'];
    $sectionEng = $d['secTitleEng'];
    $_SESSION['secNewAdd'] = $secno;
  }
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Summernote --> 
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="mainpage.php" class="nav-link">Home</a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="mainpage.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MyRA Search System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      
     

     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php include ("menu.php") ?>
          
        

         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sections</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-15">
            <!-- general form elements -->
            <!--<div class="card card-primary col-sm-15">
              <div class="card-header">
                <h3 class="card-title">Search Sections</h3>
              </div>-->
              <!-- /.card-header -->
              <!-- form start -->
              <!--<form id="form" name="form" action="<?php /*echo $_SERVER['PHP_SELF'];*/ ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="SearchUserID">Search</label>
                    <input type="text" name="search" class="form-control" id="SearchUSerID" placeholder="Search by ID" onClick="return checkField">
                  </div>
                </div>-->
                <!-- /.card-body -->
                <!--<div class="card-footer">
                <button type="submit" name="searchbtn" class="btn btn-primary" onClick="return checkEmptyFields()">Search</button>
                </div>
              </form>-->
            <!--</div>-->
            
            <!-- add User form elements -->
            <div style="width:1250px"class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Section</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <!-- <form action="User.php"> -->
              <form name="formAdd" method="post" action="pSectionsAdd.php">    <?php// echo $_SERVER['PHP_SELF']; ?>
                <div class="card-body">
                <!--<div class="form-group required">
                    <label for="SecID">Section ID</label>
                    <input type="type" class="form-control" name="SecID" id="SecID" value="<?php if(isset($secno)) {echo $secno; } ?>" required>
                  </div>-->
                  <div class="form-group">
                    <label for="SecNumber">Section Number</label>
                    <div class="input-group"> <!-- amik ni dr roles -->
                      <div class="custom-file">
                        <select class="form-control" name="secNumber" id="secNumber" required>
                          <option value="" disabled selected hidden>SELECT ONE</option>
                          <?php //getsectionorderslist($pdo); //getsectionlist($dbh); 
                            $array_letters = range('A', 'H');

                            // get letters used from database
                            $array_letters_used = array();
                            $index = 0;
                            $mysqli = "SELECT sec_num FROM section ORDER BY sec_num ASC";
                            $stmt = $conn->prepare($mysqli);
                            $stmt->execute();
                            while($d = $stmt->execute($mysqli))
                            {
                                $array_letters_used[$index] = $d['sec_num'];
                                $index++;
                            }
          
                            // check both arrays
                            $filterList = array_diff($array_letters, $array_letters_used);
          
                            // show on screen
                            foreach($filterList as $id => $filter)
                            {       //<option value="    A   ">    A   </option>
                                echo "<option value='".$filter."'>".$filter."</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="SecTitleMalay">Section (Malay)</label>
                    <input type="type" class="form-control" name="SecTitleMalay" id="SecTitleMalay" value="<?php if(isset($sectionMalay)) { echo $sectionMalay; } ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="SecTitleEng">Section (English)</label>
                    <input type="type" class="form-control" name="SecTitleEng" id="SecTitleEng" value="<?php if(isset($sectionEng)) { echo $sectionEng; } ?>" required>
                  </div>
                  <div class="row">
                  
                  <!--<div class="form-group">-->
                    <!--<label for="RolesStaff">Role</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <select class="form-control" name="RoleStaff" id="RoleStaff">-->
                          <!--<option value="moderator">Moderator</option>
                          <option value="administrator">Administrator</option>-->
                          <?php
                            /*$mysqli = "SELECT * FROM section ORDER BY sec_num ASC";
                            $qry = mysqli_query($conn, $mysqli);
                            $row = mysqli_num_rows($qry);
                            if($row > 0)
                            {
                              $no = 1;
                              while($d = mysqli_fetch_assoc($qry))
                              { 
                                echo "<tr>";
                                echo "<td>".$no."</td>";
                                echo "<td>".$d['sec_num']."</td>";
                                echo "<td>".$d['secTitleMalay']."</td>";
                                echo "<td>".$d['secTitleEng']."</td>";
                                echo "<td>".$d['create']."</td>";
                                echo "</tr>";
                                
                              } 
                            }*/
                            $mysqli = "SELECT * FROM section s 
                            JOIN user u
                            ON s.USER_ID = u.USER_ID";
            
                            $stmt = $conn->prepare($mysqli);
                            //$stmt->execute();
                          ?>
                          
                      <!--</select>echo $d['sec_ID'];
                                echo $d['sec_num'];
                                echo $d['secTitleMalay'];
                                echo $d['secTitleEng'];
                                echo $d['create'];
                      </div>
                  </div>-->
                  <!--<div style="padding:20px" class="form-check">
                    <input type="checkbox" name="checkAccess"class="form-check-input" id="exampleCheck1" value = "1">
                    <label class="form-check-label" for="exampleCheck1"><b>Allow</b> User to access the system</label>
                  </div>-->
                </div>
                <!-- /.card-body --> 
                <div class="card-footer">
                <button type="submit" id="Save" name="Save" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            
          </div>

          <!--/.col (left) -->
          <!-- right column -->
       
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
