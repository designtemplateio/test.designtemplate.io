<?php

namespace Fickrr\Http\Controllers;

use Illuminate\Http\Request;
use Fickrr\Models\Members;
use Fickrr\Models\Settings;
use Fickrr\Models\Items;
use Fickrr\Models\Downloads;
use Fickrr\Models\Users;
use Fickrr\Models\Blog;
use Fickrr\Models\Category;
use Fickrr\Models\Comment;
use Fickrr\Models\Pages;
use Fickrr\Models\Attribute;
use Fickrr\Models\Suggestion;
use Fickrr\Models\SubCategory;
use Fickrr\Models\Subscription;
use Fickrr\Models\EmailTemplate;
use Mail;
use Socialite;
use Fickrr\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Auth;
use Illuminate\Validation\Rule;
use URL;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;
use Redirect;
use Storage;
use Cache;
use Illuminate\Support\Facades\DB;
use Session;
use Twocheckout;
use Twocheckout_Charge;
use Twocheckout_Error;
use Paystack;
use AmrShawky\LaravelCurrency\Facade\Currency;
use IyzipayBootstrap;
use GuzzleHttp\Client;
use CoinGate\CoinGate;
use Carbon\Carbon;
use MercadoPago;
use Razorpay\Api\Api;
use DGvai\SSLCommerz\SSLCommerz;
use Omnipay\Omnipay;
//use Spatie\Sitemap\SitemapGenerator;
// use Illuminate\Support\Facades\Session;

class CommonController extends Controller
{
    
     public function become_author(Request $request)
    {
        // return $request;
         $user = Members::getvendorData();
         $token = $request->User_token;
         $email = $request->User_email;
         $name = $request->User_name;
        if($request->request_to_become_author == "on")
        {
            $become_author_value=1;
        }
        else
        {
           $become_author_value=0;  
        }
        if($request->User_exclusive_author == 0)
        {
        
        $data = array('become_author' => $become_author_value);
        Members::updateData($token, $data);
        }
        else
        {
        $data = array('become_author' => null);
        Members::updateData($token, $data);
        }
        
        $sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		$from_name = $setting['setting']->sender_name;
        $from_email = $setting['setting']->sender_email;
        /* email template code */
	          $checktemp = EmailTemplate::checkTemplate(22);
			  if($checktemp != 0)
			  {
			  $template_view['mind'] = EmailTemplate::viewTemplate(22);
			  $template_subject = $template_view['mind']->et_subject;
			  }
			  else
			  {
			  $template_subject = "Author Request";
			  }
			  $record = array('name' => $name,'email' => $email,'from_email' => $from_email );
        /* email template code */
		Mail::send('become_author_mail', $record, function($message) use ($from_name, $from_email, $email, $name, $template_subject) {
			$message->to($email, $name)
					->subject($template_subject);
			$message->from($from_email,$from_name);
		});
        return redirect()->back()->with('success', 'Apply Successfully to Become Author.');
    }

	public $gateway;
	
	public function __construct()
    {
        $this->gateway = Omnipay::create('Stripe\PaymentIntents');
		
    }
	
	public function cookie_translate($id)
	{
	  Cookie::queue(Cookie::make('translate', $id, 3000));
      return Redirect::back()->withCookie('translate');
	}
	
	public function generateKey($length = 35) 
	{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }	
    
    
  
	public function view_coupon_sub(Request $request)
	{
    // To get country of user
	 $clientIP = request()->ip();   
        function getIP($ipadr) {
            if(isset($ipadr)) {
                $details = file_get_contents('http://www.geoplugin.net/json.gp?ip=' . $ipadr);
                $json = json_decode($details);
                if($json->geoplugin_status == '200')
                    return $json->geoplugin_countryName;
                else
                    return 'Error getting country name.';
            } else {
                return 'IP is empty.';
            }
        }
        $a=getIP($clientIP);
    // Close to get Country
	   //$login_user_id = Auth::user()->id;
	   $subscr_id = $request->user_subscr_id;
       $allsettings = Settings::allSettings();
	   $coupon = $request->input('coupon_sub');
	   $sub_price = $request->input('user_subscr_price');
	   $check_coupon = Items::checkCoupon($coupon);
	   $session_id = Session::getId();
	   $coupon_key = uniqid();
	   if($check_coupon == 1)
	   {
	         $single = Items::singleCoupon($coupon);
			 $coupon_id = $single->coupon_id;
			 $user_id = $single->user_id;
			 $coupon_code = $single->coupon_code;
			 $coupon_type = $single->discount_type;
			 $coupon_value = $single->coupon_value;
		  	 $price =$sub_price;
		  //	 if($user_id != $login_user_id)
		  //	 {
			 if($coupon_type == 'percentage')
			 {
			 $discount = ($coupon_value * $price) / 100;
		     $discount_price = $price - $discount;
		     
		     $roundedNumber1 = Currency::convert() ->from('USD') ->to('INR') ->amount($discount) ->get();
		     $dis_convert1 = round($roundedNumber1, 2);
		     $roundedNumber2 = Currency::convert() ->from('USD') ->to('INR') ->amount($discount_price) ->get();
			 $dis_convert2 = round($roundedNumber2, 2);
			 $data = array('dis_convert1' => $dis_convert1, 'dis_convert2' => $dis_convert2, 'subscr_id' => $subscr_id, 'coupon_key' => $coupon_key, 'coupon_id' => $coupon_id, 'coupon_code' => $coupon_code, 'coupon_type' => $coupon_type, 'coupon_value' => $coupon_value,'discount' => $discount, 'discount_price' => $discount_price);   
			
             Session::put('coupon_data',$data);
            //  return response()->json(['success' => true, 'data' => $data]);
             return redirect()->back()->with('data', $data)->with('success', 'Coupon for your plan is Added Successfully.');
			 }
			 else
			 {
			    if($coupon_value < $price)
				{
			     $discount = $coupon_value;
				 $discount_price = $price - $discount;
				 $data = array('subscr_id' => $subscr_id, 'coupon_key' => $coupon_key, 'coupon_id' => $coupon_id, 'coupon_code' => $coupon_code, 'coupon_type' => $coupon_type, 'coupon_value' => $coupon_value, 'discount' => $discount,'discount_price' => $discount_price);
			     
			     Session::put('coupon_data',$data);
			     //return response()->json(['success' => true, 'data' => $data]);
			     return redirect()->back()->with('data', $data)->with('success', 'Coupon for your plan is Added Successfully.');
		
			  	}
				else
				{
				 $discount = 0; 
				 return redirect()->back()->with('error', 'Invalid Coupon Code or Expired');
				}
			 }
		  //	}
		  //	 else
		  //	 {
		  //	  return redirect()->back()->with('error', 'you cannot use this Coupon Code');   
		  //	 }
			 //return redirect()->back()->with('coupon', $coupon)->with('success', 'Coupon for your plan is Added Successfully.');
		 }
	   else
	   {
	      return redirect()->back()->with('error', 'Invalid Coupon Code or Expired');
	   }
	}
	
	public function view_cart(Request $request)
	{
	  $item_price = $request->input('item_price');
	  $session_id = Session::getId();
	  $item_id = $request->input('item_id');
	  $item_name = $request->input('item_name');
	  $item_user_id = $request->input('item_user_id');
	  $item_token = $request->input('item_token');
	  $additional['setting'] = Settings::editAdditional();
	  $getmember['views'] = Members::singlevendorData($item_user_id);
	  $user_exclusive_type = $getmember['views']->exclusive_author;
	  
	  $regular_license = $additional['setting']->regular_license;
	  $extended_license = $additional['setting']->extended_license;
	  
	  $split = explode("_", $item_price);
         
       $price = base64_decode($split[0]);
	   $license = $split[1];
	   if($license == 'regular')
	   {
	     $start_date = date('Y-m-d');
		 $end_date = date('Y-m-d', strtotime($regular_license));
	   }
	   else if($license == 'extended')
	   {
	     $start_date = date('Y-m-d');
		 $end_date = date('Y-m-d', strtotime($extended_license));
	   }
	   
	   $order_status = 'pending';
	   $sid = 1;
	   $setting['setting'] = Settings::editGeneral($sid);
	   
	   if($additional['setting']->subscription_mode == 0)
	   {
		   if($user_exclusive_type == 1)
		   {
		   $commission = ($setting['setting']->site_exclusive_commission * $price) / 100;
		   }
		   else
		   {
		   $commission = ($setting['setting']->site_non_exclusive_commission * $price) / 100;
		   }
		   $vendor_amount = $price - $commission;
		   $admin_amount = $commission;
		}
		else
		{ 
		   $count_mode = Settings::checkuserSubscription($item_user_id);
		   if($count_mode == 1)
		   {
		     $vendor_amount = $price;
			 $admin_amount = 0;
		   }
		   else
		   {
		       if($user_exclusive_type == 1)
			   {
			   $commission = ($setting['setting']->site_exclusive_commission * $price) / 100;
			   }
			   else
			   {
			   $commission = ($setting['setting']->site_non_exclusive_commission * $price) / 100;
			   }
			   $vendor_amount = $price - $commission;
			   $admin_amount = $commission;
		   }
		}   
	   
	   
	   $getcount  = Items::getorderCount($item_id,$session_id,$order_status);
	   
	   $savedata = array('session_id' => $session_id, 'item_id' => $item_id, 'item_name' => $item_name, 'item_user_id' => $item_user_id, 'item_token' => $item_token, 'license' => $license, 'start_date' => $start_date, 'end_date' => $end_date, 'item_price' => $price, 'vendor_amount' => $vendor_amount, 'admin_amount' => $admin_amount, 'total_price' => $price, 'order_status' => $order_status);
	   
	   
	   $updatedata = array('license' => $license, 'start_date' => $start_date, 'end_date' => $end_date, 'item_price' => $price, 'total_price' => $price);
	   
	   
	   if($additional['setting']->subscription_mode == 0)
	   {
		   if($getcount == 0)
		   {
			  Items::savecartData($savedata);
			 
			  return redirect('checkout')->with('success','Item has been added to cart'); 
		   }
		   else
		   {
			  Items::updatecartData($item_id,$session_id,$order_status,$updatedata);
			  
			  return redirect('checkout')->with('success','Item has been updated to cart'); 
		   }
	   }
	   else
	   {
	      Items::deletecartremove($session_id);
		  Items::savecartData($savedata);
	      return redirect('checkout')->with('success','Item has been updated to cart'); 
	   } 
	}
	
	
	public function remove_coupon($remove,$coupon)
	{  
	   $session_id = Session::getId();
	   $data = array('coupon_id' => '', 'coupon_code' => '', 'coupon_type' => '', 'coupon_value' => '', 'discount_price' => 0);
	   Items::removeCoupon($coupon,$session_id,$data);
	   return redirect()->back()->with('success', 'Coupon Removed Successfully.');
	}	
	
	public function view_coupon(Request $request)
	{
	   $allsettings = Settings::allSettings();
	   $coupon = $request->input('coupon');
	   $user_id = $request->input('item_userid');
	   $coupon_key = uniqid();
	   $check_coupon = Items::checkCoupon($coupon);
	   if($check_coupon == 1)
	   {
	      $single = Items::singleCoupon($coupon);
	      $coupondata['get'] = Items::getCoupon($coupon,$user_id);
		  foreach($coupondata['get'] as $couponview)
		  {
		     $order_id = $couponview->ord_id;
			 $coupon_id = $single->coupon_id;
			 $coupon_code = $single->coupon_code;
			 $coupon_type = $single->discount_type;
			 $coupon_value = $single->coupon_value;
			 $price = $couponview->item_price;
			 if($coupon_type == 'percentage')
			 {
			 $discount = ($coupon_value * $price) / 100;
			 $discount_price = $price - $discount;
			 $data = array('coupon_key' => $coupon_key, 'coupon_id' => $coupon_id, 'coupon_code' => $coupon_code, 'coupon_type' => $coupon_type, 'coupon_value' => $coupon_value, 'discount_price' => $discount_price);
			 Items::updateCoupon($order_id,$data);
			 }
			 else
			 {
			    if($coupon_value < $price)
				{
			     $discount = $coupon_value;
				 $discount_price = $price - $discount;
			     $data = array('coupon_key' => $coupon_key, 'coupon_id' => $coupon_id, 'coupon_code' => $coupon_code, 'coupon_type' => $coupon_type, 'coupon_value' => $coupon_value, 'discount_price' => $discount_price);
			     Items::updateCoupon($order_id,$data);
				}
				else
				{
				 $discount = 0; 
				 return redirect()->back()->with('error', 'Invalid Coupon Code or Expired');
				}
			 }
			
		  }
		  return redirect()->back()->with('success', 'Coupon Added Successfully.');
	   }
	   else
	   {
	      return redirect()->back()->with('error', 'Invalid Coupon Code or Expired');
	   }
	
	}
	

	public function socialLogin($provider)
	{
	    $session_id = Session::getId();
        \Session::put('old-session_id', $session_id);
        \Session::put('url.intended0', url()->previous());
        $intendedUrl = Session::get('url.intended0');
        \Session::put('url.intended', $intendedUrl);
        
//         if($paypal_mode == 1)
// 			   {
// 				 $paypal_url = "https://www.paypal.com/cgi-bin/webscr";
// 			   }
// 			   else
// 			   {
// 				 $paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
// 			   }
			   
// 			   $razorpay_key = $additional_view->razorpay_key;
			   
// 			   if($payment_method == 'paypal')
// 		  {
		     
// 			 $paypal = '<form method="post" id="paypal_form" action="'.$paypal_url.'">
// 			  <input type="hidden" value="_xclick" name="cmd">
// 			  <input type="hidden" value="'.$paypal_email.'" name="business">
// 			  <input type="hidden" value="'.$item_names_data.'" name="item_name">
// 			  <input type="hidden" value="'.$purchase_token.'" name="item_number">
// 			  <input type="hidden" value="'.$final_amount.'" name="amount">
// 			  <input type="hidden" value="'.$site_currency.'" name="currency_code">
// 			  <input type="hidden" value="'.$success_url.'" name="return">
// 			  <input type="hidden" value="'.$cancel_url.'" name="cancel_return">
			  		  
// 			</form>';
// 			$paypal .= '<script>window.paypal_form.submit();</script>';
// 			echo $paypal;
					 
			 
// 		  }
//         else if($payment_method == 'razorpay')
// 		  {
// 		       $additional['settings'] = Settings::editAdditional();
// 			   if($site_currency != 'INR')
// 			   {
		       
// 			   $convert = Currency::convert()->from($site_currency)->to('INR')->amount($final_amount)->round(2)->get();
// 			   $price_amount = $convert * 100;
// 			   }
// 			   else
// 			   {
// 			   $price_amount = $final_amount * 100;
// 			   }
// 			   $csf_token = csrf_token();
// 			   $logo_url = $website_url.'/public/storage/settings/'.$setting['setting']->site_logo;
// 			   $script_url = $website_url.'/resources/views/theme/js/vendor.min.js';
// 			   $callback = $website_url.'/razorpay';
// 			   $razorpay = '
// 			   <script type="text/javascript" src="'.$script_url.'"></script>
// 			   <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
// 			   <script>
// 				var options = {
// 					"key": "'.$razorpay_key.'",
// 					"amount": "'.$price_amount.'", 
// 					"currency": "INR",
// 					"name": "'.$item_names_data.'",
// 					"description": "'.$purchase_token.'",
// 					"image": "'.$logo_url.'",
// 					"callback_url": "'.$callback.'",
// 					"prefill": {
// 						"name": "'.$order_firstname.'",
// 						"email": "'.$order_email.'"
						
// 					},
// 					"notes": {
// 						"address": "'.$order_firstname.'"
						
						
// 					},
// 					"theme": {
// 						"color": "'.$setting['setting']->site_theme_color.'"
// 					}
// 				};
// 				var rzp1 = new Razorpay(options);
// 				rzp1.on("payment.failed", function (response){
// 						alert(response.error.code);
// 						alert(response.error.description);
// 						alert(response.error.source);
// 						alert(response.error.step);
// 						alert(response.error.reason);
// 						alert(response.error.metadata);
// 				});
				
// 				$(window).on("load", function() {
// 					 rzp1.open();
// 					e.preventDefault();
// 					});
// 				</script>';
// 				echo $razorpay;
					
					
// 		  }
	    
	   return Socialite::driver($provider)->scopes(['email'])->redirect();
	}
	 
