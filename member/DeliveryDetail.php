<?php
  session_start();
  $id = $_GET['ID']; 
  if (isset($_SESSION['username']) && $_SESSION['level'] == 2 && ($_SESSION['security_code']) )
  {
    $_SESSION['id_ex'] = $id;
    require_once('../lib/connection.php');
    $query = "SELECT * FROM chitietxuathang WHERE MaPhieuXuat = '$id'";
    $result = mysqli_query($conn,$query);
  
    //get list id store
    $list_goods = "SELECT * FROM mathang";
    $list = mysqli_query($conn,$list_goods);

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
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico" />
    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
     <!--Boostrap DatePicker-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap-datepicker/bootstrap-datepicker.css" >

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
                <a class="nav-link" href="../member.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>HomePage</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Menu Tổ chức -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-store"></i>
                    <span>Tổ chức</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="./AgencyStore.php">Thông tin các đại lý</a>
                        <a class="collapse-item" href="./Addgoods.php">Thông tin các mặt hàng</a>
                        <a class="collapse-item" href="./Bill.php">Thu tiền</a>
                        <a class="collapse-item" href="./DeliveryNote.php">Xuất hàng</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Báo cáo</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="./SalesReport.php">Doanh số tháng</a>
                        <a class="collapse-item" href="./DebtReport.php">Công nợ tháng</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="#aboutus" data-toggle="modal">
                    <i class="fas fa-fw fa-address-book"></i>
                    <span>Về chúng tôi</span></a>
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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo "Chi tiết phiếu xuất ".$id ?></h1>
                    <br>

                    <!-- DataTales Store -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <a href="./DeliveryNote.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Back</a>
                          <a href="./DeliveryDetail.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Refresh</a>
                          <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#AddModal">Add</button>  
                          <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#NoteModal">Chú ý</button>  
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Mã Mặt Hàng</t>
                                        <th>Số lượng</th>
                                        <th>Đơn Giá</th>
                                        <th>Thành Tiền</th>
                                        <th>Thay đổi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                      while($rows=mysqli_fetch_array($result))
                                      {
                                    ?>
                                    <tr>
                                      <td><?php echo $rows['MaMatHang']; ?></td>
                                      <td><?php echo $rows['SoLuong']; ?></td>
                                      <td><?php echo $rows['DonGia']; ?></td>
                                      <td><?php echo $rows['ThanhTien']; ?></td>
                                      <td><a href="./function/edit_detail.php?ID=<?php echo $rows['MaMatHang']; ?>" class="btn btn-success" tabindex="-1" role="button" aria-disabled="true">Sửa</a>                                        
                                      <a href="./function/del_detail.php?ID=<?php echo $rows['MaMatHang']; ?>" class="btn btn-danger" tabindex="-1" role="button" aria-disabled="true">Xoá</a>
                                    </tr>
                                    <?php
                                      }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <h1 class="h3 mb-2 text-gray-800">Danh sách các mặt hàng trong hệ thống</h1>
                    <br>
                    <!-- Goods Table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <a href="./addgoods.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Xem</a>  
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Mã Mặt Hàng</th>
                                        <th>Tên Mặt Hàng</th>
                                        <th>Đơn Giá</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                                      while($rows0=mysqli_fetch_array($list))
                                      {
                                    ?>
                                    <tr>
                                      <td><?php echo $rows0['MaMatHang']; ?></td>
                                      <td><?php echo $rows0['TenMatHang']; ?></td>
                                      <td><?php echo $rows0['DonGia']; ?></td>                         
                                    </tr>
                                    <?php
                                      }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
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
    <!--============================================================================================================-->
    
    <!-- Add Export Modal-->
    <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mặt hàng</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="./function/add_detail.php" method="POST">
                <div class="form-group">
                    <input type="text" value= "<?php echo $id ?>" name="exportID" class="form-control" placeholder="Nhập mã phiếu xuất" readonly>
                  </div>
                <div class="form-group">
                    <select class="form-control" name="idgoods" required>
                    <option value="">Chọn mã mặt hàng</option>
                    <?php 
                        $list0_goods = "SELECT * FROM mathang";
                        $list0 = mysqli_query($conn,$list_goods);
                        while($data=mysqli_fetch_array($list0))
                        {
                    ?>
                        <option value="<?php echo $data['MaMatHang']; ?>"><?php echo $data['MaMatHang']; ?></option>
                    <?php
                        }
                    ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="text" name="SL" class="form-control" placeholder="Nhập số lượng" required>
                  </div>
                  
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="Add" class="btn btn-primary">Thêm</button>
                </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>
    
    

    <!-- Notes Modal-->
    <div class="modal fade" id="NoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Về chi tiết phiếu xuất hàng</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bảng danh sách các mặt hàng trong hệ thống giúp bạn xem mã mặt hàng có tên mặt hàng gì.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>


    <!--Modal about team-->
    <div class="modal fade" id="aboutus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Về chúng tôi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
               <h5 class="card-title text-dark">Trang web quản lý các đại lý</h5>
               <h5 class="card-title text-dark">Các thành viên: </h5>
               <p>1. Ngô Thành Long</p>
               <p>2. Đỗ Bá Sơn</p>
               <p>3. Trịnh Tiến Anh</p>
               <p>4. Vũ Quốc Hưng</p>
               <p>5. Nguyễn Ngọc Hoàng Hà</p>
               <br>
               <h5 class="card-title text-dark">Các khuôn mẫu CSS, template và thư viện sử dụng</h5>
               <p>1. Khuôn mẫu CSS Bootstrap: <a href="https://getbootstrap.com/">https://getbootstrap.com/</a></p>
               <p>2. Bootstrap DatePicker: <a href="https://github.com/uxsolutions/bootstrap-datepicker">https://github.com/uxsolutions/bootstrap-datepicker</a></p>
               <p>3. DataTables: <a href="https://datatables.net/">https://datatables.net/</a></p>
               <p>4. Fontawesome phiên bản free</p>
               <p>5. jQuery và jQuery-easing: <a href="https://jquery.com/">https://jquery.com/</a></p>
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
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../php/signout.php?logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!--============================================================================================================-->

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!--Popper JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" integrity="sha512-nnzkI2u2Dy6HMnzMIkh7CPd1KX445z38XIu4jG1jGw7x5tSL3VBjE44dY4ihMU1ijAQV930SPM12cCFrB18sVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!--Boostrap DatePicker-->
    <script type="text/javascript" src="../vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script>
			$(function() {
			$('.dates #date').datepicker({
				'format': 'yyyy-mm-dd',
				'autoclose': true
			});
		});
			</script>
    <!-- Page level custom scripts -->
    <script>
    $(document).ready(function() {
    $('#dataTable').DataTable();
    });
    </script>
    
</html>
<?php
  }
  else 
  {
    header('Location: ../index.php');
    exit;
  }
?>