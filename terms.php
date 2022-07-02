<?php
include("connection.php");
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyRA Search System</title>

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
      <!--<li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>-->
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
      <!-- Sidebar user (optional) -->
      <!--<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">-->
          <!--<img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
        <!--</div>
        <div class="info">
          <a href="#" class="d-block"></a>
        </div>
      </div>-->

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
           
            
            <!-- add User form elements -->
              <div style="width:1250px"class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Terms</h3>
                <p  align= "right">
                   <a href="termsAdd.php"><input type="button" value="Add Terms"> </a> </p>
                
              </div>
            
              </form>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
                <!--<p  align="right">
                <input type="text-right" placeholder="Search..">
                  </p>-->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  
                  <thead>
                  <tr>
                   
                    <th>#</th>
                    <th>Section Number</th>
                    <th>Section (Malay)</th>
                    <th>Section (English)</th>
                    <th>Date Created</th>
                    <th> Action </th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                            $sql = "SELECT * FROM section";
                            $qry = mysqli_query($conn, $sql);
                            $row = mysqli_num_rows($qry);
                            if($row > 0)
                            {
                              $no = 1;
                              while($d = mysqli_fetch_assoc($qry))
                              {
                                echo "<tr>";
                                /*echo "<td>".$no."</td>"*/
                                echo "<td>".$d['sec_ID']."</td>";
                                echo "<td>".$d['sec_num']."</td>";
                                echo "<td>".$d['secTitleMalay']."</td>";
                                echo "<td>".$d['secTitleEng']."</td>";
                                echo "<td>".$d['create']."</td>";
                                echo "<td>"
                              ?><div class="btn-group">
                                <?php
                                echo  "<form action='termsEdit.php' method = 'post'>
                                      <input type=\"hidden\" id=\"sec_ID\" name=\"sec_ID\" value=\"$d[sec_ID]\"/>
                                      <button type='edit' name='edit'><i style='font-size:15px' class='far'>&#xf044</i></button></form>
                                      <form action='termsView.php' method = 'post'>
                                      <input type=\"hidden\" id=\"sec_ID\" name=\"sec_ID\" value=\"$d[sec_ID]\"/>
                                      <button type='view' name='view'><i style='font-size:15px' class='fa'>&#xf06e</i></button></form>"
                                    ?></div>
                                      <?php      
                                echo  "</td>";
                              ?></div> <?php    
                                /*      
                                echo "<td>".("<button onclick=\"location.href='sectionEdit.php'\"><i style='font-size:15px' class='far'>&#xf044</i></button>")."   
                                ".("<button onclick=\"location.href='sectionView.php'\"><i style='font-size:15px' class='fa'>&#xf06e;</i></button>")."</td>"; */
                                echo "</tr>";
                              $no++;
                              }
                              }
                          ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th># </th>
                    <th>Section Number</th>
                    <th>Section (Malay)</th>
                    <th>Section (English)</th>
                    <th>Date Created</th>
                    <th> Action </th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!--/.col (left) -->
          <!-- right column -->
       
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
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
