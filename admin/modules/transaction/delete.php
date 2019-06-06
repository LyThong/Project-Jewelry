<!-- Hàm var_dump() sẽ in ra thông tin của biến gồm kiểu dữ liệu của biến và giá trị -->
<?php
   $open="transaction";
   require_once __DIR__. "/../../autoload/autoload.php";

   //Lấy ID -> nếu kiểm tra k tồn tại -> đưa về trang danh sách
   $id=intval(getInPut('id'));
   
   $EditProduct = $db->fetchID("transaction",$id);
   if(empty($EditProduct))
   {
      $_SESSION['error']="Dữ liệu không tồn tại";
      redirectAdmin("transaction");
   }

   /**
   * kiểm tra xem danh mục có sản phẩm chưa
   */
   $num=$db->delete("transaction",$id);
   if($num>0)
   {
      $_SESSION['success']="Xóa thành công";
      redirectAdmin("transaction");
   }
   else
   {
      $_SESSION['error']="Xóa thất bại";
      redirectAdmin("transaction");
   }
   

 ?>