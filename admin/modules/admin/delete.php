
<!-- Hàm var_dump() sẽ in ra thông tin của biến gồm kiểu dữ liệu của biến và giá trị -->
<?php
	$open="admin";
	require_once __DIR__. "/../../autoload/autoload.php";

   //Lấy ID -> nếu kiểm tra k tồn tại -> đưa về trang danh sách
   $id=intval(getInPut('id'));
   
   $Editcategory = $db->fetchID("admin",$id);
   if(empty($Editcategory))
   {
      $_SESSION['error']="Dữ liệu không tồn tại";
      redirectAdmin("admin");
   }

   /**
   * kiểm tra xem danh mục có sản phẩm chưa
   */
   $num=$db->delete("admin",$id);
   if($num>0)
   {
      $_SESSION['success']="Xóa thành công";
      redirectAdmin("admin");
   }
   else
   {
      $_SESSION['error']="Xóa thất bại";
      redirectAdmin("admin");
   }
   

 ?>

