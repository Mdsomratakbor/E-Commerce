<?php 
$filepath = realpath(dirname(__FILE__));
include($filepath."/../lib/session.php");
 session::checklogin();
    include_once($filepath."/../lib/Database.php");
 	include_once($filepath."/../helpers/Formate.php");
?>

 ?>

<?php


class Adminlogin 
{
	private $db;
	private $fm;
	function __construct()
	{
	$this->db = new Database();
	$this->fm = new formate();
	}
public function adminLogin($adminUser,$adminPass){
	 $adminuser = $this->fm->validetion($adminUser);
	 $adminpass = $this->fm->validetion($adminPass);
	 $adminuser = mysqli_real_escape_string($this->db->link,$adminuser);
	 $adminpass = mysqli_real_escape_string($this->db->link,$adminpass);
	 if (empty($adminuser) || empty($adminpass)) {
	 	$loginmsg = "Username  & Password Must Not Be Empty!";
	 	return $loginmsg;
	 }
	 else{
	 	$query = "SELECT * FROM tbl_admin where adminUser='$adminuser' And adminPass='$adminpass'";
	 	$result = $this->db->select($query);
	 	if ($result) {
	 		while ($value = $result->fetch_assoc()) {
	 			session::set('adminlogin',true);
	 			session::set('adminId',$value['adminId']);
	 			session::set('adminName',$value['adminName']);
	 			session::set('adminUser',$value['adminUser']);
	 			header('Location:index.php');
	 		}
	 	}
	 		else{
	 			$loginmsg = "Your Password and Username Not Match !";
	 			return $loginmsg;
	 		}
	 	

	 }



}

}



?>