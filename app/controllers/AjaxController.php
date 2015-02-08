<?php 
class AjaxController extends BaseController{

	public function postValidateUsername()
	{
		$username = $_POST['username'];

		$user = User::where('user_name', '=', $username)->first();
		if ($user)
		{
			$result = array('exist' => true);
		}
		else
		{
			$result = array('exist' => false);
		}
		echo json_encode($result);
	}

}

 ?>