	public function view_checkout(Request $request)
	{
	   //return $request; 
	   $sid = 1;
	   $setting['setting'] = Settings::editGeneral($sid);
	   $cart_count = Items::getcartCount();
	   $additional['setting'] = Settings::editAdditional();
	   $free_subscr_download_item = $additional['setting']->subscr_download_items;
	   $additional_view = Settings::editAdditional();
	   $cart['item'] = Items::getcartData();
	   $mobile['item'] = Items::getcartData();
	   $purchase_code = $this->generateKey();
	   $session_id = Session::getId();
	   if(!empty(Cookie::get('referral')))
		 {
	      $referral_by = decrypt(Cookie::get('referral'));
		  $referral_payout = 'pending'; 
         }
		 else
		 {
		  $referral_by = "";
		  $referral_payout = "";
		 }
	   if($additional['setting']->subscription_mode == 1)
		{ 
		$download_limit = $free_subscr_download_item;
		}
		else
		{
		$download_limit = 1000;
		}	 
	   if(Auth::guest())
	    {
	          $credentials = [
                    'email' => $request['email'],
                    'password' => $request['password'],
                ];
                
			 $email = $request->input('email');
			 $password = bcrypt($request->input('password'));
			 $user_auth_token = base64_encode($request->input('password'));
		
			 $pass = trim($request->input('password'));
			 $request->validate([
								
								'email' => 'required|email',
								'password' => ['required', 'min:6'],
			 ]);
			 $rules = array(
					
					'email' => ['required', 'email', 'max:255', Rule::unique('users') -> where(function($sql){ $sql->where('drop_status','=','no');})],
			 );
			 
			 $messsages = array(
			);
			 
			$validator = Validator::make($request->all(), $rules,$messsages);
		
			 $email_check_count = DB::table('users')->where('email',$email)->count();
			
			if($email_check_count >0)
			{
			   if (Auth::attempt($credentials))
			   {
    			    Session::setId($session_id);
    				$updata = array('user_id' => auth()->user()->id); 
    				Items::changeOrder($session_id,$updata);
    				$user_id = auth()->user()->id;
    				$userdata = Members::logindataUser($user_id);
    				$order_firstname = $userdata->name;
    				$order_lastname = $userdata->name;
    				$order_email = $userdata->email;
    				$user_email = $userdata->email;
    				$user_token = $userdata->user_token;
    				$buyer_wallet_amount = $userdata->earnings;
    				$country_id = $userdata->country;
                }
                else
                {
                    return redirect()->back()->with('error', 'These credentials do not match our records.');
                }
			}
			else
			{
			   $user_token = $this->generateRandomString();
			   $register_url = URL::to('/user-verify/').'/'.$user_token;
			   $name = strstr($email, '@', true);
			   $username = strstr($email, '@', true);
			   $user_type = 'customer';
			   $earnings = 0;
			   $verified = 1;
			   $data = array('name' => $name, 'username' => $username, 'email' => $email, 'user_type' => $user_type, 'password' => $password, 'earnings' => $earnings, 'verified' => $verified, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'user_token' => $user_token, 'referral_by' => $referral_by, 'referral_payout' => $referral_payout, 'user_auth_token' => $user_auth_token, 'register_url' => $register_url, 'user_subscr_download_item' => $download_limit);
			   Members::insertData($data);
			   $field = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
			   if (Auth::attempt(array($field => $email, 'password' =>  $pass, 'verified' => 1, 'drop_status' => 'no' )))
			   {
				Session::setId($session_id);
				$updata = array('user_id' => auth()->user()->id); 
				Items::changeOrder($session_id,$updata);
				$user_id = auth()->user()->id;
				$userdata = Members::logindataUser($user_id);
				$order_firstname = $userdata->name;
				$order_lastname = $userdata->name;
				$order_email = $userdata->email;
				$user_email = $userdata->email;
				$user_token = $userdata->user_token;
				$buyer_wallet_amount = $userdata->earnings;
				$country_id = $userdata->country;
			   }
			   else
			   {
				 return redirect()->back()->with('error', 'These credentials do not match our records.');
			   }
			}
	   }
	   else
	   {
	   $user_id = Auth::user()->id;
	   $userdata = Members::logindataUser($user_id);
	   $order_firstname = $userdata->name;
	   $order_lastname = $userdata->name;
	   $order_email = $userdata->email;
	   $user_email = $userdata->email;
	   $user_token = $userdata->user_token;
	   $buyer_wallet_amount = $userdata->earnings;
	   $country_id = $userdata->country;
	   }
	   $user_id = Auth::user()->id;
	   $token = $request->input('token');
	   $purchase_token = rand(111111,999999);
	   $order_id = $request->input('order_id');
	   $item_prices = base64_decode($request->input('item_prices'));
	   $item_user_id = $request->input('item_user_id');
	   $amount = base64_decode($request->input('amount'));
	   $vat_price = base64_decode($request->input('vat_price'));
	   $processing_fee = base64_decode($request->input('processing_fee'));
	   $final_amount = $amount + $processing_fee + $vat_price;
	   $payment_method = $request->input('payment_method');
	   $website_url = $request->input('website_url');
	   $payment_date = date('Y-m-d');
	   $payment_status = 'pending';
	   $reference = $request->input('reference');
	   
	   /* subscription code */
	   
	   if($cart_count != 0)
	   {
		  $last_order = Items::lastorderData();
		  $item_user_id = $last_order->item_user_id;
		  $count_mode = Settings::checkuserSubscription($item_user_id);
		  $vendor_details = Members::singlevendorData($item_user_id);
		  if($additional['setting']->subscription_mode == 0)
		  {
			  $paypal_email = $setting['setting']->paypal_email;
	          $paypal_mode = $setting['setting']->paypal_mode;
			  if($paypal_mode == 1)
			   {
				 $paypal_url = "https://www.paypal.com/cgi-bin/webscr";
			   }
			   else
			   {
				 $paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
			   }
			   $vendor_amount = base64_decode($request->input('vendor_amount'));
	           $admin_amount = base64_decode($request->input('admin_amount'));
			   
			   $stripe_mode = $setting['setting']->stripe_mode;
			   if($stripe_mode == 0)
			   {
				 $stripe_publish_key = $setting['setting']->test_publish_key;
				 $stripe_secret_key = $setting['setting']->test_secret_key;
			   }
			   else
			   {
				 $stripe_publish_key = $setting['setting']->live_publish_key;
				 $stripe_secret_key = $setting['setting']->live_secret_key;
			   }
			   $this->gateway->setApiKey($stripe_secret_key);
			   
			   $razorpay_key = $additional_view->razorpay_key;
			   
			   $payhere_mode = $additional_view->payhere_mode;
			   if($payhere_mode == 1)
			   {
			     $payhere_url = 'https://www.payhere.lk/pay/checkout';
			   }
			   else
			   {
			   $payhere_url = 'https://sandbox.payhere.lk/pay/checkout';
			   }
			   $payhere_merchant_id = $additional['setting']->payhere_merchant_id;
			   
			    $MERCHANT_KEY = $additional_view->payu_merchant_key; // add your id
				$SALT = $additional_view->payu_salt_key; // add your id
				if($additional_view->payumoney_mode == 1)
				{
				$PAYU_BASE_URL = "https://secure.payu.in";
				}
				else
				{
				$PAYU_BASE_URL = "https://test.payu.in";
				}
				
				$two_checkout_mode = $setting['setting']->two_checkout_mode;
	   			$two_checkout_account = $setting['setting']->two_checkout_account;
	   			$two_checkout_publishable = $setting['setting']->two_checkout_publishable;
	   			$two_checkout_private = $setting['setting']->two_checkout_private;
				
				/* iyzico */
				$iyzico_api_key = $additional['setting']->iyzico_api_key;
				$iyzico_secret_key = $additional['setting']->iyzico_secret_key;
				$iyzico_mode = $additional['setting']->iyzico_mode;
				if($iyzico_mode == 0)
				{
				   $iyzico_url = 'https://sandbox-api.iyzipay.com';
				}
				else
				{
				   $iyzico_url = 'https://api.iyzipay.com';
				}
				$iyzico_success_url = $website_url.'/iyzico-success/admin-'.$purchase_token;
				/* iyzico */
				
				/* flutterwave */
				$flutterwave_public_key = $additional['setting']->flutterwave_public_key;
				$flutterwave_secret_key = $additional['setting']->flutterwave_secret_key;
				/* flutterwave */
				
				/* coingate */
				$coingate_mode = $additional['setting']->coingate_mode;
	   			if($coingate_mode == 0)
	   			{
	      			$coingate_mode_status = "sandbox";
	   			}
	   			else
	   			{
	      			$coingate_mode_status = "live";
	   			}
	   			$coingate_auth_token = $additional['setting']->coingate_auth_token;
	  			$coingate_callback = $website_url.'/coingate';
				/* coingate */
				
				/* ipay */
				$ipay_mode = $additional['setting']->ipay_mode;
	   			$ipay_vendor_id = $additional['setting']->ipay_vendor_id;
				$ipay_hash_key = $additional['setting']->ipay_hash_key;
	  			$ipay_callback = $website_url.'/ipay';
				$ipay_url = 'https://payments.ipayafrica.com/v3/ke';
				/* ipay */
				
				/* payfast */
			   $payfast_mode = $additional['setting']->payfast_mode;
			   $payfast_merchant_id = $additional['setting']->payfast_merchant_id;
			   $payfast_merchant_key = $additional['setting']->payfast_merchant_key;
			   if($payfast_mode == 1)
			   {
				 $payfast_url = "https://www.payfast.co.za/eng/process";
			   }
			   else
			   {
				 $payfast_url = "https://sandbox.payfast.co.za/eng/process";
			   }
			   
			   /* payfast */
			   
			   /* coinpayments */
			   $coinpayments_merchant_id = $additional['setting']->coinpayments_merchant_id;
			   /* coinpayments */
				
			   /* mercadopago */
			   
			   $mercadopago_client_id = $additional['setting']->mercadopago_client_id;
	           $mercadopago_client_secret = $additional['setting']->mercadopago_client_secret;
			   $mercadopago_mode = $additional['setting']->mercadopago_mode;
			   $mercadopago_success = $website_url.'/mercadopago-success/'.$purchase_token;
			   $mercadopago_failure = $website_url.'/mercadopago-failure/';
			   $mercadopago_pending = $website_url.'/mercadopago-pending/';	
				/* mercadopago */
				
				/* instamojo */
			   $instamojo_success_url = $website_url.'/instamojo-success/'.$purchase_token;
			   if($additional['setting']->instamojo_mode == 1)
			   {
				 $instamojo_payment_link = 'https://instamojo.com/api/1.1/payment-requests/';
			   }
			   else
			   { 
				  $instamojo_payment_link = 'https://test.instamojo.com/api/1.1/payment-requests/';
			   }
			   $instamojo_api_key = $additional['setting']->instamojo_api_key;
			   $instamojo_auth_token = $additional['setting']->instamojo_auth_token;
			   /* instamojo */
				
				
			   $get_payment = explode(',', $setting['setting']->payment_option);
	           
		  }
		  else
		  {
			 if($count_mode == 1)
			 {
				$paypal_email = $vendor_details->user_paypal_email;
	            $paypal_mode = $vendor_details->user_paypal_mode;
				  if($paypal_mode == 1)
				   {
					 $paypal_url = "https://www.paypal.com/cgi-bin/webscr";
				   }
				   else
				   {
					 $paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
				   }
				   $vendor_amount = base64_decode($request->input('vendor_amount')) + base64_decode($request->input('admin_amount'));
	               $admin_amount = 0;
				   
				   $stripe_mode = $vendor_details->user_stripe_mode;
				   if($stripe_mode == 0)
				   {
					 $stripe_publish_key = $vendor_details->user_test_publish_key;
					 $stripe_secret_key = $vendor_details->user_test_secret_key;
				   }
				   else
				   {
					 $stripe_publish_key = $vendor_details->user_live_publish_key;
					 $stripe_secret_key = $vendor_details->user_live_secret_key;
				   }
				   $this->gateway->setApiKey($stripe_secret_key);
			   
				   $razorpay_key = $vendor_details->user_razorpay_key;
				   
				   $payhere_mode = $vendor_details->user_payhere_mode;
				   if($payhere_mode == 1)
				   {
					 $payhere_url = 'https://www.payhere.lk/pay/checkout';
				   }
				   else
				   {
				   $payhere_url = 'https://sandbox.payhere.lk/pay/checkout';
				   }
				   $payhere_merchant_id = $vendor_details->user_payhere_merchant_id;
				   
				   $MERCHANT_KEY = $vendor_details->user_payu_merchant_key; // add your id
					$SALT = $vendor_details->user_payu_salt_key; // add your id
					if($vendor_details->user_payumoney_mode == 1)
					{
					$PAYU_BASE_URL = "https://secure.payu.in";
					}
					else
					{
					$PAYU_BASE_URL = "https://test.payu.in";
					}
					
					$two_checkout_mode = $vendor_details->user_two_checkout_mode;
	   				$two_checkout_account = $vendor_details->user_two_checkout_account;
	   				$two_checkout_publishable = $vendor_details->user_two_checkout_publishable;
	   				$two_checkout_private = $vendor_details->user_two_checkout_private;
					
					/* iyzico */
					$iyzico_api_key = $vendor_details->user_iyzico_api_key;
					$iyzico_secret_key = $vendor_details->user_iyzico_secret_key;
					$iyzico_mode = $vendor_details->user_iyzico_mode;
					if($iyzico_mode == 0)
					{
					   $iyzico_url = 'https://sandbox-api.iyzipay.com';
					}
					else
					{
					   $iyzico_url = 'https://api.iyzipay.com';
					}
					$iyzico_success_url = $website_url.'/iyzico-success/vendor-'.$purchase_token;
					/* iyzico */
					
					/* flutterwave */
					$flutterwave_public_key = $vendor_details->user_flutterwave_public_key;
					$flutterwave_secret_key = $vendor_details->user_flutterwave_secret_key;
					/* flutterwave */
					
					/* coingate */
					$coingate_mode = $vendor_details->user_coingate_mode;
					if($coingate_mode == 0)
					{
						$coingate_mode_status = "sandbox";
					}
					else
					{
						$coingate_mode_status = "live";
					}
					$coingate_auth_token = $vendor_details->user_coingate_auth_token;
					$coingate_callback = $website_url.'/coingate-success';
					/* coingate */
					
					/* ipay */
					$ipay_mode = $vendor_details->user_ipay_mode;
	   				$ipay_vendor_id = $vendor_details->user_ipay_vendor_id;
					$ipay_hash_key = $vendor_details->user_ipay_hash_key;
	  				$ipay_callback = $website_url.'/ipay';
					$ipay_url = 'https://payments.ipayafrica.com/v3/ke';
					/* ipay */
					
					/* payfast */
				   $payfast_mode = $vendor_details->user_payfast_mode;
				   $payfast_merchant_id = $vendor_details->user_payfast_merchant_id;
				   $payfast_merchant_key = $vendor_details->user_payfast_merchant_key;
				   if($payfast_mode == 1)
				   {
					 $payfast_url = "https://www.payfast.co.za/eng/process";
				   }
				   else
				   {
					 $payfast_url = "https://sandbox.payfast.co.za/eng/process";
				   }
				   
				   /* payfast */
				   
				   /* coinpayments */
				   $coinpayments_merchant_id = $vendor_details->user_coinpayments_merchant_id;
				   /* coinpayments */
				   
				   
				   /* mercadopago */
				   $mercadopago_client_id = $vendor_details->user_mercadopago_client_id;
				   $mercadopago_client_secret = $vendor_details->user_mercadopago_client_secret;
				   $mercadopago_mode = $vendor_details->user_mercadopago_mode;
				   $mercadopago_success = $website_url.'/mercadopago-success/'.$purchase_token;
				   $mercadopago_failure = $website_url.'/mercadopago-failure/';
				   $mercadopago_pending = $website_url.'/mercadopago-pending/';
				   
				   /* mercadopago */
				   
				   /* instamojo */
				   $instamojo_success_url = $website_url.'/instamojo-success/'.$purchase_token;
				   if($vendor_details->user_instamojo_mode == 1)
				   {
					 $instamojo_payment_link = 'https://instamojo.com/api/1.1/payment-requests/';
				   }
				   else
				   { 
					  $instamojo_payment_link = 'https://test.instamojo.com/api/1.1/payment-requests/';
				   }
				   $instamojo_api_key = $vendor_details->user_instamojo_api_key;
				   $instamojo_auth_token = $vendor_details->user_instamojo_auth_token;
				   /* instamojo */
			   
				   $get_payment = explode(',', $vendor_details->user_payment_option);
			 }
			 else
			 {
				  $paypal_email = $setting['setting']->paypal_email;
				  $paypal_mode = $setting['setting']->paypal_mode;
				  if($paypal_mode == 1)
				   {
					 $paypal_url = "https://www.paypal.com/cgi-bin/webscr";
				   }
				   else
				   {
					 $paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
				   }
				   $vendor_amount = base64_decode($request->input('vendor_amount'));
	               $admin_amount = base64_decode($request->input('admin_amount'));
				   
				   $stripe_mode = $setting['setting']->stripe_mode;
				   if($stripe_mode == 0)
				   {
					 $stripe_publish_key = $setting['setting']->test_publish_key;
					 $stripe_secret_key = $setting['setting']->test_secret_key;
				   }
				   else
				   {
					 $stripe_publish_key = $setting['setting']->live_publish_key;
					 $stripe_secret_key = $setting['setting']->live_secret_key;
				   }
				   $this->gateway->setApiKey($stripe_secret_key);
				   
				   $razorpay_key = $additional_view->razorpay_key;
				   
				   $payhere_mode = $additional_view->payhere_mode;
				   if($payhere_mode == 1)
				   {
					 $payhere_url = 'https://www.payhere.lk/pay/checkout';
				   }
				   else
				   {
				   $payhere_url = 'https://sandbox.payhere.lk/pay/checkout';
				   }
				   $payhere_merchant_id = $additional_view->payhere_merchant_id;
				   
				   $MERCHANT_KEY = $additional_view->payu_merchant_key; // add your id
					$SALT = $additional_view->payu_salt_key; // add your id
					if($additional_view->payumoney_mode == 1)
					{
					$PAYU_BASE_URL = "https://secure.payu.in";
					}
					else
					{
					$PAYU_BASE_URL = "https://test.payu.in";
					}
					
					$two_checkout_mode = $setting['setting']->two_checkout_mode;
	   			    $two_checkout_account = $setting['setting']->two_checkout_account;
	   			    $two_checkout_publishable = $setting['setting']->two_checkout_publishable;
	   			    $two_checkout_private = $setting['setting']->two_checkout_private;
				
					
					/* iyzico */
					$iyzico_api_key = $additional['setting']->iyzico_api_key;
					$iyzico_secret_key = $additional['setting']->iyzico_secret_key;
					$iyzico_mode = $additional['setting']->iyzico_mode;
					if($iyzico_mode == 0)
					{
					   $iyzico_url = 'https://sandbox-api.iyzipay.com';
					}
					else
					{
					   $iyzico_url = 'https://api.iyzipay.com';
					}
					$iyzico_success_url = $website_url.'/iyzico-success/admin-'.$purchase_token;
					/* iyzico */
					
					/* flutterwave */
					$flutterwave_public_key = $additional['setting']->flutterwave_public_key;
					$flutterwave_secret_key = $additional['setting']->flutterwave_secret_key;
					/* flutterwave */
					
					/* coingate */
					$coingate_mode = $additional['setting']->coingate_mode;
					if($coingate_mode == 0)
					{
						$coingate_mode_status = "sandbox";
					}
					else
					{
						$coingate_mode_status = "live";
					}
					$coingate_auth_token = $additional['setting']->coingate_auth_token;
					$coingate_callback = $website_url.'/coingate';
					/* coingate */
					
					/* ipay */
					$ipay_mode = $additional['setting']->ipay_mode;
	   				$ipay_vendor_id = $additional['setting']->ipay_vendor_id;
					$ipay_hash_key = $additional['setting']->ipay_hash_key;
	  				$ipay_callback = $website_url.'/ipay';
					$ipay_url = 'https://payments.ipayafrica.com/v3/ke';
					/* ipay */
					
					/* payfast */
				   $payfast_mode = $additional['setting']->payfast_mode;
				   $payfast_merchant_id = $additional['setting']->payfast_merchant_id;
				   $payfast_merchant_key = $additional['setting']->payfast_merchant_key;
				   if($payfast_mode == 1)
				   {
					 $payfast_url = "https://www.payfast.co.za/eng/process";
				   }
				   else
				   {
					 $payfast_url = "https://sandbox.payfast.co.za/eng/process";
				   }
				   
				   /* payfast */
				   
				   /* coinpayments */
				   $coinpayments_merchant_id = $additional['setting']->coinpayments_merchant_id;
				   /* coinpayments */
				   
				   /* mercadopago */
			   
				   $mercadopago_client_id = $additional['setting']->mercadopago_client_id;
				   $mercadopago_client_secret = $additional['setting']->mercadopago_client_secret;
				   $mercadopago_mode = $additional['setting']->mercadopago_mode;
				   $mercadopago_success = $website_url.'/mercadopago-success/'.$purchase_token;
				   $mercadopago_failure = $website_url.'/mercadopago-failure/';
				   $mercadopago_pending = $website_url.'/mercadopago-pending/';	
					/* mercadopago */
					
					/* instamojo */
				   $instamojo_success_url = $website_url.'/instamojo-success/'.$purchase_token;
				   if($additional['setting']->instamojo_mode == 1)
				   {
					 $instamojo_payment_link = 'https://instamojo.com/api/1.1/payment-requests/';
				   }
				   else
				   { 
					  $instamojo_payment_link = 'https://test.instamojo.com/api/1.1/payment-requests/';
				   }
				   $instamojo_api_key = $additional['setting']->instamojo_api_key;
				   $instamojo_auth_token = $additional['setting']->instamojo_auth_token;
				   /* instamojo */
					
				   $get_payment = explode(',', $setting['setting']->payment_option);
			 }
		  }
	  }
	  /* VAT */
	  $country_details = Members::countryCheck($country_id);
	  if($country_details != 0)
	  {
	      $data_views = Members::countryDATA($country_id);
		  $country_percent = $data_views->vat_price;
	  }
	  else
	  {
	    $country_percent = $additional['setting']->default_vat_price;
	  } 
	   /* VAT */
	  $totaldata = array('cart' => $cart, 'cart_count' => $cart_count, 'get_payment' => $get_payment, 'mobile' => $mobile, 'country_percent' => $country_percent);
	  /* subscription code */ 
	   
	   
	   
	   $getcount  = Items::getcheckoutCount($purchase_token,$user_id,$payment_status);
	   
	   $savedata = array('purchase_token' => $purchase_token, 'order_ids' => $order_id, 'item_prices' => $item_prices, 'item_user_id' => $item_user_id, 'user_id' => $user_id, 'total' => $amount, 'vendor_amount' => $vendor_amount, 'admin_amount' => $admin_amount, 'processing_fee' => $processing_fee, 'payment_type' => $payment_method, 'payment_date' => $payment_date, 'order_firstname' => $order_firstname, 'order_lastname' => $order_lastname,  'order_email' => $order_email, 'payment_status' => $payment_status, 'vat_price' => $vat_price);
	   
	   $updatedata = array('order_ids' => $order_id, 'item_prices' => $item_prices, 'item_user_id' => $item_user_id, 'user_id' => $user_id,'total' => $amount, 'vendor_amount' => $vendor_amount, 'admin_amount' => $admin_amount, 'processing_fee' => $processing_fee, 'payment_type' => $payment_method, 'payment_date' => $payment_date, 'order_firstname' => $order_firstname, 'order_lastname' => $order_lastname, 'order_email' => $order_email, 'vat_price' => $vat_price);
	   
	   
	   /* settings */
	   
	   
	   $site_currency = $setting['setting']->site_currency;
	   
	   $success_url = $website_url.'/success/'.$purchase_token;
	   $cancel_url = $website_url.'/cancel';
	   $payhere_success_url = $website_url.'/payhere-success/'.$purchase_token;
	   $payfast_success_url = $website_url.'/payfast-success/'.$purchase_token;
	   $coinpayments_success_url = $website_url.'/coinpayments-success/'.$purchase_token;
	   
	   
	   /* settings */
	   
	   
	   if($getcount == 0)
	   {
	      Items::savecheckoutData($savedata);
		  
		  
		  $order_loop = explode(',',$order_id);
		  $item_names = "";
		  foreach($order_loop as $order)
		  {
		    $single_order = Items::getorderData($order);
			$buyer_id = $single_order->item_user_id;
			$buyer_info['view'] = Members::singlebuyerData($buyer_id);
// 			$buyer_type = $buyer_info['view']->exclusive_author;
			$count_mode = Settings::checkuserSubscription($buyer_id);
			if($single_order->coupon_type == 'fixed')
			{
			    $price_item = $single_order->item_price - $single_order->coupon_value;
			}
			else if($single_order->coupon_type == 'percentage')
			{
				$price_item = $single_order->discount_price;
			}
			else
			{
			   $price_item = $single_order->item_price;
			}
			if($additional['setting']->subscription_mode == 0)
		    {
				
				$commission =($price_item * $setting['setting']->site_non_exclusive_commission) / 100;
				$amount_price = $commission;
				$vendor_price = $price_item - $commission;
			}
			else
			{
			    if($count_mode == 1)
				{
				    
				  	$vendor_price = $price_item;
				  	$amount_price = 0;
				  
				}
				else
				{
				    
					
					$commission =($price_item * $setting['setting']->site_non_exclusive_commission) / 100;
					$amount_price = $commission;
					$vendor_price = $price_item - $commission;
				}
			}	
		    $orderdata = array('user_id' => $user_id,'purchase_code' => $purchase_code, 'purchase_token' => $purchase_token, 'payment_type' => $payment_method, 'vendor_amount' => $vendor_price, 'admin_amount' => $amount_price, 'total_price' => $price_item);
			Items::singleorderupData($order,$orderdata);
			$item['name'] = Items::singleorderData($order);
			$item_names .= $item['name']->item_name;
					   
		  }
		  $item_names_data = rtrim($item_names,',');
		  
		  
		  if($payment_method == 'paypal')
		  {
		     
			 $paypal = '<form method="post" id="paypal_form" action="'.$paypal_url.'">
			  <input type="hidden" value="_xclick" name="cmd">
			  <input type="hidden" value="'.$paypal_email.'" name="business">
			  <input type="hidden" value="'.$item_names_data.'" name="item_name">
			  <input type="hidden" value="'.$purchase_token.'" name="item_number">
			  <input type="hidden" value="'.$final_amount.'" name="amount">
			  <input type="hidden" value="'.$site_currency.'" name="currency_code">
			  <input type="hidden" value="'.$success_url.'" name="return">
			  <input type="hidden" value="'.$cancel_url.'" name="cancel_return">
			  		  
			</form>';
			$paypal .= '<script>window.paypal_form.submit();</script>';
			echo $paypal;
					 
			 
		  }
		  else if($payment_method == 'instamojo')
		  {
		       if($site_currency != 'INR')
			   {
			   $convert = Currency::convert()->from($site_currency)->to('INR')->amount($final_amount)->round(2)->get();
		       $price_amount = $convert;
			   }
			   else
			   {
			   $price_amount = $final_amount;
			   }
			    $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $instamojo_payment_link);
				curl_setopt($ch, CURLOPT_HEADER, FALSE);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
				curl_setopt($ch, CURLOPT_HTTPHEADER,
							array("X-Api-Key:".$instamojo_api_key,
								  "X-Auth-Token:".$instamojo_auth_token));
				$payload = Array(
					'purpose' => $item_names_data,
					'amount' => $price_amount,
					//'phone' => '9876543210',
					'buyer_name' => $order_firstname,
					'redirect_url' => $instamojo_success_url,
					'send_email' => true,
					//'webhook' => $instamojo_success_url,
					//'send_sms' => false,
					'email' => $order_email,
					'allow_repeated_payments' => false
				);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
				$response = curl_exec($ch);
				curl_close($ch);
				$response = json_decode($response); 
				
				return redirect($response->payment_request->longurl);
				
				
		  
		  }
		  else if($payment_method == 'sslcommerz')
		  {
		      if($site_currency != 'BDT')
			   {
			   $convert = Currency::convert()->from($site_currency)->to('BDT')->amount($final_amount)->round(2)->get();
		       $price_amount = $convert;
			   }
			   else
			   {
			   $price_amount = $final_amount;
			   }
		      $sslc = new SSLCommerz();
				$sslc->amount($price_amount)
					->trxid($purchase_token)
					->product($item_names_data)
					->customer($order_firstname,$order_email)
					->setUrl([route('sslcommerz.successpage'), route('sslcommerz.failurepage'), route('sslcommerz.cancelpage'), route('sslcommerz.ipnpage')])
					->setCurrency('BDT');
				return $sslc->make_payment();
				//BDT

        /**
         * 
         *  USE:  $sslc->make_payment(true) FOR CHECKOUT INTEGRATION
         * 
         * */
		  }
		  else if($payment_method == 'mercadopago')
		  {
		    
		    /*if($site_currency != 'BRL')
			{
			   $convert = Currency::convert($site_currency,'BRL',$final_amount);
			   $convertedAmount = $convert['convertedAmount'];
			   $price_amount = $convertedAmount;
			}
			else
			{
			$price_amount = $final_amount;
			}*/
			$price_amount = $final_amount;
		    //include(app_path() . '/mercadopago/autoload.php');
			MercadoPago\SDK::setClientId($mercadopago_client_id);
            MercadoPago\SDK::setClientSecret($mercadopago_client_secret);
            $preference = new MercadoPago\Preference();
			$item = new MercadoPago\Item();
			$item->id = $purchase_token;
			$item->title = $item_names_data; 
			$item->quantity = 1;
			$item->currency_id = $site_currency;
			$item->unit_price = $price_amount;
			$preference->items = array($item);
			$preference->back_urls = array(
				"success" => $mercadopago_success,
				"failure" => $mercadopago_failure,
				"pending" => $mercadopago_pending
			);
			$preference->auto_return = "approved";
			$preference->save(); 
			if($mercadopago_mode == 1)
			{
			return redirect($preference->init_point);
			}
			else
			{
			return redirect($preference->sandbox_init_point);
			}
		  
		  }
		  /* coinpayments */
		  else if($payment_method == 'coinpayments')
		  {
		     $coinpayments = '<form action="https://www.coinpayments.net/index.php" method="post" id="coinpayments_form">
								<input type="hidden" name="cmd" value="_pay">
								<input type="hidden" name="reset" value="1">
								<input type="hidden" name="merchant" value="'.$coinpayments_merchant_id.'">
								<input type="hidden" name="item_name" value="'.$item_names_data.'">	
								<input type="hidden" name="item_desc" value="'.$item_names_data.'">
								<input type="hidden" name="item_number" value="'.$purchase_token.'">
								<input type="hidden" name="currency" value="'.$site_currency.'">
								<input type="hidden" name="amountf" value="'.$final_amount.'">
								<input type="hidden" name="want_shipping" value="0">
								<input type="hidden" name="success_url" value="'.$coinpayments_success_url.'">	
								<input type="hidden" name="cancel_url" value="'.$cancel_url.'">	
							</form>';
			$coinpayments .= '<script>window.coinpayments_form.submit();</script>';
			echo $coinpayments;				
		  }
		  /* coinpayments */
		  /* payfast */
		  else if($payment_method == 'payfast')
		  {
		     if($site_currency != 'ZAR')
			   {
			   $convert = Currency::convert()->from($site_currency)->to('ZAR')->amount($final_amount)->round(2)->get();
		       $price_amount = $convert;
			   }
			   else
			   {
			   $price_amount = $final_amount;
			   }
			 $payfast = '<form method="post" id="payfast_form" action="'.$payfast_url.'">
			  <input type="hidden" name="merchant_id" value="'.$payfast_merchant_id.'">
   			  <input type="hidden" name="merchant_key" value="'.$payfast_merchant_key.'">
   			  <input type="hidden" name="amount" value="'.$price_amount.'">
   			  <input type="hidden" name="item_name" value="'.$item_names_data.'">
			  <input type="hidden" name="item_description" value="'.$item_names_data.'">
			  <input type="hidden" name="name_first" value="'.$order_firstname.'">
			  <input type="hidden" name="name_last" value="'.$order_firstname.'">
			  <input type="hidden" name="email_address" value="'.$order_email.'">
			  <input type="hidden" name="m_payment_id" value="'.$purchase_token.'">
              <input type="hidden" name="email_confirmation" value="1">
              <input type="hidden" name="confirmation_address" value="'.$order_email.'"> 
              <input type="hidden" name="return_url" value="'.$payfast_success_url.'">
			  <input type="hidden" name="cancel_url" value="'.$cancel_url.'">
			  <input type="hidden" name="notify_url" value="'.$cancel_url.'">
			</form>';
			$payfast .= '<script>window.payfast_form.submit();</script>';
			echo $payfast;
					 
			 
		  }
		  
		  /* payfast */
		  else if($payment_method == 'ipay')
		  {
		  
		  	 if($site_currency != 'KES')
			   {
		       
			   $convert = Currency::convert()->from($site_currency)->to('KES')->amount($final_amount)->round(2)->get();
			   $price_amount = $convert;
			   }
			   else
			   {
			   $price_amount = $final_amount;
			   }
		     $fields = array("live"=> $ipay_mode, // 0
                    "oid"=> $purchase_token,
                    "inv"=> $purchase_token,
                    "ttl"=> $price_amount,
                    "tel"=> "000000000000",
                    "eml"=> $order_email,
                    "vid"=> $ipay_vendor_id, // demo
                    "curr"=> "KES",
                    "cbk"=> $ipay_callback,
                    "cst"=> "1",
                    "crl"=> "2"
                    );
            
			$datastring =  $fields['live'].$fields['oid'].$fields['inv'].$fields['ttl'].$fields['tel'].$fields['eml'].$fields['vid'].$fields['curr'].$fields['cbk'].$fields['cst'].$fields['crl'];		
			 $hashkey = $ipay_hash_key; // demoCHANGED
			 $generated_hash = hash_hmac('sha1',$datastring , $hashkey);
			 
			 $ipay = '<form method="post" id="ipay_form" action="'.$ipay_url.'">';
			 foreach ($fields as $key => $value) 
			 { 
			  $ipay .= '<input type="hidden" value="'.$value.'" name="'.$key.'">';
			 } 
			$ipay .= '<input name="hsh" type="hidden" value="'.$generated_hash.'">';  		  
			$ipay .= '</form>';
			$ipay .= '<script>window.ipay_form.submit();</script>';
			echo $ipay;
					 
			 
		  }
		  else if($payment_method == 'coingate')
		  {
		  
		     \CoinGate\CoinGate::config(array(
					'environment'               => $coingate_mode_status, // sandbox OR live
					'auth_token'                => $coingate_auth_token,
					'curlopt_ssl_verifypeer'    => TRUE // default is false
					 ));
					 
			  $post_params = array(
			       'id'                => $purchase_token,
                   'order_id'          => $purchase_token,
                   'price_amount'      => $final_amount,
                   'price_currency'    => $site_currency,
                   'receive_currency'  => $site_currency,
                   'callback_url'      => $coingate_callback,
                   'cancel_url'        => $cancel_url,
                   'success_url'       => $coingate_callback,
                   'title'             => $item_names_data,
                   'description'       => $item_names_data
				   
               );
                
				$order = \CoinGate\Merchant\Order::create($post_params);
				
				if ($order) {
					//echo $order->status;
					
					Cache::put('coingate_id', $order->id, now()->addDays(1));
					Cache::put('purchase_id', $order->order_id, now()->addDays(1));
					//echo $order->id;
					return redirect($order->payment_url);
					
					
				} else {
					return redirect($cancel_url);
				}
					  //return view('test');
	  		 
			 
		  }
		  else if($payment_method == 'twocheckout')
		  {
		    
			$two_checkout = '<form method="post" id="two_checkout_form" action="https://www.2checkout.com/checkout/purchase">
			  <input type="hidden" name="sid" value="'.$two_checkout_account.'" />
			  <input type="hidden" name="mode" value="2CO" />
			  <input type="hidden" name="li_0_type" value="product" />
			  <input type="hidden" name="li_0_name" value="'.$item_names_data.'" />
			  <input type="hidden" name="li_0_price" value="'.$final_amount.'" />
			  <input type="hidden" name="currency_code" value="'.$site_currency.'" />
			  <input type="hidden" name="merchant_order_id" value="'.$purchase_token.'" />';
			  if($two_checkout_mode == 0)
			  {
			  $two_checkout .= '<input type="hidden" name="card_holder_name" value="John Doe" />
			                 <input type="hidden" name="demo" value="Y" />';
			  
			  }
			  $two_checkout .= '<input type="hidden" name="street_address" value="" />
			  <input type="hidden" name="city" value="" />
			  <input type="hidden" name="state" value="" />
			  <input type="hidden" name="zip" value="" />
			  <input type="hidden" name="country" value="" />
			  <input type="hidden" name="x_receipt_link_url" value="product_item" />
			  <input type="hidden" name="email" value="'.$order_email.'" />
			  </form>';
			$two_checkout .= '<script>window.two_checkout_form.submit();</script>';
			echo $two_checkout;
			
			/*$record = array('final_amount' => $final_amount, 'purchase_token' => $purchase_token, 'payment_method' => $payment_method, 'item_names_data' => $item_names_data, 'site_currency' => $site_currency, 'website_url' => $website_url, 'two_checkout_private' => $two_checkout_private, 'two_checkout_account' => $two_checkout_account, 'two_checkout_mode' => $two_checkout_mode, 'token' => $token, 'two_checkout_publishable' => $two_checkout_publishable);
       return view('order-confirm')->with($record);*/
			
		  }
		  else if($payment_method == 'payumoney')
		  {
		        if($site_currency != 'INR')
			   {
		       
			   $convert = Currency::convert()->from($site_currency)->to('INR')->amount($final_amount)->round(2)->get();
			   $price_amount = $convert;
			   }
			   else
			   {
			   $price_amount = $final_amount;
			   }
		        $action = '';
				$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
				$posted = array();
				$posted = array(
					'key' => $MERCHANT_KEY,
					'txnid' => $txnid,
					'amount' => $price_amount,
					'udf1' => $purchase_token,
					'firstname' => $order_firstname,
					'email' => $order_email,
					'productinfo' => $item_names_data,
					'surl' => $website_url.'/payu_success',
					'furl' => $website_url.'/cancel',
					'service_provider' => 'payu_paisa',
				);
				$payu_success = $website_url.'/payu_success';
				
				if(empty($posted['txnid'])) {
					$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
				} 
				else 
				{
					$txnid = $posted['txnid'];
				}
				$hash = '';
				$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
				if(empty($posted['hash']) && sizeof($posted) > 0) {
					$hashVarsSeq = explode('|', $hashSequence);
					$hash_string = '';  
					foreach($hashVarsSeq as $hash_var) {
						$hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
						$hash_string .= '|';
					}
					$hash_string .= $SALT;
				
					$hash = strtolower(hash('sha512', $hash_string));
					$action = $PAYU_BASE_URL . '/_payment';
				} 
				elseif(!empty($posted['hash'])) 
				{
					$hash = $posted['hash'];
					$action = $PAYU_BASE_URL . '/_payment';
				}
				$paymoney = '<form action="'.$action.'" method="post" name="payumoney_form">
            <input type="hidden" name="key" value="'.$MERCHANT_KEY.'" />
            <input type="hidden" name="hash" value="'.$hash.'"/>
            <input type="hidden" name="txnid" value="'.$txnid.'" />
			<input type="hidden" name="udf1" value="'.$purchase_token.'" />
            <input type="hidden" name="amount" value="'.$price_amount.'" />
            <input type="hidden" name="firstname" id="firstname" value="'.$order_firstname.'" />
            <input type="hidden" name="email" id="email" value="'.$order_email.'" />
            <input type="hidden" name="productinfo" value="'.$item_names_data.'">
            <input type="hidden" name="surl" value="'.$payu_success.'" />
            <input type="hidden" name="furl" value="'.$cancel_url.'" />
            <input type="hidden" name="service_provider" value="payu_paisa"  />
			</form>';
			/*if(!$hash) {*/
            $paymoney .= '<script>window.payumoney_form.submit();</script>';
			/*}*/
			echo $paymoney;

		  }
		  
		  
		  else if($payment_method == 'payhere')
		  {
		      if($site_currency != 'LKR')
			   {
		       
			   $convert = Currency::convert()->from($site_currency)->to('LKR')->amount($final_amount)->round(2)->get();
			   $price_amount = $convert;
			   }
			   else
			   {
			   $price_amount = $final_amount;
			   }
		      $payhere = '<form method="post" action="'.$payhere_url.'" id="payhere_form">   
							<input type="hidden" name="merchant_id" value="'.$payhere_merchant_id.'">
							<input type="hidden" name="return_url" value="'.$payhere_success_url.'">
							<input type="hidden" name="cancel_url" value="'.$cancel_url.'">
							<input type="hidden" name="notify_url" value="'.$cancel_url.'">  
							<input type="hidden" name="order_id" value="'.$purchase_token.'">
							<input type="hidden" name="items" value="'.$item_names_data.'"><br>
							<input type="hidden" name="currency" value="LKR">
							<input type="hidden" name="amount" value="'.$price_amount.'">
							<input type="hidden" name="first_name" value="'.$order_firstname.'">
							<input type="hidden" name="last_name" value="'.$order_lastname.'"><br>
							<input type="hidden" name="email" value="'.$order_email.'">
							<input type="hidden" name="phone" value="'.$order_firstname.'"><br>
							<input type="hidden" name="address" value="'.$order_firstname.'">
							<input type="hidden" name="city" value="'.$order_firstname.'">
							<input type="hidden" name="country" value="'.$order_firstname.'">
							  
						</form>'; 
						$payhere .= '<script>window.payhere_form.submit();</script>';
			            echo $payhere;
		  }
		  
		  else if($payment_method == 'paystack')
		  {
		       if($site_currency != 'NGN')
			   {
		       $convert = Currency::convert()->from($site_currency)->to('NGN')->amount($final_amount)->round(2)->get();
			   $price_amount = $convert * 100;
			   }
			   else
			   {
			   $price_amount = $final_amount * 100;
			   }
		       $callback = $website_url.'/paystack';
			   $csf_token = csrf_token();
			   
			   $paystack = '<form method="post" id="stack_form" action="'.route('paystack').'">
					  <input type="hidden" name="_token" value="'.$csf_token.'">
					  <input type="hidden" name="email" value="'.$user_email.'" >
					  <input type="hidden" name="order_id" value="'.$purchase_token.'">
					  <input type="hidden" name="amount" value="'.$price_amount.'">
					  <input type="hidden" name="quantity" value="1">
					  <input type="hidden" name="currency" value="NGN">
					  <input type="hidden" name="reference" value="'.$reference.'">
					  <input type="hidden" name="callback_url" value="'.$callback.'">
					  <input type="hidden" name="metadata" value="'.$purchase_token.'">
					  <input type="hidden" name="key" value="'.$setting['setting']->paystack_secret_key.'">
					</form>';
					$paystack .= '<script>window.stack_form.submit();</script>';
					echo $paystack;
			 
		  }
		  else if($payment_method == 'flutterwave')
		  {
		      if($site_currency != 'NGN')
			   {
		       
			   $convert = Currency::convert()->from($site_currency)->to('NGN')->amount($final_amount)->round(2)->get();
			   $price_amount = $convert;
			   }
			   else
			   {
			   $price_amount = $final_amount;
			   }
		       $flutterwave_callback = $website_url.'/flutterwave';
			   $phone_number = "";
			   $csf_token = csrf_token();
			   $flutterwave = '<form method="post" id="flutterwave_form" action="https://checkout.flutterwave.com/v3/hosted/pay">
	          <input type="hidden" name="public_key" value="'.$flutterwave_public_key.'" />
	          <input type="hidden" name="customer[email]" value="'.$user_email.'" >
			  <input type="hidden" name="customer[phone_number]" value="'.$phone_number.'" />
			  <input type="hidden" name="customer[name]" value="'.$order_firstname.'" />
			  <input type="hidden" name="tx_ref" value="'.$purchase_token.'" />
			  <input type="hidden" name="amount" value="'.$price_amount.'">
			  <input type="hidden" name="currency" value="NGN">
			  <input type="hidden" name="meta[token]" value="'.$csf_token.'">
			  <input type="hidden" name="redirect_url" value="'.$flutterwave_callback.'">
			</form>';
			$flutterwave .= '<script>window.flutterwave_form.submit();</script>';
			echo $flutterwave;
			   
			   
			   
		  }
		  
		  else if($payment_method == 'iyzico')
		  {
		       if($site_currency != 'TRY')
			   {
		       $convert = Currency::convert()->from($site_currency)->to('TRY')->amount($final_amount)->round(2)->get();
			   $price_amount = $convert;
			   }
			   else
			   {
			   $price_amount = number_format((float)$final_amount, 2, '.', '');
			   }
			 
		     $endpoint = $website_url."/app/iyzipay-php/iyzico.php";
			 $client = new Client(['base_uri' => $endpoint]);
             $api_key = $iyzico_api_key;
			 $secret_key = $iyzico_secret_key;
			 $iyzi_url = $iyzico_url;
			 $purchased_token = $purchase_token;
			 $amount = $price_amount;
			 $userids = $user_id;
			 $usernamer = $order_firstname;
             $response = $client->request('GET', $endpoint, ['query' => [
				'iyzico_api_key' => $api_key, 
				'iyzico_secret_key' => $secret_key,
				'iyzico_url' => $iyzi_url,
				'purchase_token' => $purchased_token,
				'price_amount' => $amount,
				'user_id' => $userids,
				'username' => $usernamer,
				'email' => $user_email,
				'user_token' => $user_token,
				'item_name' => $item_names_data,
				'iyzico_success_url' => $iyzico_success_url,
				
			]]);
        
            echo $response->getBody();
            //$iyzico_api_key $iyzico_secret_key $iyzico_url
			 
			 
			/*$client = new \GuzzleHttp\Client();
		    $endpoint = $website_url."/iyzico.php";
			$txnid = 1234;
			$amount = 112;
			$email = 2212;
			$phone = "0000000000";
			$response = $client->request('GET', $endpoint, ['query' => [
				'txnid' => $txnid, 
				'amount' => $amount,
				'email' => $email,
				'phone' => $phone,
			]]);
			$contents = json_decode($response->getBody()->getContents(),true);
		    $view_data = json_encode($contents);
			dd($response->getBody());*/
			
		  
		  }
		  
		  else if($payment_method == 'razorpay')
		  {
		       $additional['settings'] = Settings::editAdditional();
			   if($site_currency != 'INR')
			   {
		       
			   $convert = Currency::convert()->from($site_currency)->to('INR')->amount($final_amount)->round(2)->get();
			   $price_amount = $convert * 100;
			   }
			   else
			   {
			   $price_amount = $final_amount * 100;
			   }
			   $csf_token = csrf_token();
			   $logo_url = $website_url.'/public/storage/settings/'.$setting['setting']->site_logo;
			   $script_url = $website_url.'/resources/views/theme/js/vendor.min.js';
			   $callback = $website_url.'/razorpay';
			   $razorpay = '
			   <script type="text/javascript" src="'.$script_url.'"></script>
			   <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
			   <script>
				var options = {
					"key": "'.$razorpay_key.'",
					"amount": "'.$price_amount.'", 
					"currency": "INR",
					"name": "'.$item_names_data.'",
					"description": "'.$purchase_token.'",
					"image": "'.$logo_url.'",
					"callback_url": "'.$callback.'",
					"prefill": {
						"name": "'.$order_firstname.'",
						"email": "'.$order_email.'"
						
					},
					"notes": {
						"address": "'.$order_firstname.'"
						
						
					},
					"theme": {
						"color": "'.$setting['setting']->site_theme_color.'"
					}
				};
				var rzp1 = new Razorpay(options);
				rzp1.on("payment.failed", function (response){
						alert(response.error.code);
						alert(response.error.description);
						alert(response.error.source);
						alert(response.error.step);
						alert(response.error.reason);
						alert(response.error.metadata);
				});
				
				$(window).on("load", function() {
					 rzp1.open();
					e.preventDefault();
					});
				</script>';
				echo $razorpay;
					
					
		  }
		  else if($payment_method == 'localbank')
		  {
		    $bank_details = $setting['setting']->local_bank_details;
		    $bank_data = array('purchase_token' => $purchase_token, 'bank_details' => $bank_details);
	        return view('bank-details')->with($bank_data);
		  }
		  else if($payment_method == 'wallet')
		  {
		      if($buyer_wallet_amount >= $final_amount)
			   {    
			         $purchased_token = $purchase_token;
		    		$payment_status = 'completed';
					$orderdata = array('order_status' => $payment_status);
					$checkoutdata = array('payment_status' => $payment_status);
					Items::singleordupdateData($purchased_token,$orderdata);
					Items::singlecheckoutData($purchased_token,$checkoutdata);
					$token = $purchased_token;
					$checking = Items::getcheckoutData($token);
					/* customer email */
					$currency = $setting['setting']->site_currency;
					$admin_name = $setting['setting']->sender_name;
					$admin_email = $setting['setting']->sender_email;
					$customer['info'] = Members::singlevendorData($checking->user_id);
					$buyer_name = $customer['info']->name;
					$buyer_email = $customer['info']->email;
					$amount = $checking->total;
					$order_id = $checking->purchase_token;
					$payment_type = $checking->payment_type;
					$payment_date = $checking->payment_date;
					$payment_status = $checking->payment_status;
					$record_customer = array('buyer_name' => $buyer_name, 'buyer_email' => $buyer_email, 'amount' => $amount, 'order_id' => $order_id, 'currency' => $currency, 'payment_type' => $payment_type, 'payment_date' => $payment_date, 'payment_status' => $payment_status);
							
														  $checktemp = EmailTemplate::checkTemplate(21);
														  if($checktemp != 0)
														  {
														  $template_view['mind'] = EmailTemplate::viewTemplate(21);
														  $template_subject = $template_view['mind']->et_subject;
														  }
														  else
														  {
														  $template_subject = "Item Purchase Notifications";
														  }
														  
							Mail::send('item_purchase_mail', $record_customer , function($message) use ($admin_name, $admin_email, $buyer_name, $buyer_email, $template_subject) {
												$message->to($buyer_email, $buyer_name)
														->subject($template_subject);
												$message->from($admin_email,$admin_name);
											});
					/* customer email */
					$order_id = $checking->order_ids;
					$order_loop = explode(',',$order_id);
					 
					 $earn_wallet = $buyer_wallet_amount - $final_amount;
					$walet_data = array('earnings' => $earn_wallet); 
					Members::updateData($user_token,$walet_data); 
					  foreach($order_loop as $order)
					  {
						
						$getitem['item'] = Items::getorderData($order);
						$token = $getitem['item']->item_token;
						$item['display'] = Items::solditemData($token);
						$item_sold = $item['display']->item_sold + 1;
						$item_token = $token; 
						$data = array('item_sold' => $item_sold);
					    Items::updateitemData($item_token,$data);
						/* manual payment verification : OFF */
						if($setting['setting']->payment_verification == 0)
						{
						   
							  $ordered['data'] = Items::singleorderData($order);
							  $user_id = $ordered['data']->user_id;
							  $item_user_id = $ordered['data']->item_user_id;
							  $vendor_amount = $ordered['data']->vendor_amount;
							  $total_price = $ordered['data']->total_price;
							  $admin_amount = $ordered['data']->admin_amount;
							  
							  $vendor['info'] = Members::singlevendorData($item_user_id);
							  $user_token = $vendor['info']->user_token;
							  $to_name = $vendor['info']->name;
							  $to_email = $vendor['info']->email;
							  $vendor_earning = $vendor['info']->earnings + $vendor_amount;
							  $record = array('earnings' => $vendor_earning);
							  Members::updatepasswordData($user_token, $record);
							  
							  $admin['info'] = Members::adminData();
							  $admin_token = $admin['info']->user_token;
							  $admin_earning = $admin['info']->earnings + $admin_amount;
							  $admin_record = array('earnings' => $admin_earning);
							  Members::updateadminData($admin_token, $admin_record);
							  
							  $orderdata = array('approval_status' => 'payment released to vendor');
							  Items::singleorderupData($order,$orderdata);
							  $check_email_support = Members::getuserSubscription($vendor['info']->id);
							  if($check_email_support == 1)
							  {
								  $record_data = array('to_name' => $to_name, 'to_email' => $to_email, 'vendor_amount' => $vendor_amount, 'currency' => $currency);
								  /* email template code */
								  $checktemp = EmailTemplate::checkTemplate(18);
								  if($checktemp != 0)
								  {
								  $template_view['mind'] = EmailTemplate::viewTemplate(18);
								  $template_subject = $template_view['mind']->et_subject;
								  }
								  else
								  {
								  $template_subject = "New Payment Approved";
								  }
								  /* email template code */
								  Mail::send('admin.vendor_payment_mail', $record_data , function($message) use ($admin_name, $admin_email, $to_name, $to_email, $template_subject) {
											$message->to($to_email, $to_name)
													->subject($template_subject);
											$message->from($admin_email,$admin_name);
										});
							  }			
						 
						   
						}
						/* manual payment verification : OFF */
						
						
					  }
					  /* referral per sale earning */
						$logged_id = $user_id;
						$buyer_details = Members::singlebuyerData($logged_id);
						$referral_by = $buyer_details->referral_by;
						$additional_setting = Settings::editAdditional();
						/* new code */
						$calprice = $checking->total;
						if($additional_setting->per_sale_referral_commission_type == 'percentage')
						{
						$per_sale_commission = ($additional_setting->per_sale_referral_commission * $calprice) / 100;
						}
						else
						{
						$per_sale_commission = $additional_setting->per_sale_referral_commission;
						}
						$referral_commission = $per_sale_commission;
						/* new code */
						$check_referral = Members::referralCheck($referral_by);
						  if($check_referral != 0)
						  {
							  $referred['display'] = Members::referralUser($referral_by);
							  $wallet_amount = $referred['display']->earnings + $referral_commission;
							  $referral_amount = $referred['display']->referral_amount + $referral_commission;
							  $update_data = array('earnings' => $wallet_amount, 'referral_amount' => $referral_amount);
							  Members::updateReferral($referral_by,$update_data);
						   } 
					/* referral per sale earning */	
					return redirect('success');
			   }
			   else
			   {
			      return redirect()->back()->with('error', 'Please check your wallet balance amount');
			   }
		  }
		  /* stripe code */
		  else if($payment_method == 'stripe')
		  {
		     
			 	if($request->input('stripeToken'))
                {
            	$token = $request->input('stripeToken');
            	$response = $this->gateway->authorize([
							'name' => $order_firstname,
							'customer' => $order_firstname,
							'email' => $order_email, 
							'receipt_email' => $order_email,   
							'amount' => $final_amount,
							'currency' => $site_currency,
							'description' => $item_names_data,
							'metadata' => ["order_id" => $purchase_token],
							'token' => $token,
							'returnUrl' => $website_url.'/stripe-success/'.$item_user_id,
							'confirm' => true,
                ])->send();
 
               if($response->isSuccessful())
               {
                $response = $this->gateway->capture([
                    'amount' => $final_amount,
                    'currency' => $site_currency,
                    'paymentIntentReference' => $response->getPaymentIntentReference(),
                ])->send();
 
                $arr_payment_data = $response->getData();
                $payment_token = $arr_payment_data['id'];
                $data_record = array('payment_token' => $payment_token);
				return view('success')->with($data_record);
                //dd($arr_payment_data);
                
                }
				elseif($response->isRedirect())
				{
					session(['payer_email' => $request->input('email')]);
					$response->redirect();
				}
				else
				{
					
					return redirect("cancel")->with("error", $response->getMessage());
				}		 
				
		     }
		  
		  }
		  /* stripe code */
		  
		 
		  
	   }
	   else
	   {
	   
	      Items::updatecheckoutData($purchase_token,$user_id,$payment_status,$updatedata);
		  $order_loop = explode(',',$order_id);
		  foreach($order_loop as $order)
		  {
		    $single_order = Items::getorderData($order);
			$buyer_id = $single_order->item_user_id;
			$buyer_info['view'] = Members::singlebuyerData($buyer_id);
// 			$buyer_type = $buyer_info['view']->exclusive_author;
			if($single_order->coupon_type == 'fixed')
			{
			$price_item = $single_order->item_price - $single_order->coupon_value;
			}
			else if($single_order->coupon_type == 'percentage')
			{
			$price_item = $single_order->discount_price;
			}
			else
			{
			$price_item = $single_order->item_price;
			}
			
			$commission =($price_item * $setting['setting']->site_non_exclusive_commission) / 100;
			
			$amount_price = $commission;
			$vendor_price = $price_item - $commission;
		    $orderdata = array('purchase_token' => $purchase_token, 'payment_type' => $payment_method, 'vendor_amount' => $vendor_price, 'admin_amount' => $amount_price, 'total_price' => $price_item);
			Items::singleorderupData($order,$orderdata);
			$item['name'] = Items::singleorderData($order);
			$item_names .= $item['name']->item_name;

		   
		  }
		  $item_names_data = rtrim($item_names,',');
		  
		  
		  if($payment_method == 'paypal')
		  {
		     
			 $paypal = '<form method="post" id="paypal_form" action="'.$paypal_url.'">
			  <input type="hidden" value="_xclick" name="cmd">
			  <input type="hidden" value="'.$paypal_email.'" name="business">
			  <input type="hidden" value="'.$item_names_data.'" name="item_name">
			  <input type="hidden" value="'.$purchase_token.'" name="item_number">
			  <input type="hidden" value="'.$final_amount.'" name="amount">
			  <input type="hidden" value="'.$site_currency.'" name="currency_code">
			  <input type="hidden" value="'.$success_url.'" name="return">
			  <input type="hidden" value="'.$cancel_url.'" name="cancel_return">
			  		  
			</form>';
			$paypal .= '<script>window.paypal_form.submit();</script>';
			echo $paypal;
		 
		  }
		  else if($payment_method == 'payhere')
		  {
		      if($site_currency != 'LKR')
			   {
		       
			   $convert = Currency::convert()->from($site_currency)->to('LKR')->amount($final_amount)->round(2)->get();
			   $price_amount = $convert * 100;
			   }
			   else
			   {
			   $price_amount = $final_amount * 100;
			   }
		      $payhere = '<form method="post" action="'.$payhere_url.'" id="payhere_form">   
							<input type="hidden" name="merchant_id" value="'.$payhere_merchant_id.'">
							<input type="hidden" name="return_url" value="'.$payhere_success_url.'">
							<input type="hidden" name="cancel_url" value="'.$cancel_url.'">
							<input type="hidden" name="notify_url" value="'.$cancel_url.'"> 
							<input type="hidden" name="order_id" value="'.$purchase_token.'">
							<input type="hidden" name="items" value="'.$item_names_data.'"><br>
							<input type="hidden" name="currency" value="LKR">
							<input type="hidden" name="amount" value="'.$price_amount.'">  
							
							<input type="hidden" name="first_name" value="'.$order_firstname.'">
							<input type="hidden" name="last_name" value="'.$order_lastname.'"><br>
							<input type="hidden" name="email" value="'.$order_email.'">
							<input type="hidden" name="phone" value="'.$order_firstname.'"><br>
							<input type="hidden" name="address" value="'.$order_firstname.'">
							<input type="hidden" name="city" value="'.$order_firstname.'">
							<input type="hidden" name="country" value="'.$order_firstname.'">
							  
						</form>'; 
						$payhere .= '<script>window.payhere_form.submit();</script>';
			            echo $payhere;
		  }
		  else if($payment_method == 'twocheckout')
		  {
		    
			$record = array('final_amount' => $final_amount, 'purchase_token' => $purchase_token, 'payment_method' => $payment_method, 'item_names_data' => $item_names_data, 'site_currency' => $site_currency, 'website_url' => $website_url, 'two_checkout_private' => $two_checkout_private, 'two_checkout_account' => $two_checkout_account, 'two_checkout_mode' => $two_checkout_mode, 'token' => $token, 'two_checkout_publishable' => $two_checkout_publishable);
       return view('order-confirm')->with($record);
			
		  }
		  else if($payment_method == 'paystack')
		  {
		       if($site_currency != 'NGN')
			   {
		       
			   $convert = Currency::convert()->from($site_currency)->to('NGN')->amount($final_amount)->round(2)->get();
			   $price_amount = $convert * 100;
			   }
			   else
			   {
			    $price_amount = $final_amount * 100; 
			   }
		       $callback = $website_url.'/paystack';
			   $csf_token = csrf_token();
			   $paystack = '<form method="post" id="stack_form" action="'.route('paystack').'">
					  <input type="hidden" name="_token" value="'.$csf_token.'">
					  <input type="hidden" name="email" value="'.$user_email.'" >
					  <input type="hidden" name="order_id" value="'.$purchase_token.'">
					  <input type="hidden" name="amount" value="'.$price_amount.'">
					  <input type="hidden" name="quantity" value="1">
					  <input type="hidden" name="currency" value="NGN">
					  <input type="hidden" name="reference" value="'.$reference.'">
					  <input type="hidden" name="callback_url" value="'.$callback.'">
					  <input type="hidden" name="metadata" value="'.$purchase_token.'">
					  <input type="hidden" name="key" value="'.$setting['setting']->paystack_secret_key.'">
					</form>';
					$paystack .= '<script>window.stack_form.submit();</script>';
					echo $paystack;
			 
		  }
		  else if($payment_method == 'razorpay')
		  {
		       $additional['settings'] = Settings::editAdditional();
			   if($site_currency != 'INR')
			   {
		       
			   $convert = Currency::convert()->from($site_currency)->to('INR')->amount($final_amount)->round(2)->get();
			   $price_amount = $convert * 100;
			   }
			   else
			   {
			   $price_amount = $final_amount * 100;
			   }
			   $csf_token = csrf_token();
			   $logo_url = $website_url.'/public/storage/settings/'.$setting['setting']->site_logo;
			   $script_url = $website_url.'/resources/views/theme/js/vendor.min.js';
			   $callback = $website_url.'/razorpay';
			   $razorpay = '
			   <script type="text/javascript" src="'.$script_url.'"></script>
			   <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
			   <script>
				var options = {
					"key": "'.$razorpay_key.'",
					"amount": "'.$price_amount.'", 
					"currency": "INR",
					"name": "'.$item_names_data.'",
					"description": "'.$purchase_token.'",
					"image": "'.$logo_url.'",
					"callback_url": "'.$callback.'",
					"prefill": {
						"name": "'.$order_firstname.'",
						"email": "'.$order_email.'"
						
					},
					"notes": {
						"address": "'.$order_firstname.'"
						
						
					},
					"theme": {
						"color": "'.$setting['setting']->site_theme_color.'"
					}
				};
				var rzp1 = new Razorpay(options);
				rzp1.on("payment.failed", function (response){
						alert(response.error.code);
						alert(response.error.description);
						alert(response.error.source);
						alert(response.error.step);
						alert(response.error.reason);
						alert(response.error.metadata);
				});
				
				$(window).on("load", function() {
					 rzp1.open();
					e.preventDefault();
					});
				</script>';
				echo $razorpay;
					
					
		  }
		  else if($payment_method == 'localbank')
		  {
		    $bank_details = $setting['setting']->local_bank_details;
		    $bank_data = array('purchase_token' => $purchase_token, 'bank_details' => $bank_details);
	        return view('bank-details')->with($bank_data);
		  }
          /* stripe code */
		  else if($payment_method == 'stripe')
		  {
		     
			 			 
				$stripe = array(
					"secret_key"      => $stripe_secret_key,
					"publishable_key" => $stripe_publish_key
				);
			 
				\Stripe\Stripe::setApiKey($stripe['secret_key']);
			 
				
				$customer = \Stripe\Customer::create(array(
					'email' => $order_email,
					'source'  => $token
				));
			 
				
				$item_name = $item_names_data;
				$item_price = $amount * 100;
				$currency = $site_currency;
				$order_id = $purchase_token;
			 
				
				$charge = \Stripe\Charge::create(array(
					'customer' => $customer->id,
					'amount'   => $item_price,
					'currency' => $currency,
					'description' => $item_name,
					'metadata' => array(
						'order_id' => $order_id
					)
				));
			 
				
				$chargeResponse = $charge->jsonSerialize();
			 
				
				if($chargeResponse['paid'] == 1 && $chargeResponse['captured'] == 1) 
				{
			 
					
										
					$payment_token = $chargeResponse['balance_transaction'];
					$payment_status = 'completed';
					$purchased_token = $order_id;
					$orderdata = array('payment_token' => $payment_token, 'order_status' => $payment_status);
					$checkoutdata = array('payment_token' => $payment_token, 'payment_status' => $payment_status);
					Items::singleordupdateData($purchased_token,$orderdata);
					Items::singlecheckoutData($purchased_token,$checkoutdata);
					
					$token = $purchased_token;
					$check['display'] = Items::getcheckoutData($token);
					$order_id = $check['display']->order_ids;
					$order_loop = explode(',',$order_id);
					  
					  foreach($order_loop as $order)
					  {
						
						$getitem['item'] = Items::getorderData($order);
						$token = $getitem['item']->item_token;
						$item['display'] = Items::solditemData($token);
						$item_sold = $item['display']->item_sold + 1;
						$item_token = $token; 
						$data = array('item_sold' => $item_sold);
					    Items::updateitemData($item_token,$data);
						/* manual payment verification : OFF */
						if($setting['setting']->payment_verification == 0)
						{
						   
							  $ordered['data'] = Items::singleorderData($order);
							  $user_id = $ordered['data']->user_id;
							  $item_user_id = $ordered['data']->item_user_id;
							  $vendor_amount = $ordered['data']->vendor_amount;
							  $total_price = $ordered['data']->total_price;
							  $admin_amount = $ordered['data']->admin_amount;
							  
							  $vendor['info'] = Members::singlevendorData($item_user_id);
							  $user_token = $vendor['info']->user_token;
							  $to_name = $vendor['info']->name;
							  $to_email = $vendor['info']->email;
							  $vendor_earning = $vendor['info']->earnings + $vendor_amount;
							  $record = array('earnings' => $vendor_earning);
							  Members::updatepasswordData($user_token, $record);
							  
							  $admin['info'] = Members::adminData();
							  $admin_token = $admin['info']->user_token;
							  $admin_earning = $admin['info']->earnings + $admin_amount;
							  $admin_record = array('earnings' => $admin_earning);
							  Members::updateadminData($admin_token, $admin_record);
							  
							  $orderdata = array('approval_status' => 'payment released to vendor');
							  Items::singleorderupData($order,$orderdata);
							  $admin_name = $setting['setting']->sender_name;
							  $admin_email = $setting['setting']->sender_email;
							  $currency = $setting['setting']->site_currency;
							  $check_email_support = Members::getuserSubscription($vendor['info']->id);
							  if($check_email_support == 1)
							  {
								  $record_data = array('to_name' => $to_name, 'to_email' => $to_email, 'vendor_amount' => $vendor_amount, 'currency' => $currency);
								  /* email template code */
									  $checktemp = EmailTemplate::checkTemplate(18);
									  if($checktemp != 0)
									  {
									  $template_view['mind'] = EmailTemplate::viewTemplate(18);
									  $template_subject = $template_view['mind']->et_subject;
									  }
									  else
									  {
									  $template_subject = "New Payment Approved";
									  }
									  /* email template code */
								  Mail::send('admin.vendor_payment_mail', $record_data , function($message) use ($admin_name, $admin_email, $to_name, $to_email, $template_subject) {
											$message->to($to_email, $to_name)
													->subject($template_subject);
											$message->from($admin_email,$admin_name);
										});
							  }			
						 
						   
						}
						/* manual payment verification : OFF */
						
						
					  }
					/* referral per sale earning */
						$logged_id = $user_id;
						$buyer_details = Members::singlebuyerData($logged_id);
						$referral_by = $buyer_details->referral_by;
						$additional_setting = Settings::editAdditional();
						/* new code */
						$calprice = $check['display']->total;
						if($additional_setting->per_sale_referral_commission_type == 'percentage')
						{
						$per_sale_commission = ($additional_setting->per_sale_referral_commission * $calprice) / 100;
						}
						else
						{
						$per_sale_commission = $additional_setting->per_sale_referral_commission;
						}
						$referral_commission = $per_sale_commission;
						/* new code */
						$check_referral = Members::referralCheck($referral_by);
						  if($check_referral != 0)
						  {
							  $referred['display'] = Members::referralUser($referral_by);
							  $wallet_amount = $referred['display']->earnings + $referral_commission;
							  $referral_amount = $referred['display']->referral_amount + $referral_commission;
							  $update_data = array('earnings' => $wallet_amount, 'referral_amount' => $referral_amount);
							  Members::updateReferral($referral_by,$update_data);
						   } 
					/* referral per sale earning */	
					$data_record = array('payment_token' => $payment_token);
					return view('success')->with($data_record);
					
					
				}
		     
		  
		  }
		  /* stripe code */

		  
	   }
	   return view('checkout')->with($totaldata);
	
	
	}
	
	
	public function remove_cart_item($ordid)
	{
	  
	   $ord_id = base64_decode($ordid); 
	   Items::deletecartdata($ord_id);
	  
	  return redirect()->back()->with('success', 'Cart item removed');
	  
	}
	
	public function remove_clear_item()
	{
	  
	   $session_id = Session::getId();
	   Items::deletecartempty($session_id);
	  
	  return redirect()->back()->with('success', 'Cart items removed');
	  
	}
	
	
	
	public function show_checkout()
	{

	   $session_id = Session::getId();
	   if(\Session::has('old-session_id')){
            $old_session_id = \Session::pull('old-session_id');
            $data = array('session_id' => $session_id);
            Items::updatecartsessionData($old_session_id,$data);
          
	   }
	  $cart['item'] = Items::getcartData();
	  $cart_count = Items::getcartCount();
	  $mobile['item'] = Items::getcartData();
	  $sid = 1;
	  $setting['setting'] = Settings::editGeneral($sid);
	  $additional['setting'] = Settings::editAdditional();
	  if($cart_count != 0)
	  {
		  $last_order = Items::lastorderData();
		  $item_user_id = $last_order->item_user_id;
		  $count_mode = Settings::checkuserSubscription($item_user_id);
		  $vendor_details = Members::singlevendorData($item_user_id);
		  if($additional['setting']->subscription_mode == 0)
		  {
			$get_payment = explode(',', $setting['setting']->payment_option);
			 $stripe_mode = $setting['setting']->stripe_mode;
			   if($stripe_mode == 0)
			   {
				 $stripe_publish = $setting['setting']->test_publish_key;
				 $stripe_secret = $setting['setting']->test_secret_key;
			   }
			   else
			   {
				 $stripe_publish = $setting['setting']->live_publish_key;
				 $stripe_secret = $setting['setting']->live_secret_key;
			   }
		  }
		  else
		  {
			 if($count_mode == 1)
			 {
				$get_payment = explode(',', $vendor_details->user_payment_option);
				   $stripe_mode = $vendor_details->user_stripe_mode;
				   if($stripe_mode == 0)
				   {
					 $stripe_publish = $vendor_details->user_test_publish_key;
					 $stripe_secret = $vendor_details->user_test_secret_key;
				   }
				   else
				   {
					 $stripe_publish = $vendor_details->user_live_publish_key;
					 $stripe_secret = $vendor_details->user_live_secret_key;
				   }
			 }
			 else
			 {
				$get_payment = explode(',', $setting['setting']->payment_option);
				   $stripe_mode = $setting['setting']->stripe_mode;
				   if($stripe_mode == 0)
				   {
					 $stripe_publish = $setting['setting']->test_publish_key;
					 $stripe_secret = $setting['setting']->test_secret_key;
				   }
				   else
				   {
					 $stripe_publish = $setting['setting']->live_publish_key;
					 $stripe_secret = $setting['setting']->live_secret_key;
				   }
			 }
		  }
	  }
	  else
	  {
	     $get_payment = explode(',', $setting['setting']->payment_option);
		 $stripe_mode = $setting['setting']->stripe_mode;
			   if($stripe_mode == 0)
			   {
				 $stripe_publish = $setting['setting']->test_publish_key;
				 $stripe_secret = $setting['setting']->test_secret_key;
			   }
			   else
			   {
				 $stripe_publish = $setting['setting']->live_publish_key;
				 $stripe_secret = $setting['setting']->live_secret_key;
			   }
	  }
	  /* VAT */
	  if (Auth::check())
	  {
		  $country_id = Auth::user()->country;
		  $country_details = Members::countryCheck($country_id);
		  if($country_details != 0)
		  {
			  $data_views = Members::countryDATA($country_id);
			  $country_percent = $data_views->vat_price;
		  }
		  else
		  {
			$country_percent = $additional['setting']->default_vat_price;
		  } 
	   }
	   else
	   {
	      $country_percent = $additional['setting']->default_vat_price;
	   }	  
	   /* VAT */
	  $data = array('cart' => $cart, 'cart_count' => $cart_count, 'get_payment' => $get_payment, 'mobile' => $mobile, 'stripe_publish' => $stripe_publish, 'stripe_secret' => $stripe_secret, 'country_percent' => $country_percent);
	  
	   return view('checkout')->with($data);
	 
	
	}
	
	public function show_yearly_offer()
	{
	   $session_id = Session::getId();
	   
	  if(Auth::check())
	  { 
	  $user_id = Auth::user()->id;
	  $update_data = array('user_id' => $user_id); 
	  Items::changeOrder($session_id,$update_data);
	  }
	  
	  $cart['item'] = Items::getcartData();
	  $cart_count = Items::getcartCount();
	  
	   $data = array('cart' => $cart, 'cart_count' => $cart_count);
	   
	   return view('cart')->with($data);
	}
	
	public function show_cart()
	{
	   $session_id = Session::getId();
	   
	  if(Auth::check())
	  { 
	  $user_id = Auth::user()->id;
	  $update_data = array('user_id' => $user_id); 
	  Items::changeOrder($session_id,$update_data);
	  }
	  
	  $cart['item'] = Items::getcartData();
	  $cart_count = Items::getcartCount();
	  
	   $data = array('cart' => $cart, 'cart_count' => $cart_count);
	   
	   return view('cart')->with($data);
	}
	
	public static function price_info($flash_var,$price_var) 
    {
	    if($flash_var == 1)
        {
        $price = round($price_var/2);
        }
        else
        {
        $price = $price_var;
        }
		return $price;
	}
	
	public function add_to_cart($slug)
	{
	  $checkitem = Items::singleitemCount($slug);
	  if($checkitem != 0)
	  { 
	          $item['view'] = Items::singleitemData($slug);
			  $item_price = $this->price_info($item['view']->item_flash,$item['view']->regular_price);
			  $item_id = $item['view']->item_id;
			  $session_id = Session::getId();
			  $item_name = $item['view']->item_name;
			  $item_user_id = $item['view']->user_id;
			  $item_token = $item['view']->item_token;
			  $additional['setting'] = Settings::editAdditional();
			  $getmember['views'] = Members::singlevendorData($item_user_id);
			  $user_exclusive_type = $getmember['views']->exclusive_author;
			  $regular_license = $additional['setting']->regular_license;
			  $price = $item_price;
			  $license = 'regular';
			  $start_date = date('Y-m-d');
			  $end_date = date('Y-m-d', strtotime($regular_license));
			  $order_status = 'pending';
			  $sid = 1;
			  $setting['setting'] = Settings::editGeneral($sid);
			  if($additional['setting']->subscription_mode == 0)
			  {
				   if($user_exclusive_type == 1)
				   {
				   $commission = ($setting['setting']->site_exclusive_commission * $price) / 100;
				   }
				   else
				   {
				   $commission = ($setting['setting']->site_non_exclusive_commission * $price) / 100;
				   }
				   $vendor_amount = $price - $commission;
				   $admin_amount = $commission;
				}
				else
				{
				   
				   $count_mode = Settings::checkuserSubscription($item_user_id);
				   if($count_mode == 1)
				   {
					 $vendor_amount = $price;
					 $admin_amount = 0;
				   }
				   else
				   {
					   if($user_exclusive_type == 1)
					   {
					   $commission = ($setting['setting']->site_exclusive_commission * $price) / 100;
					   }
					   else
					   {
					   $commission = ($setting['setting']->site_non_exclusive_commission * $price) / 100;
					   }
					   $vendor_amount = $price - $commission;
					   $admin_amount = $commission;
				   }
				}   
			   
			   
			   $getcount  = Items::getorderCount($item_id,$session_id,$order_status);
			   
			   $savedata = array('session_id' => $session_id, 'item_id' => $item_id, 'item_name' => $item_name, 'item_user_id' => $item_user_id, 'item_token' => $item_token, 'license' => $license, 'start_date' => $start_date, 'end_date' => $end_date, 'item_price' => $price, 'vendor_amount' => $vendor_amount, 'admin_amount' => $admin_amount, 'total_price' => $price, 'order_status' => $order_status);
			   
			                 
			   $updatedata = array('license' => $license, 'start_date' => $start_date, 'end_date' => $end_date, 'item_price' => $price, 'total_price' => $price);
			   
			   
			   if($additional['setting']->subscription_mode == 0)
			   {
				   if($getcount == 0)
				   {
					  Items::savecartData($savedata);
					 
					  return redirect('cart')->with('success','Item has been added to cart'); 
				   }
				   else
				   {
					  Items::updatecartData($item_id,$session_id,$order_status,$updatedata);
					  
					  return redirect('cart')->with('success','Item has been updated to cart'); 
				   }
			   }
			   else
			   {
				  Items::deletecartremove($session_id);
				  Items::savecartData($savedata);
				  return redirect('cart')->with('success','Item has been updated to cart'); 
			   } 
	   
	   }
	   else
	   {
	         return redirect()->back()->with('error', 'Invalid Product Data');
	   }
	  
	
	
	}
	
	
	public function upload(Request $request){
	
        /*$fileName=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('uploads', $fileName, 'public');
        return response()->json(['location'=>"/storage/$path"]); */
		
		/*$url = URL::to("/");
		 $imgpath = request()->file('file')->store($url.'/public/storage/items/', 'public');
        return json_encode(['location' => $imgpath]); 
        
        /*$imgpath = request()->file('file')->store('uploads', 'public'); 
        return response()->json(['location' => "/storage/$imgpath"]);*/
		$image = $request->file('file');
			$img_name = time() . '.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/items');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$url = URL::to("/public/storage/items/".$img_name);
       return response()->json(['location' => $url]);
    }
	
	
	public function view_featured_items(Request $request)
	{
	   $sid = 1;
	   $setting['setting'] = Settings::editGeneral($sid);
	   $today = date("Y-m-d");
	   $site_item_per_page = $setting['setting']->site_item_per_page;
	   $additional['settings'] = Settings::editAdditional();
	   if($additional['settings']->subscription_mode == 1)
	   {
	   $items = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.item_featured','=','yes')->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate($site_item_per_page);;
	   }
	   else
	   {
	   $items = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.item_featured','=','yes')->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate($site_item_per_page);
	   }
	   $category['view'] = Category::with('SubCategory')->where('category_status','=','1')->where('drop_status','=','no')->orderBy('menu_order','asc')->get();
	    return view('featured-items',['items' => $items,'category' => $category]);
	}
	
		public function view_audio_items(Request $request)
	{
	   $sid = 1;
	   $setting['setting'] = Settings::editGeneral($sid);
	   $today = date("Y-m-d");
	   $site_item_per_page = $setting['setting']->site_item_per_page;
	   $additional['settings'] = Settings::editAdditional();
	   if($additional['settings']->subscription_mode == 1)
	   {
	   $items = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.video_preview_type','=','mp3')->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate($site_item_per_page);
	   }
	   else
	   {
	   $items = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.video_preview_type','=','mp3')->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate($site_item_per_page);
	   }
	   if ($request->ajax()) {
    		$view = view('featured-data',compact('items'))->render();
            return response()->json(['html'=>$view]);
        }
	   
	   return view('audio-items',compact('items'));
	}
	
	
	
	public function view_subscriber_downloads(Request $request)
	{
	   $sid = 1;
	   $setting['setting'] = Settings::editGeneral($sid);
	   $today = date("Y-m-d");
	   $site_item_per_page = $setting['setting']->site_item_per_page;
	   $additional['settings'] = Settings::editAdditional();
	   
	   $items = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.subscription_item','=',1)->where('items.free_download','=',0)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate($site_item_per_page);
	   
	   if ($request->ajax()) {
    		$view = view('featured-data',compact('items'))->render();
            return response()->json(['html'=>$view]);
        }
	   
	   return view('subscriber-downloads',compact('items'));
	}
	
	
	public function view_new_items(Request $request)
	{
	   $sid = 1;
	   $setting['setting'] = Settings::editGeneral($sid);
	   $today = date("Y-m-d");
	   $additional['settings'] = Settings::editAdditional();
	   $site_item_per_page = $setting['setting']->site_item_per_page;
	   if($additional['settings']->subscription_mode == 1)
	   {
	   $items = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate($site_item_per_page);
	   }
	   else
	   {
	   $items = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate($site_item_per_page);
	   }
	   $category['view'] = Category::with('SubCategory')->where('category_status','=','1')->where('drop_status','=','no')->orderBy('menu_order','asc')->get();
	    return view('new-releases',['items' => $items,'category' => $category]);
	}
	
	public function view_popular_items(Request $request)
	{
	   $sid = 1;
	   $setting['setting'] = Settings::editGeneral($sid);
	   $today = date("Y-m-d");
	   $additional['settings'] = Settings::editAdditional();
	   $site_item_per_page = $setting['setting']->site_item_per_page;
	   if($additional['settings']->subscription_mode == 1)
	   {
	   $items = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_views', 'desc')->paginate($site_item_per_page);
	   }
	   else
	   {
	   $items = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_views', 'desc')->paginate($site_item_per_page);
	   }
	   $category['view'] = Category::with('SubCategory')->where('category_status','=','1')->where('drop_status','=','no')->orderBy('menu_order','asc')->get();
	    return view('popular-items',['items' => $items,'category' => $category]);
	}
	
	
	public function view_tags($type,$slug,Request $request)
	{
	   $nslug = str_replace("-"," ",$slug);
	   $tags['tags'] = Items::alltagData($nslug);
	   
	   $tag_header_desc = "Discover the creative world of design template , your go-to source for an expansive collection of design templates. From captivating infographic templates to eye-catching invitation designs, we offer a diverse range of templates, including free options. Explore Instagram post templates, birthday templates, and even After Effects templates for stunning visual content. Start downloading your free design templates today!";
	   $tag_footer_desc = "Discover the creative universe of designtemplate.io, your ultimate destination for design templates. Whether you're seeking impeccable template designs, free options, video templates, or captivating infographics, we've got you covered. Unlock a plethora of possibilities with invitation and Instagram templates, including eye-catching Instagram post templates. Explore our free invitation templates, including enticing birthday templates. Elevate your projects with dynamic after effects templates, enhancing every visual endeavor. Experience the convenience of template design and dive into a world of innovation, all at your fingertips on designtemplate.io. Your next creative venture starts here, with design templates that inspire brilliance.";
	   foreach ($tags['tags'] as $tag) {
            if ($tag->tag_name == $nslug) {
                 $tag_header_desc = $tag->tag_header_desc;
                 $tag_footer_desc = $tag->tag_footer_desc;
            }
        }
        
	   
	   $sid = 1;
	   $setting['setting'] = Settings::editGeneral($sid);
	   $today = date("Y-m-d");
	   $additional['settings'] = Settings::editAdditional();
	   $site_item_per_page = $setting['setting']->site_item_per_page;
	   if($additional['settings']->subscription_mode == 1)
	   {
	 $items = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.item_tags', 'LIKE', "%$nslug%")->where('items.drop_status','=','no')->inRandomOrder()->paginate($site_item_per_page);
	   }
	   else
	   {
     $items = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.item_tags', 'LIKE', "%$nslug%")->where('items.drop_status','=','no')->inRandomOrder()->paginate($site_item_per_page);
	   }
	   
	   $data = array('setting' => $setting, 'items' => $items, 'slug' => $slug, 'tag_header_desc' => $tag_header_desc,'tag_footer_desc' => $tag_footer_desc, 'nslug' => $nslug);
	   return view('tag')->with($data);
	}
	
	public function view_flash_items(Request $request)
	{
	  $today = date("Y-m-d");
	   $additional['settings'] = Settings::editAdditional();
	   $sid = 1;
	  $setting['setting'] = Settings::editGeneral($sid);
	  $site_item_per_page = $setting['setting']->site_item_per_page;
	   if($additional['settings']->subscription_mode == 1)
	   {
	  $items = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.item_flash','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate($site_item_per_page);
	  }
	  else
	  {
	   $items = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.item_flash','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate($site_item_per_page);
	  }
	  
	  
	  if($setting['setting']->site_flash_end_date < date("Y-m-d"))
	  {
	     $data = array('item_flash' => 0);
		 Items::updateFlash($data);
	  }
	  if ($request->ajax()) {
    		$view = view('flash-data',compact('items'))->render();
            return response()->json(['html'=>$view]);
        }
	  return view('flash-sale',[ 'items' => $items, 'setting' => $setting]);
	  
	}
	
	
	public function view_affiliate($slug)
	{
	   $user['user'] = Members::getInuser($slug);
	   $referral_count = $user['user']->referral_count;
	   $referral_by['user'] = Users::getreferralData();
	   $data = array('referral_count' => $referral_count,'referral_by' => $referral_by);
	   return view('affiliate')->with($data);
	}
	
	
	public function view_user($slug,Request $request)
	{
	   $sid = 1;
	   $setting['setting'] = Settings::editGeneral($sid);
	   $site_item_per_page = $setting['setting']->site_item_per_page;
	   $check_user = Members::getInuserCount($slug);
	   if($check_user != 0)
	   {
	   $user['user'] = Members::getInuser($slug);
	   $user_id = $user['user']->id;
	   
	   /* badges */
	   $sid = 1;
	   $badges['setting'] = Settings::editBadges($sid);
	   $sold['item'] = Items::SoldAmount($user_id);
	   $sold_amount = 0;
	   foreach($sold['item'] as $iter)
	   {
			$sold_amount += $iter->total_price;
	   }
	   $country['view'] = Settings::editCountry($user['user']->country);
	   $membership = date('m/d/Y',strtotime($user['user']->created_at));
	  $membership_date = explode("/", $membership);
      $year = (date("md", date("U", mktime(0, 0, 0, $membership_date[0], $membership_date[1], $membership_date[2]))) > date("md")
		? ((date("Y") - $membership_date[2]) - 1)
		: (date("Y") - $membership_date[2]));
	  
	   $collect_amount = Items::CollectedAmount($user_id);
	   $referral_count = $user['user']->referral_count;
	   $referral_by['user'] = Users::getreferralData();
	   /* badges */
	   
	   $itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.user_id','=',$user_id)->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->get();
	   
	   $items = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.user_id','=',$user_id)->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate($site_item_per_page);
	   
	   
	   $since = date("F Y", strtotime($user['user']->created_at));
	   
	   $getitemcount = Items::getuseritemCount($user_id);
	   
	   $getsalecount = Items::getsaleitemCount($user_id);
	   
	   if (Auth::check())
		{
		$followcheck = Items::getfollowuserCheck($user_id);
		}
		else
		{
		 $followcheck = 0;
		}
	   
	   $followingcount = Items::getfollowingCount($user_id);
	   
	   $followercount = Items::getfollowerCount($user_id);
	   
		  $getreview  = Items::getreviewData($user_id);
		  if($getreview !=0)
		  {
			  $review['view'] = Items::getreviewRecord($user_id);
			  $top = 0;
			  $bottom = 0;
			  foreach($review['view'] as $review)
			  {
				 if($review->rating == 1) { $value1 = $review->rating*1; } else { $value1 = 0; }
				 if($review->rating == 2) { $value2 = $review->rating*2; } else { $value2 = 0; }
				 if($review->rating == 3) { $value3 = $review->rating*3; } else { $value3 = 0; }
				 if($review->rating == 4) { $value4 = $review->rating*4; } else { $value4 = 0; }
				 if($review->rating == 5) { $value5 = $review->rating*5; } else { $value5 = 0; }
				 
				 $top += $value1 + $value2 + $value3 + $value4 + $value5;
				 $bottom += $review->rating;
				 
			  }
			  if(!empty(round($top/$bottom)))
			  {
				$count_rating = round($top/$bottom);
			  }
			  else
			  {
				$count_rating = 0;
			  }
			  
			  
			  
		  }
		  else
		  {
			$count_rating = 0;
			$bottom = 0;
		  }
	   
	   $featured_count = Items::getfeaturedUser($user_id);
	   $free_count = Items::getfreeUser($user_id);
	   $tren_count = Items::getTrendUser($user_id);
	   if ($request->ajax()) {
    		$view = view('user-data',compact('items'))->render();
            return response()->json(['html'=>$view]);
        }
	   $data = array('user' => $user, 'since' => $since, 'items' => $items, 'getitemcount' => $getitemcount, 'getsalecount' => $getsalecount, 'count_rating' => $count_rating, 'bottom' => $bottom, 'getreview' => $getreview, 'followcheck' => $followcheck, 'followingcount' => $followingcount, 'followercount' => $followercount, 'badges' => $badges, 'sold_amount' => $sold_amount, 'country' => $country, 'year' => $year, 'collect_amount' => $collect_amount, 'referral_count' => $referral_count,'referral_by' => $referral_by, 'featured_count' => $featured_count, 'free_count' => $free_count, 'tren_count' => $tren_count, 'itemData' => $itemData);
	   return view('user')->with($data);
	   }
	   else
	   {
	   return redirect('/404');
	   }
	}
	
	
	public function insert_suggestion(Request $request)
	{
	   $user_id = Auth::user()->id;
	   $templates = $request->input('name');
	   $description = $request->input('description');
	   $item_type = json_encode($request->input('item_type'));
	   $upload_file = $request->input('upload_file');
	   $sug_date = date('Y-m-d');
	   
	   $data = array('user_id' => $user_id, 'templates' => $templates, 'description' => $description, 'item_type' => $item_type,'upload_file' => $upload_file, 'sug_date' => $sug_date);
	  
	   Suggestion::saveSuggestionData($data);
	   return redirect()->back()->with('success', 'Thanks for your Suggestions. We will Try to work on it.');
	}

	
	public function view_all_items()
	{
	  $method = "get";
	  $today = date("Y-m-d");
	  $additional['settings'] = Settings::editAdditional();
	  $sid = 1;
	  $setting['setting'] = Settings::editGeneral($sid);
	  if($additional['settings']->subscription_mode == 1)
	  {
	  $itemData['item'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_category','items.item_type','items.item_featured','items.item_type_id','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.user_id','items.preview_video')->where('items.item_type','!=','Graphics-Design')->where('items.item_category','!=',58)->where('items.item_category_parent','!=',16)->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate($setting['setting']->site_item_per_page);
	  }
	  else
	  {
	  $itemData['item'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_category','items.item_type','items.item_featured','items.item_type_id','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.user_id','items.preview_video')->where('items.item_type','!=','Graphics-Design')->where('items.item_category','!=',58)->where('items.item_category_parent','!=',16)->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate($setting['setting']->site_item_per_page);
	  }

     $itemTemplates['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->orderBy('items.item_id', 'desc')->take(20)->get();
	  $catData['item'] = Items::getitemcatData();
     $category['view'] = Category::with('SubCategory')->where('category_status','=','1')->where('drop_status','=','no')->orderBy('menu_order','asc')->get();
	  
	  return view('templates',[ 'itemTemplates' => $itemTemplates, 'itemData' => $itemData, 'catData' => $catData, 'category' => $category, 'method' => $method]);
	}
	
	public function view_filters($filter)
	{
	  $commentData['post'] = [];

    if ($filter === 'all') {
        $commentData['post'] = Suggestion::getSuggestionData()->all();
    } 
    elseif ($filter === 'active') {
        $commentData['post'] = Suggestion::getSuggestionData()->where('status', '0')->all();
    } 
    elseif ($filter === 'completed') {
        $commentData['post'] = Suggestion::getSuggestionData()->where('status', '1')->all();
    }
    else {
        $commentData['post'] = Suggestion::getSuggestionData()->all();
    }
    
       return view('suggestions',[ 'commentData' => $commentData]);
	}
	
	public function view_suggestions()
	{
	   
       $commentData['post'] = Suggestion::getSuggestionData();
       return view('suggestions',[ 'commentData' => $commentData]);
	}
	
	
	public function view_rss()
	{
	     return view('rss');
    }


	
	public function free_item_request($free,$item_token,$token1)
	{
	   if($free == 0)
	   {
	     $subscription_text = 0;
	     $free_text = 1;
	   }
	   else
	   {
	     $subscription_text = 1;
	     $free_text = 0;
	   }
	    $data = array('subscription_item'=> $subscription_text, 'free_download'=>$free_text);
	    Items::updateitemData($item_token,$data);
	    return redirect()->back();
	}
	
	public function feactured_item_request($feactured,$item_token,$token1,$token2)
	{
	   if($feactured == 'yes')
	   {
	     $feactured_text = 'no';
	   }
	   else
	   {
	     $feactured_text = 'yes';
	   }
	    $data = array('item_featured'=> $feactured_text);
	    Items::updateitemData($item_token,$data);
	    return redirect()->back();
	}
	
	
	public function view_free_items(Request $request)
	{
	    $sid = 1;
	    $setting['setting'] = Settings::editGeneral($sid);
	    $today = date("Y-m-d");
	    $additional['settings'] = Settings::editAdditional();
	    $site_item_per_page = $setting['setting']->site_item_per_page;
	    $items = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.free_download','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate($setting['setting']->site_item_per_page);
	    $category['view'] = Category::with('SubCategory')->where('category_status','=','1')->where('drop_status','=','no')->orderBy('menu_order','asc')->get();
	    return view('free-items',['items' => $items,'category' => $category]);
	}
	
	
	public function login_as_vendor($user_token)
	{
	   $encrypter = app('Illuminate\Contracts\Encryption\Encrypter');
	   $vendor_token   = $encrypter->decrypt($user_token);
	      
		  if(Auth::check())
		  {
		     if(Auth::user()->id == 1)
			 {
				  Auth::logout();
				  $count_data = Members::logData($vendor_token);
				  $vendor_details = Members::editData($vendor_token);
				  $email = $vendor_details->email;
				  $password = base64_decode($vendor_details->user_auth_token);
				  
				  if (Auth::attempt(['email' => $email, 'password' => $password, 'verified' => 1, 'drop_status' => 'no'])) 
				  {
					 return redirect('/profile-settings');
				  }
				  else
				  {
					 return redirect('/login')->with('error', 'These credentials do not match our records.');
				  }
			 }
			 else
			 {
			    return redirect('/login')->with('error', 'These credentials do not match our records.');
			 }	  
		  }
		  else
		  {
		     return redirect('/404');
		  }	  
	
	}
	
	public function upgrade_bank_details()
	{
	   return view('upgrade-bank-details');
	}
	
	public function view_pricing()
	{
	    $id='NA==';
	    if(Session::get('coupon_data') != null)
         {
         $couponValue=Session::get('coupon_data');
         }
        else
         {
             $couponValue = "";
         }
	   $subscr_id = base64_decode($id);
	   $subscr['view'] = Subscription::getSubscription($subscr_id);
	   $sid = 1;
	   $setting['setting'] = Settings::editGeneral($sid);
	   $get_payment = explode(',', $setting['setting']->payment_option);  
	   $subscription['view'] = Subscription::viewSubscription();
	   
	   $convert1 = Currency::convert() ->from('INR') ->to('USD') ->amount('1299') ->get();
	   $convert2 = Currency::convert() ->from('INR') ->to('USD') ->amount('7788') ->get();
	   $data = array('convert1' => $convert1,'convert2' => $convert2, 'subscription' => $subscription, 'subscr' => $subscr, 'get_payment' => $get_payment, 'couponValue' => $couponValue); 
	 return view('pricing')->with($data);
	}
	
	
	public function view_start_selling()
	{
	  $setting['setting'] = Settings::editSelling();
	  $data = array('setting' => $setting);
	  return view('start-selling')->with($data);
	}
	
	
	public function view_preview($item_slug)
	{
	   $item['item'] = Items::singleitemData($item_slug);
	   $data = array('item' => $item);
	   return view('preview')->with($data);
	}
	
	public function autoComplete(Request $request) {
	    
         $query = $request->get('term','');
        
        //  $products=Items::autoSearch($query);
		   $today = date("Y-m-d");
		   $additional['settings'] = Settings::editAdditional();
		   if($additional['settings']->subscription_mode == 1)
		   {
			$products = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->whereRaw('concat(items.item_name) like ?', "%{$query}%")->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->get();
		   }
		   else
		   {
		   $products=Items::autoSearch($query);
		   }	
        $data=array();
        foreach ($products as $product) {
                $data[]=array('value'=>$product->item_name,'id'=>$product->item_id);
        }
        if(count($data))
             return $data;
        else
            return ['value'=>'','id'=>''];
    }
	
	public function not_found()
	{
	  return view('404');
	}
	
	
   public function view_index()
	{
	   //Storage::disk('s3')->delete('https://codecanor.s3.us-east-2.amazonaws.com/wed-jan-19-2022-1-19-pm97277.zip');
	   $today = date("Y-m-d");
	   $sid = 1;
	   $setting['setting'] = Settings::editGeneral($sid);
	   $tags = $setting['setting']->site_keywords;
	   $tagsArray = explode(',', $tags);
       $firstSixTags = array_slice($tagsArray, 0, 6);
	   $additional['settings'] = Settings::editAdditional();
	   
	   $blog['data'] = Blog::homeblogData();
	   $comments = Blog::getgroupcommentData();
	   $review['data'] = Items::homereviewsData();
	   $totalmembers = Members::getmemberData();
	   $totalsales = Items::totalsaleitemCount();
	   $totalfiles = Items::totalfileItems();
	   $total['earning'] = Items::totalearningCount();
	   if($additional['settings']->subscription_mode == 1)
	   {
	   $all['items'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_type','!=','Motion-Graphics')->where('items.item_status','=',1)->where('items.drop_status','=','no')->inRandomOrder()->limit(12)->get();
	   $illustration['items'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->where('items.item_type','=','Graphics-Design')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.drop_status','=','no')->inRandomOrder()->limit(12)->get();
	   $popular['items'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->where('items.item_type','=','Motion-Graphics')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.drop_status','=','no')->inRandomOrder()->limit(12)->get();
	   $flash['items'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->where('items.item_type','=','premier-pro-templates')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.drop_status','=','no')->inRandomOrder()->limit(12)->get();
	   /*$free['items'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.free_download','=',1)->orderBy('items.item_id', 'desc')->take($setting['setting']->home_free_items)->get();*/
	   $aetemplate['items'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->where('items.item_type','=','After-Effect-templates')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.drop_status','=','no')->inRandomOrder()->limit(12)->get();
	   }
	   else
	   {
	   $all['items'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.item_type','!=','Motion-Graphics')->where('items.drop_status','=','no')->inRandomOrder()->limit(12)->get();
	   $illustration['items'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->where('items.item_type','==','Graphics-Design')->where('items.item_category','!=',58)->where('items.item_category_parent','!=',16)->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.drop_status','=','no')->inRandomOrder()->limit(12)->get();
	   $popular['items'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->inRandomOrder()->limit(12)->get();
	   $flash['items'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.item_flash','=',1)->inRandomOrder()->limit(12)->get();
	   $newest['items'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->inRandomOrder()->limit(12)->get();
	   }
	   $free['items'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.free_download','=',1)->inRandomOrder()->limit(8)->get();
	   $totalearning = 0;
	   foreach($total['earning'] as $earning)
	   {
	     $totalearning += $earning->total_price;
	   } 
	   
	   
	$data = array('firstSixTags' => $firstSixTags,'blog' => $blog, 'comments' => $comments, 'review' => $review, 'totalmembers' => $totalmembers, 'totalsales' => $totalsales, 'totalfiles' => $totalfiles, 'totalearning' => $totalearning, 'aetemplate' => $aetemplate, 'all' => $all, 'illustration' => $illustration, 'free' => $free, 'popular' => $popular, 'flash' => $flash);
	  //SitemapGenerator::create(URL::to('/'))->writeToFile('sitemap.xml');
	  
	  return view('index')->with($data);
	}
	
	
	
	public function view_sales_page()
	{
	   $today = date("Y-m-d");
	   $sid = 1;
	   $setting['setting'] = Settings::editGeneral($sid);
	   $additional['settings'] = Settings::editAdditional();
	   $blog['data'] = Blog::homeblogData();
	   $comments = Blog::getgroupcommentData();
	   $review['data'] = Items::homereviewsData();
	   $totalmembers = Members::getmemberData();
	   $totalsales = Items::totalsaleitemCount();
	   $totalfiles = Items::totalfileItems();
	   $total['earning'] = Items::totalearningCount();
	   if($additional['settings']->subscription_mode == 1)
	   {
	   $featured['items'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.item_featured','=','yes')->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->take($setting['setting']->home_featured_items)->get();
	   $popular['items'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_views', 'desc')->take($setting['setting']->home_popular_items)->get();
	   $flash['items'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.item_flash','=',1)->orderBy('items.item_id', 'desc')->take($setting['setting']->home_flash_items)->get();
	   /*$free['items'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.free_download','=',1)->orderBy('items.item_id', 'desc')->take($setting['setting']->home_free_items)->get();*/
	   $newest['items'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->take($setting['setting']->site_newest_files)->get();
	   }
	   else
	   {
	   $featured['items'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.item_featured','=','yes')->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->take($setting['setting']->home_featured_items)->get();
	   $popular['items'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_views', 'desc')->take($setting['setting']->home_popular_items)->get();
	   $flash['items'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.item_flash','=',1)->orderBy('items.item_id', 'desc')->take($setting['setting']->home_flash_items)->get();
	   
	   $newest['items'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->take($setting['setting']->site_newest_files)->get();
	   }
	   $free['items'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.free_download','=',1)->orderBy('items.item_id', 'desc')->take($setting['setting']->home_free_items)->get();
	   $totalearning = 0;
	   foreach($total['earning'] as $earning)
	   {
	     $totalearning += $earning->total_price;
	   } 
	   
	   
	$data = array('blog' => $blog, 'comments' => $comments, 'review' => $review, 'totalmembers' => $totalmembers, 'totalsales' => $totalsales, 'totalfiles' => $totalfiles, 'totalearning' => $totalearning, 'featured' => $featured, 'newest' => $newest, 'free' => $free, 'popular' => $popular, 'flash' => $flash);
	  //SitemapGenerator::create(URL::to('/'))->writeToFile('sitemap.xml');
	  
	  return view('sales-page')->with($data);
	  
	}
	
	public function payment_cancel()
	{
	  return view('cancel');
	}
	

    public function user_verify($user_token)
    {
	    
	    $allsettings = Settings::allSettings();
        $data = array('verified'=>'1');
		$user['user'] = Members::verifyuserData($user_token, $data);
		
		$check_ref = Members::refCount($user_token);
		if($check_ref != 0)
		{
			$user_data = Members::editData($user_token);
		    $referral_by = $user_data->referral_by;
			
			  $referral_commission = $allsettings->site_referral_commission;
			  $check_referral = Members::referralCheck($referral_by);
			  if($check_referral != 0)
			  {
				  $referred['display'] = Members::referralUser($referral_by);
				  $wallet_amount = $referred['display']->earnings + $referral_commission;
				  $referral_amount = $referred['display']->referral_amount + $referral_commission;
				  $referral_count = $referred['display']->referral_count + 1;
				  
				  $update_data = array('earnings' => $wallet_amount, 'referral_amount' => $referral_amount, 'referral_count' => $referral_count);
				  Members::updateReferral($referral_by,$update_data);
			   }
			   $again_data = array('referral_payout' => 'completed');
			   Members::updateData($user_token,$again_data);
			
		}	
		
		return redirect('login')->with('success','Your e-mail is verified. You can now login.');
    }


  /* public function user_verify($user_token)
    {
        $data = array('verified'=>'1');
		$user['user'] = Members::verifyuserData($user_token, $data);
		
		return redirect('login')->with('success','Your e-mail is verified. You can now login.');
    }*/
	
	public function view_forgot()
	{
	   return view('forgot');
	}
	
	public function view_contact()
	{
	   return view('contact');
	}
	
	
	public function view_reset($token)
	{
	  $data = array('token' => $token);
	  return view('reset')->with($data);
	}
	
	
	public function view_unfollow($unfollow,$my_id,$follow_id)
	{
	  Items::unFollow($my_id,$follow_id);
	  return redirect()->back();
	  
	}
	
	public function view_free_item($download,$item_token)
	{
	   
	  if(Auth::check())
	 { 
	     $today_date = date('Y-m-d');
	     $user_id=Auth::user()->id;
	     $download_count_checks = Members::checkdownloadDate(Auth::user()->id,$today_date);
	  
	  if(Auth::user()->user_subscr_download_item > $download_count_checks->user_today_download_limit)
	  {	 	  
	   
	      $token = base64_decode($item_token);
		  $allsettings = Settings::allSettings();
		  $item['data'] = Items::edititemData($token);
		  $a=$item['data']->item_name;
	    	 $today['downloads'] = Downloads::gettotalDownloads($a);
	   	 if(count($today['downloads']) != 0)
	   	 {
	   	  foreach ($today['downloads'] as $download) {
        if($download->item_name != $item['data']->item_name)
        {
		  $item_count = $item['data']->download_count + 1;
		  $data = array('download_count' => $item_count);
		  Items::updateitemData($token,$data);
		  
		  $downloaditem['data'] = Members::editdownloadData($user_id);
		   
		  if($item['data']->free_download==1)
		  {
		       $download_free_count = $downloaditem['data']->free_download_items + 1;
		       $download_subscription_count = $downloaditem['data']->subscription_download_items + 0;
		  }
		  else
		  {
		      $download_free_count = $downloaditem['data']->free_download_items + 0;
		      $download_subscription_count = $downloaditem['data']->subscription_download_items + 1;
		  }
		  
		  $downloaddata = array('free_download_items' => $download_free_count, 'subscription_download_items' => $download_subscription_count);
		  Members::updatedownloadData($user_id,$downloaddata);
	      
		  $downoad_count = Auth::user()->user_today_download_limit + 1;
		  $up_level_download = array('user_today_download_limit' => $downoad_count);
		  Members::updateReferral(Auth::user()->id,$up_level_download);
		  
		  $item_name=$item['data']->item_name;
		  $item_token=$item['data']->item_token;
		  $item_slug=$item['data']->item_slug;
		  $item_author=$item['data']->user_id;
		  if($item['data']->free_download==1)
		  {
		    $free=1; 
		    $subscr=0;
		  }
		  else
		  {
		    $free=0; 
		    $subscr=1;  
		  }
		  $data1 = array('user_id' => $user_id, 'free_items' => $free, 'subscription_items' => $subscr, 'item_name' => $item_name,'item_token' => $item_token, 'item_slug' => $item_slug, 'created_at' => $today_date, 'item_author' => $item_author);
		  Downloads::savedownloadData($data1);
		  
		  if($item['data']->file_type == 'file')
		  {
			  if($allsettings->site_s3_storage == 1)
			  {
			  $myFile = Storage::disk('s3')->url($item['data']->item_file);
			  $newName = uniqid().time().'.zip';
			  header("Cache-Control: public");
			  header("Content-Description: File Transfer");
			  header("Content-Disposition: attachment; filename=" . basename($newName));
			  header("Content-Type: application/octet-stream");
			  return readfile($myFile);	
			  }
			  else if($allsettings->site_s3_storage == 2)
			  {
				$myFile = Storage::disk('wasabi')->url($item['data']->item_file);
				$newName = $item['data']->item_file;
				header("Cache-Control: public");
				header("Content-Description: File Transfer");
				header("Content-Disposition: attachment; filename=" . basename($newName));
				header("Content-Type: application/octet-stream");
				return readfile($myFile);
			  }
			  else if($allsettings->site_s3_storage == 3)
			  {
				$myFile = Storage::disk('dropbox')->url($item['data']->item_file);
				$newName = uniqid().time().'.zip';
				header("Cache-Control: public");
				header("Content-Description: File Transfer");
				header("Content-Disposition: attachment; filename=" . basename($newName));
				header("Content-Type: application/octet-stream");
				return readfile($myFile);
			  }
			  else if($allsettings->site_s3_storage == 4)
			  {
			    $filename = $item['data']->item_file;
				$dir = '/';
				$recursive = false; 
				$contents = collect(Storage::disk('google')->listContents($dir, $recursive));
				$file = $contents
				->where('type', '=', 'file') 
				->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
				->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
				->first(); 
				$display_product_file = Storage::disk('google')->get($file['path']);
			    //return $display_product_file;
				return response($display_product_file, 200)
						  ->header('Content-Type', $file['mimetype'])
						  ->header('Content-disposition', "attachment; filename=$filename");
						
			  }
			  else
			  {
			  $filename = public_path().'/storage/items/'.$item['data']->item_file;
			  $headers = ['Content-Type: application/octet-stream'];
			  $new_name = $item['data']->item_file;
			  return response()->download($filename,$new_name,$headers);
			  }
			  
		  }
		  else
		  {
			  return redirect($item['data']->item_file_link);
		  }
		  
            }
        else
        {
             return redirect('purchases')->with('error','Sorry You already download this file today!');  
        }
	   	  }
        }
        
        else
        {
		  $item_count = $item['data']->download_count + 1;
		  $data = array('download_count' => $item_count);
		  Items::updateitemData($token,$data);
		  
		  $downloaditem['data'] = Members::editdownloadData($user_id);
		   
		  if($item['data']->free_download==1)
		  {
		       $download_free_count = $downloaditem['data']->free_download_items + 1;
		       $download_subscription_count = $downloaditem['data']->subscription_download_items + 0;
		  }
		  else
		  {
		      $download_free_count = $downloaditem['data']->free_download_items + 0;
		      $download_subscription_count = $downloaditem['data']->subscription_download_items + 1;
		  }
		  
		  $downloaddata = array('free_download_items' => $download_free_count, 'subscription_download_items' => $download_subscription_count);
		  Members::updatedownloadData($user_id,$downloaddata);
	      
		  $downoad_count = Auth::user()->user_today_download_limit + 1;
		  $up_level_download = array('user_today_download_limit' => $downoad_count);
		  Members::updateReferral(Auth::user()->id,$up_level_download);
		  
		  $item_name=$item['data']->item_name;
		  $item_token=$item['data']->item_token;
		  $item_slug=$item['data']->item_slug;
		  $item_author=$item['data']->user_id;
		  if($item['data']->free_download==1)
		  {
		    $free=1; 
		    $subscr=0;
		  }
		  else
		  {
		    $free=0; 
		    $subscr=1;  
		  }
		  $data1 = array('user_id' => $user_id, 'free_items' => $free, 'subscription_items' => $subscr, 'item_name' => $item_name,'item_token' => $item_token, 'item_slug' => $item_slug, 'created_at' => $today_date, 'item_author' => $item_author);
		  Downloads::savedownloadData($data1);
		  
		  if($item['data']->file_type == 'file')
		  {
			  if($allsettings->site_s3_storage == 1)
			  {
			  $myFile = Storage::disk('s3')->url($item['data']->item_file);
			  $newName = uniqid().time().'.zip';
			  header("Cache-Control: public");
			  header("Content-Description: File Transfer");
			  header("Content-Disposition: attachment; filename=" . basename($newName));
			  header("Content-Type: application/octet-stream");
			  return readfile($myFile);	
			  }
			  else if($allsettings->site_s3_storage == 2)
			  {
				$myFile = Storage::disk('wasabi')->url($item['data']->item_file);
				$newName = $item['data']->item_file;
				header("Cache-Control: public");
				header("Content-Description: File Transfer");
				header("Content-Disposition: attachment; filename=" . basename($newName));
				header("Content-Type: application/octet-stream");
				return readfile($myFile);
			  }
			  else if($allsettings->site_s3_storage == 3)
			  {
				$myFile = Storage::disk('dropbox')->url($item['data']->item_file);
				$newName = uniqid().time().'.zip';
				header("Cache-Control: public");
				header("Content-Description: File Transfer");
				header("Content-Disposition: attachment; filename=" . basename($newName));
				header("Content-Type: application/octet-stream");
				return readfile($myFile);
			  }
			  else if($allsettings->site_s3_storage == 4)
			  {
			    $filename = $item['data']->item_file;
				$dir = '/';
				$recursive = false; 
				$contents = collect(Storage::disk('google')->listContents($dir, $recursive));
				$file = $contents
				->where('type', '=', 'file') 
				->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
				->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
				->first(); 
				$display_product_file = Storage::disk('google')->get($file['path']);
			    //return $display_product_file;
				return response($display_product_file, 200)
						  ->header('Content-Type', $file['mimetype'])
						  ->header('Content-disposition', "attachment; filename=$filename");
						
			  }
			  else
			  {
			  $filename = public_path().'/storage/items/'.$item['data']->item_file;
			  $headers = ['Content-Type: application/octet-stream'];
			  $new_name = $item['data']->item_file;
			  return response()->download($filename,$new_name,$headers);
			  }
			  
		  }
		  else
		  {
			  return redirect($item['data']->item_file_link);
		  }
		  
              
        }
	  }
		
		else
		{
		   return redirect('pricing')->with('error', 'Sorry! Today your download limit reached. Please Subscribe to download unlimited Assets..');
		}  	
		  
	  
	 }
	  else
	  {
	     return redirect('/404');
	  } 
	 
	 
	}
	
	
	
	
	public function view_follow($my_id,$follow_id)
	{
	   $user_id = $follow_id;
	   $followcheck = Items::getfollowuserCheck($user_id);
	   $data = array('follower_user_id' => $my_id, 'following_user_id' => $follow_id);
	   if($followcheck == 0)
	   {
	       Items::saveFollow($data);
	   }
	   else
	   {
	      return redirect()->back();
	   }
	   return redirect()->back();
	}
	
	
	public function view_top_authors()
	{
	  
	  /*$user['user'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->leftJoin('item_order','item_order.item_user_id','users.id')->leftJoin('country','country.country_id','users.country')->where('users.drop_status','=','no')->where('users.id','!=',1)->orderByRaw('count(*) DESC')->groupBy('item_order.item_user_id')->get();*/
	  $user['user'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->leftJoin('item_order','item_order.item_user_id','users.id')->leftJoin('country','country.country_id','users.country')->where('users.drop_status','=','no')->where('users.id','!=',1)->orderByRaw('users.user_document_verified DESC')->groupBy('item_order.item_user_id')->get();
	  $count_items = Items::getgroupItems();
	  $count_sale = Items::getgroupSale();
	  $sid = 1;
	   $badges['setting'] = Settings::editBadges($sid);
	   $category['view'] = Category::with('SubCategory')->where('category_status','=','1')->where('drop_status','=','no')->orderBy('menu_order','asc')->get();
	   $popular['items'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_views', 'desc')->take(5)->get();
	  $data = array('user' => $user,'count_items' => $count_items, 'count_sale' => $count_sale, 'badges' => $badges, 'category' => $category, 'popular' => $popular);
	  return view('top-authors')->with($data);
	}
	
	
	
	public function view_user_reviews($slug)
	{
	   $check_user = Members::getInuserCount($slug);
	   if($check_user != 0)
	   {
	   $user['user'] = Members::getInuser($slug);
	   $user_id = $user['user']->id;
	   
	   /* badges */
	   $sid = 1;
	   $badges['setting'] = Settings::editBadges($sid);
	   $sold['item'] = Items::SoldAmount($user_id);
	   $sold_amount = 0;
	   foreach($sold['item'] as $iter)
	   {
			$sold_amount += $iter->total_price;
	   }
	   $country['view'] = Settings::editCountry($user['user']->country);
	   $membership = date('m/d/Y',strtotime($user['user']->created_at));
	  $membership_date = explode("/", $membership);
      $year = (date("md", date("U", mktime(0, 0, 0, $membership_date[0], $membership_date[1], $membership_date[2]))) > date("md")
		? ((date("Y") - $membership_date[2]) - 1)
		: (date("Y") - $membership_date[2]));
	  
	   $collect_amount = Items::CollectedAmount($user_id);
	   $referral_count = $user['user']->referral_count;
	   /* badges */
	   
	   
	   $itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.user_id','=',$user_id)->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->get();
	   
	   $since = date("F Y", strtotime($user['user']->created_at));
	   
	   $getitemcount = Items::getuseritemCount($user_id);
	   
	   $getsalecount = Items::getsaleitemCount($user_id);
	   
	   
		  $getreview  = Items::getreviewData($user_id);
		  if($getreview !=0)
		  {
			  $review['view'] = Items::getreviewRecord($user_id);
			  $top = 0;
			  $bottom = 0;
			  foreach($review['view'] as $review)
			  {
				 if($review->rating == 1) { $value1 = $review->rating*1; } else { $value1 = 0; }
				 if($review->rating == 2) { $value2 = $review->rating*2; } else { $value2 = 0; }
				 if($review->rating == 3) { $value3 = $review->rating*3; } else { $value3 = 0; }
				 if($review->rating == 4) { $value4 = $review->rating*4; } else { $value4 = 0; }
				 if($review->rating == 5) { $value5 = $review->rating*5; } else { $value5 = 0; }
				 
				 $top += $value1 + $value2 + $value3 + $value4 + $value5;
				 $bottom += $review->rating;
				 
			  }
			  if(!empty(round($top/$bottom)))
			  {
				$count_rating = round($top/$bottom);
			  }
			  else
			  {
				$count_rating = 0;
			  }
		 }
		  else
		  {
			$count_rating = 0;
			$bottom = 0;
		  }
	   
	    $ratingview['list'] = Items::getreviewUser($user_id);
		$countreview = Items::getreviewCountUser($user_id);
		
		if (Auth::check())
		{
		$followcheck = Items::getfollowuserCheck($user_id);
		}
		else
		{
		 $followcheck = 0;
		}
		
		$followingcount = Items::getfollowingCount($user_id);
		
		$followercount = Items::getfollowerCount($user_id);
		
		$featured_count = Items::getfeaturedUser($user_id);
	   $free_count = Items::getfreeUser($user_id);
	   $tren_count = Items::getTrendUser($user_id);
		
	   $data = array('user' => $user, 'since' => $since, 'itemData' => $itemData, 'getitemcount' => $getitemcount, 'getsalecount' => $getsalecount, 'count_rating' => $count_rating, 'bottom' => $bottom, 'ratingview' => $ratingview, 'countreview' => $countreview, 'getreview' => $getreview, 'followcheck' => $followcheck, 'followingcount' =>  $followingcount, 'followercount' => $followercount, 'badges' => $badges, 'sold_amount' => $sold_amount, 'country' => $country, 'year' => $year, 'collect_amount' => $collect_amount, 'referral_count' => $referral_count, 'featured_count' => $featured_count, 'free_count' => $free_count, 'tren_count' => $tren_count);
	   return view('user-reviews')->with($data);
	   }
	   else
	   {
	   return redirect('/404');
	   }
	
	}
	
	
	public function view_user_followers($slug)
	{
	   $check_user = Members::getInuserCount($slug);
	   if($check_user != 0)
	   {
	   $user['user'] = Members::getInuser($slug);
	   $user_id = $user['user']->id;
	   
	   /* badges */
	   $sid = 1;
	   $badges['setting'] = Settings::editBadges($sid);
	   $sold['item'] = Items::SoldAmount($user_id);
	   $sold_amount = 0;
	   foreach($sold['item'] as $iter)
	   {
			$sold_amount += $iter->total_price;
	   }
	   $country['view'] = Settings::editCountry($user['user']->country);
	   $membership = date('m/d/Y',strtotime($user['user']->created_at));
	  $membership_date = explode("/", $membership);
      $year = (date("md", date("U", mktime(0, 0, 0, $membership_date[0], $membership_date[1], $membership_date[2]))) > date("md")
		? ((date("Y") - $membership_date[2]) - 1)
		: (date("Y") - $membership_date[2]));
	  
	   $collect_amount = Items::CollectedAmount($user_id);
	   $referral_count = $user['user']->referral_count;
	   /* badges */
	   
	   
	   $itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.user_id','=',$user_id)->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->get();
	   
	   $since = date("F Y", strtotime($user['user']->created_at));
	   
	   $getitemcount = Items::getuseritemCount($user_id);
	   
	   $getsalecount = Items::getsaleitemCount($user_id);
	   
		  $getreview  = Items::getreviewData($user_id);
		  if($getreview !=0)
		  {
			  $review['view'] = Items::getreviewRecord($user_id);
			  $top = 0;
			  $bottom = 0;
			  foreach($review['view'] as $review)
			  {
				 if($review->rating == 1) { $value1 = $review->rating*1; } else { $value1 = 0; }
				 if($review->rating == 2) { $value2 = $review->rating*2; } else { $value2 = 0; }
				 if($review->rating == 3) { $value3 = $review->rating*3; } else { $value3 = 0; }
				 if($review->rating == 4) { $value4 = $review->rating*4; } else { $value4 = 0; }
				 if($review->rating == 5) { $value5 = $review->rating*5; } else { $value5 = 0; }
				 
				 $top += $value1 + $value2 + $value3 + $value4 + $value5;
				 $bottom += $review->rating;
				 
			  }
			  if(!empty(round($top/$bottom)))
			  {
				$count_rating = round($top/$bottom);
			  }
			  else
			  {
				$count_rating = 0;
			  }
		  }
		  else
		  {
			$count_rating = 0;
			$bottom = 0;
		  }
	   
	    $ratingview['list'] = Items::getreviewUser($user_id);
		$countreview = Items::getreviewCountUser($user_id);
		
		if (Auth::check())
		{
		$followcheck = Items::getfollowuserCheck($user_id);
		
		}
		else
		{
		 $followcheck = 0;
		 
		}
		$followingcount = Items::getfollowingCount($user_id);
		
		$followercount = Items::getfollowerCount($user_id);
		
		$viewfollowing['view'] = Items::getfollowerView($user_id);
		
		$featured_count = Items::getfeaturedUser($user_id);
	   $free_count = Items::getfreeUser($user_id);
	   $tren_count = Items::getTrendUser($user_id);
		//$viewfollowing['view'] = Follow::with('followers')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('follow.following_user_id','=',$user_id)->orderBy('follow.fid', 'desc')->get();
		
	   $data = array('user' => $user, 'since' => $since, 'itemData' => $itemData, 'getitemcount' => $getitemcount, 'getsalecount' => $getsalecount, 'count_rating' => $count_rating, 'bottom' => $bottom, 'ratingview' => $ratingview, 'countreview' => $countreview, 'getreview' => $getreview, 'followcheck' => $followcheck, 'followingcount' =>  $followingcount, 'followercount' => $followercount, 'viewfollowing' => $viewfollowing, 'badges' => $badges, 'sold_amount' => $sold_amount, 'country' => $country, 'year' => $year, 'collect_amount' => $collect_amount, 'referral_count' => $referral_count, 'featured_count' => $featured_count, 'free_count' => $free_count, 'tren_count' => $tren_count);
	   return view('user-followers')->with($data); 
	   }
	   else
	   {
	   return redirect('/404');
	   }
	}
	
	public function view_user_following($slug)
	{
	   $check_user = Members::getInuserCount($slug);
	   if($check_user != 0)
	   {
	   $user['user'] = Members::getInuser($slug);
	   $user_id = $user['user']->id;
	   
	   /* badges */
	   $sid = 1;
	   $badges['setting'] = Settings::editBadges($sid);
	   $sold['item'] = Items::SoldAmount($user_id);
	   $sold_amount = 0;
	   foreach($sold['item'] as $iter)
	   {
			$sold_amount += $iter->total_price;
	   }
	   $country['view'] = Settings::editCountry($user['user']->country);
	   $membership = date('m/d/Y',strtotime($user['user']->created_at));
	  $membership_date = explode("/", $membership);
      $year = (date("md", date("U", mktime(0, 0, 0, $membership_date[0], $membership_date[1], $membership_date[2]))) > date("md")
		? ((date("Y") - $membership_date[2]) - 1)
		: (date("Y") - $membership_date[2]));
	  
	   $collect_amount = Items::CollectedAmount($user_id);
	   $referral_count = $user['user']->referral_count;
	   /* badges */
	   
	   
	   $itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.user_id','=',$user_id)->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->get();
	   
	   $since = date("F Y", strtotime($user['user']->created_at));
	   
	   $getitemcount = Items::getuseritemCount($user_id);
	   
	   $getsalecount = Items::getsaleitemCount($user_id);
	   $getreview  = Items::getreviewData($user_id);
		  if($getreview !=0)
		  {
			  $review['view'] = Items::getreviewRecord($user_id);
			  $top = 0;
			  $bottom = 0;
			  foreach($review['view'] as $review)
			  {
				 if($review->rating == 1) { $value1 = $review->rating*1; } else { $value1 = 0; }
				 if($review->rating == 2) { $value2 = $review->rating*2; } else { $value2 = 0; }
				 if($review->rating == 3) { $value3 = $review->rating*3; } else { $value3 = 0; }
				 if($review->rating == 4) { $value4 = $review->rating*4; } else { $value4 = 0; }
				 if($review->rating == 5) { $value5 = $review->rating*5; } else { $value5 = 0; }
				 
				 $top += $value1 + $value2 + $value3 + $value4 + $value5;
				 $bottom += $review->rating;
				 
			  }
			  if(!empty(round($top/$bottom)))
			  {
				$count_rating = round($top/$bottom);
			  }
			  else
			  {
				$count_rating = 0;
			  }
		}
		  else
		  {
			$count_rating = 0;
			$bottom = 0;
		  }
	   
	    $ratingview['list'] = Items::getreviewUser($user_id);
		$countreview = Items::getreviewCountUser($user_id);
		
		if (Auth::check())
		{
		$followcheck = Items::getfollowuserCheck($user_id);
		
		}
		else
		{
		 $followcheck = 0;
		 
		}
		$followingcount = Items::getfollowingCount($user_id);
		
		$followercount = Items::getfollowerCount($user_id);
		
		$viewfollowing['view'] = Items::getfollowingView($user_id);
		
		$featured_count = Items::getfeaturedUser($user_id);
	   $free_count = Items::getfreeUser($user_id);
	   $tren_count = Items::getTrendUser($user_id);
		//$viewfollowing['view'] = Follow::with('followers')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('follow.following_user_id','=',$user_id)->orderBy('follow.fid', 'desc')->get();
		
	   $data = array('user' => $user, 'since' => $since, 'itemData' => $itemData, 'getitemcount' => $getitemcount, 'getsalecount' => $getsalecount, 'count_rating' => $count_rating, 'bottom' => $bottom, 'ratingview' => $ratingview, 'countreview' => $countreview, 'getreview' => $getreview, 'followcheck' => $followcheck, 'followingcount' =>  $followingcount, 'followercount' => $followercount, 'viewfollowing' => $viewfollowing, 'badges' => $badges, 'sold_amount' => $sold_amount, 'country' => $country, 'year' => $year, 'collect_amount' => $collect_amount, 'referral_count' => $referral_count, 'featured_count' => $featured_count, 'free_count' => $free_count, 'tren_count' => $tren_count);
	   return view('user-following')->with($data); 
	   }
	   else
	   {
	   return redirect('/404');
	   }
	  
	}

	public function send_message(Request $request)
	{
	  $message_text = $request->input('message');
	  $from_email = $request->input('from_email');
	  $from_name = $request->input('from_name');
	  $to_email = $request->input('to_email');
	  $to_name = $request->input('to_name');
	  $user_id = $request->input('to_id');
	  $check_email_support = Members::getuserSubscription($user_id);
	  $sid = 1;
	  $setting['setting'] = Settings::editGeneral($sid);
	  $admin_email = $setting['setting']->sender_email;
	  $additional['settings'] = Settings::editAdditional();
	  if($additional['settings']->site_google_recaptcha == 1)
	  {
			 $request->validate([
								'message' => 'required',
								'g-recaptcha-response' => 'required|captcha',
			 ]);
	  }
	  else
	  {
		    $request->validate([
								'message' => 'required',
			]);
	  }
	  $rules = array(
				
	     );
		 
		 $messsages = array(
		      
	    );
		 
	 $validator = Validator::make($request->all(), $rules,$messsages);
	 if ($validator->fails()) 
	 {
		 $failedRules = $validator->failed();
		 return back()->withErrors($validator);
	 } 
	 else
	 {
		  if($check_email_support == 1)
		  {
				
			$record = array('message_text' => $message_text, 'from_name' => $from_name, 'from_email' => $from_email);
			/* email template code */
				  $checktemp = EmailTemplate::checkTemplate(3);
				  if($checktemp != 0)
				  {
				  $template_view['mind'] = EmailTemplate::viewTemplate(3);
				  $template_subject = $template_view['mind']->et_subject;
				  }
				  else
				  {
				  $template_subject = "New message received";
				  }
				  /* email template code */
			Mail::send('user_mail', $record, function($message) use ($from_name, $from_email, $to_email, $to_name, $admin_email, $template_subject) {
				$message->to($to_email, $to_name)
						->subject($template_subject);
				$message->from($admin_email,$from_name);
			});
		   }
			return redirect()->back()->with('success','Your message has been sent successfully');     
	   }
	}
	public function update_reset(Request $request)
	{
	
	   $user_token = $request->input('user_token');
	   $password = bcrypt($request->input('password'));
	   $password_confirmation = $request->input('password_confirmation');
	   $data = array("user_token" => $user_token);
	   $value = Members::verifytokenData($data);
	   $user['user'] = Members::gettokenData($user_token);
	   if($value)
	   {
	      $request->validate([
							'password' => 'required|confirmed|min:6',
							
           ]);
		 $rules = array(
				
	     );
		 
		 $messsages = array(
		      
	    );
		 
		$validator = Validator::make($request->all(), $rules,$messsages);
		
		if ($validator->fails()) 
		{
		 $failedRules = $validator->failed();
		 return back()->withErrors($validator);
		} 
		else
		{
		   $record = array('password' => $password);
           Members::updatepasswordData($user_token, $record);
           return redirect('login')->with('success','Your new password updated successfully. Please login now.');
		}
	   }
	   else
	   {
              
			  return redirect()->back()->with('error', 'These credentials do not match our records.');
       }
	}
	
	
	
	public function update_forgot(Request $request)
	{
	   $email = $request->input('email');
	   
	   $data = array("email"=>$email);
 
       $value = Members::verifycheckData($data);
	   $user['user'] = Members::getemailData($email);
       
	   if($value)
	   {
		$user_token = $user['user']->user_token;
		$name = $user['user']->name;
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		$from_name = $setting['setting']->sender_name;
        $from_email = $setting['setting']->sender_email;
		$forgot_url = URL::to('/reset/').'/'.$user_token;
		$record = array('user_token' => $user_token, 'forgot_url' => $forgot_url,'name' => $name);
		/* email template code */
	          $checktemp = EmailTemplate::checkTemplate(4);
			  if($checktemp != 0)
			  {
			  $template_view['mind'] = EmailTemplate::viewTemplate(4);
			  $template_subject = $template_view['mind']->et_subject;
			  }
			  else
			  {
			  $template_subject = "Forgot Password";
			  }
			  /* email template code */
		Mail::send('forgot_mail', $record, function($message) use ($from_name, $from_email, $email, $name, $user_token, $forgot_url, $template_subject) {
			$message->to($email, $name)
					->subject($template_subject);
			$message->from($from_email,$from_name);
		});
 
         return redirect()->back()->with('success','We have e-mailed your password reset link!');     
			  
       }
	   else
	   {    
			  return redirect()->back()->with('error', 'These credentials do not match our records.');
       }
	}
	
	/* templates */
	
	
	public function view_all_list_items()
	{
	$itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'asc')->get();
	  $catData['item'] = Items::getitemcatData();
	  return view('templates-list',[ 'itemData' => $itemData, 'catData' => $catData]);
	}
	
	public function view_free_category($slug)
	{
	  $method = "get";
	  $sid = 1;
      $setting['setting'] = Settings::editGeneral($sid);
	  $today = date("Y-m-d");
	  $additional['settings'] = Settings::editAdditional();
	  if($additional['settings']->subscription_mode == 1)
	  { 
			  
				   $check_data = Category::getcategoryCheck($slug);
				   if($check_data != 0)
				   {
				   $category_data = Category::getcategorysingle($slug);
				   $category_id = $category_data->cat_id;
				   $itemData['item'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_featured','items.item_flash','items.regular_price','items.item_token','items.preview_video','item_category')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.free_download','=',1)->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.item_category_parent','=',$category_id)->orderBy('items.item_id', 'desc')->paginate(500);
				   }
				  
				
			  }
	  $tagsArray = $setting['setting']->site_keywords;
	  $tags = explode(',', $tagsArray);
	   
	   $blog['data'] = Blog::homeblogData();
	   $catData['item'] = Items::getitemcatData();
	   $category['view'] = Category::with('SubCategory')->where('category_status','=','1')->where('drop_status','=','no')->orderBy('menu_order','asc')->get();
	  
	  return view('free-category',['tags' => $tags, 'itemData' => $itemData, 'blog' => $blog, 'catData' => $catData, 'category' => $category, 'method' => $method ,'slug'=>$slug]);  
	}
	
	public function view_category_types($type,$slug)
	{
	  $method = "get";
	  $sid = 1;
      $setting['setting'] = Settings::editGeneral($sid);
	  $today = date("Y-m-d");
	  $additional['settings'] = Settings::editAdditional();
	  if($additional['settings']->subscription_mode == 1)
	  { 
			  if($type == 'item-type')
			  {
				  $itemData['item'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_featured','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.item_type','=',$slug)->orderBy('items.item_id', 'desc')->paginate($setting['setting']->site_item_per_page);
			  }
			  else
			  {
				if($type == 'category')
				{
				   $check_data = Category::getcategoryCheck($slug);
				   if($check_data != 0)
				   {
				   $category_data = Category::getcategorysingle($slug);
				   $category_id = $category_data->cat_id;
				   $itemData['item'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_featured','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.item_category_parent','=',$category_id)->orderBy('items.item_id', 'desc')->paginate($setting['setting']->site_item_per_page);
				   }
				   else
				   {
				     return view('/404');
				   }
				}
				else
				{
				  $check_data = Category::getsubcategoryCheck($slug);
				  if($check_data != 0)
				  {
				  $category_data = Category::getsubcategorysingle($slug);
				  $category_id = $category_data->subcat_id;
				  $itemData['item'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_featured','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.item_category_type','=',$type)->where('items.item_category','=',$category_id)->orderBy('items.item_id', 'desc')->paginate($setting['setting']->site_item_per_page);
				  }
				   else
				   {
				     return view('/404');
				   }
				}
				
			  }
	   }
	   else
	   {
	         if($type == 'item-type')
			  {
				  $itemData['item'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_featured','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.item_type','=',$slug)->orderBy('items.item_id', 'desc')->paginate($setting['setting']->site_item_per_page);
			  }
			  else
			  {
				if($type == 'category')
				{
				   $check_data = Category::getcategoryCheck($slug);
				   if($check_data != 0)
				   {
				   $category_data = Category::getcategorysingle($slug);
				   $category_id = $category_data->cat_id;
				   $itemData['item'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_featured','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.item_category_parent','=',$category_id)->orderBy('items.item_id', 'desc')->paginate($setting['setting']->site_item_per_page);
				   }
				   else
				   {
				     return view('/404');
				   }
				}
				else
				{
				  $check_data = Category::getsubcategoryCheck($slug);
				  if($check_data != 0)
				  {
				  $category_data = Category::getsubcategorysingle($slug);
				  $category_id = $category_data->subcat_id;
				  $itemData['item'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_featured','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.item_category_type','=',$type)->where('items.item_category','=',$category_id)->orderBy('items.item_id', 'desc')->paginate($setting['setting']->site_item_per_page);
				  }
				  else
				  {
				     return view('/404');
				  }
				}
				
			  }
	   }	  
	  
	  $catData['item'] = Items::getitemcatData();
	  $category['view'] = Category::with('SubCategory')->where('category_status','=','1')->where('drop_status','=','no')->orderBy('menu_order','asc')->get();
	  
	  return view('templates',[ 'itemData' => $itemData, 'catData' => $catData, 'category' => $category, 'method' => $method ,'slug'=>$slug]);
	  
	}
	
	public function view_shop_items(Request $request)
	{ 
	  $method = "post";
	  $today = date("Y-m-d");
	  $sid = 1;
	  $additional['settings'] = Settings::editAdditional();
	  $setting['setting'] = Settings::editGeneral($sid);
	  $site_item_per_page = $setting['setting']->site_item_per_page;
	 
	  if(!empty($request->input('subcategory_names')))
	   {  
		  $subcategory_no = "";
		  foreach($request->input('subcategory_names') as $subcategory_value)
		  {
		     $subcategory_no .= $subcategory_value.',';
		  }
	 	  $subcategory_names = rtrim($subcategory_no,",");
	   }
	   else
	   {
	     $subcategory_names = "";
	   }
	   
	   if(!empty($request->input('category_names')))
	   {  
		  $category_no = "";
		  foreach($request->input('category_names') as $category_value)
		  {
		     $category_no .= $category_value.',';
		  }
	 	  $category_names = rtrim($category_no,",");
	   }
	   else
	   {
	     $category_names = "";
	   }
	   
	  $product_item = $request->input('product_item');
	  $keywords = explode(' ', $product_item);
	  $count=count($keywords);
	  
	  $randomPairs = [];
	  $randomPairs[] = $keywords[0] . " " . $keywords[count($keywords)-1];
for ($i = 0; $i < count($keywords) - 1; $i++) {
    $randomPairs[] = $keywords[$i] . " " . $keywords[$i + 1];
}
shuffle($randomPairs);
	 $result = [
        'product_item' => $product_item,
        'randomPairs' => $randomPairs,
        'keywords' => $keywords,
    ];
    
   
    
    $itemname=[];
    foreach ($result as $key => $value) {
     if($key === 'product_item' && ($product_item != "" || $subcategory_names != "" || $category_names != ""))
	    {
		  if($additional['settings']->subscription_mode == 1)
		    {
			  $itemData['item'] = Items::with('ratings')
			                  ->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_desc','items.item_shortdesc','items.item_tags','items.item_featured','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video') 
							  ->leftjoin('users', 'users.id', '=', 'items.user_id')
							  ->where('users.user_subscr_date','>=',$today)
							  ->where('users.user_subscr_payment_status','=','completed')
							  ->where('items.item_status','=',1)
							  ->where('items.drop_status','=','no')
							  ->where(function ($query) use ($product_item,$category_names,$subcategory_names) {
							     $query->where('items.item_name', 'LIKE', "%$product_item%");
							  if ($subcategory_names != "")
							  {
							   $query->whereRaw('FIND_IN_SET(items.item_type_cat_id,"'.$subcategory_names.'")');
							  }
							  if ($category_names != "")
							  {
							  $query->whereRaw('FIND_IN_SET(items.item_category_parent,"'.$category_names.'")');
							  }
							  })->orderBy('items.updated_item', 'desc')->paginate(45);
			}
			else
			{
				$itemData['item'] = Items::with('ratings')
				              ->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price')
							  ->leftjoin('users', 'users.id', '=', 'items.user_id')
							  ->where('items.item_status','=',1)
							  ->where('items.drop_status','=','no')
							  ->where(function ($query) use ($search_keyword,$category_names,$subcategory_names) { 
							  $query->where('items.item_name', 'LIKE', "%$search_keyword%");
							  if ($subcategory_names != "")
							  {
							  $query->whereRaw('FIND_IN_SET(items.item_type_cat_id,"'.$subcategory_names.'")');
							  }
							  if ($category_names != "")
							  {
							  $query->whereRaw('FIND_IN_SET(items.item_category_parent,"'.$category_names.'")');
							  }
							  })->orderBy('items.updated_item', 'asc')->paginate($site_item_per_page);
			}				  
		$itemname = array_merge($itemname, $itemData['item']->all());
	    }
      elseif ($key === 'randomPairs') {
            foreach ($value as $randomPair) {
                 if($randomPair != "" || $subcategory_names != "" || $category_names != "")
	                 {
		                 if($additional['settings']->subscription_mode == 1)
		                     {
			                      $itemData['item'] = Items::with('ratings')
			                            ->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_desc','items.item_shortdesc','items.item_tags','items.item_featured','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video') 
							            ->leftjoin('users', 'users.id', '=', 'items.user_id')
							            ->where('users.user_subscr_date','>=',$today)
							            ->where('users.user_subscr_payment_status','=','completed')
							            ->where('items.item_status','=',1)
							            ->where('items.drop_status','=','no')
							            ->where(function ($query) use ($randomPair,$category_names,$subcategory_names,$product_item) {
							                 $query->where('items.item_name', 'LIKE', "%$randomPair%")->where('items.item_name', 'NOT LIKE', "%$product_item%");
							            if ($subcategory_names != "")
							            {
							             $query->whereRaw('FIND_IN_SET(items.item_type_cat_id,"'.$subcategory_names.'")');
							            }
							            if ($category_names != "")
							            {
							            $query->whereRaw('FIND_IN_SET(items.item_category_parent,"'.$category_names.'")');
							            }
							            })->inRandomOrder()->paginate(18);
			                 }
			             else
			                 {
				                 $itemData['item'] = Items::with('ratings')
				                          ->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price')
							              ->leftjoin('users', 'users.id', '=', 'items.user_id')
							              ->where('items.item_status','=',1)
							              ->where('items.drop_status','=','no')
							              ->where(function ($query) use ($randomPair,$category_names,$subcategory_names,$product_item) { 
							              $query->where('items.item_name', 'LIKE', "%$randomPair%")->where('items.item_name', 'NOT LIKE', "%$product_item%");;
							              if ($subcategory_names != "")
							              {
							              $query->whereRaw('FIND_IN_SET(items.item_type_cat_id,"'.$subcategory_names.'")');
							              }
							              if ($category_names != "")
							              {
							              $query->whereRaw('FIND_IN_SET(items.item_category_parent,"'.$category_names.'")');
							              }
							              })->orderBy('items.updated_item', 'asc')->paginate(18);
		                    	}	
			
						  
	                }
	                else
	                 {
	   	
		                 if($additional['settings']->subscription_mode == 1)
		                      {   
	                               $itemData['item'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_featured','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate($site_item_per_page); 
	                               $itemTags['item'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_featured','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate(0); 
		                      }
		                 else
		                      {
		                           $itemData['item'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_featured','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate($site_item_per_page);
		                           $itemTags['item'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_featured','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate(0);
		                      } 
	   
	                 }
	            $itemname = array_merge($itemname, $itemData['item']->all());
   
              }
         }
      elseif ((count($itemname) < 40) && $key === 'keywords') {
          foreach ($value as $search_keyword) {
                 if($search_keyword != "" || $subcategory_names != "" || $category_names != "")
	                 {
		                 if($additional['settings']->subscription_mode == 1)
		                     {
			                      $itemData['item'] = Items::with('ratings')
			                            ->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_desc','items.item_shortdesc','items.item_tags','items.item_featured','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video') 
							            ->leftjoin('users', 'users.id', '=', 'items.user_id')
							            ->where('users.user_subscr_date','>=',$today)
							            ->where('users.user_subscr_payment_status','=','completed')
							            ->where('items.item_status','=',1)
							            ->where('items.drop_status','=','no')
							            ->where(function ($query) use ($search_keyword,$category_names,$subcategory_names,$product_item) {
							                 $query->where('items.item_name', 'LIKE', "%$search_keyword%")->where('items.item_name', 'NOT LIKE', "%$product_item%");
							            if ($subcategory_names != "")
							            {
							             $query->whereRaw('FIND_IN_SET(items.item_type_cat_id,"'.$subcategory_names.'")');
							            }
							            if ($category_names != "")
							            {
							            $query->whereRaw('FIND_IN_SET(items.item_category_parent,"'.$category_names.'")');
							            }
							            })->orderBy('items.updated_item', 'asc')->paginate(12);
			                 }
			             else
			                 {
				                 $itemData['item'] = Items::with('ratings')
				                          ->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price')
							              ->leftjoin('users', 'users.id', '=', 'items.user_id')
							              ->where('items.item_status','=',1)
							              ->where('items.drop_status','=','no')
							              ->where(function ($query) use ($search_keyword,$category_names,$subcategory_names,$product_item) { 
							              $query->where('items.item_name', 'LIKE', "%$search_keyword%")->where('items.item_name', 'NOT LIKE', "%$product_item%");;
							              if ($subcategory_names != "")
							              {
							              $query->whereRaw('FIND_IN_SET(items.item_type_cat_id,"'.$subcategory_names.'")');
							              }
							              if ($category_names != "")
							              {
							              $query->whereRaw('FIND_IN_SET(items.item_category_parent,"'.$category_names.'")');
							              }
							              })->orderBy('items.updated_item', 'asc')->paginate(9);
		                    	}	
			
						  
	                }
	                else
	                 {
	   	
		                 if($additional['settings']->subscription_mode == 1)
		                      {   
	                               $itemData['item'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_featured','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate(9); 
	                               $itemTags['item'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_featured','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate(0); 
		                      }
		                 else
		                      {
		                           $itemData['item'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_featured','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate(9);
		                           $itemTags['item'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_featured','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate(0);
		                      } 
	   
	                 }
	            $itemname = array_merge($itemname, $itemData['item']->all());
   
              }
    
      } 
   
    }
     foreach ($keywords as $word) {
                 if($word != "" || $subcategory_names != "" || $category_names != "")
	                 {
		                 if($additional['settings']->subscription_mode == 1)
		                     {
			                      $itemTags['item'] = Items::with('ratings')
			                            ->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_desc','items.item_shortdesc','items.item_tags','items.item_featured','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video') 
							            ->leftjoin('users', 'users.id', '=', 'items.user_id')
							            ->where('users.user_subscr_date','>=',$today)
							            ->where('users.user_subscr_payment_status','=','completed')
							            ->where('items.item_status','=',1)
							            ->where('items.drop_status','=','no')
							            ->where(function ($query) use ($word,$category_names,$subcategory_names,$product_item) {
							                 $query->where('items.item_tags', 'LIKE', "%$word%")->where('items.item_name', 'NOT LIKE', "%$product_item%");
							            if ($subcategory_names != "")
							            {
							             $query->whereRaw('FIND_IN_SET(items.item_type_cat_id,"'.$subcategory_names.'")');
							            }
							            if ($category_names != "")
							            {
							            $query->whereRaw('FIND_IN_SET(items.item_category_parent,"'.$category_names.'")');
							            }
							            })->orderBy('items.updated_item', 'asc')->paginate($site_item_per_page);
			                 }
			             else
			                 {
				                 $itemTags['item'] = Items::with('ratings')
				                          ->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price')
							              ->leftjoin('users', 'users.id', '=', 'items.user_id')
							              ->where('items.item_status','=',1)
							              ->where('items.drop_status','=','no')
							              ->where(function ($query) use ($word,$category_names,$subcategory_names,$product_item) { 
							              $query->where('items.item_tags', 'LIKE', "%$word%")->where('items.item_name', 'NOT LIKE', "%$product_item%");;
							              if ($subcategory_names != "")
							              {
							              $query->whereRaw('FIND_IN_SET(items.item_type_cat_id,"'.$subcategory_names.'")');
							              }
							              if ($category_names != "")
							              {
							              $query->whereRaw('FIND_IN_SET(items.item_category_parent,"'.$category_names.'")');
							              }
							              })->orderBy('items.updated_item', 'asc')->paginate($site_item_per_page);
		                    	}	
			
						  
	                }
	                else
	                 {
	   	
		                 if($additional['settings']->subscription_mode == 1)
		                      {   
	                               $itemTags['item'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_featured','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('users.user_subscr_date','>=',$today)->where('users.user_subscr_payment_status','=','completed')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate(0); 
		                      }
		                 else
		                      {
		                           $itemTags['item'] = Items::with('ratings')->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_featured','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->paginate(0);
		                      } 
	   
	                 }
   
              }
// 	return $itemname;

	$category['view'] = Category::with('SubCategory')->where('category_status','=','1')->where('drop_status','=','no')->orderBy('menu_order','asc')->get();
	$type = "";
	$meta_keyword = "";
	$meta_desc = "";
	
	
	
	return view('search',['itemTags' => $itemTags, 'itemname' => $itemname,'count' => $count, 'category' => $category, 'type' => $type, 'meta_keyword' => $meta_keyword, 'meta_desc' => $meta_desc, 'method' => $method, 'product_item' => $product_item]);
	
}
	/* templates */
	
	
	/* item */
	
	
	public function view_single_item($item_slug)
	{
	  
	  $sid = 1;
	  $badges['setting'] = Settings::editBadges($sid);
	  $check_item_available = Items::singleitemCount($item_slug);
	  if($check_item_available != 0)
	  {
	  $check_if_item = Items::AgainData($item_slug);
	  
	  if($check_if_item != 0)
	  {
	      $item['item'] = Items::singleitemData($item_slug);
		  $view_count = $item['item']->item_views + 1;
		  $count_data = array('item_views' => $view_count);
		  $item_id = $item['item']->item_id;
		  Items::updatefavouriteData($item_id,$count_data);
		  $membership = date('m/d/Y',strtotime($item['item']->created_at));
		  $membership_date = explode("/", $membership);
	      $year = (date("md", date("U", mktime(0, 0, 0, $membership_date[0], $membership_date[1], $membership_date[2]))) > date("md")
			? ((date("Y") - $membership_date[2]) - 1)
			: (date("Y") - $membership_date[2]));

		  $token = $item['item']->item_token;
		  $trends = Items::trendsCount($token);
		  $item_cat_id = $item['item']->item_category;
		  $item_user_id = $item['item']->user_id;
		  $item_cat_type = $item['item']->item_category_type;
		  $country['view'] = Settings::editCountry($item['item']->country);
		  
		  $sold['item'] = Items::SoldAmount($item_user_id);
		  $sold_amount = 0;
		  foreach($sold['item'] as $iter)
		  {
			$sold_amount += $iter->total_price;
		  }
		  $collect_amount = Items::CollectedAmount($item_user_id);
		  $referral_count = $item['item']->referral_count;
		  
		  if($item_cat_type == 'category')
		  {
			 $category['name'] = Category::getsinglecatData($item_cat_id);
			 $category_name = $category['name']->category_name;
		  }
		  else if($item_cat_type == 'subcategory')
		  {
			$category['name'] = SubCategory::getsinglesubcatData($item_cat_id);
			$category_name = $category['name']->subcategory_name;
			$subcat_slug = $category['name']->subcategory_slug;
		  }
		  else
		  {
			$category_name = "";
		  }
		  
		    $item_tags = str_replace(', ', ',', $item['item']->item_tags);
	        $item_tags = explode(',',$item_tags);
		
	      $getcount  = Items::getimagesCount($token);
		  $item_image['item'] = Items::getsingleimagesData($token);
	      $item_allimage = Items::getimagesData($token);
	      $itemTemplates['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_id','!=',$item_id)->orderBy('items.item_views', 'desc')->take(8)->get();
		  $itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.user_id','=',$item_user_id)->where('items.item_id','!=',$item_id)->orderBy('items.item_id', 'asc')->take(3)->get();
		  
		  if (Auth::check()) 
		  {
		  $checkif_purchased = Items::ifpurchaseCount($token);
		  }
		  else
		  {
			$checkif_purchased = 0;
		  }

		  $getreview  = Items::getreviewCount($item_id);
		  if($getreview !=0)
		  {
			  $review['view'] = Items::getreviewView($item_id);
			  $top = 0;
			  $bottom = 0;
			  foreach($review['view'] as $review)
			  {
				 if($review->rating == 1) { $value1 = $review->rating*1; } else { $value1 = 0; }
				 if($review->rating == 2) { $value2 = $review->rating*2; } else { $value2 = 0; }
				 if($review->rating == 3) { $value3 = $review->rating*3; } else { $value3 = 0; }
				 if($review->rating == 4) { $value4 = $review->rating*4; } else { $value4 = 0; }
				 if($review->rating == 5) { $value5 = $review->rating*5; } else { $value5 = 0; }
				 
				 $top += $value1 + $value2 + $value3 + $value4 + $value5;
				 $bottom += $review->rating;
				 
			  }
			  if(!empty(round($top/$bottom)))
			  {
				$count_rating = round($top/$bottom);
			  }
			  else
			  {
				$count_rating = 0;
			  }
		  }
		  else
		  {
			$count_rating = 0;
		  }
		  
		  $getreviewdata['view']  = Items::getreviewItems($item_id);
		  
			  
		  $comment['view'] = Comment::with('ReplyComment')->leftjoin('users', 'users.id', '=', 'item_comments.comm_user_id')->where('item_comments.comm_item_id','=',$item_id)->orderBy('comm_id', 'asc')->get();
		  /*$comment['view'] = Comment::with('ReplyComment')->leftjoin('users', 'users.id', '=', 'item_comments.comm_user_id')->leftJoin('item_order','item_order.item_id','item_comments.comm_item_id')->where('item_comments.comm_item_id','=',$item_id)->orderBy('comm_id', 'asc')->get();*/
		  
		  $comment_count = $comment['view']->count();
		  $viewattribute['details'] = Attribute::getattributeViews($token);
		  $setting['setting'] = Settings::editGeneral($sid);
		  $page_slug = $setting['setting']->item_support_link;
		  $page['view'] = Pages::editpageData($page_slug);
		  
		  $author['items'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.user_id','=',$item_user_id)->where('items.item_id','!=',$item_id)->where('items.item_category','!=',58)->inRandomOrder()->take(8)->get();
		  $related['items'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.item_category','=',$item_cat_id)->where('items.item_id','!=',$item_id)->inRandomOrder()->take(8)->get();
		  $data = array('itemTemplates' => $itemTemplates, 'item' => $item, 'getcount' => $getcount, 'item_image' => $item_image, 'item_allimage' => $item_allimage, 'category_name' => $category_name, 'subcat_slug' => $subcat_slug, 'item_tags' => $item_tags, 'itemData' => $itemData, 'checkif_purchased' => $checkif_purchased, 'getreview' => $getreview, 'count_rating' => $count_rating, 'getreviewdata' => $getreviewdata, 'comment' => $comment, 'comment_count' => $comment_count, 'badges' => $badges, 'country' => $country, 'trends' => $trends, 'year' => $year, 'sold_amount' => $sold_amount, 'collect_amount' => $collect_amount, 'referral_count' => $referral_count, 'viewattribute' => $viewattribute, 'item_slug' => $item_slug, 'page' => $page, 'related' => $related, 'author' => $author, 'check_if_item' => $check_if_item);
		 }
		 else
		 {
		    $data = array('check_if_item' => $check_if_item);
		 } 
	     return view('item')->with($data);
		 }
		 else
		 {
		 return redirect('/404');
		 }
	}
	
	
	/* item */
	
// 	download for templates
public function view_download_index($item_slug)
	{
	  
	  $sid = 1;
	  $badges['setting'] = Settings::editBadges($sid);
	  $check_item_available = Items::singleitemCount($item_slug);
	  if($check_item_available != 0)
	  {
	  $check_if_item = Items::AgainData($item_slug);
	  
	  if($check_if_item != 0)
	  {
	      $item['item'] = Items::singleitemData($item_slug);
		  $view_count = $item['item']->item_views + 1;
		  $count_data = array('item_views' => $view_count);
		  $item_id = $item['item']->item_id;
		  Items::updatefavouriteData($item_id,$count_data);
		  $membership = date('m/d/Y',strtotime($item['item']->created_at));
		  $membership_date = explode("/", $membership);
		  $year = (date("md", date("U", mktime(0, 0, 0, $membership_date[0], $membership_date[1], $membership_date[2]))) > date("md")
			? ((date("Y") - $membership_date[2]) - 1)
			: (date("Y") - $membership_date[2]));
		  
		  $token = $item['item']->item_token;
		  $trends = Items::trendsCount($token);
		  $item_cat_id = $item['item']->item_category;
		  $item_user_id = $item['item']->user_id;
		  $item_cat_type = $item['item']->item_category_type;
		  $country['view'] = Settings::editCountry($item['item']->country);
		  
		  $sold['item'] = Items::SoldAmount($item_user_id);
		  $sold_amount = 0;
		  foreach($sold['item'] as $iter)
		  {
			$sold_amount += $iter->total_price;
		  }
		  $collect_amount = Items::CollectedAmount($item_user_id);
		  $referral_count = $item['item']->referral_count;
		  
		  if($item_cat_type == 'category')
		  {
			 $category['name'] = Category::getsinglecatData($item_cat_id);
			 $category_name = $category['name']->category_name;
		  }
		  else if($item_cat_type == 'subcategory')
		  {
			$category['name'] = SubCategory::getsinglesubcatData($item_cat_id);
			$category_name = $category['name']->subcategory_name;
		  }
		  else
		  {
			$category_name = "";
		  }
		  
		  $item_tags = explode(',',$item['item']->item_tags);
		  $getcount  = Items::getimagesCount($token);
		  $item_image['item'] = Items::getsingleimagesData($token);
		  $item_allimage = Items::getimagesData($token);
		  $itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.user_id','=',$item_user_id)->where('items.item_id','!=',$item_id)->orderBy('items.item_id', 'asc')->take(3)->get();
		  
		  if (Auth::check()) 
		  {
		  $checkif_purchased = Items::ifpurchaseCount($token);
		  }
		  else
		  {
			$checkif_purchased = 0;
		  }
		  
		  $getreview  = Items::getreviewCount($item_id);
		  if($getreview !=0)
		  {
			  $review['view'] = Items::getreviewView($item_id);
			  $top = 0;
			  $bottom = 0;
			  foreach($review['view'] as $review)
			  {
				 if($review->rating == 1) { $value1 = $review->rating*1; } else { $value1 = 0; }
				 if($review->rating == 2) { $value2 = $review->rating*2; } else { $value2 = 0; }
				 if($review->rating == 3) { $value3 = $review->rating*3; } else { $value3 = 0; }
				 if($review->rating == 4) { $value4 = $review->rating*4; } else { $value4 = 0; }
				 if($review->rating == 5) { $value5 = $review->rating*5; } else { $value5 = 0; }
				 
				 $top += $value1 + $value2 + $value3 + $value4 + $value5;
				 $bottom += $review->rating;
				 
			  }
			  if(!empty(round($top/$bottom)))
			  {
				$count_rating = round($top/$bottom);
			  }
			  else
			  {
				$count_rating = 0;
			  }
			  
		  }
		  else
		  {
			$count_rating = 0;
		  }
		  
		  $getreviewdata['view']  = Items::getreviewItems($item_id);
			  
		  $comment['view'] = Comment::with('ReplyComment')->leftjoin('users', 'users.id', '=', 'item_comments.comm_user_id')->where('item_comments.comm_item_id','=',$item_id)->orderBy('comm_id', 'asc')->get();
		  /*$comment['view'] = Comment::with('ReplyComment')->leftjoin('users', 'users.id', '=', 'item_comments.comm_user_id')->leftJoin('item_order','item_order.item_id','item_comments.comm_item_id')->where('item_comments.comm_item_id','=',$item_id)->orderBy('comm_id', 'asc')->get();*/
		  
		  $comment_count = $comment['view']->count();
		   
		   $viewattribute['details'] = Attribute::getattributeViews($token);
		   $setting['setting'] = Settings::editGeneral($sid);
		  $page_slug = $setting['setting']->item_support_link;
		  $page['view'] = Pages::editpageData($page_slug);
		  
		  $related['items'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.user_id','=',$item_user_id)->where('items.item_id','!=',$item_id)->orderBy('items.item_id', 'desc')->inRandomOrder()->take(4)->get();
		  
		  $data = array('item' => $item, 'getcount' => $getcount, 'item_image' => $item_image, 'item_allimage' => $item_allimage, 'category_name' => $category_name, 'item_tags' => $item_tags, 'itemData' => $itemData, 'checkif_purchased' => $checkif_purchased, 'getreview' => $getreview, 'count_rating' => $count_rating, 'getreviewdata' => $getreviewdata, 'comment' => $comment, 'comment_count' => $comment_count, 'badges' => $badges, 'country' => $country, 'trends' => $trends, 'year' => $year, 'sold_amount' => $sold_amount, 'collect_amount' => $collect_amount, 'referral_count' => $referral_count, 'viewattribute' => $viewattribute, 'item_slug' => $item_slug, 'page' => $page, 'related' => $related, 'check_if_item' => $check_if_item);
		 }
		 else
		 {
		    $data = array('check_if_item' => $check_if_item);
		 } 
	     return view('templates')->with($data);
		 }
		 else
		 {
		 return redirect('/404');
		 }
	}
	
// 	end
	/* contact */
	
	public function update_contact(Request $request)
	{
	
	  $from_name = $request->input('from_name');
	  $from_email = $request->input('from_email');
	  $message_text = $request->input('message_text');
	  $sid = 1;
	  $setting['setting'] = Settings::editGeneral($sid);
	  $admin_name = $setting['setting']->sender_name;
	  $admin_email = $setting['setting']->sender_email;
	  $additional['settings'] = Settings::editAdditional();
	  $record = array('from_name' => $from_name, 'from_email' => $from_email, 'message_text' => $message_text, 'contact_date' => date('Y-m-d'));
	  $contact_count = Items::getcontactCount($from_email);
	  if($contact_count == 0)
	  {
	     if($additional['settings']->site_google_recaptcha == 1)
		 {
			 $request->validate([
								'from_name' => 'required',
								'from_email' => 'required|email',
								'message_text' => 'required',
								'g-recaptcha-response' => 'required|captcha',
			 ]);
		 }
		 else
		 {
		    $request->validate([
								'from_name' => 'required',
								'from_email' => 'required|email',
								'message_text' => 'required',
			 ]);
		 }
		 $rules = array(
	     );
		 
		 $messsages = array(
	    );
		 
		$validator = Validator::make($request->all(), $rules,$messsages);
		
		if ($validator->fails()) 
		{
		 $failedRules = $validator->failed();
		 return back()->withErrors($validator);
		} 
		else
		{
			  Items::saveContact($record);
			  /* email template code */
	          $checktemp = EmailTemplate::checkTemplate(3);
			  if($checktemp != 0)
			  {
			  $template_view['mind'] = EmailTemplate::viewTemplate(3);
			  $template_subject = $template_view['mind']->et_subject;
			  }
			  else
			  {
			  $template_subject = "Contact Us";
			  }
			  /* email template code */
			  Mail::send('contact_mail', $record, function($message) use ($admin_name, $admin_email, $from_email, $from_name, $template_subject) {
						$message->to($admin_email, $admin_name)
								->subject($template_subject);
						$message->from($from_email,$from_name);
					});
			  return redirect()->back()->with('success','Your message has been sent successfully');
		}	  
			  
	  }
	  else
	  {
	  return redirect()->back()->with('error','Sorry! Your message already sent');
	  }
	}
	
	/* contact */
	
	
	/* newsletter */
	
	public function generateRandomString($length = 25) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
	return $randomString;
    }
	
	
	public function activate_newsletter($token)
	{
	   
	   $check = Members::checkNewsletter($token);
	   if($check == 1)
	   {
	      
		  $data = array('news_status' => 1);
		
		  Members::updateNewsletter($token,$data);
		  
		  return redirect('/newsletter')->with('success', 'Thank You! Your subscription has been confirmed!');
		  
	   }
	   else
	   {
	       return redirect('/newsletter')->with('error', 'This email address already subscribed');
	   }
	
	}
	
	
	public function view_newsletter()
	{
	  return view('newsletter');
	}
	
	
	public function update_newsletter(Request $request)
	{
	
	   $news_email = $request->input('news_email');
	   $news_status = 0;
	   $news_token = $this->generateRandomString();
	   
	   $request->validate([
							
							'news_email' => 'required|email',
         ]);
		 $rules = array(
		      'news_email' => ['required',  Rule::unique('newsletter') -> where(function($sql){ $sql->where('news_status','=',0);})],
	     );
		 
		 $messsages = array(
	    );
		 
		$validator = Validator::make($request->all(), $rules,$messsages);
		if ($validator->fails()) 
		{
		 $failedRules = $validator->failed();
		 /*return back()->withErrors($validator);*/
		 return redirect()->back()->with('error', 'This email address already subscribed.');
		} 
		else
		{
		$data = array('news_email' => $news_email, 'news_token' => $news_token, 'news_status' => $news_status);
		
		Members::savenewsletterData($data);
		
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		$from_name = $setting['setting']->sender_name;
        $from_email = $setting['setting']->sender_email;
		$activate_url = URL::to('/newsletter').'/'.$news_token;
		
		$record = array('activate_url' => $activate_url);
		/* email template code */
	          $checktemp = EmailTemplate::checkTemplate(6);
			  if($checktemp != 0)
			  {
			  $template_view['mind'] = EmailTemplate::viewTemplate(6);
			  $template_subject = $template_view['mind']->et_subject;
			  }
			  else
			  {
			  $template_subject = "Newsletter Signup";
			  }
			  /* email template code */
		Mail::send('newsletter_mail', $record, function($message) use ($from_name, $from_email, $news_email, $template_subject) {
			$message->to($news_email)
					->subject($template_subject);
			$message->from($from_email,$from_name);
		});  
		return redirect()->back()->with('success', 'Your email address subscribed. You will receive a confirmation email.');
		}
	}
	

	/* newsletter */
	public function view_verify()
	{
	   $checkverify = 0;
	   $data = array('checkverify' => $checkverify);
	   return view('verify')->with($data);
	}
	
	public function update_verify(Request $request)
	{
	   $purchase_code = $request->input('purchase_code');
	   
	   $checkverify = Items::checkVerify($purchase_code);
       
	   if($checkverify != 0)
	   {
			
		 $sold = Items::possibleVerify($purchase_code);
         $data = array('sold' => $sold, 'checkverify' => $checkverify);
		 return view('verify')->with($data);
       }
	   else
	   {   
			  return redirect()->back()->with('error', 'Sorry, This is not a valid purchase code or this user have not purchased any of items.');
       }
	}
	
	/*Last URL checking for Item page redirect*/
	public function lastUrlCheck()
	{
	    \Session::put('url.intended0', url()->previous());
        $intendedUrl = Session::get('url.intended0');
        \Session::put('url.intended', $intendedUrl);
	}
}
