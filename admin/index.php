
<!-- Hàm var_dump() sẽ in ra thông tin của biến gồm kiểu dữ liệu của biến và giá trị -->
<?php
	
	require_once __DIR__. "/autoload/autoload.php";
   $conn= mysqli_connect("localhost","root","","tutphp") or die ();
	$category = $db->fetchAll("category");
	$sql ="SELECT * FROM product ";
   $total = count($db->fetchsql($sql));
   $donhang ="SELECT * FROM transaction ";
   $tongdh = count($db->fetchsql($donhang));
   $tv ="SELECT * FROM user ";
   $tongtv = count($db->fetchsql($tv));
   $doanhthu="SELECT * FROM orders";
   $result = mysqli_query($conn,'SELECT SUM(price) AS tongdt FROM orders'); 
   $row = mysqli_fetch_assoc($result); 
   $sum = $row['tongdt'];
   /*$tongdt = total($db->fetchsql($doanhthu));*/
 ?>

<!-- Lệnh require, require_once, include và include_once dùng để import một file PHP A vào một file PHP B với mục đích giúp file PHP B có thể sử dụng được các thư viện trong file PHP A. -->
<?php require_once __DIR__. "/layouts/header.php"; ?>
   <!-- Page Heading -->
   <div class="row">
      <div class="col-lg-12">
         <h1 class="page-header">
            Xin chào bạn đến với trang quản trị của admin   
         </h1>
         <ol class="breadcrumb">
            <li>
               <i class="fa fa-dashboard"></i>  <a href="">Dashboard</a>
            </li>
            <li class="active">
               <i class="fa fa-file"></i> Trang chủ
            </li>
         </ol>
         <div class="clearfix"></div>
      </div>
   </div>
   <!-- /.row -->
   <div class="row">
      <div class="col-md-12">
          <div class="table-responsive">
               <table class="table table-bordered table-hover">
                  <thead>
                     <tr  >
                        <th style="text-align: center;">Tổng sản phẩm</th>
                        <th style="text-align: center;">Tổng số đơn hàng</th> 
                        <th style="text-align: center;">Tổng doanh thu</th> 
                        <th style="text-align: center;">Tổng số thành viên</th>              
                     </tr>
                  </thead>
                  <tbody style="text-align: center;">
                     <td><?php echo $total ?></td>
                     <td><?php echo $tongdh ?></td>
                     <td><?php echo formartPrice($sum) ?></td>
                     <td><?php echo $tongtv ?></td>
                  </tbody>
               </table>
            </div>
      </div>
   </div>
<?php require_once __DIR__. "/layouts/footer.php";?>