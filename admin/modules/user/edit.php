
<!-- Hàm var_dump() sẽ in ra thông tin của biến gồm kiểu dữ liệu của biến và giá trị -->
<?php
   $open="user";
   require_once __DIR__. "/../../autoload/autoload.php";
   


   $id=intval(getInPut('id'));
   
   $Edituser = $db->fetchID("user",$id);
   if(empty($Edituser))
   {
      $_SESSION['error']="Dữ liệu không tồn tại";
      redirectuser("user");
   }
//da
   /*$category = $db->fetchALL("category");*/
   if($_SERVER["REQUEST_METHOD"]=="POST")
   {
     
    // nh sach danh muc sp
    $data = 
      [
         "name"=>postInput('name'),
         "email"=>postInput("email"),
         "phone" => postInput("phone"),
         "address" =>postInput("address")
        
      ];

      $error=[];

      if(postInput("name")=='')
      {
         $error['name']="Mời bạn nhập Họ Và Tên";
      }


      if(postInput("email")=='')
      {
         $error['email']="Mời bạn nhập email";
      }
      
      else {
        if(postInput('email') !=$Edituser['email'])
        {
             $is_check = $db->fetchOne("user","email= '".$data['email']."'");
             if($is_check != NULL)
              {
                $error['email']="email đã tồn tại ";
              }
         }
      }
         
      
      
      if(postInput("phone")=='')
      {
         $error['phone']="Mời bạn nhập số điện thoại";
      }

       if(postInput("address")=='')
      {
         $error['address']="Mời bạn nhập địa chỉ";
      }

     

    
  
      //error trống có nghĩa không có lỗi
      if(empty($error))
      {
         
       
        $id_update = $db->update("user",$data,array("id"=>$id));
        if ($id_update > 0) {

            $_SESSION['success'] = "Cập nhật thành công";
            redirectuser("user");
        }
        else {
             $_SESSION['error']="Cập nhật thất bại";
            redirectuser("user");
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
            Chỉnh sửa thông tin 
            <small>Subheading</small>
         </h1>
         <ol class="breadcrumb">
            <li>
               <i class="fa fa-dashboard"></i>  <a href="">Dashboard</a>
            </li>
            <li>
               <i class="fa fa-dashboard"></i>  <a href="">user</a>
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
      <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">


         <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Họ Và Tên</label>
            <div class="col-sm-8">
               <input type="text" class="form-control" id="inputEmail3" placeholder="" name="name" value="<?php echo $Edituser['name']?>" ">
               <?php if (isset($error['name'])):  ?>
                     <p class="text-danger"> <?php echo $error['name'] ?> </p>
               <?php endif ?>
            </div>  
         </div>

         <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-8">
               <input type="text" class="form-control" id="inputEmail3" placeholder="9.000.000" name="email" value="<?php echo $Edituser['email']?>">
               <?php if (isset($error['email'])):  ?>
                     <p class="text-danger"> <?php echo $error['email'] ?> </p>
               <?php endif ?>
            </div>  
         </div>

         <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-8">
               <input type="number" class="form-control" id="inputEmail3" name="phone" value="<?php echo $Edituser['phone']?>">
               <?php if (isset($error['phone'])):  ?>
                     <p class="text-danger"> <?php echo $error['phone'] ?> </p>
               <?php endif ?>
            </div>  
         </div>

  

         <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Địa chỉ</label>
            <div class="col-sm-8">
               <input type="text" class="form-control" id="inputEmail3" placeholder="Tên sản phẩm" name="address" value="<?php echo $Edituser['address']?>" >
               <?php if (isset($error['address'])):  ?>
                     <p class="text-danger"> <?php echo $error['address'] ?> </p>
               <?php endif ?>
            </div>  
         </div>

        
         

       
  
         <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
               <button type="submit" class="btn btn-success">Lưu</button>
            </div>
         </div>
      </form>
   </div>
   <!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php";?>