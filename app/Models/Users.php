<?php

namespace Fickrr\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Users extends Model
{



     public static function getvendorData()
  {

    $value=DB::table('users')->where('user_type','=','vendor')->where('drop_status','=','no')->orderBy('id', 'desc')->get(); 
    return $value;
	
  }
   public static function getreferralData()
  {
    $value=DB::table('users')->where('id','>',1)->where('drop_status','=','no')->orderBy('id', 'desc')->get(); 
    return $value;
  }
  
}
