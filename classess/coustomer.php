<?php
	$filepath = realpath(dirname(__FILE__));
    include_once($filepath."/../lib/Database.php");
 	include_once($filepath."/../helpers/Formate.php");
?><?php 

class Coustomer
{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new formate();
	}
	public function coustomerRegistretion($data){
		$coustomerName = $this->fm->validetion($data['name']); 
		$coustomerCity = $this->fm->validetion($data['city']);
		$coustomerZip  = $this->fm->validetion($data['zip']);
		$coustomeremail= $this->fm->validetion($data['email']);
		$coustomeraddress = $this->fm->validetion($data['address']);
		$coustomercountry = $this->fm->validetion($data['country']);
		$coustomerphone = $this->fm->validetion($data['phone']);
		$coustomerpass  = $this->fm->validetion(md5($data['password']));


		$coustomerName = mysqli_real_escape_string($this->db->link, $coustomerName);
		$coustomerCity = mysqli_real_escape_string($this->db->link, $coustomerCity);
		$coustomerZip = mysqli_real_escape_string($this->db->link,  $coustomerZip);
		$coustomeremail = mysqli_real_escape_string($this->db->link, $coustomeremail);
		$coustomeraddress = mysqli_real_escape_string($this->db->link, $coustomeraddress);
		$coustomercountry = mysqli_real_escape_string($this->db->link, $coustomercountry);
		$coustomerphone = mysqli_real_escape_string($this->db->link, $coustomerphone);
		$coustomerpass = mysqli_real_escape_string($this->db->link, $coustomerpass);

		if ($coustomerName == "" || $coustomerCity == "" || $coustomerZip == "" || $coustomeremail == "" || $coustomeraddress == "" || $coustomercountry == "" || $coustomerphone == "" || $coustomerpass == "") {
			$msg = "<span style='color:red;font-size:20px;'>Filed Must Not Be Empty !</span>";
			return $msg;
		}
		$query = "SELECT * FROM tbl_coustomer where email='$coustomeremail' LIMIT 1";
		$mailfound = $this->db->select($query);
		if ($mailfound) {
			$msg = "<span style='color:red;font-size:20px;'>Your email address allready exists</span>";
			return $msg;
		}
		else{
			$query = "INSERT INTO tbl_coustomer(name,city,zip,email,address,country,phone,password)values('$coustomerName','$coustomerCity','$coustomerZip','$coustomeremail','$coustomeraddress','$coustomercountry','$coustomerphone','$coustomerpass')";
			$insertcoustomerdata = $this->db->insert($query);
			if ($insertcoustomerdata) {
				$msg = "<span style='color:green;font-size:20px;'>Your data insert successfully.</span>";
				return $msg;
			}
			else{
				$msg = "<span style='color:red;font-size:20px;'>Your data not insert</span>";
				return $msg;
			}
			
		}
		
	}
	public function coustomerLogin($data){
	$email = $this->fm->validetion($data['email']);
	$password = $this->fm->validetion($data['password']);
	$email  = mysqli_real_escape_string($this->db->link, $email);
	$password = mysqli_real_escape_string($this->db->link, $password);
	if (empty($email) || empty($password)) {
		$msg = "<span style='color:red;font-size:20px;'>Filed must not be empty !</span>";
		return $msg;
	}
	$query = "SELECT *FROM tbl_coustomer where email ='$email' AND password = '$password'";
	$result = $this->db->select($query);
	if ($result) {
		$value = $result->fetch_assoc();
		session::set('cuslogin', true);
		session::set('csmId',$value['coustomerId']);
		session::set('csmName',$value['name']);
		header("location:index.php");
	}else{
		$msg="<span style='color:red;font-size:20px;'>your password and email don't matched</span>";
		return $msg;
	}

	}
	public function customerProfilebyId($id){
		 $query = "SELECT *FROM tbl_coustomer where coustomerId = '$id'";
		 $getdata = $this->db->select($query);
		 return $getdata;

	}
	public function profileupdate($data,$id){
		$coustomerName = $this->fm->validetion($data['name']); 
		$coustomerCity = $this->fm->validetion($data['city']);
		$coustomerZip  = $this->fm->validetion($data['zip']);
		$coustomeremail= $this->fm->validetion($data['email']);
		$coustomeraddress = $this->fm->validetion($data['address']);
		$coustomercountry = $this->fm->validetion($data['country']);
		$coustomerphone = $this->fm->validetion($data['phone']);
		$coustomerpass  = $this->fm->validetion(md5($data['password']));


		$coustomerName = mysqli_real_escape_string($this->db->link, $coustomerName);
		$coustomerCity = mysqli_real_escape_string($this->db->link, $coustomerCity);
		$coustomerZip = mysqli_real_escape_string($this->db->link,  $coustomerZip);
		$coustomeremail = mysqli_real_escape_string($this->db->link, $coustomeremail);
		$coustomeraddress = mysqli_real_escape_string($this->db->link, $coustomeraddress);
		$coustomercountry = mysqli_real_escape_string($this->db->link, $coustomercountry);
		$coustomerphone = mysqli_real_escape_string($this->db->link, $coustomerphone);
		$coustomerpass = mysqli_real_escape_string($this->db->link, $coustomerpass);

		if ($coustomerName == "" || $coustomerCity == "" || $coustomerZip == "" || $coustomeremail == "" || $coustomeraddress == "" || $coustomercountry == "" || $coustomerphone == "") {
			$msg = "<span style='color:red;font-size:20px;'>Filed Must Not Be Empty !</span>";
			return $msg;
		}
		$query = "UPDATE tbl_coustomer
		SET 
		name = '$coustomerName',
		city = '$coustomerCity',
		zip  = '$coustomerZip',
		email= '$coustomeremail',
		address = '$coustomeraddress',
		country = '$coustomercountry',
		phone = '$coustomerphone'
		where coustomerId = '$id'";
		$updatedata = $this->db->update($query);
		if ($updatedata) {
			$msg = "<span style='color:red;font-size:20px;'>Your data Update Succesfully !</span>";
			return $msg;
		}
		else{
			$msg = "<span style='color:red;font-size:20px;'>Your data not Update</span>";
			return $msg;
		}

	}
	public function coustomerdetais($cusId){
		$cusId = mysqli_real_escape_string($this->db->link, $cusId);
		$query ="SELECT *FROM tbl_coustomer where coustomerId = '$cusId'";
		$getdata = $this->db->select($query);
		return $getdata;
	}
	
}
?>