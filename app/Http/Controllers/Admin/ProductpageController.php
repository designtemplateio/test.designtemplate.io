<?php

namespace Fickrr\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Fickrr\Models\Settings;
use Fickrr\Models\Members;
use Fickrr\Models\ProductPages;
use Fickrr\Models\Items;
use Fickrr\Models\Attribute;
use Fickrr\Models\Category;
use Fickrr\Models\ProcuctPageCategory;
use Fickrr\Models\Languages;
use Fickrr\Models\EmailTemplate;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
/*use Intervention\Image\Image;*/
use Illuminate\Support\Facades\File;
use Fickrr\Http\Controllers\Controller;
use Auth;
use Mail;
use URL;
use Image;
use Storage;
use Illuminate\Support\Str;
use Session;
use Carbon\Carbon;
use DataTables;
use Cookie;

class ProductpageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	public function view_product_page()
	{
	  $itemData['item'] = ProductPages::getproductPage();
	  $viewitem['type'] = Items::gettypeItem();
	  $encrypter = app('Illuminate\Contracts\Encryption\Encrypter');
	  $search = "";
	  $data = array('itemData' => $itemData, 'viewitem' => $viewitem, 'encrypter' => $encrypter, 'search' => $search);
	  return view('admin.product-page')->with($data);
	}
	
	public function upload_product_page($itemtype)
    {
	    $type_id   = 2;
		$session_id = Session::getId();
// 		$getdata1['first'] = ProductPages::getProdutData($session_id);
// 	    $getdata2['second'] = ProductPages::getProdutData($session_id);
        $getdata1['first']=1;
        $getdata2['second']=2;
		$itemWell['type'] = Items::gettypeItem(); 
		$type_name = Items::viewItemtype($type_id);
		$category['menu'] = ProcuctPageCategory::getsubcategoryData();
		$item_token = "";
		$data = array('category' => $category, 'itemWell' => $itemWell, 'type_id' => $type_id, 'type_name' => $type_name, 'getdata1' => $getdata1, 'getdata2' => $getdata2, 'item_token' => $item_token);

        return view('admin.upload-product-page')->with($data);
    }
    
    
    public function save_product_page(Request $request)
    {
// 	  return $request;
	   $heading = $request->input('heading_name');
	   $heading_desc = $request->input('heading_para_text');
	   $additional['settings'] = Settings::editAdditional();
	   
	   $item_category = $request->input('item_category');
       $split = explode("_", $item_category);
         
       $cat_id = $split[1];
	   $cat_name = $split[0];
	   if($cat_name == 'subcategory')
	   {
	      $fet = ProcuctPageCategory::editsubcategoryData($cat_id);
		  $category = $fet->cat_id;
	   }
	   else
	   {
	      $category = $cat_id;
	   }
	   
	   $item_type = $request->input('item_type');
	   $type_id = $request->input('type_id');
	   $sub_heading = $request->input('subheading_name');
	   $subheading_desc = $request->input('subheading_para_text');
	   $para_heading = $request->input('para_heading');
	   $para_desc = htmlentities($request->input('para_desc'));
	   
	   $faq1 = $request->input('faq1');
	   $answer1 = $request->input('answer1');
	   $faq2 = $request->input('faq2');
	   $answer2 = $request->input('answer2');
	   $faq3 = $request->input('faq3');
	   $answer3 = $request->input('answer3');
	   $created_item = date('Y-m-d H:i:s');
	   $updated_item = date('Y-m-d H:i:s');
	     
	   
	   $allsettings = Settings::allSettings();
	   $image_size = $allsettings->site_max_image_size;
	   
	   
	   
	   
	   if(!empty($request->input('banner_image1')))
	   {
	       
	        $image = $request->file('banner_image1');
			$img_name = $image->getClientOriginalName();
			$destinationPath = public_path('/storage/product_page');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$img=Image::make(public_path('/storage/product_page/'.$img_name));
			$img->save(base_path('public/storage/product_page/'.$img_name));
			$banner_image1 = $img_name;
		  
	   }
	   else
	   {
		 $banner_image1 = "";
	   }
	   if(!empty($request->input('banner_image2')))
	   {
		  $image = $request->file('banner_image2');
			$img_name = $image->getClientOriginalName();
			$destinationPath = public_path('/storage/product_page');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$img=Image::make(public_path('/storage/product_page/'.$img_name));
			$img->save(base_path('public/storage/product_page/'.$img_name));
			$banner_image2 = $img_name;
	   }
	   else
	   {
		 $banner_image2 = "";
	   }
	   
	   if(!empty($request->input('product_image1')))
	   {
	       
	        $image = $request->file('product_image1');
			$img_name = $image->getClientOriginalName();
			$destinationPath = public_path('/storage/product_page');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$img=Image::make(public_path('/storage/product_page/'.$img_name));
			$img->save(base_path('public/storage/product_page/'.$img_name));
			$product_image1 = $img_name;
		  
	   }
	   else
	   {
		 $product_image1 = "";
	   }
	   if(!empty($request->input('product_image2')))
	   {
		    $image = $request->file('product_image2');
			$img_name = $image->getClientOriginalName();
			$destinationPath = public_path('/storage/product_page');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$img=Image::make(public_path('/storage/product_page/'.$img_name));
			$img->save(base_path('public/storage/product_page/'.$img_name));
			$product_image2 = $img_name;
	   }
	   else
	   {
		 $product_image2 = "";
	   }
		
		
		 $rules = array(
				
				// 'item_name' => ['required', 'max:100', Rule::unique('items') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				
				
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
		 
		     $data = array('heading' => $heading, 'heading_desc' => $heading_desc,'sub_heading' => $sub_heading, 'subheading_desc' => $subheading_desc, 'para_heading' => $para_heading, 'para_desc' => $para_desc,  'category_type' =>$cat_name, 'subcategory' => $cat_id, 'category' => $category, 'item_type' => $item_type, 'item_type_id' => $type_id, 'faq1' => $faq1, 'answer1' => $answer1, 'faq2' => $faq2, 'answer2' => $answer2, 'faq3' => $faq3, 'answer3' => $answer3, 'created_item' => $created_item, 'updated_item' => $updated_item, 'banner_image1' => $banner_image1, 'banner_image2' => $banner_image2, 'product_image1' => $product_image1, 'product_image2' => $product_image2);
			
		     ProductPages::saveProductpageData($data);
		
			return redirect('/admin/product-page')->with('success', 'Inserted successfully');
		
		}	
		
    }
    
    
    public function edit_product_page($id)
	{
	   // return $id;
	    $type_id   = 2;
	    $edit['post'] = ProductPages::editProductpageData($id);
	    $category['menu'] = ProcuctPageCategory::getsubcategoryData();
	    $type_name = Items::viewItemtype($type_id);
	   return view('admin.edit_product_page', [ 'edit' => $edit, 'id' => $id, 'category' => $category, 'type_name' => $type_name,'type_id' => $type_id]);
	}
	
	
	
	public function update_product_page(Request $request)
	{
	   //return $request;
	   $heading = $request->input('heading');
	   $id = $request->input('id');
	   $heading_desc = $request->input('heading_desc');
	   $additional['settings'] = Settings::editAdditional();
	   
	   $item_category = $request->input('item_category');
       $split = explode("_", $item_category);
         
       $cat_id = $split[1];
	   $cat_name = $split[0];
	   if($cat_name == 'subcategory')
	   {
	      $fet = ProcuctPageCategory::editsubcategoryData($cat_id);
		  $category = $fet->cat_id;
	   }
	   else
	   {
	      $category = $cat_id;
	   }
	   
	   $item_type = $request->input('category_type');
	   $type_id = $request->input('item_type_id');
	   $sub_heading = $request->input('sub_heading');
	   $subheading_desc = $request->input('subheading_desc');
	   $para_heading = $request->input('para_heading');
	   $para_desc = htmlentities($request->input('para_desc'));
	   
	   $banner_image1 = $request->input('banner_image1');
	   $banner_image2 = $request->input('banner_image2');
	   $product_image1 = $request->input('product_image1');
	   $product_image2 = $request->input('product_image2');
	   
	   $faq1 = $request->input('faq1');
	   $answer1 = $request->input('answer1');
	   $faq2 = $request->input('faq2');
	   $answer2 = $request->input('answer2');
	   $faq3 = $request->input('faq3');
	   $answer3 = $request->input('answer3');
	   $created_item = $request->input('created_item');
	   $updated_item = date('Y-m-d H:i:s');
	     
	   
	   $allsettings = Settings::allSettings();
	   $image_size = $allsettings->site_max_image_size;
	   
	   
	   
	   
	   if($request->hasFile('banner_image1'))
	   {
	        ProductPages::dropbanner_image1($id);	   
	        $image = $request->file('banner_image1');
			$img_name = $image->getClientOriginalName();
			$destinationPath = public_path('/storage/product_page');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$img=Image::make(public_path('/storage/product_page/'.$img_name));
			$img->save(base_path('public/storage/product_page/'.$img_name));
			$banner_image1 = $img_name;
		  
	   }
	   else
	   {
		  $banner_image1 = $request->input('banner_image1');
	   }
	   if($request->hasFile('banner_image2'))
	   {
	       ProductPages::dropbanner_image2($id);
		    $image = $request->file('banner_image2');
			$img_name = $image->getClientOriginalName();
			$destinationPath = public_path('/storage/product_page');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$img=Image::make(public_path('/storage/product_page/'.$img_name));
			$img->save(base_path('public/storage/product_page/'.$img_name));
			$banner_image2 = $img_name;
	   }
	   else
	   {
	      
		  $banner_image2 = $request->input('banner_image2');
	   }
	   
	   if($request->hasFile('product_image1'))
	   {
	        ProductPages::dropproduct_image1($id);
	        $image = $request->file('product_image1');
			$img_name = $image->getClientOriginalName();
			$destinationPath = public_path('/storage/product_page');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$img=Image::make(public_path('/storage/product_page/'.$img_name));
			$img->save(base_path('public/storage/product_page/'.$img_name));
			$product_image1 = $img_name;
		  
	   }
	   else
	   {
		 $product_image1 = $request->input('product_image1');
	   }
	   if($request->hasFile('product_image2'))
	   {
	       ProductPages::dropproduct_image2($id);
		    $image = $request->file('product_image2');
			$img_name = $image->getClientOriginalName();
			$destinationPath = public_path('/storage/product_page');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$img=Image::make(public_path('/storage/product_page/'.$img_name));
			$img->save(base_path('public/storage/product_page/'.$img_name));
			$product_image2 = $img_name;
	   }
	   else
	   {
		 $product_image2 = $request->input('product_image2');
	   }
		
		
		 $rules = array(
				
				// 'item_name' => ['required', 'max:100', Rule::unique('items') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				
				
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
		 
		    $data = array('heading' => $heading, 'heading_desc' => $heading_desc,'sub_heading' => $sub_heading, 'subheading_desc' => $subheading_desc, 'para_heading' => $para_heading, 'para_desc' => $para_desc, 'category_type' =>$cat_name, 'subcategory' => $cat_id, 'category' => $category, 'item_type' => $item_type, 'item_type_id' => $type_id, 'faq1' => $faq1, 'answer1' => $answer1, 'faq2' => $faq2, 'answer2' => $answer2, 'faq3' => $faq3, 'answer3' => $answer3, 'created_item' => $created_item, 'updated_item' => $updated_item, 'banner_image1' => $banner_image1, 'banner_image2' => $banner_image2, 'product_image1' => $product_image1, 'product_image2' => $product_image2);
			
		    ProductPages::updateProductpageData($id, $data);
		
			return redirect('/admin/product-page')->with('success', 'Updated successfully');
		
		}	
	   
 
       } 
       
       
      public function delete_productPage($id){
         
       ProductPages::deleteProductpageData($id);
	  
	  return redirect()->back()->with('success', 'Delete successfully.');

    
  }
     
       
	
	
	
    
}