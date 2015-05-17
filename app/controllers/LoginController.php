<?php

class LoginController extends BaseController {


    /* 
    ***     Route: '/'
    ***     Check if user is authorized or not
     */
    public function getLoginPage()
    {   
		if(Auth::check()){
			return View::make('login');
		}else{
			return View::make('login');
		}
    }

    public function postLogin(){
        $response = [];
        $remember = array_key_exists('remember',$_POST);

        try {
            if (Auth::attempt(array('user_name' => $_POST['username'], 'password' => $_POST['password'], 'activated' => 1),$remember)){
                $response['info'] = 'success';
            }else{
                $response['info'] = 'check password';
            }           
        } catch (Exception $e) {
            $response['info'] = 'fail';
        }
        echo json_encode($response);
    }

    public function getRegistrationPage(){
    	return View::make('registration');
    }

    public function postRegister(){
        $response = array();
        $boolean   = true;

        $user_name = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];


        $code = str_random(60);
        $url_activate = URL::to('/');
        $url_activate .= "/activate";
        $url_activate .= "?code=".$code;
        $url_activate .= "&user=".$user_name;

        try {
            $user = User::create(array(
                'user_name' => $user_name,
                'firstname' => $firstname,
                'lastname'  => $lastname,
                'email'     => $email,
                'password'  => Hash::make($password),
                'code'      => $code,
                'activated' => 0
            ));
            $user->save();
        } catch (Exception $e) {
            $response['info'] = "fail";
            $boolean = false;
        }

        if($boolean){
            try {
                Mail::send('email.account-activation', array('link' => $url_activate, 'username' => $user_name), function($m) use($user){
                        $m->to($user->email, $user->username)->subject('Activation Email');
                });
            } catch (Exception $e) {
                $response['info'] = "mail";
                $boolean = false;
            }
        }

        if($boolean){
            $response['info'] = "success";
        }

        echo json_encode($response);
    }

    public function getActive()
    {
        $active_code = $_GET['code'];
        $user_name = $_GET['user'];      

        $user = User::where('user_name','=',$user_name)->first();
        if ($user)
        {
            if($user->code == $active_code)
            {
                $user->code = '';
                $user->activated = 1;
                $user->save();

                Auth::login($user);

                return Redirect::intended('/')->with('global', 'Account actived! Please Enjoy!');
            }
            else
            {
                return View::make('notification.account-active-mail-notification', array('accountActiveContent' => 'Active Code Failed, Please enter email below to send a new activation email', 'resendForm'=>true));
            }
        }
                else
        {
            return View::make('notification.account-active-mail-notification', array('accountActiveContent' => 'User cannot be found in the database.  Please ' . "<a href='login#register'>register</a>" . ' or check for typo.  Thank you.', 'resendForm'=>false));
        }
    }

    public function getForgetPasswordPage()
    {
      return View::make('forgetPassword');
    }



    public function getLogout()
    {
        Auth::logout();
        return Redirect::intended('/');
    }

}

?>