<?php

namespace Fickrr\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Fickrr\Http\Controllers\Controller;
use Session;
use Mail;
use Illuminate\Support\Facades\DB;
use Fickrr\Models\EmailTemplate;
use Fickrr\Models\Members;
use Fickrr\Models\Users;
use Fickrr\Models\Settings;
use Fickrr\Models\Items;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Fickrr\Models\Subscription;
use Auth;

class MembersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	/* customer */
	
    public function customer()
    {
		$userData['data'] = Members::getuserData();
		return view('admin.customer',[ 'userData' => $userData]);
    }
	
	  public function mail()
    {
      return $userData['data'] = Members::getalluserData();
       return view('mail',[ 'userData' => $userData]);  
    }
    
	public function subscription_payment_details($token)
	{
	    $userData['data'] = Members::gettokenData($token);
		return view('admin.subscription-payment-details',[ 'userData' => $userData]);
	    
	}
	
	public function upgrade_customer($token,$subcr_id)
	{
	   
	        
			$subscr['view'] = Subscription::editsubData($subcr_id);
			$subscri_date = $subscr['view']->subscr_duration;
			$subscr_value = "+".$subscri_date;
			$subscr_date = date('Y-m-d', strtotime($subscr_value));
			$user_subscr_item_level = $subscr['view']->subscr_item_level;
			$user_subscr_item = $subscr['view']->subscr_item;
			$user_subscr_download_item = $subscr['view']->subscr_download_item;
			$user_subscr_space_level = $subscr['view']->subscr_space_level;
			$user_subscr_space = $subscr['view']->subscr_space;
			$user_subscr_space_type = $subscr['view']->subscr_space_type;
			$user_subscr_type = $subscr['view']->subscr_name;
			$payment_status = 'completed';
			$checkoutdata = array('user_subscr_type' => $user_subscr_type, 'user_subscr_date' => $subscr_date, 'user_subscr_item_level' => $user_subscr_item_level, 'user_subscr_item' => $user_subscr_item, 'user_subscr_download_item' => $user_subscr_download_item, 'user_subscr_space_level' => $user_subscr_space_level, 'user_subscr_space' => $user_subscr_space, 'user_subscr_space_type' => $user_subscr_space_type, 'user_purchase_token' => '', 'user_subscr_payment_status' => $payment_status);
			Subscription::confirmupgradeData($token,$checkoutdata);
			return redirect()->back()->with('success', 'Membership has been upgrade');
	   
	} 
	
	public function add_customer()
	{
	   
	   return view('admin.add-customer');
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
	
	public function save_customer(Request $request)
	{
 
         $additional_settings = Settings::editAdditional();
		 
		 if(!empty($request->input('subscription_type')))
		 {
			 
			 if($request->input('subscription_type') == 'free')
			 {
			 $free_subscr_type = $additional_settings->free_subscr_type;
			 $free_subscr_price = $additional_settings->free_subscr_price;
			 $free_subscr_duration = $additional_settings->free_subscr_duration;
			 $free_subscr_item = $additional_settings->free_subscr_item;
			 $free_subscr_download_item = $additional_settings->subscr_download_items;
			 $free_subscr_space = $additional_settings->free_subscr_space;
			 $subscr_value = "+".$free_subscr_duration;
			 $user_subscr_item_level = 'limited';
			 $user_subscr_space_level = 'limited';
			 $user_subscr_space_type = 'MB';
			 $subscr_date = date('Y-m-d', strtotime($subscr_value));
			 $subscr_id = 0;
			  
			 }
			 else if($request->input('subscription_type') == 'none')
			 {
			 $free_subscr_type = 'None';
			 $free_subscr_price = $additional_settings->free_subscr_price;
			 $free_subscr_duration = $additional_settings->free_subscr_duration;
			 $free_subscr_download_item = 0;
			 $free_subscr_item = 0;
			 $free_subscr_space = 0;
			 $subscr_value = "+".$free_subscr_duration;
			 $user_subscr_item_level = 'limited';
			 $user_subscr_space_level = 'limited';
			 $user_subscr_space_type = 'MB';
			 $subscr_date = date('Y-m-d', strtotime('-1 days'));
			 $subscr_id = 0;
			 }
			 else
			 {
			    $subscr_id = $request->input('subscription_type');
			    $subscr['view'] = Subscription::editsubData($subscr_id);
				$free_subscr_type = $subscr['view']->subscr_name;
				$free_subscr_price = $subscr['view']->subscr_price;
				$free_subscr_duration = $subscr['view']->subscr_duration;
				$free_subscr_item = $subscr['view']->subscr_item;
				$free_subscr_download_item = $subscr['view']->subscr_download_item;
				$free_subscr_space = $subscr['view']->subscr_space;
				$subscr_value = "+".$free_subscr_duration;
				$user_subscr_item_level = $subscr['view']->subscr_item_level;
				$user_subscr_space_level = $subscr['view']->subscr_space_level;
				$user_subscr_space_type = $subscr['view']->subscr_space_type;
				$subscr_date = date('Y-m-d', strtotime($subscr_value));
				
			 }
		 }
		 $free_subscr_download_new = $additional_settings->subscr_download_items;
		 $unlimited_download = 999999;
         $name = $request->input('name');
		 $username = $request->input('username');
		 $page_redirect = $request->input('page_redirect');
         $email = $request->input('email');
		 $user_type = $request->input('user_type');
		 $password = bcrypt($request->input('password'));
		 $user_auth_token = base64_encode($request->input('password'));
		 if(!empty($request->input('earnings')))
		 {
		 $earnings = $request->input('earnings');
         }
		 else
		 {
		   $earnings = 0;
		 }
		 
		 
		 $allsettings = Settings::allSettings();
		  $image_size = $allsettings->site_max_image_size;
         
		 $request->validate([
							'name' => 'required',
							'username' => 'required',
							'password' => 'min:6',
							'email' => 'required|email',
							'user_photo' => 'mimes:jpeg,jpg,png,gif|max:'.$image_size,
							
         ]);
		 $rules = array(
				'username' => ['required', 'regex:/^[\w-]*$/', 'max:255', Rule::unique('users') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				'email' => ['required', 'email', 'max:255', Rule::unique('users') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				
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
		
		if ($request->hasFile('user_photo')) {
			$image = $request->file('user_photo');
			$img_name = time() . '.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/users');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$user_image = $img_name;
		  }
		  else
		  {
		     $user_image = "";
		  }
		  $verified = $request->input('verified');
		  $token = $this->generateRandomString();
		  $days_ago = date('Y-m-d', strtotime('-3 days'));
		  $user_document_verified = $request->input('user_document_verified');
		 if($additional_settings->subscription_mode == 1)
		 {
			if($user_type == 'vendor')
			{ 
			    $user_subscr_payment_status = $request->input('user_subscr_payment_status');
				$data = array('name' => $name, 'username' => $username, 'email' => $email, 'user_type' => $user_type, 'password' => $password, 'earnings' => $earnings, 'user_photo' => $user_image, 'verified' => $verified, 'user_document_verified' => $user_document_verified, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'user_token' => $token, 'user_subscr_id' => $subscr_id, 'user_subscr_type' => $free_subscr_type, 'user_subscr_price' => $free_subscr_price, 'user_subscr_date' => $subscr_date, 'user_subscr_item_level' => $user_subscr_item_level, 'user_subscr_item' => $free_subscr_item, 'user_subscr_download_item' => $free_subscr_download_item, 'user_subscr_space_level' => $user_subscr_space_level, 'user_subscr_space' => $free_subscr_space, 'user_subscr_space_type' => $user_subscr_space_type, 'user_auth_token' => $user_auth_token, 'user_subscr_payment_status' => $user_subscr_payment_status);
			  
			}
			else
			{
			   $data = array('name' => $name, 'username' => $username, 'email' => $email, 'user_type' => $user_type, 'password' => $password, 'earnings' => $earnings, 'user_photo' => $user_image, 'verified' => $verified, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'user_token' => $token, 'user_auth_token' => $user_auth_token, 'user_subscr_download_item' => $free_subscr_download_new);
			}
		}
		else
		{
		   $data = array('name' => $name, 'username' => $username, 'email' => $email, 'user_type' => $user_type, 'password' => $password, 'earnings' => $earnings, 'user_photo' => $user_image, 'verified' => $verified, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'user_token' => $token, 'user_auth_token' => $user_auth_token, 'user_subscr_download_item' => $unlimited_download);
		}	
			
            
            Members::insertData($data);
            return redirect('/admin/'.$page_redirect)->with('success', 'Insert successfully.');
            
 
       } 
     
    
  }
  
  
  public function delete_customer($token){

      $get_member = Members::editData($token);
	  $user_id = $get_member->id;
	  
      $data = array('drop_status'=>'yes');
	  
	  $item_data = array('drop_status'=>'yes', 'item_status' => 0);
	  
	  Items::dropItems($item_data,$user_id);
      Members::deleteData($token,$data);
	  
	  return redirect()->back()->with('success', 'Delete successfully.');

    
  }
  
  public function edit_customer($token)
	{
	   
	   $edit['userdata'] = Members::editData($token);
	   return view('admin.edit-customer', [ 'edit' => $edit, 'token' => $token]);
	}
	
	
	public function update_customer(Request $request)
	{
	    $additional_settings = Settings::editAdditional();
		 $free_subscr_download_new = $request->input('user_subscr_download_item');
		 if(!empty($request->input('subscription_type')))
		 {
			 
			 if($request->input('subscription_type') == 'free')
			 {
			 $free_subscr_type = $additional_settings->free_subscr_type;
			 $free_subscr_price = $additional_settings->free_subscr_price;
			 $free_subscr_duration = $additional_settings->free_subscr_duration;
			 $free_subscr_item = $additional_settings->free_subscr_item;
			 $free_subscr_download_item = $additional_settings->subscr_download_items;
			 $free_subscr_space = $additional_settings->free_subscr_space;
			 $subscr_value = "+".$free_subscr_duration;
			 $user_subscr_item_level = 'limited';
			 $user_subscr_space_level = 'limited';
			 $user_subscr_space_type = 'MB';
			 $subscr_date = date('Y-m-d', strtotime($subscr_value));
			 $subscr_id = 0;
			 }
			 else if($request->input('subscription_type') == 'none')
			 {
			 $free_subscr_type = 'None';
			 $free_subscr_price = $additional_settings->free_subscr_price;
			 $free_subscr_duration = $additional_settings->free_subscr_duration;
			 $free_subscr_item = 0;
			 $free_subscr_download_item = 0;
			 $free_subscr_space = 0;
			 $subscr_value = "+".$free_subscr_duration;
			 $user_subscr_item_level = 'limited';
			 $user_subscr_space_level = 'limited';
			 $user_subscr_space_type = 'MB';
			 $subscr_date = date('Y-m-d', strtotime('-1 days'));
			 $subscr_id = 0;
			 }
			 else
			 {
			    $subscr_id = $request->input('subscription_type');
			    $subscr['view'] = Subscription::editsubData($subscr_id);
				$free_subscr_type = $subscr['view']->subscr_name;
				$free_subscr_price = $subscr['view']->subscr_price;
				$free_subscr_duration = $subscr['view']->subscr_duration;
				$free_subscr_item = $subscr['view']->subscr_item;
				$free_subscr_download_item = $subscr['view']->subscr_download_item;
				$free_subscr_space = $subscr['view']->subscr_space;
				$subscr_value = "+".$free_subscr_duration;
				$user_subscr_item_level = $subscr['view']->subscr_item_level;
				$user_subscr_space_level = $subscr['view']->subscr_space_level;
				$user_subscr_space_type = $subscr['view']->subscr_space_type;
				$subscr_date = $request->input('user_subscr_date');
				
			 }
		 }
		 
		 if(!empty($request->input('user_payment_option')))
		   {
			 $payment = "";
			 foreach($request->input('user_payment_option') as $payment_option)
			 {
				$payment .= $payment_option.',';
			 }
			 $user_payment_option = rtrim($payment,',');
		   }
		   else
		   {
		   $user_payment_option = "";
		   }
	   $name = $request->input('name');
	   $username = $request->input('username');
	   $page_redirect = $request->input('page_redirect');
         $email = $request->input('email');
		 $user_type = $request->input('user_type');
		 
		 if(!empty($request->input('password')))
		 {
		 $password = bcrypt($request->input('password'));
		 $user_auth_token = base64_encode($request->input('password'));
		 $pass = $password;
		 }
		 else
		 {
		 $pass = $request->input('save_password');
		 $user_auth_token = $request->input('save_auth_token');
		 }
		 
		 if(!empty($request->input('earnings')))
		 {
		 $earnings = $request->input('earnings');
         }
		 else
		 {
		   $earnings = 0;
		 }
		 
		  $token = $request->input('edit_id');
		  $verified = $request->input('verified');
		 $allsettings = Settings::allSettings();
		  $image_size = $allsettings->site_max_image_size;
         $user_document_verified = $request->input('user_document_verified');
		 if(!empty($request->input('exclusive_author')))
		 {
		 $exclusive_author = $request->input('exclusive_author');
		  if($request->input('exclusive_author')==1)
		  {
		    $become_author = 0;
		  }
		 }
		 else
		 {
		  $become_author = $request->input('become_author');
		  $exclusive_author = 0;
		 }
		 $request->validate([
							'name' => 'required',
							'username' => 'required',
							'password' => 'min:6',
							'email' => 'required|email',
							'user_photo' => 'mimes:jpeg,jpg,png,gif|max:'.$image_size,
							
         ]);
		 $rules = array(
				'username' => ['required', 'regex:/^[\w-]*$/', 'max:255', Rule::unique('users') ->ignore($token, 'user_token') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				'email' => ['required', 'email', 'max:255', Rule::unique('users') ->ignore($token, 'user_token') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				
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
		
		if ($request->hasFile('user_photo')) {
		     
			Members::droPhoto($token); 
		   
			$image = $request->file('user_photo');
			$img_name = time() . '.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/users');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$user_image = $img_name;
		  }
		  else
		  {
		     $user_image = $request->input('save_photo');
		  }
		  
		 
		 
		
 
            
           if($additional_settings->subscription_mode == 1)
		 {
			if($user_type == 'vendor')
			{ 
			    $user_subscr_payment_status = $request->input('user_subscr_payment_status');
				$data = array('name' => $name, 'username' => $username, 'email' => $email, 'user_type' => $user_type, 'password' => $pass, 'earnings' => $earnings, 'user_photo' => $user_image, 'updated_at' => date('Y-m-d H:i:s'), 'user_subscr_id' => $subscr_id, 'user_subscr_type' => $free_subscr_type, 'user_subscr_price' => $free_subscr_price, 'user_subscr_date' => $subscr_date, 'user_subscr_item_level' => $user_subscr_item_level, 'user_subscr_item' => $free_subscr_item, 'user_subscr_download_item' => $free_subscr_download_new, 'user_subscr_space_level' => $user_subscr_space_level, 'user_subscr_space' => $free_subscr_space, 'user_subscr_space_type' => $user_subscr_space_type, 'user_payment_option' => $user_payment_option, 'verified' => $verified, 'user_document_verified' => $user_document_verified, 'user_auth_token' => $user_auth_token, 'exclusive_author' => $exclusive_author,'become_author' => $become_author, 'user_subscr_payment_status' => $user_subscr_payment_status);
			  
			}
			else
			{
			  $data = array('name' => $name, 'username' => $username, 'email' => $email, 'user_type' => $user_type, 'password' => $pass, 'earnings' => $earnings, 'user_photo' => $user_image, 'updated_at' => date('Y-m-d H:i:s'), 'verified' => $verified, 'user_auth_token' => $user_auth_token, 'exclusive_author' => $exclusive_author, 'become_author' => $become_author, 'user_subscr_download_item' => $free_subscr_download_new);
			}
		}
		else
		{
		   $data = array('name' => $name, 'username' => $username, 'email' => $email, 'user_type' => $user_type, 'password' => $pass, 'earnings' => $earnings, 'user_photo' => $user_image, 'updated_at' => date('Y-m-d H:i:s'), 'verified' => $verified, 'user_auth_token' => $user_auth_token, 'exclusive_author' => $exclusive_author, 'user_subscr_download_item' => $free_subscr_download_new);
		}	
		
		 
			Members::updateData($token, $data);
            return redirect('/admin/'.$page_redirect)->with('success', 'Update successfully.');
            
 
       } 
     
       
	
	
	}
	
	/* customer */
	
	
	/* vendor */
	
	public function vendor()
    {
        
		$userData['data'] = Members::getvendorData();
		return view('admin.vendor',[ 'userData' => $userData]);
    }
	
	public function add_vendor()
	{
	   $subscribe['userdata'] = Subscription::viewSubscription();
	   return view('admin.add-vendor', [ 'subscribe' => $subscribe]);
	}
	
	
	public function edit_vendor($token)
	{
	   
	   $edit['userdata'] = Members::editData($token);
	   $subscribe['userdata'] = Subscription::viewSubscription();
	   $check_payment = Members::getdirectSubscription($edit['userdata']->id);
	   $get_payment = explode(',', $edit['userdata']->user_payment_option);
	   $sid = 1;
	    $setting['setting'] = Settings::editGeneral($sid);
		$payment_option = explode(',', $setting['setting']->vendor_payment_option);
	   return view('admin.edit-vendor', [ 'edit' => $edit, 'token' => $token, 'subscribe' => $subscribe, 'check_payment' => $check_payment, 'get_payment' => $get_payment, 'payment_option' => $payment_option]);
	}
	
	/* vendor */
	
	/* subscriber */
	
	public function subscriber()
    {
        
		$userData['data'] = Users::whereNotIn('user_subscr_id',[0,''])->where('user_subscr_payment_status','completed')->get();
		return view('admin.subscriber',[ 'userData' => $userData]);
    }
	
	/* subscriber */
	
	/* author */
	
	public function author()
    {
        $requestCount = Users::where('become_author','1')->get()->count();
		$requestData['data'] = Users::where('become_author','1')->get();
		$authorData['data'] = Users::where('exclusive_author','1')->where('drop_status','=','no')->orderBy('id', 'desc')->get();
		return view('admin.author',[ 'authorData' => $authorData, 'requestData' => $requestData, 'requestCount' => $requestCount]);
    }
    
    
     public function become_author_request($user_token,$author)
	{
	   // return $user_token;
	 
	   if($author == 1)
	   {
	     $exclusive_author = 1;
	     $become_author = 0;
	     
	     $user =  DB::table('users')->where('user_token','=',$user_token)->first();
	   if($user)
	   {
	     $name = $user->name;   
	     $email = $user->email;   
	   }
	   
	   
	    $sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		$from_name = $setting['setting']->sender_name;
        $from_email = $setting['setting']->sender_email;
        /* email template code */
	          $checktemp = EmailTemplate::checkTemplate(23);
			  if($checktemp != 0)
			  {
			  $template_view['mind'] = EmailTemplate::viewTemplate(23);
			  $template_subject = $template_view['mind']->et_subject;
			  }
			  else
			  {
			  $template_subject = "Author Request";
			  }
			  $record = array('name' => $name,'email' => $email,'from_email' => $from_email );
        /* email template code */
		Mail::send('approve_author_mail', $record, function($message) use ($from_name, $from_email, $email, $name, $template_subject) {
			$message->to($email, $name)
					->subject($template_subject);
			$message->from($from_email,$from_name);
		});
	   }
	   else
	   {
	     $become_author = null;
	     $exclusive_author = 0;
	     
	     $user =  DB::table('users')->where('user_token','=',$user_token)->first();
	   if($user)
	   {
	     $name = $user->name;   
	     $email = $user->email;   
	   }
	   
	   
	    $sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		$from_name = $setting['setting']->sender_name;
        $from_email = $setting['setting']->sender_email;
        /* email template code */
	          $checktemp = EmailTemplate::checkTemplate(24);
			  if($checktemp != 0)
			  {
			  $template_view['mind'] = EmailTemplate::viewTemplate(24);
			  $template_subject = $template_view['mind']->et_subject;
			  }
			  else
			  {
			  $template_subject = "Author Request";
			  }
			  $record = array('name' => $name,'email' => $email,'from_email' => $from_email );
        /* email template code */
		Mail::send('reject_author_mail', $record, function($message) use ($from_name, $from_email, $email, $name, $template_subject) {
			$message->to($email, $name)
					->subject($template_subject);
			$message->from($from_email,$from_name);
		});
	   }
	  $data = array('exclusive_author' => $exclusive_author, 'become_author' => $become_author);
	  Members::updateData($user_token,$data);
	  
	    
	   
	   return redirect()->back();
	
	}
	
	
	/* author */
	
    
	
	/* edit profile */
	
	
	public function edit_profile()
    {
        $token = Auth::user()->id;
		$edit['userdata'] = Members::editprofileData($token);
		
		return view('admin.edit-profile', [ 'edit' => $edit, 'token' => $token]);
		
    }
	
	
	
	public function update_profile(Request $request)
	{
	
	   $name = $request->input('name');
	   $username = $request->input('username');
         $email = $request->input('email');
		 $user_type = $request->input('user_type');
		 
		 if(!empty($request->input('password')))
		 {
		 $password = bcrypt($request->input('password'));
		 $pass = $password;
		 }
		 else
		 {
		 $pass = $request->input('save_password');
		 }
		 
		 $earnings = $request->input('earnings');
		 
		  $token = $request->input('edit_id');
		 
         $allsettings = Settings::allSettings();
		  $image_size = $allsettings->site_max_image_size;
		 $request->validate([
							'name' => 'required',
							'username' => 'required',
							'email' => 'required|email',
							'user_photo' => 'mimes:jpeg,jpg,png,gif|max:'.$image_size,
							
         ]);
		 $rules = array(
				'username' => ['required', 'regex:/^[\w-]*$/', 'max:255', Rule::unique('users') ->ignore($token, 'id') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				'email' => ['required', 'email', 'max:255', Rule::unique('users') ->ignore($token, 'id') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				
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
		
		if ($request->hasFile('user_photo')) {
		     
			Members::droprofilePhoto($token); 
		   
			$image = $request->file('user_photo');
			$img_name = time() . '.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/users');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$user_image = $img_name;
		  }
		  else
		  {
		     $user_image = $request->input('save_photo');
		  }
		  
		 
		 
		$data = array('name' => $name, 'username' => $username, 'email' => $email,'user_type' => $user_type, 'password' => $pass, 'user_photo' => $user_image, 'updated_at' => date('Y-m-d H:i:s'), 'earnings' => $earnings);
 
            
            
			Members::updateprofileData($token, $data);
            return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
       
	
	
	}
	
	/* edit profile */
	
	
	/* administrator */
	
	public function administrator()
    {
        
		
		$userData['data'] = Members::getadminData();
		return view('admin.administrator',[ 'userData' => $userData]);
    }
	
	public function add_administrator()
	{
	   
	   return view('admin.add-administrator');
	}
	
	
	public function save_administrator(Request $request)
	{
 
         $sid = 1;
		 $setting['setting'] = Settings::editGeneral($sid);
		 $site_max_image_size = $setting['setting']->site_max_image_size;
		 $name = $request->input('name');
		 $username = $request->input('username');
         $email = $request->input('email');
		 $user_type = $request->input('user_type');
		 $password = bcrypt($request->input('password'));
		 if(!empty($request->input('earnings')))
		 {
		 $earnings = $request->input('earnings');
         }
		 else
		 {
		   $earnings = 0;
		 }
		 $page_url = '/admin/administrator';
		 if(!empty($request->input('user_permission')))
	     {
	      
		  $user_permission = "";
		  foreach($request->input('user_permission') as $permission)
		  {
		     $user_permission .= $permission.',';
		  }
		  $user_permissions = rtrim($user_permission,",");
		  
	     }
	     else
	     {
	     $user_permissions = "";
	     }
		 
         
		 $request->validate([
							'name' => 'required',
							'username' => 'required',
							'password' => 'min:6',
							'email' => 'required|email',
							'user_photo' => 'mimes:jpeg,jpg,png|max:'.$site_max_image_size,
							
         ]);
		 $rules = array(
				'username' => ['required', 'regex:/^[\w-]*$/', 'max:255', Rule::unique('users') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				'email' => ['required', 'email', 'max:255', Rule::unique('users') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				
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
		
		if ($request->hasFile('user_photo')) {
			$image = $request->file('user_photo');
			$img_name = time() . '.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/users');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$user_image = $img_name;
		  }
		  else
		  {
		     $user_image = "";
		  }
		  $verified = 1;
		  $token = $this->generateRandomString();
		 
		$data = array('name' => $name, 'username' => $username, 'email' => $email, 'user_type' => $user_type, 'password' => $password, 'earnings' => $earnings, 'user_photo' => $user_image, 'verified' => $verified, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'user_token' => $token, 'user_permission' => $user_permissions);
 
            
            Members::insertData($data);
            return redirect($page_url)->with('success', 'Insert successfully.');
            
 
       } 
     
    
  }
  
  public function delete_administrator($token){

      $data = array('drop_status'=>'yes');
	  
      Members::deleteData($token,$data);
	  
	  return redirect()->back()->with('success', 'Delete successfully.');

    
  }
  
  public function edit_administrator($token)
	{
	   
	   $edit['userdata'] = Members::editData($token);
	   return view('admin.edit-administrator', [ 'edit' => $edit, 'token' => $token]);
	}
	
	
	public function update_administrator(Request $request)
	{
	
	   $sid = 1;
		 $setting['setting'] = Settings::editGeneral($sid);
		 $site_max_image_size = $setting['setting']->site_max_image_size;
		 $name = $request->input('name');
		 $username = $request->input('username');
         $email = $request->input('email');
		 $user_type = $request->input('user_type');
		 if(!empty($request->input('password')))
		 {
		 $password = bcrypt($request->input('password'));
		 $pass = $password;
		 }
		 else
		 {
		 $pass = $request->input('save_password');
		 }
		 if(!empty($request->input('earnings')))
		 {
		 $earnings = $request->input('earnings');
         }
		 else
		 {
		   $earnings = 0;
		 }
		 $page_url = '/admin/administrator';
		 if(!empty($request->input('user_permission')))
	     {
	      
		  $user_permission = "";
		  foreach($request->input('user_permission') as $permission)
		  {
		     $user_permission .= $permission.',';
		  }
		  $user_permissions = rtrim($user_permission,",");
		  
	     }
	     else
	     {
	     $user_permissions = "";
	     }
		 $token = $request->input('user_token');
         
		 $request->validate([
							'name' => 'required',
							'username' => 'required',
							'password' => 'min:6',
							'email' => 'required|email',
							'user_photo' => 'mimes:jpeg,jpg,png|max:'.$site_max_image_size,
							
         ]);
		 $rules = array(
				'username' => ['required', 'regex:/^[\w-]*$/', 'max:255', Rule::unique('users') ->ignore($token, 'user_token') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				'email' => ['required', 'email', 'max:255', Rule::unique('users') ->ignore($token, 'user_token') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				
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
		
		if ($request->hasFile('user_photo')) {
			$image = $request->file('user_photo');
			$img_name = time() . '.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/users');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$user_image = $img_name;
		  }
		  else
		  {
		     $user_image = $request->input('save_photo');
		  }
		  $data = array('name' => $name, 'username' => $username, 'email' => $email, 'user_type' => $user_type, 'password' => $pass, 'earnings' => $earnings, 'user_photo' => $user_image, 'updated_at' => date('Y-m-d H:i:s'), 'user_permission' => $user_permissions);
          Members::updateData($token, $data);
          return redirect($page_url)->with('success', 'Update successfully.');
            
 
       } 
	
	
	}
  
	
	/* administrator */
	
	
	
	
}
