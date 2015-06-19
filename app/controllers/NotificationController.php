<?php
	class NotificationController extends BaseController {
		
		public function getNotification(){
			Mail::send('email.account-activation', array('link' => "fds", 'username' => "fdsf"), function($m){
                        $m->to("dpan218@gmail.com", "pan")->subject('Activation Email');}
                      );
			echo count(Mail::failures());
		}
	}
?>