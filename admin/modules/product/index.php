<!-- Hàm var_dump() sẽ in ra thông tin của biến gồm kiểu dữ liệu của biến và giá trị -->
<?php
	$open = "product";
	require_once __DIR__. "/../../autoload/autoload.php";

   /*$product = $db->fetchAll("product");*/

if (isset($_GET['page'])) {
   # code...
   $p =$_GET['page'];
}
else {
   $p = 1;
}


$sql= "SELECT product.*,category.name as namecate FROM product
LEFT JOIN category on category.id = product.category_id";

$product = $db->fetchJone('product',$sql,$p,5,true);


if(isset($product['page']))
{
$sotrang = $product['page'];
unset($product['page']);
}


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
                        <th>Danh Mục</th> 
                        <th>Slug</th>
                        <th>thunbar</th>
                        <th>Thông tin</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $stt=1;foreach ($product as $item):?>
                     <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $item['name'] ?></td>
                        <td><?php echo $item['category_id'] ?></td> 
                        <td><?php echo $item['slug'] ?></td>
                        <td>
                           
                           <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar']?>" width="80px" height="80px">
                        </td>
                        <td><ul>
                           <li>
                              Giá: <?php echo $item['price']?>
                           </li>
                           <li>
                             Số Lượng: <?php echo $item['number']?>
                           </li>
                        </ul></td>
                        <td>
                           <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"><i class="fa fa-edit"></i> Sửa</a>
                           <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i>Xóa</a>
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
<?php require_once __DIR__. "/../../layouts/footer.php";?>  product