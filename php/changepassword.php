<?php
session_start();
require_once ("../lib/connection.php"); 
require_once("../lib/password.php");
//Change password account
if (isset ($_SESSION['username']) && $_SESSION['level'] == 1 && ($_SESSION['security_code'])) 
{
    $level = $_SESSION['level'];
    $username = $_SESSION['username'];
    if(isset($_POST['Update'])) 
    {
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass']; 
        $cppass = $_POST['cppass']; 
        //first, verify oldpassword.
        $sql = "select * from login where username = '$username' and level = '$level'";
        $query = mysqli_query($conn,$sql);
        $passhash = mysqli_fetch_object($query); 
        //second, make sure newpass and cppass matched
        if ($newpass !== $cppass) //return changepassword.php page if newpass and cppass empty
        {
            ?>
            <script>
                if (!alert('Error!\nNew Password and Confirm Password NOT Matched!')) {
                    document.location = "./Changepassword.php";
                }
            </script>
            <?php
        }
        else if (password_verify($oldpass, $passhash->password))
        {
            $pass_hash = password_hash($newpass, PASSWORD_BCRYPT, array("cost" => 10));
            $update="UPDATE login SET password ='$pass_hash' WHERE username = '$username' AND level = '$level'";
            $result = mysqli_query($conn, $update);
            if ($result) 
            {
                ?>
                <script>
                    if (!alert('Change Password Success!\nSigned out session')) {
                        document.location = "./function/autosignout.php";
                    }
                </script>
                <?php
            }
            else 
            {
                ?>
                <script>
                    if (!alert('Something wrong in here!\nPlease try again later!')) {
                        document.location = "../homepage.php";
                    }
                </script>
                <?php
            }
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agency Store Manager - Admin System</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico" />
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" >
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-store"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Store Manager <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../homepage.php">
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
                        <a class="collapse-item" href="./AgencyStore.php">Th??ng tin c??c ?????i l??</a>
                        <a class="collapse-item" href="./Addgoods.php">Th??ng tin c??c m???t h??ng</a>
                        <a class="collapse-item" href="./Bill.php">Thu ti???n</a>
                        <a class="collapse-item" href="./DeliveryNote.php">Xu???t h??ng</a>
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
                        <a class="collapse-item" href="./SalesReport.php">Doanh s??? th??ng</a>
                        <a class="collapse-item" href="./DebtReport.php">C??ng n??? th??ng</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-users-cog"></i>
                    <span>For Adminstrator</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="./usermanger.php">Qu???n l?? ng?????i d??ng</a>
                        <a class="collapse-item" href="./AgentOrganization.php">Quy ?????nh s??? ?????i l??</a>
                        <a class="collapse-item" href="./TypeStore.php">C??c lo???i ?????i l??</a>

                    </div>
                </div>
            </li>
            <!-- Nav Item - Tables -->
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
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="./Changepassword.php">
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
                <div class="container-fluid" style="margin: auto; width: 50%;">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo "Xin ch??o t??i kho???n ".$_SESSION['username']; ?></h1>
                    <h1 class="h3 mb-2 text-gray-800">T???i ????y ch??ng t??i gi??p b???n thay ?????i m???t kh???u</h1>
                    <h1 class="h3 mb-2 text-gray-800">Ch??ng t??i khuy???n c??o b???n n??n thay ?????i m???t kh???u khi ???? y??u c???u Adminstrator ?????t l???i m???t kh???u</h1>
                    <br>

                    <!-- DataTales Store -->
                    <div class="card shadow mb-4" style="width: 50rem;">
                        <div class="card-header py-3">
                          <h4>Thay ?????i m???t kh???u</h4>  
                        </div>
                        <div class="card-body">
                        <form method="POST">
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">M???t kh???u c??</label>
                        <div class="col-sm-10">
                        <input type="password" name="oldpass" id = "oldpass" class="form-control" placeholder="Nh???p m???t kh???u c??" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">M???t kh???u m???i</label>
                        <div class="col-sm-10">
                        <input type="password" name="newpass" id = "newpass" class="form-control" placeholder="Nh???p m???t kh???u m???i" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">M???t kh???u m???i</label>
                        <div class="col-sm-10">
                        <input type="password" name="cppass" id = "cppass" class="form-control" placeholder="X??c nh???n m???t kh???u m???i" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" onclick="ShowPass()" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">Show Password</label>
                        </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-sm-10">
                          <button type="submit" name="Update" class="btn btn-primary">Thay ?????i</button>
                          <a href="../homepage.php" class="btn btn-secondary active" role="button" aria-pressed="true">Hu???</a>
                        </div>
                      </div>
                          </form>
                        </div>
                    </div>

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
                    <a class="btn btn-primary" href="./signout.php?logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!--Show Password-->
    <script>
    function ShowPass() {
        var x = document.getElementById("oldpass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        var y = document.getElementById("newpass");
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
        var z = document.getElementById("cppass");
        if (z.type === "password") {
            z.type = "text";
        } else {
            z.type = "password";
        }
    }
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
<?php
  }
  else 
  {
    header('Location: ../index.php');
    exit;
  }
?>