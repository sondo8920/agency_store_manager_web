<?php
  session_start();
  require_once('../../lib/connection.php');
  if (isset($_SESSION['username']) && ($_SESSION['security_code']) )
  {
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/agencystore.css">
    <!--icon-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!--Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

</head>

<body>
  
  <main class="custom">
    <section class="second-header"> 
        <nav>
                <ul class="primary-nav">
                    
                    <li><a href="../../index.php"><span class="iconn"><ion-icon name="home-outline"></ion-icon></span> Home</a></li>
                    <li><a href="#">Tổ chức</a>
                      <ul class ="menu-dropdown">
                        <li><a href="../../php/ThemdaiLy.php">Quản lý các đại lý</a></li>
                        <li><a href="../../php/ThemMatHang.php">Quản lý mặt hàng</a></li>
                        <li><a href="#">Xuất phiếu</a>
                          <ul class ="menu-dropdown">
                            <li><a href="../../php/PhieuThuTien.php">Phiếu thu tiền</a></li>
                            <li><a href="../../php/Phieuxuathang.php">Phiếu xuất hàng</a></li>
                            
                          </li>
                          </ul></li>
                      </ul></li>
                    
                    <li><a href="#">Báo cáo</a>
                    <ul class ="menu-dropdown">
                      <li><a href="../../php/DoanhSo.php">Doanh số</a></li>
                    <li><a href="../../php/CongNo.php">Công nợ tháng</a></li>
                    </li></ul>
                    <li><a href="#">Khách hàng</a>
                      <ul class ="menu-dropdown">
                    <li><a href="../../php/PhanHoi.php">Phản hồi</a></li>
                    <li><a href="../../php/YeuCau.php">Yêu cầu Khác hàng</a></li></li></ul>
                    <li><a href="#">Contact</a>
                    <ul class="menu-dropdown">
                      <li><a href="#">Hotline: 0948232811</a></li>
                      <li><a href="https://vi-vn.facebook.com/">Facebook</a></li>
                      <li><a href="https://www.instagram.com/">Instagram</a></li>
                    </ul></li>
                    <li class="search-icon">
                      <input type="search" placeholder="Tìm kiếm...">
                      <label class="icon">
                      <img src="../../pic/Icon feather-search.png" alt="Search">
                      </label>
                   </li>
                   <button>
                   <li class ="login"><a href="../../php/signout.php?logout">Đăng xuất</a></li>
                   </button>
                </ul>         
        </nav>   
    </section>
    
    <input type="checkbox" id="check">
    <label for="check">
     
      <i class="fas fa-bars" id="btn" ></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
  <div class="slidebar">
    
    <header>Menu</header>
    <ul>
      <li><a href="#" class="feat-btn"><span class="iconn"><ion-icon name="home-outline"></ion-icon></span>Home</a></li>
      <li><a href="#" class="feat-btn"><span class="iconn"><ion-icon name="briefcase-outline"></ion-icon></span>Tổ Chức</a>
        <ul class ="menu-dropdown1">
          <li><a href="../../php/ThemdaiLy.php">Quản lý các đại lý</a></li>
          <li><a href="../../php/ThemMatHang.php">Quản lý mặt hàng</a></li>
          <li><a href="#">Xuất phiếu</a>
            <ul class ="menu-dropdown1">
              <li><a href="../../php/PhieuThuTien.php">Phiếu thu tiền</a></li>
              <li><a href="../../php/Phieuxuathang.php">Phiếu xuất hàng</a></li>
              
            </li>
            </ul></li>
        </ul></li>
      <li><a href="#" class="feat-btn"><span class="iconn"><ion-icon name="warning-outline"></ion-icon></span>Báo Cáo</a>
        <ul class ="menu-dropdown1">
          <li><a href="../../php/DoanhSo.php">Doanh số</a></li>
        <li><a href="../../php/CongNo.php">Công nợ tháng</a></li>
        </li></ul></li>
      <li><a href="#" class="feat-btn"><span class="iconn"><ion-icon name="accessibility-outline"></ion-icon></span>Khách Hàng</a>
        <ul class ="menu-dropdown1">
          <li><a href="../../php/PhanHoi.php">Phản hồi</a></li>
          <li><a href="../../php/YeuCau.php">Yêu cầu Khác hàng</a></li></li></ul></li>
      <li><a href="#" class="feat-btn"><span class="iconn"><ion-icon name="call-outline"></ion-icon></span>Contact</a>
        <ul class="menu-dropdown1">
          <li><a href="#">Hotline: 0948232811</a></li>
          <li><a href="#">Facebook</a></li>
          <li><a href="#">Instagram</a></li>
        </ul></li>
      
    </ul>
  </div>
  
  </main>
  <hr style="border: 0">
  <script>
    $('.feat-btn').click(function(){
      $('.menu-dropdown1').toggleClass("show");
    });
  </script>
  
</body>

</html>
<?php
  }
  else 
  {
    ?>
      <script>
        if (!alert('You MUST login first!')) {
          document.location = "./login.php";
        }
        </script>
        <?php
  }
?>