<?php

namespace Fickrr\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Fickrr\Models\Settings;
use Illuminate\Database\Eloquent\Factories\HasFactory;

  
use Auth;
use Storage;
use Session;
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class Downloads extends Model
{
    
	/* items */
  protected $table = 'downloads';
 
  public static function getuserDownloads()
  {
    $today_date = date('Y-m-d');
    $user_id = Auth::user()->id;
    $value=DB::table('downloads')->where('item_author','=',$user_id)->where('created_at','=',$today_date)->orderBy('id', 'desc')->get(); 
    return $value;
	
  }
  
  public static function gettotalDownloads($a)
  {
    $today_date = date('Y-m-d');
    $user_id = Auth::user()->id;
    $value=DB::table('downloads')->where('item_name','=',$a)->where('created_at','=',$today_date)->orderBy('id', 'desc')->get(); 
    return $value;
	
  }
  
 public static function savedownloadData($data1)
  {
   
      DB::table('downloads')->insert($data1);
 
  }
  
  public static function updatedownloadData($user_id,$downloaddata)
  {
    DB::table('downloads')
      ->where('user_id', $user_id)
      ->update($downloaddata);
  }
  
  
   public static function edititemData($token)
  {
    $value = DB::table('downloads')
      ->where('user_id', $token)
      ->first();
	return $value;
  }
  
   public static function getsubscrdownloadData()
  {
 
    $value = DB::table('downloads')
    // ->where('user_today_download_date','=','2023-01-24')
    ->whereRaw('Date(created_at) = CURDATE()')
    ->sum('downloads.subscription_items');
    return $value;
  }
  public static function getsubscrdownloadData1()
  {
    $data1 = date('Y-m-d', strtotime('-1 days'));
    $value = DB::table('downloads')
    ->where('created_at','=',$data1)
    ->sum('downloads.subscription_items');
    return $value;
  }
  public static function getsubscrdownloadData2()
  {
    $data2 = date('Y-m-d', strtotime('-2 days'));
    $value = DB::table('downloads')
    ->where('created_at','=',$data2)
    ->sum('downloads.subscription_items');
    return $value;
  }
  public static function getsubscrdownloadData3()
  {
    $data3 = date('Y-m-d', strtotime('-3 days'));
    $value = DB::table('downloads')
    ->where('created_at','=',$data3)
    ->sum('downloads.subscription_items');
    return $value;
  }
   public static function getsubscrdownloadData4()
  {
    $data4 = date('Y-m-d', strtotime('-4 days'));
    $value = DB::table('downloads')
    ->where('created_at','=',$data4)
    ->sum('downloads.subscription_items');
    return $value;
  }
  public static function getsubscrdownloadData5()
  {
    $data5 = date('Y-m-d', strtotime('-5 days'));
    $value = DB::table('downloads')
    ->where('created_at','=',$data5)
    ->sum('downloads.subscription_items');
    return $value;
  }
   public static function getfreedownloadData()
  {
 
    $value = DB::table('downloads')
    // ->where('user_today_download_date','=','2023-01-24')
    ->whereRaw('Date(created_at) = CURDATE()')
    ->sum('downloads.free_items');
    return $value;
  }
  public static function getfreedownloadData1()
  {
    $data1 = date('Y-m-d', strtotime('-1 days'));
    $value = DB::table('downloads')
    ->where('created_at','=',$data1)
    ->sum('downloads.free_items');
    return $value;
  }
  public static function getfreedownloadData2()
  {
    $data2 = date('Y-m-d', strtotime('-2 days'));
    $value = DB::table('downloads')
    ->where('created_at','=',$data2)
    ->sum('downloads.free_items');
    return $value;
  }
  public static function getfreedownloadData3()
  {
    $data3 = date('Y-m-d', strtotime('-3 days'));
    $value = DB::table('downloads')
    ->where('created_at','=',$data3)
    ->sum('downloads.free_items');
    return $value;
  }
   public static function getfreedownloadData4()
  {
    $data4 = date('Y-m-d', strtotime('-4 days'));
    $value = DB::table('downloads')
    ->where('created_at','=',$data4)
    ->sum('downloads.free_items');
    return $value;
  }
  public static function getfreedownloadData5()
  {
    $data5 = date('Y-m-d', strtotime('-5 days'));
    $value = DB::table('downloads')
    ->where('created_at','=',$data5)
    ->sum('downloads.free_items');
    return $value;
  }
  
  public static function checkuserFreeFiles($user_id)
	  {
	  $today_date = date('Y-m-d');
	  $value=DB::table('downloads')->where('downloads.user_id','=',$user_id)->where('downloads.free_items','=',1)->where('created_at','=',$today_date)->get();
	  return $value;
	  }
  public static function checkuserSubscription($user_id)
	  {
	  $today_date = date('Y-m-d');
	  $value=DB::table('downloads')->where('downloads.user_id','=',$user_id)->where('downloads.free_items','=',0)->where('created_at','=',$today_date)->get();
	  return $value;
	  }
	  
 public static function checkMonthFreeFiles($user_id)
	  {
	  $today_date = date('Y-m-d');
	  $value=DB::table('downloads')->where('downloads.user_id','=',$user_id)->where('downloads.free_items','=',1)->whereMonth('created_at','=',date('m'))->orderBy('downloads.created_at', 'desc')->get();
	  return $value;
	  }
  public static function checkMonthSubscription($user_id)
	  {
	  $today_date = date('Y-m-d');
	  $value=DB::table('downloads')->where('downloads.user_id','=',$user_id)->where('downloads.free_items','=',0)->whereMonth('created_at','=',date('m'))->orderBy('downloads.created_at', 'desc')->get();
	  return $value;
	  }
	  
  public static function checkauthormyDownload($user_id)
	  {
	  $today_date = date('Y-m-d');
	  $value=DB::table('downloads')->where('downloads.item_author','=',$user_id)->where('created_at','=',$today_date)->get();
	  return $value;
	  }
  
}
