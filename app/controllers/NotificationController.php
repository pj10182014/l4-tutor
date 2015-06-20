<?php
	class NotificationController extends BaseController {
		
		public function getNotification(){
//			Mail::send('email.account-activation', array('link' => "link", 'username' => "username"), function($m){
//                        $m->to("et1103@hotmail.com", "username")->subject('Activation Email');}
//                      );
//			echo count(Mail::failures());

//			make a notification model to get information from database;
//			Select * from notification table where status != 1 && resend <= 4;

            /* two ways to get data from the notification table */
            //use query builder
            //This one, if var_dump before the loop we can see the values of the rows
            $notification_data1 = DB::table('notification')->where('status', '=', 0)->get();
            foreach($notification_data1 as $notification){
                Mail::send($notification->template, array('link' => "link", 'username' => "username"), function($m) use($notification){
                    $m->to($notification->email, $notification->name)->subject('Activation Email');}
                );
                echo count(Mail::failures());
            }
            //use eloquent
            //This one, if var_dump before the loop, we get errors
            $notification_data2 = Notification::where('status', '=', 0)->get();
            foreach($notification_data2 as $notification){
                echo $notification->email . '<br>';
            }


//			send email;
//			if(count mail failures = 0){
//				update the notification table stauts;
//			}else{
//				update the notification tabel resend;
//			}


		}
	}
?>