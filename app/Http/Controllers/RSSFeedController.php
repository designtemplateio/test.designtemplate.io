<?php
  
namespace Fickrr\Http\Controllers;
  
use Illuminate\Http\Request;
use Fickrr\Models\Items;
  
class RSSFeedController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function illustration()
    {
        $items = Items::where('items.item_status','=',1)->where('items.item_id','>',9650)->where('items.item_type','=','Graphics-Design')->orderBy('created_item', 'desc')->get();
  
        return response()->view('rss', [
            'items' => $items
        ])->header('Content-Type', 'text/xml');
    }
   public function all()
    {
        $items = Items::where('items.item_status','=',1)->where('items.item_id','>',9000)->orderBy('created_item', 'desc')->get();
  
        return response()->view('rss', [
            'items' => $items
        ])->header('Content-Type', 'text/xml');
    }
    
}