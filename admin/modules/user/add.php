
<!-- Hàm var_dump() sẽ in ra thông tin của biến gồm kiểu dữ liệu của biến và giá trị -->
<?php
	$open="user";
	require_once __DIR__. "/../../autoload/autoload.php";


//danh sach danh muc sp
    $data = 
      [
         "name"     =>postInput('name'),
         "email"   =>postInput("email"),
         "phone"    =>postInput("phone"),
         "password" =>MD5(postInput("password")),
         "address"  =>postInput("address"),
         
      ];
   /*$category = $db->fetchALL("category");*/
   if($_SERVER["REQUEST_METHOD"]=="POST")
   {
     

      $error=[];

      if(postInput("name")=='')
      {
         $error['name']="Mời bạn nhập Họ Và Tên";
      }

       if(postInput("password")=='')
      {
         $error['password']="Mời bạn nhập password";
      }
       if(postInput("email")=='')
      {
         $error['email']="Mời bạn nhập email";
      }
      else{
         $is_check = $db->fetchOne("user","email= '".$data['email']."'");
         if($is_check !=NULL)
         {
            $error['email']="email đã tồn tại ";
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

     

      if($data['password']!=MD5(postInput('re_password'))){

            $error['password']= 'Mật khẩu không khớp';
         }

      //error trống có nghĩa không có lỗi
      if(empty($error))
      {
 
        $id_insert = $db->insert("user",$data);
        if ($id_insert) 
        {
            $_SESSION['success'] = "Thêm mới thành công";
            redirectuser("user");
        }
        else
        {
            $_SESSION['error']="Thêm mới thất bại";
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
            Thêm mới user
          
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
               <input type="text" class="form-control" id="inputEmail3" placeholder="Hà Chí Vĩ" name="name" value="<?php echo $data['name']?>" ">
               <?php if (isset($error['name'])):  ?>
                     <p class="text-danger"> <?php echo $error['name'] ?> </p>
               <?php endif ?>
            </div>  
         </div>

         <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">email</label>
            <div class="col-sm-8">
               <input type="text" class="form-control" id="inputEmail3" placeholder="vihc0509@gmail.com" name="email" value="<?php echo $data['email']?>">
               <?php if (isset($error['email'])):  ?>
                     <p class="text-danger"> <?php echo $error['email'] ?> </p>
               <?php endif ?>
            </div>  
         </div>

         <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-8">
               <input type="number" class="form-control" id="inputEmail3" value="<?php echo $data['phone']?>" placeholder="01656019595" name="phone">
               <?php if (isset($error['phone'])):  ?>
                     <p class="text-danger"> <?php echo $error['phone'] ?> </p>
               <?php endif ?>
            </div>  
         </div>

         <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-8">
               <input type="password" class="form-control" id="inputEmail3" name="password" placeholder="******">
               <?php if (isset($error['password'])):  ?>
                     <p class="text-danger"> <?php echo $error['password'] ?> </p>
               <?php endif ?>
            </div>  
         </div>

         <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nhập lại Password</label>
            <div class="col-sm-8">
               <input type="password" class="form-control" id="inputEmail3" name="re_password" required="" placeholder="******"> 
               <?php if (isset($error['re_password'])):  ?>
                     <p class="text-danger"> <?php echo $error['re_password'] ?> </p>
               <?php endif ?>
            </div>  
         </div>


         <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Địa chỉ</label>
            <div class="col-sm-8">
               <input type="text" class="form-control" id="inputEmail3" placeholder="351A Lạc Long Quân,P5,Q11" name="address" value="<?php echo $data['address']?>" >
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