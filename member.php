<?php
//admin login
  session_start();
  if (isset($_SESSION['username']) && $_SESSION['level'] == 2 && ($_SESSION['security_code']) )
  {
    

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agency Store Manager - For Member Account</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-store"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Store Manager <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="./member.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>HomePage</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Menu T??? ch???c -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-store"></i>
                    <span>T??? ch???c</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="./member/AgencyStore.php">Th??ng tin c??c ?????i l??</a>
                        <a class="collapse-item" href="./member/Addgoods.php">Th??ng tin c??c m???t h??ng</a>
                        <a class="collapse-item" href="./member/Bill.php">Thu ti???n</a>
                        <a class="collapse-item" href="./member/DeliveryNote.php">Xu???t h??ng</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>B??o c??o</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="./member/SalesReport.php">Doanh s??? th??ng</a>
                        <a class="collapse-item" href="./member/DebtReport.php">C??ng n??? th??ng</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                About US
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Nav Item - About US -->
            <li class="nav-item">
                <a class="nav-link" href="#aboutus" data-toggle="modal">
                    <i class="fas fa-fw fa-address-book"></i>
                    <span>V??? ch??ng t??i</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo "Hello, ".$_SESSION['username']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="./php/Changepassword.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Password
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Danh s??ch c??c t??nh n??ng c???a th??nh vi??n</h1>
                    <br>
                    <!--Line 01-->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card text-white bg-primary mb-3" style="max-width: 40rem;">
                            <div class="card-header bg-primary">T??nh n??ng</div>
                                <div class="card-body">
                                    <h5 class="card-title">Xem th??ng tin c??c ?????i l??</h5>
                                    <p class="card-text">B???n ch??? c?? th??? th??m t??m ki???m c??c b???n ghi</p>
                                    <a href="./member/AgencyStore.php" class="btn btn-light">Go</a>
                                </div>
                            </div>
                        </div>
                            <div class="col-sm-6">
                                <div class="card text-white bg-secondary mb-3" style="max-width: 40rem;">
                                <div class="card-header bg-secondary">T??nh n??ng</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Th??m th??ng tin c??c m???t h??ng</h5>
                                        <p class="card-text">C?? th??? th??m, ch???nh s???a, xo?? c??c m???t h??ng ??ang c??</p>
                                        <a href="./member/addgoods.php" class="btn btn-light">Go</a>
                                    </div>
                                </div>
                            </div>        
                    </div>
                    <br><br>
                    <!--Line 02-->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card text-white bg-success mb-3" style="max-width: 40rem;">
                            <div class="card-header bg-success">T??nh n??ng</div>
                                <div class="card-body">
                                    <h5 class="card-title">B??o c??o doanh s??? th??ng</h5>
                                    <p class="card-text">L???y b??o c??o doanh s??? ?????i l?? theo th??ng.</p>
                                    <a href="./member/SalesReport.php" class="btn btn-light">Go</a>
                                </div>
                            </div>
                        </div>
                            <div class="col-sm-6">
                                <div class="card text-white bg-danger mb-3" style="max-width: 40rem;">
                                <div class="card-header bg-danger">T??nh n??ng</div>
                                    <div class="card-body">
                                        <h5 class="card-title">B??o c??o c??ng n??? th??ng</h5>
                                        <p class="card-text">L???y b??o c??o n??? cu???i ?????i l?? theo th??ng</p>
                                        <a href="./member/DebtReport.php" class="btn btn-light">Go</a>
                                    </div>
                                </div>
                            </div>        
                    </div>
                    <br><br>
                    <!--Line 03-->
                    <div class="row">
                        <div class="col-sm-6">
                        <div class="card text-white bg-warning mb-3" style="max-width: 40rem;">
                                <div class="card-header bg-warning">T??nh n??ng</div>
                                    <div class="card-body">
                                        <h5 class="card-title">T???o phi???u xu???t h??ng</h5>
                                        <p class="card-text">C?? th??? th??m, ch???nh s???a, xo?? c??c phi???u xu???t h??ng</p>
                                        <a href="./member/DeliveryNote.php" class="btn btn-light">Go</a>
                                    </div>
                                </div>
                            </div>        
                            <div class="col-sm-6">
                            <div class="card text-white bg-dark mb-3" style="max-width: 40rem;">
                            <div class="card-header bg-dark">T??nh n??ng</div>
                                <div class="card-body">
                                    <h5 class="card-title">T???o phi???u thu ti???n</h5>
                                    <p class="card-text">C?? th??? th??m, ch???nh s???a, xo?? c??c phi???u thu ti???n</p>
                                    <a href="./member/Bill.php" class="btn btn-light">Go</a>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <br><br>
                    
                    
                </div>
                <!-- /.container-fluid --> 
            

            </div>
            <!-- End of Main Content -->
             <!-- Footer -->
             <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span> Agency Store Manager Web Version</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!--Modal about team-->
    <div class="modal fade" id="aboutus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">V??? ch??ng t??i</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
               <h5 class="card-title text-dark">Trang web qu???n l?? c??c ?????i l??</h5>
               <h5 class="card-title text-dark">C??c th??nh vi??n: </h5>
               <p>1. Ng?? Th??nh Long</p>
               <p>2. ????? B?? S??n</p>
               <p>3. Tr???nh Ti???n Anh</p>
               <p>4. V?? Qu???c H??ng</p>
               <p>5. Nguy???n Ng???c Ho??ng H??</p>
               <br>
               <h5 class="card-title text-dark">C??c khu??n m???u CSS, template v?? th?? vi???n s??? d???ng</h5>
               <p>1. Khu??n m???u CSS Bootstrap: <a href="https://getbootstrap.com/">https://getbootstrap.com/</a></p>
               <p>2. Bootstrap DatePicker: <a href="https://github.com/uxsolutions/bootstrap-datepicker">https://github.com/uxsolutions/bootstrap-datepicker</a></p>
               <p>3. DataTables: <a href="https://datatables.net/">https://datatables.net/</a></p>
               <p>4. Fontawesome phi??n b???n free</p>
               <p>5. jQuery v?? jQuery-easing: <a href="https://jquery.com/">https://jquery.com/</a></p>
               <p>6. Start Bootstrap Template: <a href="https://startbootstrap.com/">https://startbootstrap.com/</a></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="./php/signout.php?logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<?php
  }
  else 
  {
    header('Location: ./index.php');
    exit;
  }
?>