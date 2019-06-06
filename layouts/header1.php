<!DOCTYPE html>
<html>
   <head>
      <title>Vàng Bạc Đá Quý</title>
      <meta charset="utf-8">
      <script  src="<?php echo base_url()?>public/frontend/js/jquery-3.2.1.min.js"></script>
      <script  src="<?php echo base_url()?>public/frontend/js/bootstrap.min.js"></script>
      <!-- <script src="src/jquery.spritezoom.js"></script> -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/frontend/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/frontend/css/font-awesome.min.css">
      <!---->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/frontend/css/slick.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/frontend/css/slick-theme.css"/>
      <!--slide-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/frontend/css/style.css">
      <link rel="stylesheet" href="<?php echo base_url()?>public/frontend/css/owl.carousel.css">
      <script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '85bc2bc5-8c8c-4c26-b1c9-5bd9ec4f9bce', f: true }); done = true; } }; })();</script>
   </head>
   <body>
      <div id="wrapper">
         <!---->
         <!--HEADER-->
         <div id="header">
            <div id="header-top">
               <div class="container">
                  <div class="row clearfix">
                     <div class="col-md-6" id="header-text">
                        <a>VÀNG BẠC ĐÁ QUÝ</a><b>uy tín,chất lượng </b>
                     </div>
                     <div class="col-md-6 col-sm-6">
                        <nav id="header-nav-top">
                           <ul class="list-inline pull-right" id="headermenu">
                              <?php if(isset($_SESSION['name_user'])): ?>
                                 <li>Xin chào: <?php echo $_SESSION['name_user'] ?></li>
                                 <li>
                                    <a href=""><i class="fa fa-user"></i> Tài khoản <i class="fa fa-caret-down"></i></a>
                                    <ul id="header-submenu">
                                       <li><a href="thongtinkhachhang.php">Thông tin</a></li>
                                       <li><a href="giohang.php">Giỏ hàng</a></li>
                                       <li><a href="thoat.php"><i class="fa fa-share-square-o"></i>Thoát</a></li>
                                    </ul>
                                 </li>
                              
                              <?php else: ?>
                                 <li>
                                    <a href="dang-nhap.php"><i class="fa fa-unlock"></i> Đăng nhập</a>
                                 </li>
                                 <li>
                                    <a href="dang-ky.php"><i class="fa fa-user"></i> Đăng ký</a>
                                 </li>
                              <?php endif ?>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row" id="header-main">
                  <div class="col-md-5">
                     <form action="search.php" class="form-inline">
                        <div class="form-group">
                           <input type="text" name="search" placeholder="Nhập vào tên sản phẩm cần tìm..." class="form-control" size="30px">
                           <button type="submit" name="ok" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>   
                     </form>
                  </div>
                  <div class="col-md-4">
                            <a href="">
                                <img src="<?php echo base_url()?>public/frontend/images/NTJ.png">
                            </a>
                  </div>
                  <div class="col-md-3" id="header-right">
                     <div class="pull-right">
                        <div class="pull-left">
                           <i class="glyphicon glyphicon-phone-alt"></i>
                        </div>
                        <div class="pull-right">
                           <p id="hotline">HOTLINE</p>
                           <p>01656019595</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--END HEADER-->
         <!--MENUNAV-->
         <div id="menunav">
            <div class="container">
               <nav>
                  <div class="home pull-left">
                     <a href="index.php" >Trang chủ</a>
                  </div>
                  <!--menu main-->
                  <ul id="menu-main">
                     <li>
                        <a href="index1.php" >Mua sắm</a>
                     </li>
                     <li class="dropdown">
                        <a href="" >Sản phẩm</a>
                        <ul class="dropdown-content">
                           <?php foreach($category as $item): ?>
                           <li><a href="danh-muc-san-pham.php?id=<?php echo $item['id']?>"><strong><?php echo $item['name']?></strong></a></li>
                        <?php endforeach; ?>
                        </ul>
                     </li>
                     <li class="dropdown">
                        <a href="" >Tin tức</a>
                        <ul class="dropdown-content">
                           <li><a href="tintuckhuyenmai.php"><strong>Tin khuyến mãi</strong> </a></li>
                           <li><a href=""><strong>Góc báo chí  </strong> </a></li>
                           <li><a href=""><strong>Tin tức nội bộ</strong> </a></li>
                           <li><a href=""><strong>Video clips</strong> </a></li>
                           <li><a href=""><strong>Tuyển dụng</strong> </a></li>
                        </ul>
                     </li>
                     <li class="dropdown">
                        <a href="" >Hướng dẫn mua hàng</a>
                        <ul class="dropdown-content">
                           <li><a href=""><strong>Đặt hàng online</strong> </a></li>
                           <li><a href=""><strong>Dịch vụ bảo hành</strong> </a></li>
                           <li><a href=""><strong>Cách thức bảo quản</strong> </a></li>
                           <li><a href=""><strong>Hướng dẫn đo ni sản phẩm</strong> </a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="lienhe.php">Hệ thống chi nhánh</a>
                     </li>
                     <li>
                        <a href="">Liên hệ</a>
                     </li>
                  </ul>
                  <!-- end menu main-->
                  <!--Shopping-->
                  <ul class="pull-right" id="main-shopping">
                     <li>
                        <a href="giohang.php"><i class="fa fa-shopping-basket"></i> Giỏ hàng </a>
                     </li>
                  </ul>
                  <!--end Shopping-->
               </nav>
            </div>
         </div>
         <!--ENDMENUNAV-->
         <div id="maincontent">