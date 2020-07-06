<?php
	$filepath = realpath(dirname(__FILE__));
    include_once($filepath."/../lib/Database.php");
 	include_once($filepath."/../helpers/Formate.php");
?>


<?php
class Cart
{
	private $db;
	private $fm;
	
	function __construct()
	{
	 $this->db = new Database();
	 $this->fm = new formate();
	}
	public function addquandtity($quantity,$id){
		$quantity = $this->fm->validetion($quantity);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$productId = mysqli_real_escape_string($this->db->link, $id);
		$sId = session_id();
		$query = "SELECT * FROM tbl_product where productId = '$productId'";
		$result = $this->db->select($query)->fetch_assoc();
		$productName = $result['productName'];
		$price = $result['price'];
		$image = $result['image'];
		$query = " SELECT * FROM tbl_cart where productId = '$productId' AND sId = '$sId'";
		$getcart = $this->db->select($query);
		if ($getcart) {
			$msg = "<span style='color:red;font-size:15px;'>product already added!</span>";
			return $msg;
		}
		else{
		$query = "INSERT INTO tbl_cart(sId,productId,productName,price,quantity,image)VALUES('$sId','$productId','$productName','$price','$quantity','$image')";
		$insert_row = $this->db->insert($query);
		if ($insert_row) {
			header('Location:cart.php');
		}
		else{
			header("Location:404.php");
		}
	}
	}
	public function cartbysId(){
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart where sId='$sId'";
		$getcartall = $this->db->select($query);
		return $getcartall;
	}
	public function updatecartbyId($cartid,$quantity){
		$cratid = mysqli_real_escape_string($this->db->link, $cartid);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$query = "UPDATE tbl_cart 
		SET 
		quantity = '$quantity'
		where carId = '$cartid'";
		$carIdupdate = $this->db->update($query);
		if ($carIdupdate) {
			header("location:cart.php");
		}
		else{
			$msg = "<span style='coler:red;font-size:15px;'>Cart Not Update !</span>";
			return $msg;
		}
	}
	public function deletecartbyId($id){
		$id = mysqli_real_escape_string($this->db->link, $id);
		$query = "DELETE FROM tbl_cart where carId='$id'";
		$delcart = $this->db->delete($query);
		if ($delcart) {
			$msg = "<span style='color:green;font-size:20p;'>Cart Delete Successfully !</span>";
			return $msg;
		}
		else{
			$msg = "<span style='color:red;font-size:20p;'>Cart Delete Unsuccessfully !</span>";
			return $msg;
		}
	}
public function checkedcartdata(){
	$sid = session_id();
 	$query = "SELECT * FROM tbl_cart where sId='$sid'";
 	$getdata = $this->db->select($query);
 	return $getdata;

}
public function deleteCart(){
	$sId = session_id();
	$query = "DELETE FROM tbl_cart where sId='$sId'";
	$deletedata = $this->db->delete($query);
	return $deletedata;
}
public function datainsertorder($csmId){
	 $csmId = mysqli_real_escape_string($this->db->link, $csmId);
	 $sId = session_id();
	 $query = "SELECT *FROM tbl_cart where sId = '$sId'";
	 $getproduct = $this->db->select($query);
	 if ($getproduct) {
	 	while ($result = $getproduct->fetch_assoc()) {
	 		$productId = $result['productId'];
	 		$productName= $result['productName'];
	 		$quantity = $result['quantity'];
	 		$price = $result['price'];
	 		$image = $result['image'];
	 		 $query = "INSERT INTO tbl_order(csmId,productId,productName,price,quantity,image)VALUES('$csmId','$productId','$productName','$price','$quantity','$image')";
		$insert_row = $this->db->insert($query);
	 		
	 	}
	 }
}
	public function gettotalamount($csmId){
		$query = "SELECT *FROM tbl_order where csmId=$csmId AND date=now()";
		$getdata = $this->db->select($query);
		return $getdata;
	}
	public function getorderbyId($csmId){
		$query = "SELECT *FROM tbl_order where csmId = '$csmId'";
		$getdata = $this->db->select($query);
		return $getdata;
	}
public function checkedorderdata(){
	$query = "SELECT *FROM tbl_order";
		$getdata = $this->db->select($query);
		return $getdata;
}
public function getproductDetais(){
	$query = "SELECT * FROM tbl_order order by date desc";
	$getdata = $this->db->select($query);
	return $getdata;
}
public function statusupdateById($id,$price,$date){
	$id = mysqli_real_escape_string($this->db->link, $id);
	$price = mysqli_real_escape_string($this->db->link, $price);
	$date = mysqli_real_escape_string($this->db->link, $date);
	$query = "UPDATE tbl_order
	set
	status = '1'
	where csmId = '$id' AND price = '$price' AND date = '$date'";
	$updatestatus = $this->db->update($query);
	if ($updatestatus) {
		$msg = "<span style='colos:green;font-size:20px;'>Status update!</span>";
		return $msg;
	}
	else{
		$msg = "<span style='colos:red;font-size:20px;'>Status not update!</span>";
		return $msg;
	}
}
public function updateStatusbyId($id,$price,$date){
		$id = mysqli_real_escape_string($this->db->link, $id);
	$price = mysqli_real_escape_string($this->db->link, $price);
	$date = mysqli_real_escape_string($this->db->link, $date);
	$query = "UPDATE tbl_order
	set
	status = '2'
	where csmId = '$id' AND price = '$price' AND date = '$date'";
	$updatestatus = $this->db->update($query);
	if ($updatestatus) {
		$msg = "<span style='color:green;font-size:20px;'>Status update!</span>";
		return $msg;
	}
	else{
		$msg = "<span style='color:red;font-size:20px;'>Status not update!</span>";
		return $msg;
	}
}
public function delteproductbyId($id){
	$id = mysqli_real_escape_string($this->db->link, $id);
	$query ="DELETE FROM tbl_order where productId ='$id'";
	$deletedata = $this->db->delete($query);
	if ($deletedata ) {
		$msg = "<span style='color:green;font-size:20px;'>Product delete your cart !</span>";
		return $msg;
	}
	else{
		$msg = "<span style='color:green;font-size:20px;'>Product not delete Your cart!</span>";
		return $msg;
	}
}
public function delteproduct($id)
{
	$id = mysqli_real_escape_string($this->db->link, $id);
	$query ="DELETE FROM tbl_order where  	productId='$id'";
	$deletedata = $this->db->delete($query);
	if ($deletedata ) {
		$msg = "<span style='color:green;font-size:20px;'>Product delete your cart !</span>";
		return $msg;
	}
	else{
		$msg = "<span style='color:green;font-size:20px;'>Product not delete Your cart!</span>";
		return $msg;
	}
}
}

?>