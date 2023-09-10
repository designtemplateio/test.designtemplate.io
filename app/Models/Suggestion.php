<?php

namespace Fickrr\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Fickrr\Models\Settings;

class Suggestion extends Model
{
   protected $table = 'suggestion_box'; 
    
  public static function saveSuggestionData($data){
   
      DB::table('suggestion_box')->insert($data);
     
 
    }
    
     public static function getSuggestionData()
  {

    $value=DB::table('suggestion_box')->join('users','users.id','suggestion_box.user_id')->orderBy('suggestion_box.sug_id', 'desc')->get(); 
    return $value;
	
  }	
  
    
}