<?php

namespace Fickrr\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Fickrr\Models\Settings;

class ProcuctPageCategory extends Model
{
    
	/* category */
	
	protected $table = 'product_page_category';
	
	
  public static function getsinglecatData($item_cat_id)
  {

    $value=DB::table('product_page_category')->where('cat_id','=',$item_cat_id)->first(); 
    return $value;
	
  }	
	
   public static function getcategorysingle($slug)
  {

    $value=DB::table('product_page_category')->where('category_slug','=',$slug)->first(); 
    return $value;
	
  }		
  
  public static function getcategoryCheck($slug)
  {

    $get=DB::table('product_page_category')->where('category_slug','=',$slug)->get(); 
    $value = $get->count(); 
	return $value;
	
  }	
	
  public static function getsubcategorysingle($slug)
  {

    $value=DB::table('product_page_subcategory')->where('subcategory_slug','=',$slug)->where('subcategory_status','=',1)->where('drop_status','=','no')->first(); 
    return $value;
	
  }		
  
  public static function getsubcategoryCheck($slug)
  {

    $get=DB::table('product_page_subcategory')->where('subcategory_slug','=',$slug)->where('subcategory_status','=',1)->where('drop_status','=','no')->get(); 
    $value = $get->count(); 
	return $value;
	
  }	
	
  
  public static function getcategoryData()
  {

    $value=DB::table('product_page_category')->where('drop_status','=','no')->orderBy('cat_id', 'desc')->get(); 
    return $value;
	
  }
  
  public static function footercategoryData()
  {
    $sid = 1;
	$setting['setting'] = Settings::editGeneral($sid);
    $value=DB::table('product_page_category')->where('drop_status','=','no')->where('category_status','=',1)->orderBy('menu_order',$setting['setting']->footer_menu_categories_order)->take($setting['setting']->footer_menu_display_categories)->get(); 
    return $value;
	
  }
  
  
  public static function insertcategoryData($data){
   
      DB::table('product_page_category')->insert($data);
     
 
    }
  
  public static function deleteCategorydata($cat_id,$data){
    
	
	DB::table('product_page_subcategory')
      ->where('cat_id', $cat_id)
      ->update($data);
		
	DB::table('product_page_category')
      ->where('cat_id', $cat_id)
      ->update($data);
	
  }
  
  
  public static function editcategoryData($cat_id){
    $value = DB::table('product_page_category')
      ->where('cat_id', $cat_id)
      ->first();
	return $value;
  }
  
  
  public static function updatecategoryData($cat_id,$data){
    DB::table('product_page_category')
      ->where('cat_id', $cat_id)
      ->update($data);
  }
  
  
  
  
  /* category */
  
  
  
  /* subcategory */
  
  
  
  public static function getsubcategoryData()
  {

    $value=DB::table('product_page_subcategory')->leftJoin('product_page_category','product_page_category.cat_id','=','product_page_subcategory.cat_id')->where('product_page_subcategory.drop_status','=','no')->orderBy('product_page_subcategory.subcat_id', 'desc')->get(); 
    return $value;
	
  }
  
  
  public static function allcategoryData()
  {

    $value=DB::table('product_page_category')->where('drop_status','=','no')->where('category_status','=','1')->orderBy('cat_id', 'desc')->get(); 
    return $value;
	
  }
  
  
  public static function menucategoryData()
  {

    $value=DB::table('product_page_category')->where('drop_status','=','no')->where('category_status','=','1')->orderBy('cat_id', 'asc')->get(); 
    return $value;
	
  }
  
  
  /* menu */
  
    
    public function SubCategory()
    {
        return $this->hasMany(SubCategory::class, 'cat_id', 'cat_id')->where('drop_status', 'no')->orderBy('subcategory_order', 'asc');
    }
  
  /* menu */
  
  public static function insertsubcategoryData($data){
   
      DB::table('product_page_subcategory')->insert($data);
     
 
    }
	
	
    public static function deleteSubcategorydata($subcat_id,$data){
    
		
	DB::table('product_page_subcategory')
      ->where('subcat_id', $subcat_id)
      ->update($data);
	
  }	
  
  
  
  public static function editsubcategoryData($subcat_id){
    $value = DB::table('product_page_subcategory')
      ->where('subcat_id', $subcat_id)
      ->first();
	return $value;
  }
  
  
  
  public static function updatesubcategoryData($subcat_id,$data){
    DB::table('product_page_subcategory')
      ->where('subcat_id', $subcat_id)
      ->update($data);
  }
	
  /* subcategory */	
	
	
  /* homepage new product*/
  
  public static function homecategoryData($category_limit)
  {

    $value=DB::table('product_page_category')->where('drop_status','=','no')->where('category_status','=',1)->orderBy('cat_id', 'desc')->take($category_limit)->get(); 
    return $value;
	
  }
  
  	
  /* homepage new product*/
  
  
  
  
}
