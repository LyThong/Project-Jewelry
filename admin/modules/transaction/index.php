<!-- Hàm var_dump() sẽ in ra thông tin của biến gồm kiểu dữ liệu của biến và giá trị -->
<?php
	$open = "transaction";
	require_once __DIR__. "/../../autoload/autoload.php";


if (isset($_GET['page'])) {
   $p =$_GET['page'];
}
else {
   $p = 1;
}


$sql= "SELECT transaction.*, user.name as nameuser, user.phone as phoneuser FROM transaction JOIN  user ON user.id=transaction.user_id ORDER BY ID DESC";

$transaction = $db->fetchJone('transaction',$sql,$p,10,true);


if(isset($transaction['page']))
{
$sotrang = $transaction['page'];
unset($transaction['page']);
}


 ?>

<!-- Lệnh require, require_once, include và include_once dùng để import một file PHP A vào một file PHP B với mục đích giúp file PHP B có thể sử dụng được các thư viện trong file PHP A. -->
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
   <!-- Page Heading NOI DUNG -->
   <div class="row">
      <div class="col-lg-12">
         <h1 class="page-header">
            Danh sách đơn hàng
            <a href="add.php" class="btn btn-success">Thêm mới</a>
            <small>Subheading</small>
         </h1>
         <ol class="breadcrumb">
            <li>
               <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
               <i class="fa fa-file"></i> Danh mục
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
                        <th>Phone</th>
                        <th>Status</th>               
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $stt=1;foreach ($transaction as $item):?>
                     <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $item['nameuser'] ?></td>
                        <td><?php echo $item['phoneuser'] ?></td>
                        <td>
                           <a href="status.php?id=<?php echo $item['id']?>" class="btn btn-xs <?php echo $item['status']==0?'btn-danger':'btn-info'?>"><?php echo $item['status']==0?'Chưa xử lý':'Đã xử lý' ?></a>
                        </td>         
                        <td>
                           <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i>Xóa</a>
                           <a class="btn btn-xs btn-info" href="thongtindonhang.php?id=<?php echo $item['user_id'] ?>"><i class="fa fa-shopping-basket"></i>Thông tin đơn hàng</a>
                        </td>
                     </tr>
                     <?php $stt++;endforeach ?>
                  </tbody>
               </table>
               <div class="pull-right">
                  <nav aria-label="Page navigation example">
                     <ul class="pagination">
                        <li class="page-item">
                           <a class="page-link" href="#" aria-label="Previous">
                           <span aria-hidden="true">&laquo;</span>
                           <span class="sr-only">Previous</span>
                           </a>
                        </li>

                        <?php for($i = 1; $i<= $sotrang; $i++) : ?>
                        
                        <?php 

                        if(isset($_GET['page']))
                        {

                          $p=$_GET['page']; 
                         
                        }
                        else
                        {
                           $p=1;
                        }
                        ?>
                        <li class="<?php echo($i == $p) ? 'active' : '' ?>">
                           <a href="?page= <?php echo $i;?>"><?php echo $i;?></a>
                        </li>
                        <?php endfor ?>


                        <li class="pagination">
                           <a class="page-link" href="#" aria-label="Next">
                           <span aria-hidden="true">&raquo;</span>
                           <span class="sr-only">Next</span>
                           </a>
                        </li>
                     </ul>
                  </nav>
               </div>
            </div>
      </div>
   </div>
   <!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php";?>