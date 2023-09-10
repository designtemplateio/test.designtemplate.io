<?php

namespace Fickrr\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Fickrr\Http\Controllers\Controller;
use Fickrr\Models\Settings;
use Fickrr\Models\Items;
use Fickrr\Models\Downloads;
use Fickrr\Models\Members;
use Fickrr\Models\Pages;
use Fickrr\Models\Blog;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
		
    }
	
	/* extra works */
	
	public function item_details(Request $request)
	{
	
	    $download_button_before_text = $request->input('download_button_before_text');
		$download_button_after_text = $request->input('download_button_after_text');
		$favorites_button_text_color = $request->input('favorites_button_text_color');
		$favorites_button_bg_color = $request->input('favorites_button_bg_color');
		$download_button_text_color = $request->input('download_button_text_color');
		
		$download_button_bg_color = $request->input('download_button_bg_color');
		$portfolio_button_text_color = $request->input('portfolio_button_text_color');
		$portfolio_button_bg_color = $request->input('portfolio_button_bg_color');
	  	$sid = $request->input('sid');
	     
         
		 $request->validate([
		 
					'download_button_before_text' => 'required',
					'download_button_after_text' => 'required',
					'favorites_button_text_color' => 'required',
					'favorites_button_bg_color' => 'required',
					'download_button_text_color' => 'required',	
					'download_button_bg_color' => 'required',	
					'portfolio_button_text_color' => 'required',
					'portfolio_button_bg_color' => 'required',			
							
							
							
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
		
		   $addition_data = array('download_button_before_text' => $download_button_before_text, 'download_button_after_text' => $download_button_after_text, 'favorites_button_text_color' => $favorites_button_text_color, 'favorites_button_bg_color' => $favorites_button_bg_color, 'download_button_text_color' => $download_button_text_color, 'download_button_bg_color' => $download_button_bg_color, 'portfolio_button_text_color' => $portfolio_button_text_color, 'portfolio_button_bg_color' => $portfolio_button_bg_color);
		   
		   Settings::updateAdditionData($addition_data);
           return redirect()->back()->with('success', 'Update successfully.');
		
	    }
	
	}
	
	/* extra works */
	
    public function admin()
    {
        
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		$today = date('d F Y');
		$first_day = date('d F Y', strtotime('-1 days'));
		$second_day = date('d F Y', strtotime('-2 days'));
		$third_day = date('d F Y', strtotime('-3 days'));
		$fourth_day = date('d F Y', strtotime('-4 days'));
		$fifth_day = date('d F Y', strtotime('-5 days'));
		$sixth_day = date('d F Y', strtotime('-6 days'));
		
		$data1 = date('Y-m-d');
		$data2 = date('Y-m-d', strtotime('-1 days'));
		$data3 = date('Y-m-d', strtotime('-2 days'));
		$data4 = date('Y-m-d', strtotime('-3 days'));
		$data5 = date('Y-m-d', strtotime('-4 days'));
		$data6 = date('Y-m-d', strtotime('-5 days'));
		$data7 = date('Y-m-d', strtotime('-6 days'));
		
		$view1 = Items::orderdataCheck($data1);
		$view2 = Items::orderdataCheck($data2);
		$view3 = Items::orderdataCheck($data3);
		$view4 = Items::orderdataCheck($data4);
		$view5 = Items::orderdataCheck($data5);
		$view6 = Items::orderdataCheck($data6);
		$view7 = Items::orderdataCheck($data7);
		
    	$totalsubscrdownload = Downloads::getsubscrdownloadData();
		$totalsubscrdownload1 = Downloads::getsubscrdownloadData1();
		$totalsubscrdownload2 = Downloads::getsubscrdownloadData2();
		$totalsubscrdownload3 = Downloads::getsubscrdownloadData3();
		$totalsubscrdownload4 = Downloads::getsubscrdownloadData4();
		$totalsubscrdownload5 = Downloads::getsubscrdownloadData5();
		
		$totalfreedownload = Downloads::getfreedownloadData();
		$totalfreedownload1 = Downloads::getfreedownloadData1();
		$totalfreedownload2 = Downloads::getfreedownloadData2();
		$totalfreedownload3 = Downloads::getfreedownloadData3();
		$totalfreedownload4 = Downloads::getfreedownloadData4();
		$totalfreedownload5 = Downloads::getfreedownloadData5();
		
		
		$approved = Items::itemapprovedCheck(1);
		$unapproved = Items::itemapprovedCheck(0);
		$rejected = Items::itemapprovedCheck(2);
		$totalvendor = Members::getmemberData();
		$totalpages = Pages::totaldemoData();
		$totalorder = Items::totalorderData();
		$totalitems = Items::totalitemCheck();
		$totalpost = Blog::totalblogData();
		$itemcomment = Items::totalitemcommentCheck();
		$total_referral['earnings'] = Members::totalreferralEarnings();
		$total_referral_earnings = 0;
		$total_referrals = 0;
		foreach($total_referral['earnings'] as $total_referral_earn)
		{
		  $total_referral_earnings += $total_referral_earn->referral_amount;
		  $total_referrals += $total_referral_earn->referral_count;
		}
		$admin_total_referral = Members::totaladminreferralEarnings();
		$payouts = 0;
		$total_withdrawal['earnings'] = Members::totalpayout();
		foreach($total_withdrawal['earnings'] as $total_withdrawal)
		{
		   $payouts += $total_withdrawal->wd_amount;
		}
		$refunds = Members::totalrefund();
		
		
		return view('admin.index', [ 'setting' => $setting, 'today' => $today, 'first_day' => $first_day, 'second_day' => $second_day, 'third_day' => $third_day, 'fourth_day' => $fourth_day, 'fifth_day' => $fifth_day, 'sixth_day' => $sixth_day, 'view1' => $view1, 'view2' => $view2, 'view3' => $view3, 'view4' => $view4, 'view5' => $view5, 'view6' => $view6, 'view7' => $view7, 'approved' => $approved, 'unapproved' => $unapproved, 'rejected' => $rejected, 'totalvendor' => $totalvendor, 'totalpages' => $totalpages, 'totalorder' => $totalorder, 'totalitems' => $totalitems, 'totalpost' => $totalpost, 'itemcomment' => $itemcomment, 'total_referral_earnings' => $total_referral_earnings, 'admin_total_referral' => $admin_total_referral, 'total_referrals' => $total_referrals, 'payouts' => $payouts, 'refunds' => $refunds,'totalsubscrdownload'=>$totalsubscrdownload,'totalsubscrdownload1'=>$totalsubscrdownload1,'totalsubscrdownload2'=>$totalsubscrdownload2,'totalsubscrdownload3'=>$totalsubscrdownload3,'totalsubscrdownload4'=>$totalsubscrdownload4,'totalsubscrdownload5'=>$totalsubscrdownload5, 'totalfreedownload'=>$totalfreedownload,'totalfreedownload1'=>$totalfreedownload1,'totalfreedownload2'=>$totalfreedownload2,'totalfreedownload3'=>$totalfreedownload3,'totalfreedownload4'=>$totalfreedownload4,'totalfreedownload5'=>$totalfreedownload5]);
		
		
    }
}
