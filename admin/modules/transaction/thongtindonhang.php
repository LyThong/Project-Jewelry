<!-- Hàm var_dump() sẽ in ra thông tin của biến gồm kiểu dữ liệu của biến và giá trị -->
<?php
   $ma_id=$_GET['id'];
	require_once __DIR__. "/../../autoload/autoload.php";
   $sql= "SELECT * FROM `orders` where transaction_id=(select id from transaction where user_id=$ma_id) ";
   
   $der = $db->fetchsql($sql);
   $chuoi="";
   $mang_soluong=array();
   foreach($der as $i)
   {
      $chuoi.=$i['product_id'].",";
      $mang_soluong[$i['product_id']]=$i['qty'];

   }
   $chuoi=substr($chuoi, 0,strlen($chuoi)-1);
   //echo $chuoi;
   

   $sql="SELECT * FROM product where product.id in($chuoi)";
   $der = $db->fetchsql($sql);
  

 ?>

<!-- Lệnh require, require_once, include và include_once dùng để import một file PHP A vào một file PHP B với mục đích giúp file PHP B có thể sử dụng được các thư viện trong file PHP A. -->
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
   <!-- Page Heading NOI DUNG -->  
   <div class="row">
      <div class="col-lg-12">
         <h1 class="page-header">
            Thông tin đơn hàng
         </h1>
         <ol class="breadcrumb">
            <li>
               <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
               <i class="fa fa-file"></i>Đơn hàng
         </ol>
         <div class="clearfix"></div>

         <!-- Thông báo lỗi -->
         <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">
          <div class="table-responsive">
               <table class="table table-bordered table-hover">
                  <thead>
                     <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th> 
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>               
                        <th>Tổng tiền</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $stt=1;foreach ($der as $item):?>
                     <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $item['name'] ?></td>
                        <td><img src="<?php echo uploads() ?>product/<?php echo $item['thunbar']?>" width="80px" height="80px"></td>
                        <td><?php echo $mang_soluong[$item['id']]; ?></td> 
                        <td><?php echo formartprice($item['price']) ?></td>       
                     </tr>
                     <?php $stt++;endforeach ?>
                  </tbody>
               </table>
            </div>
      </div>
   </div>
   <!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php";?>