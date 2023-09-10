<?php

namespace Fickrr\Http\Controllers;

use Illuminate\Http\Request;
use Fickrr\Models\Members;
use Fickrr\Models\Settings;
use Fickrr\Models\Items;
use Fickrr\Models\Blog;
use Fickrr\Models\Category;
use Fickrr\Models\Comment;
use Fickrr\Models\Pages;
use Fickrr\Models\Attribute;
use Fickrr\Models\ProductPages;
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


class ProductpageController extends Controller
{
    public function view_product_page($type,$slug)	
    {
    //   return $slug;
      $today = date("Y-m-d");
      $pageData['item'] = ProductPages::getproductPage()->where('heading_slug', $slug);
    //   return $itemData['item'] = Items::getentireItem()->where('items.item_tags', 'LIKE', "%$slug%");
      $itemData['item'] = Items::with('ratings')
			                            ->select('items.item_id','items.item_liked','items.item_slug','items.item_preview','items.item_name','items.item_desc','items.item_shortdesc','items.item_tags','items.item_featured','items.item_type','users.user_photo','users.username','users.user_document_verified','items.updated_item','items.item_sold','items.free_download','items.item_flash','items.regular_price','items.item_token','items.preview_video') 
							            ->leftjoin('users', 'users.id', '=', 'items.user_id')
							            ->where('users.user_subscr_date','>=',$today)
							            ->where('users.user_subscr_payment_status','=','completed')
							            ->where('items.item_status','=',1)
							            ->where('items.drop_status','=','no')
							            ->where('items.item_tags', 'LIKE', "%$slug%")
							            ->orderBy('items.updated_item', 'asc')->paginate(8);
      $data = array('itemData' => $itemData, 'pageData' => $pageData, 'slug' => $slug);
	  return view('product-page')->with($data);
	}
	
    
}