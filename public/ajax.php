<?php
if($_POST){
	$username = $_POST['username'];
	.....
	$result = array('error'=>'gfdgdf','result'=>1);
	echo json_encode($result);
}else{
	echo "1234";
}

?>