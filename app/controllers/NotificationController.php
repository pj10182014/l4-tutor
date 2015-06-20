<?php
	class NotificationController extends BaseController {
		
		public function getNotification(){
//			Mail::send('email.account-activation', array('link' => "link", 'username' => "username"), function($m){
//                        $m->to("et1103@hotmail.com", "username")->subject('Activation Email');}
//                      );
//			echo count(Mail::failures());

          //Select * from notification table where status != 1 && resend <= 4;
            /* two ways to get data from the notification table */
            //use query builder
            //This one, if var_dump before the loop we can see the values of the rows
            $notification_data1 = DB::table('notification')->where('status', '=', 0)->where('resend', '<=', '4')->get();
            foreach($notification_data1 as $notification){
                $url = json_decode($notification->value)->link;
                $username = json_decode($notification->value)->username;

                Mail::send($notification->template, array('link' => $url, 'username' => $username), function($m) use($notification){
                    $m->to($notification->email, $notification->name)->subject('Activation Email');}
                );
              //send email;
              //if(count mail failures = 0){
              //	update the notification table stauts;
              //}else{
              //	update the notification tabel resend;
              //}
                if(count(Mail::failures()) == 0){
                    DB::table('notification')->update(array('status' => 1));
                    echo 'Status updated';
                }else{
                    $resend = $notification->resend + 1;
                    DB::table('notification')->update(array('resend' => $resend));
                    echo 'resend updated';
                }
            }
            //use eloquent
            //This one, if var_dump before the loop, we get errors
//            $notification_data2 = Notification::where('status', '=', 0)->get();
//            foreach($notification_data2 as $notification){
//                echo $notification->email . '<br>';
//            }
		}
	}
?>