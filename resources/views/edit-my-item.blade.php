<div class="page-title-overlap pt-4" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{ URL::to('/') }}"><i class="dwg-home"></i>{{ Helper::translation(2862,$translate,'') }}</a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ Helper::translation(2935,$translate,'') }}</li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ $type_name->item_type_name }}</li>
              </li>
             </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0 text-white">{{ Helper::translation(2935,$translate,'') }} <span class="dwg-arrow-right"></span> {{ $type_name->item_type_name }}</h1>
        </div>
      </div>
    </div>
<div class="container mb-5 pb-3">
      <div class="bg-light box-shadow-lg rounded-lg overflow-hidden">
        <div class="row">
          <!-- Sidebar-->
          <aside class="col-lg-4">
            <!-- Account menu toggler (hidden on screens larger 992px)-->
            <div class="d-block d-lg-none p-4">
            <a class="btn btn-outline-accent d-block" href="#account-menu" data-toggle="collapse"><i class="dwg-menu mr-2"></i>{{ Helper::translation(4878,$translate,'') }}</a></div>
            <!-- Actual menu-->
            @if(Auth::user()->id != 1)
            @include('dashboard-menu')
            @endif
          </aside>
          <!-- Content-->
          <section class="col-lg-8 pt-lg-4 pb-4 mb-3">
            <div class="pt-2 px-4 pl-lg-0 pr-xl-5">
              <!-- Product-->
            
            <div class="row">
             <div class="col-sm-12 mb-1">
              <div class="alert alert-info alert-with-icon font-size-sm mb-4" role="alert">
                <div class="alert-icon-box"><i class="alert-icon dwg-announcement"></i></div> <b>{{ Helper::translation(2986,$translate,'') }}</b><br/>{{ Helper::translation(2987,$translate,'') }} {{ Helper::translation(2988,$translate,'') }}
              </div>
              </div>
              <div class="col-sm-12 mb-1">
              <div class="alert alert-info alert-with-icon font-size-sm mb-4" role="alert">
                <div class="alert-icon-box"><i class="alert-icon dwg-announcement"></i></div><b>{{ Helper::translation(2983,$translate,'') }} :</b> jpeg, jpg, png, webp<br/><b>{{ Helper::translation(2985,$translate,'') }} :</b> zip, mp3, mp4
                @if($addition_settings->subscription_mode == 1)
                <?php /*?>@if(Auth::user()->user_subscr_space_level == 'limited')<br/><span class="red-color"><b>{{ Helper::translation(6171,$translate,'') }} : </b>{{ Helper::formatSizeUnits(Helper::available_space(Auth::user()->id)) }}</span>@endif<?php */?>
                @endif 
              </div>
              </div>
              <div class="col-sm-12 mb-1">
              <h4 class="mt-4">{{ Helper::translation(2942,$translate,'') }} @if($demo_mode == 'on')<span class="require">- This is Demo version. So Maximum 1MB Allowed</span>@endif</h4>
              </div>
              <div class="col-sm-12 mb-1">
             <div class="form-group">
               <form action="{{route('fileupload')}}" class='dropzone' method="post" enctype="multipart/form-data">
               <input type="hidden" name="item_token" value="{{ $edit['item']->item_token }}">
               </form>
             </div>
             </div>
              </div>
              <form action="{{ route('edit-item') }}" class="setting_form" id="item_form" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div id="display_message"></div>
              <div class="row" id="hide_message">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(2943,$translate,'') }} <span class="require">*</span> ({{ Helper::translation(2946,$translate,'') }} : 80x80px)</label>
                 <select name="item_thumbnail1" id="item_thumbnail1" class="form-control" @if($edit['item']->item_thumbnail == '') data-bvalidator="required" @endif>
                      <option value=""></option>
                      @foreach($getdata1['first'] as $get)
                      <option value="{{ $get->item_file_name }}">{{ $get->original_file_name }}</option>
                      @endforeach
                      </select>
                      @if($edit['item']->item_thumbnail!='')
                      <img class="lazy" width="80" height="80" src="{{ Helper::Image_Path($edit['item']->item_thumbnail,'no-image.png') }}"  alt="{{ $edit['item']->item_name }}">
                      @else
                      <img class="lazy" width="80" height="80" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $edit['item']->item_name }}">
                      @endif
                  </div>
              </div> 
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(2945,$translate,'') }} <span class="require">*</span> ({{ Helper::translation(2946,$translate,'') }} : 700x447px)</label>
                  <select name="item_preview1" id="item_preview1" class="form-control" @if($edit['item']->item_preview == '') data-bvalidator="required" @endif>
                  <option value=""></option>
                  @foreach($getdata2['second'] as $get)
                  <option value="{{ $get->item_file_name }}">{{ $get->original_file_name }}</option>
                  @endforeach
                  </select>
                  @if($edit['item']->item_preview!='')
                  <img class="lazy" width="80" height="80" src="{{ Helper::Image_Path($edit['item']->item_preview,'no-image.png') }}"  alt="{{ $edit['item']->item_name }}">
                  @else
                  <img class="lazy" width="80" height="80" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $edit['item']->item_name }}">
                  @endif
                  </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation('61e66cc55b136',$translate,'Upload Main File Type') }} <span class="require">*</span></label>
                  <select name="file_type1" id="file_type1" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <option value="file" @if($edit['item']->file_type == 'file') selected @endif>{{ Helper::translation('61e66d264eeaa',$translate,'File') }}</option>
                  <option value="link" @if($edit['item']->file_type == 'link') selected @endif>{{ Helper::translation('61e66d59bef92',$translate,'Link/URL') }}</option>
                  </select>
                </div>
              </div>
              <div id="main_file" @if($edit['item']->file_type == 'file') class="col-sm-6 display-block" @else  class="col-sm-6 display-none" @endif>
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(2947,$translate,'') }} <span class="require">*</span> ({{ Helper::translation(2948,$translate,'') }} @if($addition_settings->subscription_mode == 1) @if(Auth::user()->user_subscr_space_level == 'limited')| {{ Helper::translation('61e66d8cbef92',$translate,'Max Size') }} : {{ Auth::user()->user_subscr_space }} {{ Auth::user()->user_subscr_space_type }} @endif @endif)</label>
                  <select name="item_file1" id="item_file1" class="form-control" @if($edit['item']->item_file == '') data-bvalidator="required" @endif>
                    <option value=""></option>
                    @foreach($getdata3['third'] as $get)
                    <option value="{{ $get->item_file_name }}">{{ $get->original_file_name }}</option>
                    @endforeach
                    </select>
                    <span class="require">{{ $edit['item']->item_file }}</span>
                 </div>
              </div>
              <div id="main_link" @if($edit['item']->file_type == 'link') class="col-sm-6 display-block" @else  class="col-sm-6 display-none" @endif>
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation('61e66dc96d321',$translate,'Main File Link/URL') }} <span class="require">*</span></label>
                  <input type="text" id="item_file_link1" name="item_file_link1" class="form-control" data-bvalidator="required,url" value="{{ $edit['item']->item_file_link }}">
                </div>
              </div>
              @if($additional->show_screenshots == 1)
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(2950,$translate,'') }} ({{ Helper::translation(2946,$translate,'') }} : 750x430px)</label>
                  <select id="item_screenshot1" name="item_screenshot[]" class="form-control" multiple>
                      @foreach($getdata4['four'] as $get)
                      <option value="{{ $get->item_file_name }}">{{ $get->original_file_name }}</option>
                      @endforeach
                      </select>
                      @foreach($item_image['item'] as $item)
                      <span class="item-img"><img class="lazy" width="80" height="80" src="{{ Helper::Image_Path($item->item_image,'no-image.png') }}"  alt="{{ $item->item_image }}">
                      <a href="{{ url('/edit-item') }}/dropimg/{{ base64_encode($item->itm_id) }}" onClick="return confirm('{{ Helper::translation(2892,$translate,'') }}');" class="drop-icon"><span class="dwg-trash drop-icon"></span></a>
                      </span>
                      @endforeach
                      <div class="clearfix"></div>
                 </div>
              </div>
              @endif
              @if($additional->show_video == 1)
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation('6188f9c6594e4',$translate,'Preview Type (optional)') }}</label>
                  <select name="video_preview_type1" id="video_preview_type1" class="form-control">
                  <option value=""></option>
                  <option value="youtube" @if($edit['item']->video_preview_type == 'youtube') selected @endif>{{ Helper::translation(5925,$translate,'') }}</option>
                  <option value="mp4" @if($edit['item']->video_preview_type == 'mp4') selected @endif>{{ Helper::translation(5928,$translate,'') }}</option>
                  <option value="mp3" @if($edit['item']->video_preview_type == 'mp3') selected @endif>{{ Helper::translation('6188fb1c98b9a',$translate,'MP3') }}</option>
                  </select>
                </div>
              </div>
              <div  id="youtube" @if($edit['item']->video_preview_type == 'youtube') class="col-sm-6 force-block" @else class="col-sm-6 force-none" @endif>
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(2967,$translate,'') }} <span class="require">*</span></label>
                  <input type="text" id="video_url1" name="video_url1" class="form-control" data-bvalidator="required" value="{{ $edit['item']->video_url }}">
                  <small>({{ Helper::translation(2968,$translate,'') }} : https://www.youtube.com/watch?v=C0DPdy98e4c)</small>
                </div>
              </div>
              <div  id="mp4" @if($edit['item']->video_preview_type == 'mp4') class="col-sm-6 force-block" @else class="col-sm-6 force-none" @endif>
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(5910,$translate,'') }} <span class="require">*</span> ({{ Helper::translation(5913,$translate,'') }} @if($addition_settings->subscription_mode == 1) @if(Auth::user()->user_subscr_space_level == 'limited')| {{ Helper::translation('61e66d8cbef92',$translate,'Max Size') }} : {{ Auth::user()->user_subscr_space }} {{ Auth::user()->user_subscr_space_type }} @endif @endif)</label>
                  <select id="video_file1" name="video_file1" class="form-control" @if($edit['item']->video_file == '') data-bvalidator="required" @endif>
                      <option value=""></option>
                      @foreach($getdata5['five'] as $get)
                      <option value="{{ $get->item_file_name }}">{{ $get->original_file_name }}</option>
                      @endforeach
                      </select>
                      <span class="require">{{ $edit['item']->video_file }}</span>
                </div>
              </div>
              <div  id="mp3" @if($edit['item']->video_preview_type == 'mp3') class="col-sm-6 force-block" @else class="col-sm-6 force-none" @endif>
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation('6188fbba9e728',$translate,'Upload MP3') }} <span class="require">*</span></label>
                  <select id="audio_file1" name="audio_file1" class="form-control" @if($edit['item']->audio_file == '') data-bvalidator="required" @endif>
                      <option value=""></option>
                      @foreach($getdata6['six'] as $get)
                      <option value="{{ $get->item_file_name }}">{{ $get->original_file_name }}</option>
                      @endforeach
                      </select>
                      <span class="require">{{ $edit['item']->audio_file }}</span>
                </div>
              </div>
              @endif
              </div>
              <div class="row">
              <div class="col-sm-12 mt-4 mb-1">
              <h4>{{ Helper::translation(2936,$translate,'') }}</h4>
              </div>
              <input type="hidden" name="item_type" value="{{ $edit['item']->item_type }}">
              <input type="hidden" name="type_id" value="{{ $edit['item']->item_type_id }}"> 
              <div class="col-sm-12">
                <div class="form-group">
                    <label for="preview_video" class="control-label mb-1">Preview Video<span class="require">*</span></label>
                    <input type="file" id="preview_video" name="preview_video" class="form-control-file" value="{{ $edit['item']->preview_video }}">
                    <span class="require">{{ $edit['item']->preview_video }}</span>
                </div>
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(2938,$translate,'') }} <span class="require">*</span> ({{ Helper::translation(2939,$translate,'') }})</label>
                  <input type="text" id="item_name" name="item_name" @if ($errors->has('item_name')) class="form-control border-color" @else class="form-control" @endif data-bvalidator="required,maxlen[100]" value="{{ $edit['item']->item_name }}">
                  @if ($errors->has('item_name'))
                  <span class="help-block">
                     <span class="red">{{ $errors->first('item_name') }}</span>
                  </span>
                 @endif
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(2940,$translate,'') }}</label>
                  <textarea name="item_shortdesc" rows="6"  class="form-control">{{ $edit['item']->item_shortdesc }}</textarea>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(2941,$translate,'') }} <span class="require">*</span></label>
                  <textarea name="item_desc" id="summary-ckeditor" rows="6"  @if ($errors->has('item_desc')) class="form-control border-color" @else class="form-control" @endif data-bvalidator="required">{{ html_entity_decode($edit['item']->item_desc) }}</textarea>
                  @if ($errors->has('item_desc'))
                  <span class="help-block">
                     <span class="red">{{ $errors->first('item_desc') }}</span>
                  </span>
                 @endif
                </div>
              </div>
              
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4">{{ Helper::translation(2951,$translate,'') }}</h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email">{{ Helper::translation(2952,$translate,'') }} <span class="require">*</span></label>
                  <select name="item_category" id="item_category" class="form-control" data-bvalidator="required">
                  <option value="">{{ Helper::translation(5931,$translate,'') }}</option>
                  @foreach($re_categories['menu'] as $menu)
                  <option value="category_{{ $menu->cat_id }}" @if($cat_name == 'category') @if($menu->cat_id == $cat_id) selected="selected" @endif @endif>{{ $menu->category_name }}</option>
                  @foreach($menu->subcategory as $sub_category)
                  <option value="subcategory_{{$sub_category->subcat_id}}" @if($cat_name == 'subcategory') @if($sub_category->subcat_id == $cat_id) selected="selected" @endif @endif> - {{ $sub_category->subcategory_name }}</option>
                  @endforeach  
                  @endforeach
                  </select>
                </div>
              </div>
              @if(count($attribute['fields']) != 0)
              @foreach($attri_field['display'] as $attribute_field)
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn">{{ $attribute_field->attr_label }} <span class="require">*</span></label>
                  @php 
                  $field_value=explode(',',$attribute_field->attr_field_value); 
                  $checkpackage=explode(',',$attribute_field->item_attribute_values);
                  @endphp
                  @if($attribute_field->attr_field_type == 'multi-select')
                  <div class="select-wrap select-wrap2">
                  <select  name="attributes_{{ $attribute_field->attr_id }}[]" class="form-control" multiple="multiple" data-bvalidator="required">
                  @foreach($field_value as $field)
                  <option value="{{ $field }}" @if(in_array($field,$checkpackage)) selected="selected" @endif>{{ $field }}</option>
                  @endforeach
                  </select>
                  </div>
                  @endif
                  @if($attribute_field->attr_field_type == 'single-select')
                  <div class="select-wrap select-wrap2">
                  <select name="attributes_{{ $attribute_field->attr_id }}[]" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  @foreach($field_value as $field)
                  <option value="{{ $field }}" @if($attribute_field->item_attribute_values == $field) selected @endif>{{ $field }}</option>
                  @endforeach
                  </select>
                  <span class="lnr lnr-chevron-down"></span>
                  </div>
                  @endif
                  @if($attribute_field->attr_field_type == 'textbox')
                  <input name="attributes_{{ $attribute_field->attr_id }}[]" type="text" class="form-control" data-bvalidator="required">
                  @endif
                </div>
              </div>
              @endforeach
              @else
              @foreach($attri_field['display'] as $attribute_field)
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn">{{ $attribute_field->attr_label }} <span class="require">*</span></label>
                  @php $field_value=explode(',',$attribute_field->attr_field_value); @endphp
                  @if($attribute_field->attr_field_type == 'multi-select')
                  <div class="select-wrap select-wrap2">
                  <select  name="attributes_{{ $attribute_field->attr_id }}[]" class="form-control" multiple="multiple" data-bvalidator="required">
                  @foreach($field_value as $field)
                  <option value="{{ $field }}">{{ $field }}</option>
                  @endforeach
                  </select>
                  </div>
                  @endif
                  @if($attribute_field->attr_field_type == 'single-select')
                  <div class="select-wrap select-wrap2">
                  <select name="attributes_{{ $attribute_field->attr_id }}[]" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  @foreach($field_value as $field)
                  <option value="{{ $field }}">{{ $field }}</option>
                  @endforeach
                  </select>
                  <span class="lnr lnr-chevron-down"></span>
                  </div>
                  @endif
                  @if($attribute_field->attr_field_type == 'textbox')
                  <input name="attributes_{{ $attribute_field->attr_id }}[]" type="text" class="form-control" data-bvalidator="required">
                  @endif
                </div>
              </div>
              @endforeach
              @endif
              @if($additional->show_moneyback == 1)
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(6240,$translate,'') }}? <span class="require">*</span></label>
                  <select name="seller_money_back" id="seller_money_back" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <option value="1" @if($edit['item']->seller_money_back == 1) selected @endif>{{ Helper::translation(2970,$translate,'') }}</option>
                  <option value="0" @if($edit['item']->seller_money_back == 0) selected @endif>{{ Helper::translation(2971,$translate,'') }}</option>
                  </select>
                </div>
              </div>
              <div id="back_money" @if($edit['item']->seller_money_back == 1) class="col-sm-6 display-block" @else  class="col-sm-6 display-none" @endif>
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(6243,$translate,'') }}?</label>
                  <input type="text" id="seller_money_back_days" name="seller_money_back_days" class="form-control" data-bvalidator="min[1]" value="{{ $edit['item']->seller_money_back_days }}">
                  <small>(days)</small>
                </div>
              </div>
              @else
              <input type="hidden" name="seller_money_back" value="0" />
              @endif
              @if($additional->show_refund_term == 1)
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(6237,$translate,'') }}</label>
                  <textarea name="seller_refund_term"  rows="6"  class="form-control">{{ $edit['item']->seller_refund_term }}</textarea>
                </div>
              </div>
              @else
              <input type="hidden" name="seller_refund_term" value="" />
              @endif
              @if($additional->show_demo_url == 1)
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(2966,$translate,'') }}</label>
                  <input type="text" id="demo_url" name="demo_url" class="form-control" data-bvalidator="url" value="{{ $edit['item']->demo_url }}">
                </div>
              </div>
              @endif
              @if($additional->show_flash_sale == 1)
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(2972,$translate,'') }}</label>
                  <select name="item_flash_request" id="item_flash_request" class="form-control">
                  <option value=""></option>
                  <option value="1" @if($edit['item']->item_flash_request == 1) selected="selected" @endif>{{ Helper::translation(2970,$translate,'') }}</option>
                  <option value="0" @if($edit['item']->item_flash_request == 0) selected="selected" @endif>{{ Helper::translation(2971,$translate,'') }}</option>
                  </select>
                  <small>({{ Helper::translation(2973,$translate,'') }})</small>
                </div>
              </div>
              @else
              <input type="hidden" name="item_flash_request" value="0" />
              @endif
              @if($additional->show_tags == 1)
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(2974,$translate,'') }}</label>
                  <textarea name="item_tags" id="item_tags" rows="6" class="form-control">{{ $edit['item']->item_tags }}</textarea>
                  <small>({{ Helper::translation(2975,$translate,'') }})</small>
                </div>
              </div>
              @endif
              @if($additional->show_feature_update == 1 || $additional->show_item_support == 1 || $additional->show_free_download == 1)
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4">{{ Helper::translation(2976,$translate,'') }}</h4>
              </div>
              @endif
              @if($additional->show_free_download == 1)
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(2969,$translate,'') }} <span class="require">*</span></label>
                  <select name="free_download" id="free_download" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <option value="1" @if($edit['item']->free_download == 1) selected="selected" @endif>{{ Helper::translation(2970,$translate,'') }}</option>
                  <option value="0" @if($edit['item']->free_download == 0) selected="selected" @endif>{{ Helper::translation(2971,$translate,'') }}</option>
                  </select>
                  <small>({{ Helper::translation("62ea50f8741c1",$translate,"if 'Yes' means all user will allowed free download this product") }})</small>
                </div>
              </div>
              @else
              <input type="hidden" name="free_download" value="0" />
              @endif
              @if($additional->show_feature_update == 1)
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(2977,$translate,'') }} <span class="require">*</span></label>
                  <select name="future_update" id="future_update" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <option value="1" @if($edit['item']->future_update == 1) selected="selected" @endif>{{ Helper::translation(2970,$translate,'') }}</option>
                  <option value="0" @if($edit['item']->future_update == 0) selected="selected" @endif>{{ Helper::translation(2971,$translate,'') }}</option>
                  </select>
                </div>
              </div>
              @else
              <input type="hidden" name="future_update" value="0" />
              @endif
              @if($additional->show_item_support == 1)
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(2978,$translate,'') }} <span class="require">*</span></label>
                  <select name="item_support" id="item_support" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <option value="1" @if($edit['item']->item_support == 1) selected="selected" @endif>{{ Helper::translation(2970,$translate,'') }}</option>
                  <option value="0" @if($edit['item']->item_support == 0) selected="selected" @endif>{{ Helper::translation(2971,$translate,'') }}</option>
                  </select>
                  <small>({{ Helper::translation('61e66efb5c81a',$translate,'If item support "YES" selected Regular license price must be entered') }})</small>
                </div>
              </div>
              @else
              <input type="hidden" name="item_support" value="0" />
              @endif
              @if($addition_settings->subscription_mode == 1)
              <div id="subscription_box" @if($edit['item']->item_support == 1) class="col-sm-6 display-block" @else  class="col-sm-6 display-none" @endif>
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation('62ea38a0b2564',$translate,'Subscription Item') }}? <span class="require">*</span></label>
                  <select name="subscription_item" id="subscription_item" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <option value="1" @if($edit['item']->subscription_item == 1) selected="selected" @endif>{{ Helper::translation(2970,$translate,'') }}</option>
                  <option value="0" @if($edit['item']->subscription_item == 0) selected="selected" @endif>{{ Helper::translation(2971,$translate,'') }}</option>
                  </select>
                  <small>({{ Helper::translation("62ea3b96bf363",$translate,"if 'Yes' means subscription user will allowed free download this product") }})</small>
                </div>
              </div>
              @else
              <input type="hidden" name="subscription_item" value="0" />
              @endif
              <div class="col-sm-12 mt-4 mb-1">
              <h4 class="mt-4">{{ Helper::translation('61e66f5c17d78',$translate,'Seo') }}</h4>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(6384,$translate,'') }}? <span class="require">*</span></label>
                  <select name="item_allow_seo" id="page_allow_seo" class="form-control" data-bvalidator="required">
                  <option value=""></option>
                  <option value="1" @if($edit['item']->item_allow_seo == 1) selected="selected" @endif>{{ Helper::translation(2970,$translate,'') }}</option>
                  <option value="0" @if($edit['item']->item_allow_seo == 0) selected="selected" @endif>{{ Helper::translation(2971,$translate,'') }}</option>
                  </select>
                </div>
              </div>
              <div id="ifseo1" @if($edit['item']->item_allow_seo == 1) class="col-sm-6 mt-4 mb-1 display-block" @else  class="col-sm-6 mt-4 mb-1 display-none" @endif>
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(6387,$translate,'') }} ({{ Helper::translation(6390,$translate,'') }}) <span class="require">*</span></label>
                  <textarea name="item_seo_keyword" id="page_seo_keyword" rows="6" class="form-control" data-bvalidator="required">{{ $edit['item']->item_seo_keyword }}</textarea>
                </div>
              </div>
              <div id="ifseo2" @if($edit['item']->item_allow_seo == 1) class="col-sm-6 mt-4 mb-1 display-block" @else  class="col-sm-6 mt-4 mb-1 display-none" @endif>
                <div class="form-group">
                  <label for="account-fn">{{ Helper::translation(6393,$translate,'') }} ({{ Helper::translation(6390,$translate,'') }}) <span class="require">*</span></label>
                  <textarea name="item_seo_desc" id="page_seo_desc" rows="6" class="form-control" data-bvalidator="required">{{ $edit['item']->item_seo_desc }}</textarea>
                </div>
              </div>
              <div id="pricebox" @if($edit['item']->item_support == 1) class="col-sm-12 mt-4 mb-1 display-block" @else  class="col-sm-12 mt-4 mb-1 display-none" @endif>
              <h4 class="mt-4">{{ Helper::translation(2888,$translate,'') }}</h4>
              </div>
              <div id="pricebox_left" @if($edit['item']->item_support == 1) class="col-sm-6 mb-1 display-block" @else  class="col-sm-6 mb-1 display-none" @endif>
                    <label class="font-weight-medium" for="unp-standard-price">{{ Helper::translation(3072,$translate,'') }} ({{ $additional->regular_license }} {{ Helper::translation(3055,$translate,'') }}) <span class="require">*</span></label>
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text">{{ $allsettings->site_currency }}</span></div>
                      <input type="text" id="regular_price" name="regular_price" class="form-control" data-bvalidator="digit,min[1],required" value="{{ $edit['item']->regular_price }}">
                    </div>
              </div>
              @if($additional->show_extended_license == 1)
              <div id="pricebox_right" @if($edit['item']->item_support == 1) class="col-sm-6 mb-1 display-block" @else  class="col-sm-6 mb-1 display-none" @endif>
                    <label class="font-weight-medium" for="unp-standard-price">{{ Helper::translation(3073,$translate,'') }} ({{ $additional->extended_license }} {{ Helper::translation(3055,$translate,'') }})</label>
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text">{{ $allsettings->site_currency }}</span></div>
                      <input type="text" id="extended_price" name="extended_price" class="form-control" data-bvalidator="digit,min[1]" value="@if($edit['item']->extended_price==0) @else {{ $edit['item']->extended_price }} @endif">
                    </div>
              </div>
              @else
              <input type="hidden" name="extended_price" value="0">
              @endif 
              <input type="hidden" name="save_file" value="{{ $edit['item']->item_file }}">
              <input type="hidden" name="save_thumbnail" value="{{ $edit['item']->item_thumbnail }}">
              <input type="hidden" name="save_preview" value="{{ $edit['item']->item_preview }}">
              <input type="hidden" name="save_extended_price" value="{{ $edit['item']->extended_price }}">
              <input type="hidden" name="item_token" value="{{ $edit['item']->item_token }}">
              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
              <input type="hidden" name="save_video_file" value="{{ $edit['item']->video_file }}">
              <input type="hidden" name="save_audio_file" value="{{ $edit['item']->audio_file }}">
              <input type="hidden" name="save_file_type" value="{{ $edit['item']->file_type }}">
              <input type="hidden" name="save_video_preview_type" value="{{ $edit['item']->video_preview_type }}">
              <input type="hidden" name="save_video_url" value="{{ $edit['item']->video_url }}">  
              <div class="col-12 pt-3 mt-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                @if($allsettings->item_approval == 0)
                <button class="btn btn-primary btn-block" type="submit"><i class="dwg-cloud-upload font-size-lg mr-2"></i>{{ Helper::translation(2981,$translate,'') }}</button>
                @else
                <button class="btn btn-primary btn-block" type="submit"><i class="dwg-cloud-upload font-size-lg mr-2"></i>{{ Helper::translation(2876,$translate,'') }}</button>
                @endif
                </div>
              </div>
            </div>
          </form>  
            </div>
          </section>
        </div>
      </div>
    </div>