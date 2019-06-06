<!-- Hàm var_dump() sẽ in ra thông tin của biến gồm kiểu dữ liệu của biến và giá trị -->
<?php
	$open = "category";
	require_once __DIR__. "/../../autoload/autoload.php";

   $category = $db->fetchAll("category");
 ?>

<!-- Lệnh require, require_once, include và include_once dùng để import một file PHP A vào một file PHP B với mục đích giúp file PHP B có thể sử dụng được các thư viện trong file PHP A. -->
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
   <!-- Page Heading NOI DUNG -->
   <div class="row">
      <div class="col-lg-12">
         <h1 class="page-header">
            Danh sách mục
            <a href="add.php" class="btn btn-success">Thêm mới</a>
            <small>Subheading</small>
         </h1>
         <ol class="breadcrumb">
            <li>
               <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
               <i class="fa fa-file"></i> Blank Page
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
                        <th>Slug</th>
                        <th>Home</th>
                        <th>Created</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $stt=1;foreach ($category as $item):?>
                     <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $item['name'] ?></td>
                        <td><?php echo $item['slug'] ?></td>
                        <td>
                           <a href="home.php?id=<?php echo $item['id']?>" class="btn btn-xs <?php echo $item['home']==1?'btn-info':'bnt-default' ?>">
                              <?php echo $item['home']==1?"Hiển thị":"Không" ?></a>
                        </td>
                        <td><?php echo $item['create_at'] ?></td>
                        <td>
                           <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"><i class="fa fa-edit"></i> Sửa</a>
                           <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i>Xóa</a>
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
<?php require_once __DIR__. "/../../layouts/footer.php";?>