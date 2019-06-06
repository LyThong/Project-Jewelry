
<!-- Hàm var_dump() sẽ in ra thông tin của biến gồm kiểu dữ liệu của biến và giá trị -->
<?php
	$open="category";
	require_once __DIR__. "/../../autoload/autoload.php";

   //Lấy ID -> nếu kiểm tra k tồn tại -> đưa về trang danh sách
   $id=intval(getInPut('id'));
   
   $Editcategory = $db->fetchID("category",$id);
   if(empty($Editcategory))
   {
      $_SESSION['error']="Dữ liệu không tồn tại";
      redirectAdmin("category");
   }

   /**
   * kiểm tra xem danh mục có sản phẩm chưa
   */
   $num=$db->delete("category",$id);
   if($num>0)
   {
      $_SESSION['success']="Xóa thành công";
      redirectAdmin("category");
   }
   else
   {
      $_SESSION['error']="Xóa thất bại";
      redirectAdmin("category");
   }
   

 ?>

