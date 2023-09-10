<?php

namespace Fickrr\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Fickrr\Models\Members;
use Fickrr\Models\Settings;
use Fickrr\Models\Category;
use Fickrr\Models\Pages;
use Fickrr\Models\Comment;
use Fickrr\Models\Items;
use Fickrr\Models\ProcuctPageCategory;
use Fickrr\Models\SubCategory;
use Fickrr\Models\Languages;
use Fickrr\Models\Chat;
use Illuminate\Support\Facades\View;
use Auth;
use URL;
use Illuminate\Support\Facades\Config;
use Cookie;
use Illuminate\Support\Facades\Crypt;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
	 
	
    public function boot()
    {
	
	    Schema::defaultStringLength(191);
		$admin = Members::adminData();
		View::share('admin', $admin);
		
		
		
		$member_count = Members::footermemberData();
		View::share('member_count', $member_count);
		
		$total_sale = Items::totalsaleitemCount();
		View::share('total_sale', $total_sale);
		
		$total_files = Items::totalfileItems();
		View::share('total_files', $total_files);
		
		$getWell['type'] = Items::gettypeStatus();
		View::share('getWell', $getWell);
		
		
		$allsettings = Settings::allSettings();
		View::share('allsettings', $allsettings);
		
		$additional = Settings::editAdditional();
		View::share('additional', $additional);
		
		$addition_settings = Settings::editAdditional();
		View::share('addition_settings', $addition_settings);
		
		
		$allattributes = Settings::allAttributes();
		View::share('allattributes', $allattributes);
		
		$attr_field_type = array('multi-select' => 'Multi Select', 'single-select' => 'Single Select');
	    View::share('attr_field_type', $attr_field_type);
						
		$help_id = 13;
		$count_help = Pages::helppageCount($help_id);
		if($count_help != 0)
		{
		  $help['page'] = Pages::editpageData($help_id);
		  View::share('help', $help);
		}
		View::share('count_help', $count_help);
		
		if($allsettings->stripe_mode == 0) 
		{ 
		$stripe_publish_key = $allsettings->test_publish_key; 
		$stripe_secret_key = $allsettings->test_secret_key;
		
		}
		else
		{ 
		$stripe_publish_key = $allsettings->live_publish_key;
		$stripe_secret_key = $allsettings->live_secret_key;
		}
		View::share('stripe_publish_key', $stripe_publish_key);
		View::share('stripe_secret_key', $stripe_secret_key);
		
		
		$country['country'] = Settings::allCountry();
		View::share('country', $country);
				
		$allpages['pages'] = Pages::menupageData();
		View::share('allpages', $allpages);
		
		$encrypter = app('Illuminate\Contracts\Encryption\Encrypter');
		View::share('encrypter', $encrypter);
		
		$footerpages['pages'] = Pages::footermenuData();
		View::share('footerpages', $footerpages);
		if($addition_settings->subscription_mode == 1)
		{
		$permission = array('dashboard' => 'Dashboard', 'settings' => 'Settings', 'items' => 'Items', 'subscription' => 'Subscription', 'refund' => 'Refund Request', 'rating' => 'Rating & Reviews', 'withdrawal' => 'Withdrawal Request', 'deposit' => 'Deposit', 'blog' => 'Blog', 'pages' => 'Pages', 'features' => 'Features', 'selling' => 'Start Selling', 'contact' => 'Contact', 'newsletter' => 'Newsletter', 'languages' => 'Languages', 'etemplate' => 'Email Template', 'ccache' => 'Clear Cache', 'upgrade' => 'Upgrade', 'backups' => 'Backups');
		}
		else
		{
		$permission = array('dashboard' => 'Dashboard', 'settings' => 'Settings', 'items' => 'Items', 'refund' => 'Refund Request', 'rating' => 'Rating & Reviews', 'withdrawal' => 'Withdrawal Request', 'deposit' => 'Deposit', 'blog' => 'Blog', 'pages' => 'Pages', 'features' => 'Features', 'selling' => 'Start Selling', 'contact' => 'Contact', 'newsletter' => 'Newsletter', 'languages' => 'Languages', 'etemplate' => 'Email Template', 'ccache' => 'Clear Cache', 'upgrade' => 'Upgrade', 'backups' => 'Backups');
		}
		View::share('permission', $permission);
		
		$durations = array('1 Month','2 Month','3 Month','4 Month','5 Month','6 Month','1 Year','2 Year','3 Year','4 Year','5 Year');
		View::share('durations', $durations);
		
		$item_sale_type = array('limited' => 'Limited Items','unlimited' => 'Unlimited Items');
		View::share('item_sale_type', $item_sale_type);
		
		$storage_space = array('limited' => 'Limited Space','unlimited' => 'Unlimited Space');
		View::share('storage_space', $storage_space);
		
		$storage_space_type = array('MB','GB','TB');
		View::share('storage_space_type', $storage_space_type);
		
		$languages['view'] = Languages::allLanguage();
		View::share('languages', $languages);
		
		$alllang['data'] = Languages::allLanguage();
		View::share('alllang', $alllang);
		
		if(!empty(Cookie::get('translate')))
		{
		$translate = Cookie::get('translate');
		   $lang_title['view'] = Languages::getLanguage($translate);
		   $language_title = $lang_title['view']->language_name;
		}
		else
		{
		  $default_count = Languages::defaultLanguageCount();
		  if($default_count == 0)
		  { 
		  $translate = "en";
		  $lang_title['view'] = Languages::getLanguage($translate);
		   $language_title = $lang_title['view']->language_name;
		  }
		  else
		  {
		  $default['lang'] = Languages::defaultLanguage();
		  $translate =  $default['lang']->language_code;
		  $lang_title['view'] = Languages::getLanguage($translate);
		   $language_title = $lang_title['view']->language_name;
		  }
		 
		}
		View::share('translate', $translate);
		View::share('language_title', $language_title);
		
		
		$minprice['price'] = Items::minpriceData();
		View::share('minprice', $minprice);
		
		$maxprice['price'] = Items::maxpriceData();
		View::share('maxprice', $maxprice);
		
		
		$minprice_count = Items::minpriceCount();
		View::share('minprice_count', $minprice_count);
		
		$maxprice_count = Items::maxpriceCount();
		View::share('maxprice_count', $maxprice_count);
		
		
		$maincategory['view'] = Category::footercategoryData();
		View::share('maincategory', $maincategory);
		
		$maincategory_two['view'] = Category::footercategoryData();
		View::share('maincategory_two', $maincategory_two);
		
		$categories['menu'] = Category::with('SubCategory')->where('category_status','=','1')->where('drop_status','=','no')->take($allsettings->site_menu_category)->orderBy('menu_order',$allsettings->menu_categories_order)->get();
		View::share('categories', $categories);
		
// 		$product_cat['category'] = ProcuctPageCategory::with('SubCategory')->where('category_status','=','1')->where('drop_status','=','no')->get();
// 		View::share('$product_cat', $product_cat);
   $product_cat['category'] = ProcuctPageCategory::getsubcategoryData();
    View::share('product_cat', $product_cat);
		
		$re_categories['menu'] = Category::with('SubCategory')->where('category_status','=','1')->where('drop_status','=','no')->orderBy('menu_order',$allsettings->menu_categories_order)->get();
		View::share('re_categories', $re_categories);
		
		view()->composer('*', function($view){
            $view_name = str_replace('.', '-', $view->getName());
            view()->share('view_name', $view_name);
        });
		
		view()->composer('*', function($view)
		{
			if (Auth::check()) {
			    $user['avilable'] = Members::logindataUser(Auth::user()->id);
			   $avilable = explode(',',$user['avilable']->user_permission);
			    $cartcount = Items::getcartCount();
				
				$msgcount = Chat::miniChat(Auth::user()->id);
				$view->with('cartcount', $cartcount);
				$view->with('msgcount', $msgcount);
				$today_date = date('Y-m-d');
				if(Auth::user()->user_today_download_date != $today_date)
				  {
				     
					 $download_limiter = 0;
					 $up_user_download = array('user_today_download_date' => $today_date, 'user_today_download_limit' => $download_limiter, 'free_download_items' => $download_limiter, 'subscription_download_items' => $download_limiter);
					 Members::updateReferral(Auth::user()->id,$up_user_download);
					
				  }
				
			}else {
			    $avilable = "";
				$cartcount = Items::getcartCount();
				$view->with('cartcount', $cartcount);
				$view->with('msgcount', 0);
				
			}
			view()->share('avilable', $avilable);
		});
		view()->composer('*', function($viewcart)
		{
			if (Auth::check()) {
			    $cartitem['item'] = Items::getcartData();
				$smsdata['display'] = Chat::miniData(Auth::user()->id);
				$viewcart->with('smsdata', $smsdata);
				$viewcart->with('cartitem', $cartitem);
				
			}else {
				$viewcart->with('smsdata', 0);
				$cartitem['item'] = Items::getcartData();
				$viewcart->with('cartitem', $cartitem);
			}
			
			$item_count_limit = Items::emptycheck();
			if($item_count_limit != 0)
			{
			   $item['records'] = Items::matchRecord();
			   
			   foreach($item['records'] as $full)
			   {
			   $item_type_id = $full->item_type_id;
			   $item_id = $full->item_id;
			   $data = array('item_type_id' => $item_type_id);
			   Items::upModify($item_id,$data);
			   }
			}
		});
		
		
		Config::set('filesystems.disks.s3.key', $allsettings->aws_access_key_id);
		Config::set('filesystems.disks.s3.secret', $allsettings->aws_secret_access_key);
		Config::set('filesystems.disks.s3.region', $allsettings->aws_default_region);
		Config::set('filesystems.disks.s3.bucket', $allsettings->aws_bucket);
		
		Config::set('filesystems.disks.wasabi.key', $allsettings->wasabi_access_key_id);
		Config::set('filesystems.disks.wasabi.secret', $allsettings->wasabi_secret_access_key);
		Config::set('filesystems.disks.wasabi.region', $allsettings->wasabi_default_region);
		Config::set('filesystems.disks.wasabi.bucket', $allsettings->wasabi_bucket);
		
		
		Config::set('paystack.publicKey', $allsettings->paystack_public_key);
		Config::set('paystack.secretKey', $allsettings->paystack_secret_key);
		Config::set('paystack.merchantEmail', $allsettings->paystack_merchant_email);
		Config::set('paystack.paymentUrl', 'https://api.paystack.co');
		
		
		Config::set('mail.driver', $allsettings->mail_driver);
		Config::set('mail.host', $allsettings->mail_host);
		Config::set('mail.port', $allsettings->mail_port);
		Config::set('mail.username', $allsettings->mail_username);
		Config::set('mail.password', $allsettings->mail_password);
		Config::set('mail.encryption', $allsettings->mail_encryption);
		
		Config::set('services.facebook.client_id', $allsettings->facebook_client_id);
		Config::set('services.facebook.client_secret', $allsettings->facebook_client_secret);
		Config::set('services.facebook.redirect', $allsettings->facebook_callback_url);
		Config::set('services.google.client_id', $allsettings->google_client_id);
		Config::set('services.google.client_secret', $allsettings->google_client_secret);
		Config::set('services.google.redirect', $allsettings->google_callback_url);
		
		Config::set('backup.notifications.mail.to', $allsettings->sender_email);
		Config::set('backup.notifications.mail.from.address', $allsettings->sender_email);
		Config::set('backup.notifications.mail.from.name', $allsettings->sender_name);
		
		Config::set('filesystems.disks.dropbox.token', $allsettings->dropbox_token);
		
		Config::set('filesystems.disks.google.clientId', $allsettings->google_drive_client_id);
		Config::set('filesystems.disks.google.clientSecret', $allsettings->google_drive_client_secret);
		Config::set('filesystems.disks.google.refreshToken', $allsettings->google_drive_refresh_token);
		Config::set('filesystems.disks.google.folderId', $allsettings->google_drive_folder_id);
		
		$demo_mode = $additional->demo_mode; // on
		View::share('demo_mode', $demo_mode);
		
		Config::set('sslcommerz.store.id', $additional->sslcommerz_store_id);
		Config::set('sslcommerz.store.password', $additional->sslcommerz_store_password);
		Config::set('sslcommerz.store.localhost', $additional->sslcommerz_mode);
		
		Schema::table('subscription', function($table) {
		
			if (!Schema::hasColumn('subscription', 'highlight_pack')) 
			{
			$table->integer("highlight_pack")->default(0);
			}
			if (!Schema::hasColumn('subscription', 'highlight_bg_color')) 
			{
			$table->string("highlight_bg_color")->nullable();
			}
			if (!Schema::hasColumn('subscription', 'highlight_text_color')) 
			{
			$table->string("highlight_text_color")->nullable();
			}
			if (!Schema::hasColumn('subscription', 'icon_color')) 
			{
			$table->string("icon_color")->nullable();
			}
			if (!Schema::hasColumn('subscription', 'button_bg_color')) 
			{
			$table->string("button_bg_color")->nullable();
			}
			if (!Schema::hasColumn('subscription', 'button_text_color')) 
			{
			$table->string("button_text_color")->nullable();
			}
			
			if (!Schema::hasColumn('subscription', 'extra_info')) 
			{
			$table->text("extra_info")->nullable();
			}
			
		});
		
		Schema::table('additional_settings', function($table) {
		
			if (!Schema::hasColumn('additional_settings', 'conversation_mode')) 
			{
			$table->integer("conversation_mode")->default(0);
			}
			$table->float('deposit_amount')->change();
			if (!Schema::hasColumn('additional_settings', 'disable_view_source')) 
			{
			$table->integer("disable_view_source")->default(1);
			}
			if (!Schema::hasColumn('additional_settings', 'site_custom_js')) 
			{
			$table->text("site_custom_js")->nullable();
			}
			if (!Schema::hasColumn('additional_settings', 'site_custom_css')) 
			{
			$table->text("site_custom_css")->nullable();
			}
		});
		
		Schema::table('item_order', function($table) {
		
		 if (!Schema::hasColumn('item_order', 'session_id')) 
			{
			$table->string("session_id")->nullable()->after('user_id');
			}
			if (!Schema::hasColumn('item_order', 'item_order_serial_key')) 
			{
			$table->text("item_order_serial_key")->nullable()->after('item_name');
			}
			if (!Schema::hasColumn('item_order', 'item_serial_stock')) 
			{
			$table->integer("item_serial_stock")->default(0)->after('item_order_serial_key');
			}
		
		});
		
		
		
		Schema::table('items', function($table) {
		
		 if (!Schema::hasColumn('items', 'item_delimiter')) 
			{
			$table->string("item_delimiter")->nullable()->after('item_file_link');
			}
		if (!Schema::hasColumn('items', 'item_serials_list')) 
			{
			$table->text("item_serials_list")->nullable()->after('item_delimiter');
			}
				
		
		});
		
		Schema::table('settings', function($table) {
		
		 if (!Schema::hasColumn('settings', 'stripe_type')) 
			{
			$table->string("stripe_type")->default("charges")->after('paypal_mode');
			}
			if (!Schema::hasColumn('settings', 'site_currency_position')) 
			{
			$table->string("site_currency_position", 10)->default("left")->after('site_currency');
			}
		
		});
		
		Schema::table('users', function($table) {
		
		 if (!Schema::hasColumn('users', 'user_stripe_type')) 
			{
			$table->string("user_stripe_type")->default("charges")->after('user_paypal_mode');
			}
		
		});
		
		
		
		
    }
}
