<!-- Hàm var_dump() sẽ in ra thông tin của biến gồm kiểu dữ liệu của biến và giá trị -->
<?php
	$open = "user";
	require_once __DIR__. "/../../autoload/autoload.php";

$user = $db->fetchAll("user");
/*if (isset($_GET['page'])) {
   $p =$_GET['page'];
}
else {
   $p = 1;
}*/


$sql= "SELECT user.*FROM user ORDER BY DESC";


/*$product = $db->fetchJone('product,$sql,$p,3,true');  
if(isset($product['page']))
{
$sotrang = $product['page'];
unset($product['page']);
}*/


 ?>

<!-- Lệnh require, require_once, include và include_once dùng để import một file PHP A vào một file PHP B với mục đích giúp file PHP B có thể sử dụng được các thư viện trong file PHP A. -->
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
   <!-- Page Heading NOI DUNG -->
   <div class="row">
      <div class="col-lg-12">
         <h1 class="page-header">
            Danh sách thành viên
             <a href="add.php" class="btn btn-success">Thêm mới</a>
           
         </h1>
         <ol class="breadcrumb">
            <li>
               <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
               <i class="fa fa-file"></i> Danh sách thành viên
            </li>
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
                        <th>Name</th> 
                        <th>Email</th> 
                        <th>Phone</th>              
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $stt=1;foreach ($user as $item):?>
                     <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $item['name'] ?></td>
                        <td><?php echo $item['email'] ?></td>
                        <td><?php echo $item['phone'] ?></td>           
                        <td>
                           <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i>Xóa</a>
                            <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"><i class="fa fa-edit"></i>sửa</a>
                        </td>
                     </tr>
                     <?php $stt++;endforeach ?>
                  </tbody>
               </table>
               <!-- <div class="pull-right">
                  <nav aria-label="Page navigation example">
                  <ul class="pagination">
                     <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                        </a>
                     </li>
                     <li class="page-item"><a class="page-link" href="#">1</a></li>
                     <li class="page-item"><a class="page-link" href="#">2</a></li>
                     <li class="page-item"><a class="page-link" href="#">3</a></li>
                     <li class="page-item"><a class="page-link" href="#">4</a></li>
                     <li class="page-item"><a class="page-link" href="#">5</a></li>
                     <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                        </a>
                     </li>
                  </ul>
               </nav>
               </div> -->
            </div>
      </div>
   </div>
   <!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php";?>  product