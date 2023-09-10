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

class ProductPages extends Model
{
    
	/* items */
  protected $table = 'product_pages';
  
  public static function getItemType()
  {
    
    $value=DB::table('product_page_category')->where('drop_status','=','no')->orderBy('cat_id', 'asc')->get(); 
    return $value;
	
  }	
  
   public static function getproductPage()
  {
    $sid = 1;
	$setting['setting'] = Settings::editGeneral($sid);
	$site_item_per_page = $setting['setting']->site_item_per_page;
    $value=DB::table('product_pages')->select('product_pages.id','product_pages.heading','product_pages.heading_slug','product_pages.heading_desc','product_pages.sub_heading','product_pages.subheading_desc','product_pages.para_heading','product_pages.para_desc','product_pages.banner_image1','product_pages.banner_image2','product_pages.product_image1','product_pages.product_image2','product_pages.faq1','product_pages.answer1','product_pages.faq2','product_pages.answer2','product_pages.faq3','product_pages.answer3','product_pages.drop_status')->orderBy('product_pages.id', 'desc')->paginate($site_item_per_page); 
    return $value;
	
  }	
 
 public static function saveProductpageData($data)
  {
   
      DB::table('product_pages')->insert($data);
 
  }
  
  public static function editProductpageData($id)
  {
    $value = DB::table('product_pages')
      ->where('id', $id)
      ->first();
	return $value;
  }
  
  public static function updateProductpageData($id,$data){
    DB::table('product_pages')
      ->where('id', $id)
      ->update($data);
  }
  
  public static function deleteProductpageData($id){
  
    $image = DB::table('product_pages')->where('id', '=', $id)->first();
    $file1= $image->banner_image1;
    $filename1 = public_path().'/storage/product_page/'.$file1;
    File::delete($filename1);
    
    $file2= $image->banner_image2;
    $filename2 = public_path().'/storage/product_page/'.$file2;
    File::delete($filename2);
    
    $file3= $image->product_image1;
    $filename3 = public_path().'/storage/product_page/'.$file3;
    File::delete($filename3);
    
    $file4= $image->product_image2;
    $filename4 = public_path().'/storage/product_page/'.$file4;
    File::delete($filename4);
    
	DB::table('product_pages')->where('id', '=', $id)->delete();	
	
	
  }	
  
  public static function dropbanner_image1($id)
	  {
		   $image = DB::table('product_pages')->where('id', $id)->first();
			$file= $image->banner_image1;
			$filename = public_path().'/storage/product_page/'.$file;
			File::delete($filename);
	  }
    
    public static function dropbanner_image2($id)
	  {
		   $image = DB::table('product_pages')->where('id', $id)->first();
			$file= $image->banner_image2;
			$filename = public_path().'/storage/product_page/'.$file;
			File::delete($filename);
	  }
	  
	  public static function dropproduct_image1($id)
	  {
		   $image = DB::table('product_pages')->where('id', $id)->first();
			$file= $image->product_image1;
			$filename = public_path().'/storage/product_page/'.$file;
			File::delete($filename);
	  }
    
    public static function dropproduct_image2($id)
	  {
		    $image = DB::table('product_pages')->where('id', $id)->first();
			$file= $image->product_image2;
			$filename = public_path().'/storage/product_page/'.$file;
			File::delete($filename);
	  }
  
}
