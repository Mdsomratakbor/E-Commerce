<?php
	$filepath = realpath(dirname(__FILE__));
    include_once($filepath."/../lib/Database.php");
 	include_once($filepath."/../helpers/Formate.php");
?>

<?php

class Brand
{
	private $db;
	private $fm;
	
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new formate();
		
	}
	public function isnsertBrand($brandname){
		$brandname = $this->fm->validetion($brandname);
		$brandname = mysqli_real_escape_string($this->db->link,$brandname);
		if (empty($brandname)) {
			$msg = "<span class='success'>Filed Must Not Be Empty !</span>";
			return $msg;
		}
		else{
			$query = "INSERT INTO tbl_brand(brandName)values('$brandname')";
			$insertbrand = $this->db->insert($query);
			if ($insertbrand) {
				$msg = "<span class='success'>Brand Insert Successfully !!</span>";
				return $msg;
			}
			else{
				$msg = "<span class='error'>Brand Not Insert Successfully !!</span>";
				return $msg;
			}
		}
	}
	public function brandlist(){
		$query = "SELECT *FROM tbl_brand order by brandId ";
		$brandshow = $this->db->select($query);
		return $brandshow;
	}
public function showbrandnamebyId($id)
{
	$query = "SELECT *FROM tbl_brand where brandId='$id'";
	$showbrandname = $this->db->select($query);
	return $showbrandname;
}



	public function updateBrand($brandname,$id){
		$brandname = $this->fm->validetion($brandname);
		$brandname = mysqli_real_escape_string($this->db->link,$brandname);
		$id = mysqli_real_escape_string($this->db->link, $id);
		if (empty($brandname)) {
			$msg = "<span class='success'>Filed Must Not Be Empty !</span>";
			return $msg;
		}
		$query = "UPDATE tbl_brand
		SET 
		brandName = '$brandname'
		where brandId = '$id'";
		$brandupdate = $this->db->update($query);
		if ($brandupdate) {
			$msg = "<span class='success'>Brand Name Update Successfully !</span>";
			return $msg;

		}
		else{
			$msg = "<span class='error'>Brand Name Not Update Successfully !!</span>";
			return $msg;
		}
	}
	public function delbrandbyId($id){
		$query = "DELETE FROM tbl_brand where brandId='$id'";
		$erasebrand = $this->db->delete($query);
		if ($erasebrand ) {
			$msg = "<span class='success'>Brand Name Delete Successfully !!</span>";
			return $msg;
		}
		else{
			$msg = "<span class='error'>Brand Name Not Delete Successfully !!</span>";
			return $msg;
		}
	}

}





?>