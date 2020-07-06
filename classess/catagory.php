<?php
	$filepath = realpath(dirname(__FILE__));
    include_once($filepath."/../lib/Database.php");
 	include_once($filepath."/../helpers/Formate.php");
?>

<?php

class Catagory
{
	 private $db;
 	 private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new formate();
	}

	public function isnsertCat($catname){
		$catname = $this->fm->validetion($catname);
		$catname = mysqli_real_escape_string($this->db->link,$catname);
		 if ($catname == "") {
		 $msg = "<span class='error'>Filed Must Not Be Empty !</span>";
		 return $msg;
		 }
		 else{
		 	$query = "INSERT INTO  tbl_catgory(catName)VALUES('$catname')";
		 	$catInsert = $this->db->insert($query);
		 	if ($catInsert) {
		 		$msg = "<span class='success'>Catagory Insert Successfully !</span>";
		 		return $msg;
		 	}
		 	else{
		 		$msg = "<span class='error'>Catagory Not Insert Successfully !</span>";
		 		return $msg;
		 	}

		 }
	}
	public function catlist(){
		$query = "SELECT * FROM tbl_catgory order by catId desc";
		$showcat = $this->db->select($query);
		return $showcat;
	}
	 public function getproductId($id){
	 	$query = "SELECT * FROM tbl_catgory where catId='$id'";
	 	$showproduct = $this->db->select($query);
	 	return $showproduct;
	 }
	 public function updateCat($catname,$id){
	 $catname = $this->fm->validetion($catname,$id);
		$catname = mysqli_real_escape_string($this->db->link,$catname);
		$id= mysqli_real_escape_string($this->db->link,$id);
		 if ($catname == "") {
		 $msg = "<span class='error'>Filed Must Not Be Empty !</span>";
		 return $msg;
		 }

	 $query ="UPDATE tbl_catgory
	 SET
	 catName='$catname'
	 where catId ='$id'";
	 $updateproduct = $this->db->update($query);
	 if ($updateproduct) {
	 $msg = "<span class='success'>Catagory Update Successfully !</span>";
	 return $msg;
	 }
	 else{
	 	$msg = "<span class='success'>Catagory Update Not  Successfully !</span>";
	 	return $msg;
	 }
	 return $updateproduct;
	}
	public function delcatbyId($id){
		$query = "DELETE FROM tbl_catgory where catId = '$id'";
		$productdelete = $this->db->delete($query);
		if ($productdelete) {
				$msg = "<span class='success'>Product Delete  Successfully !</span>";
	 	       return $msg;
		}
		else{
				$msg = "<span class='success'>product Not Delete Successfully !</span>";
	 	        return $msg;
		}
	}
	public function catagoryshowbyId(){
		$query= "SELECT *FROM tbl_catgory";
		$getcatagory = $this->db->select($query);
		return $getcatagory ;
	}
}


?>