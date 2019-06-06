
<!-- Hàm var_dump() sẽ in ra thông tin của biến gồm kiểu dữ liệu của biến và giá trị -->
<?php
	$open="category";
	require_once __DIR__. "/../../autoload/autoload.php";

   if($_SERVER["REQUEST_METHOD"]=="POST")
   {
      $data = 
      [
         "name"=>postInput('name'),
         "slug"=>to_slug(postInput("name"))
      ];

      $error=[];

      if(postInput("name")=='')
      {
         $error['name']="Mời bạn nhập đầy đủ tên danh mục";
      }

      //error trống có nghĩa không có lỗi
      if(empty($error))
      {
         $isset = $db->fetchOne("category","name='".$data['name']."'");/*kiểm tra tên có tồn tại hay k*/
         if(count($isset))
         {
            $_SESSION['error']="Tên danh mục đã tồn tại!";
         }

         else
         {
            $id_insert = $db->insert("category",$data);
            if($id_insert>0)
            {
                $_SESSION['success']="Thêm mới thành công"; 
               redirectAdmin("category");
            }
            else 
            {
               //thêm thất bại
               $_SESSION['error']="Thêm mới thất bại";
            }
         }
      }

   }



 ?>

<!-- Lệnh require, require_once, include và include_once dùng để import một file PHP A vào một file PHP B với mục đích giúp file PHP B có thể sử dụng được các thư viện trong file PHP A. -->
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
   <!-- Page Heading -->
   <div class="row">
      <div class="col-lg-12">
         <h1 class="page-header">
            Thêm mới danh mục
            <small>Subheading</small>
         </h1>
         <ol class="breadcrumb">
            <li>
               <i class="fa fa-dashboard"></i>  <a href="">Dashboard</a>
            </li>
            <li>
               <i class="fa fa-dashboard"></i>  <a href="">Danh mục</a>
            </li>
            <li class="active">
               <i class="fa fa-file"></i> Thêm mới
            </li>
         </ol>
         <div class="clearfix"></div>
         <!-- Thông báo lỗi -->
         <?php if(isset($_SESSION['error'])):  ?>
            <div class="alert alert-danger">
               <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
            </div>
         <?php endif;  ?>
      </div>
   </div>
   <div class="col-md-12">
      <form class="form-horizontal" action="" method="POST">
         <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Tên danh mục</label>
            <div class="col-sm-8">
               <input type="text" class="form-control" id="inputEmail3" placeholder="Tên danh mục" name="name">
               <?php if (isset($error['name'])):  ?>
                     <p class="text-danger"> <?php echo $error['name'] ?> </p>
               <?php endif ?>
            </div>
         </div>

         <!-- <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
               <div class="checkbox">
                  <label>
                  <input type="checkbox" name="">
                  Remember me
                  </label>
               </div>
            </div>
         </div> -->
         <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
               <button type="submit" class="btn btn-success">Lưu</button>
            </div>
         </div>
      </form>
   </div>
   <!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php";?>