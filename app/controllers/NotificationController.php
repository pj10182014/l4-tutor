<?php
	class NotificationController extends BaseController {
		
		public function getNotification(){
			Mail::send('email.account-activation', array('link' => "fds", 'username' => "fdsf"), function($m){
                        $m->to("dpan218@gmail.com", "pan")->subject('Activation Email');}
                      );
			echo count(Mail::failures());

			make a notification model to get information from database;
			Select * from notification table where status != 1 && resend <= 4;
			send email;
			if(count mail failures = 0){
				update the notification table stauts;
			}else{
				update the notification tabel resend;
			}


		}
	}
?>