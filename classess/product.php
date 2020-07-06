<?php
	$filepath = realpath(dirname(__FILE__));
    include_once($filepath."/../lib/Database.php");
 	include_once($filepath."/../helpers/Formate.php");
?>

<?php
class Product
{
	private $db;
	private $fm;
	
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new formate();
	}

	public function insertProduct($data,$files){
		$productname = $this->fm->validetion($data['productName']);
		$catid = $this->fm->validetion($data['catId']);
		$brandid = $this->fm->validetion($data['brandId']);
		$body = $this->fm->validetion($data['body']);
		$price = $this->fm->validetion($data['price']);
		$type = $this->fm->validetion($data['producttype']);
		$productName = mysqli_real_escape_string($this->db->link,$productname);
		$catid = mysqli_real_escape_string($this->db->link,$catid);
		$brandid = mysqli_real_escape_string($this->db->link,$brandid);
		$body = mysqli_real_escape_string($this->db->link,$body);
		$price = mysqli_real_escape_string($this->db->link,$price);
		$type = mysqli_real_escape_string($this->db->link,$type);
		//Image Validetion code //
		$permited = array('jpg','jpeg','png','bitmap','gif');
		$file_name = $files['image']['name'];
		$file_size = $files['image']['size'];
		$file_tmp = $files['image']['tmp_name'];
		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_name = substr(md5(time()), 0, 10).'.'.$file_ext;
		$upload_image = "upload/".$unique_name;
		if ($productName == "" || $catid == "" || $brandid == "" || $body == "" || $price == "" || $type == "" || $file_name == "") {
			$msg = "<span class='error'>Filed Must Not Be Empty !!</span>";
			return $msg;
		}
		elseif ($file_size>40000988) {
			$msg = "<span class='error'>Your Image Size Problem !!</span>";
			return $msg;
		}
		elseif (in_array($file_ext, $permited)== false) {
			$msg = "<span>You should only Upload".implode(',', $permited)."</span>";
			return $msg;
		}
		else{
			move_uploaded_file($file_tmp, $upload_image);
			$query ="INSERT INTO tbl_product(productName,catId,brandId,body,price,image,producttype)VALUES('$productName','$catid','$brandid','$body','$price','$upload_image','$type')";
			$isertproduct = $this->db->insert($query);
			if ($isertproduct) {
				$msg = "<span class='success'>Product Insert Successfully !!</span>";
				return $msg;
			}
			else{
				$msg = "<span class='error'>Product Not Insert Successfully !!</span>";
				return $msg;
			}
		}




	}
	 public function getallproduct(){
	 	$query = "SELECT  tbl_product.*, tbl_catgory.catName, tbl_brand.brandName
	 	From tbl_product
	 	INNER JOIN tbl_catgory
	 	ON tbl_product.catId = tbl_catgory.catId
	 	INNER JOIN tbl_brand
	 	ON tbl_product.brandId= tbl_brand.brandId
	 	order by tbl_product.productId desc";
	 	$showproduct = $this->db->select($query);
	 	return $showproduct;
	 }
	 public function getproduct($id){
	 	$query = "SELECT *FROM tbl_product where productId ='$id'";
	 	$getallproduct = $this->db->select($query);
	 	return $getallproduct;
	 }
	 public function productUpdate($data,$files,$id){
        $productname = $this->fm->validetion($data['productName']);
		$catid = $this->fm->validetion($data['catId']);
		$brandid = $this->fm->validetion($data['brandId']);
		$body = $this->fm->validetion($data['body']);
		$price = $this->fm->validetion($data['price']);
		$type = $this->fm->validetion($data['producttype']);
		$productName = mysqli_real_escape_string($this->db->link,$productname);
		$catid = mysqli_real_escape_string($this->db->link,$catid);
		$brandid = mysqli_real_escape_string($this->db->link,$brandid);
		$body = mysqli_real_escape_string($this->db->link,$body);
		$price = mysqli_real_escape_string($this->db->link,$price);
		$type = mysqli_real_escape_string($this->db->link,$type);
		//Image Validetion code //
		$permited = array('jpg','jpeg','png','bitmap','gif');
		$file_name = $files['image']['name'];
		$file_size = $files['image']['size'];
		$file_tmp = $files['image']['tmp_name'];
		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_name = substr(md5(time()), 0, 10).'.'.$file_ext;
		$upload_image = "upload/".$unique_name;
		if ($productName == "" || $catid == "" || $brandid == "" || $body == "" || $price == "" || $type == "" || $file_name == "") {
			$msg = "<span class='error'>Filed Must Not Be Empty !!</span>";
			return $msg;
		}
		elseif ($file_size>40000988) {
			$msg = "<span class='error'>Your Image Size Problem !!</span>";
			return $msg;
		}
		elseif (in_array($file_ext, $permited)== false) {
			$msg = "<span>You should only Upload".implode(',', $permited)."</span>";
			return $msg;
		}
		else{
			move_uploaded_file($file_tmp, $upload_image);
			$query = "UPDATE tbl_product
			SET 
			productName = '$productName',
			catId = '$catid',
			brandId =  '$brandid',
			body = '$body',
			price = '$price',
			image = '$upload_image',
			producttype = '$type'
			where productId = '$id'";
			$updateproduct = $this->db->update($query);
			if ($updateproduct) {
				$msg = "<span class='success'>Product Update Successfully !!</span>";
				return $msg;
			}
			else{
				$msg = "<span class='error'>Product  Update Unsuccessfully !!</span>";
				return $msg;
			}



	 }
}
public function productDelete($id){
	$query = "DELETE FROM tbl_product where productId = '$id'";
	$deletepro = $this->db->delete($query);
	if ($deletepro) {
		$msg = "<span class='success'>Product Delete Successfully !</span>";
		return $msg;
	}
	else{
		$msg = "<span class='error'>Product Delete Not Successfully !</span>";
		return $msg;
	}

	return $deletepro;
}
public function showproductbyId(){
	$query = "SELECT * FROM tbl_product where producttype='0' order by productId desc limit 4";
	$productshow = $this->db->select($query);
	return $productshow;
}
public function newproduct(){
	$query = " SELECT * FROM tbl_product order by productId desc limit 4";
	$newproductshow = $this->db->select($query);
	return $newproductshow;
}
public function productdetailsbyId($id){

	$query = "SELECT  tbl_product.*, tbl_catgory.catName,tbl_brand.brandName
	FROM tbl_product
	INNER JOIN tbl_catgory
	ON tbl_product.catId = tbl_catgory.catId
	INNER JOIN tbl_brand
	ON tbl_product.brandId = tbl_brand.brandId
	where tbl_product.productId = '$id'";
	$getproduct =$this->db->select($query);
	return $getproduct;
}
public function iponebyId(){
	$query = "SELECT *FROM tbl_product where brandId =1 order by productId desc limit 1";
	$getdata = $this->db->select($query);
	return $getdata;
}
public function iponebyIdbrand(){
	$query = "SELECT *FROM tbl_product where brandId =1 order by productId desc limit 4";
	$getdata = $this->db->select($query);
	return $getdata;
}
public function samsungbyId()
{
	$query = "SELECT *FROM tbl_product where brandId =2 order by productId desc limit 1";
	$getdata = $this->db->select($query);
	return $getdata;

}
public function samsungbybrand()
{
	$query = "SELECT *FROM tbl_product where brandId =2 order by productId desc limit 4";
	$getdata = $this->db->select($query);
	return $getdata;

}

public function acerbyId(){
	$query = "SELECT *FROM tbl_product where brandId =3 order by productId desc limit 1";
	$getdata = $this->db->select($query);
	return $getdata;
}
public function acerbybybrand(){
	$query = "SELECT *FROM tbl_product where brandId =3 order by productId desc limit 4";
	$getdata = $this->db->select($query);
	return $getdata;
}

public function canonbyId(){
	$query = "SELECT *FROM tbl_product where brandId =4 order by productId desc limit 1";
	$getdata = $this->db->select($query);
	return $getdata;
}
public function canonbybrand(){
	$query = "SELECT *FROM tbl_product where brandId =4 order by productId desc limit 4";
	$getdata = $this->db->select($query);
	return $getdata;
}
public function catagoryshowbyId($cataId){
	$query = "SELECT *FROM tbl_product where catId ='$cataId'";
	$getdata = $this->db->select($query);
	return $getdata;
}
}
?>