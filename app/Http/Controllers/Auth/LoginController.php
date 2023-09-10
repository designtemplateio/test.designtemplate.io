<?php

namespace Fickrr\Http\Controllers\Auth;
use Fickrr\Http\Controllers\Controller;
use Fickrr\Http\Controllers\Auth\redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Fickrr\Models\Settings;
use Fickrr\Models\Items;
use Auth;
use URL;
use Socialite;
use Session;
use Fickrr\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
	public function authenticated($request , $user)
	{   
			if($user->user_type=='admin')
			{
				return redirect('/admin');
			}
			else
			{
				return redirect('/');
			}
    } 
	 
	 
	
	public function redirectToProvider($provider)
	{
	   return Socialite::driver($provider)->scopes(['email'])->redirect();
	}
	 
	public function handleProviderCallback($provider)
	{     
	      
        if(Session::get('loginUrl') != null && Session::get('loginUrl')!='https://designtemplate.io/404')
         {
         $preUrl=Session::get('loginUrl');
         }
        else
         {
             $preUrl = 'https://designtemplate.io';
         }
    	  $user = Socialite::driver($provider)->user();
    	  $additional_settings = Settings::editAdditional();
    	  $authUser = $this->CreateUser($user,$provider);
    	  $login = Auth::login($authUser, true);
	  
     	    if($authUser->user_type == 'admin') {
			 return redirect('/admin');
			}
			else 
			{ 
				if($additional_settings->subscription_mode == 0) { 
				   
				    return redirect($preUrl)->with('success', 'Login Successfully!');
				}
				else {
				  if($authUser->user_type == 'vendor')
				  {
				      if($authUser->user_subscr_date >= date('Y-m-d'))
					  {
						return redirect($preUrl)->with('success', 'Login Successfully!');
					  }
					  else
					  {
						return redirect($preUrl)->with('success', 'Login Successfully!');
					  }	
				   }
				   else
				   {
				      return redirect($preUrl)->with('success', 'Login Successfully!');
				   }
				 }  	  
            }
     
	} 
	
	
	public function generateRandomString($length = 25) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }
	
	public function user_slug($string)
	{
		$string=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		$string=strtolower($string);
		return $string;
    } 
	
	
	public function CreateUser($user, $provider)
	{
	  $authUser = User::where('provider_id', $user->id)->where('drop_status','=','no')->first();
	  if($authUser)
	  {
		return $authUser;
	  }
	  $token = $this->generateRandomString();
	  $additional_settings = Settings::editAdditional();
		$free_subscr_type = $additional_settings->free_subscr_type;
		 $free_subscr_price = $additional_settings->free_subscr_price;
		 $free_subscr_duration = $additional_settings->free_subscr_duration;
		 $free_subscr_item = $additional_settings->free_subscr_item;
		 $free_subscr_space = $additional_settings->free_subscr_space;
		 $subscr_download_items = $additional_settings->subscr_download_items;
		 $subscr_value = "+".$free_subscr_duration;
		 $user_subscr_item_level = 'limited';
		 $user_subscr_space_level = 'limited';
		 $user_subscr_space_type = 'MB';
		 $subscr_date = date('Y-m-d', strtotime($subscr_value));

	  return User::create([
            'name' => $user->name,
            'email' => $user->email,
			'username' => $this->user_slug($user->name),
			'user_token' => $token,
			'earnings' => 0,
			'user_type' => 'customer',
			'verified' => 1,
			'provider' => $provider,
			'user_subscr_download_item' => $subscr_download_items,
            'provider_id' => $user->id
        ]);
	}
	
	
	 
	public function login(Request $request)
	{
	    $lasturl = $request->input('currentUrl');
	    $additional_settings = Settings::editAdditional();
		$field = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		$email = trim($request->email);
	    $password = trim($request->password);
	
		if (Auth::attempt(array($field => $email, 'password' =>  $password, 'verified' => 1, 'drop_status' => 'no' )))
		{
			if(auth()->user()->user_type == 'admin') {
			 return redirect('/admin');
			}
			else {
				if($additional_settings->subscription_mode == 0) {
				    return redirect()->to($lasturl);
				}
				else if(\Session::has('url.intended')){
				    
                    $intendedUrl = \Session::pull('url.intended');
                    return redirect()->to($intendedUrl);
				}
				else {
				  if(auth()->user()->user_type == 'vendor')
				  {
					  if(auth()->user()->user_subscr_date >= date('Y-m-d'))
					  {
						return redirect()->to($lasturl);
					  }
					  else
					  {
						return redirect()->to('/pricing');
					  }	
				   }
				   else
				   {
			          return redirect()->to($lasturl);
				   }
				 }  	  
                }
			
		}
// 		elseif (Auth::attempt(array($field => $email, 'password' =>  $password, 'verified' => 0, 'drop_status' => 'no')))
// 		{
// 		    return redirect()->back()->with('error', 'Please Verify Your Email then login.');
// 		}
	    else
	   	{
	     return redirect()->back()->with('error', 'Please check Your Password and Username is Correct and then login.');
	   	}
		
	} 
	 
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
