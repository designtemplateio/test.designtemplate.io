<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    
    @include('admin.stylesheet')
</head>

<body>
    
    @include('admin.navigation')

    <!-- Right Panel -->
    @if(in_array('items',$avilable))
    <div id="right-panel" class="right-panel">

        
                       @include('admin.header')
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ Helper::translation(2935,$translate,'') }} - {{ $type_name->item_type_name }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
                </div>
            </div>
        </div>
        
        @if (session('success'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif


@if ($errors->any())
    <div class="col-sm-12">
     <div class="alert  alert-danger alert-dismissible fade show" role="alert">
     @foreach ($errors->all() as $error)
      
         {{$error}}
      
     @endforeach
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
     </div>
    </div>   
 @endif
       
       <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                       
                       <div class="card">
                       
                          <div class="col-md-12">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                          <div class="form-group">
                                            <label for="name" class="control-label mb-1">{{ Helper::translation(3003,$translate,'') }} @if($demo_mode == 'on')<span class="require">- This is Demo version. So Maximum 1MB Allowed</span>@endif</label>
                                            <form action="{{route('admin.fileupload')}}" class='dropzone' enctype="multipart/form-data">
                                            <input type="hidden" name="item_token" value="{{ $edit['item']->item_token }}">
                                            </form>
                                            <label class="control-label mb-1">{{ Helper::translation('62a1dc02c7516',$translate,'Allowed Files') }} (jpeg, jpg, png, webp, zip, mp3, mp4)</label>
                                            </div>
                                          </div>
                                     </div>
                                 </div>
                             </div>
                       
                           @if($demo_mode == 'on')
                           @include('admin.demo-mode')
                           @else
                           <form action="{{ route('admin.edit-item') }}" class="setting_form" id="item_form" method="post" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           @endif
                          
                           
                             <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        <?php /*?><div class="form-group">
                                                <label for="name" class="control-label mb-1">Item Type <span class="require">*</span></label>
                                               
                                                <select name="item_type" id="item_type" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                   @foreach($getWell['type'] as $value)
                                                    
                                                    <option value="{{ $value->item_type_slug }}" @if($edit['item']->item_type == $value->item_type_slug) selected="selected" @endif>{{ $value->item_type_name }}</option>
                                                   @endforeach 
                                                </select>
                                            </div><?php */?>
                                            
                                             <input type="hidden" name="item_type" value="{{ $edit['item']->item_type }}">
                                            <input type="hidden" name="type_id" value="{{ $edit['item']->item_type_id }}">
                                            <div class="form-group">
                                                <label for="preview_video" class="control-label mb-1">Preview Video<span class="require">*</span></label>
                                                <input type="file" id="preview_video" name="preview_video" class="form-control-file" value="{{ $edit['item']->preview_video }}">
                                                <span class="require">{{ $edit['item']->preview_video }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">{{ Helper::translation(2938,$translate,'') }}<span class="require">*</span></label>
                                               <input type="text" id="item_name" name="item_name" class="form-control" value="{{ $edit['item']->item_name }}" data-bvalidator="required,maxlen[100]"> 
                                            
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">{{ Helper::translation(2940,$translate,'') }}<span class="require">*</span></label>
                                                <textarea name="item_shortdesc" rows="6"  class="form-control" data-bvalidator="required">{{ $edit['item']->item_shortdesc }}</textarea>
                                            
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">{{ Helper::translation(2941,$translate,'') }}<span class="require">*</span></label>
                                                <textarea name="item_desc" id="summary-ckeditor" rows="6"  class="form-control" data-bvalidator="required">{{ html_entity_decode($edit['item']->item_desc) }}</textarea>
                                            
                                                   @php
                                                   $string = html_entity_decode($edit['item']->item_desc);
                                             $string = strip_tags($string);
                                             $string = preg_replace('/[^[:alnum:]]/', ' ', $string);
                                             $count = str_word_count($string);
                                             echo 'word Count is: ';
                                             echo $count;
                                                    @endphp
       
                                            </div>
                                            
                                           @if($additional->show_tags == 1)
                                           <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">{{ Helper::translation(2974,$translate,'') }}</label>
                                                <textarea name="item_tags" id="item_tags" class="form-control">{{ $edit['item']->item_tags }}</textarea>
                                                <small>({{ Helper::translation(2975,$translate,'') }})</small>
                                            
                                            </div> 
                                            @endif
                                            @if($additional->show_feature_update == 1)
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">{{ Helper::translation(2977,$translate,'') }}<span class="require">*</span></label>
                                                <select name="future_update" id="future_update" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="1" @if($edit['item']->future_update == 1) selected="selected" @endif>{{ Helper::translation(2970,$translate,'') }}</option>
                                                    <option value="0" @if($edit['item']->future_update == 0) selected="selected" @endif>{{ Helper::translation(2971,$translate,'') }}</option>
                                                </select>
                                               
                                            </div>  
                                            @else
                                            <input type="hidden" name="future_update" value="0" />
                                            @endif
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">{{ Helper::translation(2952,$translate,'') }} <span class="require">*</span></label>
                                               <select name="item_category" id="item_category" class="form-control" data-bvalidator="required">
                                            <option value="">Select</option>
                                            @foreach($re_categories['menu'] as $menu)
                                                
                                                <option value="category_{{ $menu->cat_id }}" @if($cat_name == 'category') @if($menu->cat_id == $cat_id) selected="selected" @endif @endif>{{ $menu->category_name }}</option>
                                                @foreach($menu->subcategory as $sub_category)
                                                <option value="subcategory_{{$sub_category->subcat_id}}" @if($cat_name == 'subcategory') @if($sub_category->subcat_id == $cat_id) selected="selected" @endif @endif> - {{ $sub_category->subcategory_name }}</option>
                                                @endforeach  
                                            @endforeach
                                            </select>
                                                
                                            </div>
                                            @if(count($attribute['fields']) != 0)
                                            @foreach($attri_field['display'] as $attribute_field)
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">{{ $attribute_field->attr_label }} <span class="require">*</span></label>
                                                @php 
                                                $field_value=explode(',',$attribute_field->attr_field_value); 
                                                $checkpackage=explode(',',$attribute_field->item_attribute_values);
                                                @endphp
                                                @if($attribute_field->attr_field_type == 'multi-select')
                                                <select  name="attributes_{{ $attribute_field->attr_id }}[]" class="form-control" multiple="multiple" data-bvalidator="required">
                                                @foreach($field_value as $field)
                                                <option value="{{ $field }}" @if(in_array($field,$checkpackage)) selected="selected" @endif>{{ $field }}</option>
                                                @endforeach
                                                </select>
                                                @endif
                                                @if($attribute_field->attr_field_type == 'single-select')
                                                <select name="attributes_{{ $attribute_field->attr_id }}[]" class="form-control" data-bvalidator="required">
                                                  <option value=""></option>
                                                  @foreach($field_value as $field)
                                                  <option value="{{ $field }}" @if($attribute_field->item_attribute_values == $field) selected @endif>{{ $field }}</option>
                                                  @endforeach
                                                </select>
                                                @endif
                                                @if($attribute_field->attr_field_type == 'textbox')
                                                <input name="attributes_{{ $attribute_field->attr_id }}[]" type="text" class="form-control" data-bvalidator="required">
                                                @endif
                                            </div>
                                          @endforeach
                                          @else
                                          @foreach($attri_field['display'] as $attribute_field)
                                             <div class="form-group">
                                                <label for="name" class="control-label mb-1">{{ $attribute_field->attr_label }} <span class="require">*</span></label>
                                                @php $field_value=explode(',',$attribute_field->attr_field_value); @endphp
                                                @if($attribute_field->attr_field_type == 'multi-select')
                                                <select  name="attributes_{{ $attribute_field->attr_id }}[]" class="form-control" multiple="multiple" data-bvalidator="required">
                                                @foreach($field_value as $field)
                                                <option value="{{ $field }}">{{ $field }}</option>
                                                @endforeach
                                                </select>
                                                @endif
                                                @if($attribute_field->attr_field_type == 'single-select')
                                                <select name="attributes_{{ $attribute_field->attr_id }}[]" class="form-control" data-bvalidator="required">
                                                  <option value=""></option>
                                                  @foreach($field_value as $field)
                                                  <option value="{{ $field }}">{{ $field }}</option>
                                                  @endforeach
                                                </select>
                                                @endif
                                                @if($attribute_field->attr_field_type == 'textbox')
                                                <input name="attributes_{{ $attribute_field->attr_id }}[]" type="text" class="form-control" data-bvalidator="required">
                                                @endif
                                                
                                            </div>
                                           @endforeach
                                          @endif
                                          @if($additional->show_moneyback == 1)
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> {{ Helper::translation(6240,$translate,'') }}? <span class="require">*</span></label>
                                                <select name="seller_money_back" id="seller_money_back" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($edit['item']->seller_money_back == 1) selected @endif>{{ Helper::translation(2970,$translate,'') }}</option>
                                                 <option value="0" @if($edit['item']->seller_money_back == 0) selected @endif>{{ Helper::translation(2971,$translate,'') }}</option>
                                                </select>
                                                
                                            </div>
                                            <div id="back_money" @if($edit['item']->seller_money_back == 1) class="form-group display-block" @else  class="form-group display-none" @endif>
                                                <label for="name" class="control-label mb-1">{{ Helper::translation(6243,$translate,'') }}? </label>
                                                <input type="text" id="seller_money_back_days" name="seller_money_back_days" class="form-control" data-bvalidator="min[1]" value="{{ $edit['item']->seller_money_back_days }}">
                                                
                                            </div>
                                            @else
                                            <input type="hidden" name="seller_money_back" value="0" />
                                            @endif
                                            @if($additional->show_refund_term == 1) 
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">{{ Helper::translation(6237,$translate,'') }}</label>
                                                
                                            <textarea name="seller_refund_term" rows="6"  class="form-control">{{ $edit['item']->seller_refund_term }}</textarea>
                                            </div>
                                            @else
                                            <input type="hidden" name="seller_refund_term" value="" />
                                            @endif
                                            @if($additional->show_demo_url == 1)
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">{{ Helper::translation(2966,$translate,'') }}</label>
                                                <input type="text" id="demo_url" name="demo_url" class="form-control" value="{{ $edit['item']->demo_url }}" data-bvalidator="url">
                                                
                                            </div>
                                            @endif
                                           
                                    </div>
                                </div>

                            </div>
                            </div>
                             
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div id="display_message"></div>
                                       <div id="hide_message">
                                        <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">{{ Helper::translation(2943,$translate,'') }} ({{ Helper::translation(2946,$translate,'') }} : 80x80px)<span class="require">*</span> </label><br/>
                                                <select name="item_thumbnail1" id="item_thumbnail1" class="form-control" @if($edit['item']->item_thumbnail == '') data-bvalidator="required" @endif>
                                                <option value=""></option>
                                                @foreach($getdata1['first'] as $get)
                                                <option value="{{ $get->item_file_name }}">{{ $get->original_file_name }}</option>
                                                @endforeach
                                                </select>
                                        @if($edit['item']->item_thumbnail!='')
                                        <img class="lazy item-thumb" width="50%" height="50%" src="{{ Helper::Image_Path($edit['item']->item_thumbnail ,'no-image.png') }}"  alt="{{ $edit['item']->item_name }}">
                                        @else
                                        <img class="lazy item-thumb" width="50%" height="50%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $edit['item']->item_name }}">
                                        @endif
                                           
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">{{ Helper::translation(2945,$translate,'') }} ({{ Helper::translation(2946,$translate,'') }} : 700x447px)<span class="require">*</span> </label><br/>
                                                <select name="item_preview1" id="item_preview1" class="form-control" @if($edit['item']->item_preview == '') data-bvalidator="required" @endif>
                                                <option value=""></option>
                                                @foreach($getdata2['second'] as $get)
                                                <option value="{{ $get->item_file_name }}">{{ $get->original_file_name }}</option>
                                                @endforeach
                                                </select>
                                                
                                        @if($edit['item']->item_preview!='')
                                        <img class="lazy item-thumb" width="100%" height="100%" src="{{ Helper::Image_Path($edit['item']->item_preview ,'no-image.png') }}"  alt="{{ $edit['item']->item_name }}">
                                        @else
                                        <img class="lazy item-thumb" width="100%" height="100%" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $edit['item']->item_name }}">
                                        @endif
                                           
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Upload Main File Type <span class="require">*</span></label>
                                               <select name="file_type1" id="file_type1" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="file" @if($edit['item']->file_type == 'file') selected @endif>File</option>
                                                    <option value="link" @if($edit['item']->file_type == 'link') selected @endif>Link/URL</option>
                                                </select>
                                            </div>
                                            
                                             <div id="main_file" @if($edit['item']->file_type == 'file') class="form-group display-block" @else  class="form-group display-none" @endif>
                                                <label for="site_desc" class="control-label mb-1">{{ Helper::translation(2947,$translate,'') }} ({{ Helper::translation(2948,$translate,'') }})<span class="require">*</span> </label><br/>
                                                <select name="item_file1" id="item_file1" class="form-control" @if($edit['item']->item_file == '') data-bvalidator="required" @endif>
                                                <option value=""></option>
                                                @foreach($getdata3['third'] as $get)
                                                <option value="{{ $get->item_file_name }}">{{ $get->original_file_name }}</option>
                                                @endforeach
                                                </select>
                                                <span class="require">{{ $edit['item']->item_file }}</span>
                                            </div>  
                                            
                                            <div id="main_link" @if($edit['item']->file_type == 'link') class="form-group display-block" @else  class="form-group display-none" @endif>
                                                <label for="name" class="control-label mb-1">Main File Link/URL <span class="require">*</span></label>
                                                <input type="text" id="item_file_link1" name="item_file_link1" class="form-control" data-bvalidator="required,url" value="{{ $edit['item']->item_file_link }}">
                                                
                                            </div>
                                            @if($additional->show_screenshots == 1)
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">{{ Helper::translation(2950,$translate,'') }} ({{ Helper::translation(2946,$translate,'') }} : 750x430px)</label><br/>
                                                <select id="item_screenshot1" name="item_screenshot[]" class="form-control" multiple>
                                                @foreach($getdata4['four'] as $get)
                                                <option value="{{ $get->item_file_name }}">{{ $get->original_file_name }}</option>
                                                @endforeach
                                                </select>
                                                @foreach($item_image['item'] as $item)
                                                    
                                                    <div class="item-img"><img class="lazy item-thumb" width="50" height="50" src="{{ Helper::Image_Path($item->item_image ,'no-image.png') }}"  alt="{{ $item->item_image }}">
                                                    <a href="{{ url('/admin/edit-item') }}/dropimg/{{ base64_encode($item->itm_id) }}" onClick="return confirm('{{ Helper::translation(5064,$translate,'') }}?');" class="drop-icon"><span class="ti-trash drop-icon"></span></a>
                                                    </div>
                                                    
                                                    @endforeach
                                           <div class="clearfix"></div>
                                            </div> 
                                            @endif
                                            @if($additional->show_video == 1)
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">{{ Helper::translation('6188f9c6594e4',$translate,'Preview Type (optional)') }} </label>
                                               <select name="video_preview_type1" id="video_preview_type1" class="form-control">
                                                <option value=""></option>
                                                    <option value="youtube" @if($edit['item']->video_preview_type == 'youtube') selected @endif>{{ Helper::translation(5925,$translate,'') }}</option>
                                                    <option value="mp4" @if($edit['item']->video_preview_type == 'mp4') selected @endif>{{ Helper::translation(5928,$translate,'') }}</option>
                                                    <option value="mp3" @if($edit['item']->video_preview_type == 'mp3') selected @endif>{{ Helper::translation('6188fb1c98b9a',$translate,'MP3') }}</option>
                                                </select>
                                            </div>
                                            
                                            <div id="youtube" @if($edit['item']->video_preview_type == 'youtube') class="form-group force-block" @else class="form-group force-none" @endif>
                                                <label for="name" class="control-label mb-1">{{ Helper::translation(2967,$translate,'') }} <span class="require">*</span></label>
                                                
                                                <input type="text" id="video_url1" name="video_url1" class="form-control" value="{{ $edit['item']->video_url }}" data-bvalidator="required">
                                        <small>({{ Helper::translation(2968,$translate,'') }} : https://www.youtube.com/watch?v=C0DPdy98e4c)</small>
                                            </div>
                                            
                                            <div id="mp4" @if($edit['item']->video_preview_type == 'mp4') class="form-group force-block" @else class="form-group force-none" @endif>
                                                <label for="site_desc" class="control-label mb-1">{{ Helper::translation(5910,$translate,'') }} <span class="require">*</span></label><br/>
                                                <select id="video_file1" name="video_file1" class="form-control" @if($edit['item']->video_file == '') data-bvalidator="required" @endif>
                                                <option value=""></option>
                                                @foreach($getdata5['five'] as $get)
                                                <option value="{{ $get->item_file_name }}">{{ $get->original_file_name }}</option>
                                                @endforeach
                                                </select>
                                                <span class="require">{{ $edit['item']->video_file }}</span>
                                            </div> 
                                            <div id="mp3" @if($edit['item']->video_preview_type == 'mp3') class="form-group force-block" @else class="form-group force-none" @endif>
                                                <label for="site_desc" class="control-label mb-1">{{ Helper::translation('6188fbba9e728',$translate,'Upload MP3') }} <span class="require">*</span></label><br/>
                                                <select id="audio_file1" name="audio_file1" class="form-control" @if($edit['item']->audio_file == '') data-bvalidator="required" @endif>
                                                <option value=""></option>
                                                @foreach($getdata6['six'] as $get)
                                                <option value="{{ $get->item_file_name }}">{{ $get->original_file_name }}</option>
                                                @endforeach
                                                </select>
                                                <span class="require">{{ $edit['item']->audio_file }}</span>
                                            </div> 
                                            @endif
                                       </div>
                                        
                                           @if($additional->show_free_download == 1)
                                             <div class="form-group">
                                                <label for="name" class="control-label mb-1">{{ Helper::translation(2969,$translate,'') }} <span class="require">*</span></label>
                                               <select name="free_download" id="free_download" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="1" @if($edit['item']->free_download == 1) selected="selected" @endif>{{ Helper::translation(2970,$translate,'') }}</option>
                                                    <option value="0" @if($edit['item']->free_download == 0) selected="selected" @endif>{{ Helper::translation(2971,$translate,'') }}</option>
                                                </select>
                                                <small>({{ Helper::translation("62ea50f8741c1",$translate,"if 'Yes' means all user will allowed free download this product") }})</small>
                                            </div>
                                           @else
                                           <input type="hidden" name="free_download" value="0" />
                                           @endif
                                           @if($additional->show_item_support == 1)
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">{{ Helper::translation(2978,$translate,'') }} <span class="require">*</span></label>
                                                <select name="item_support" id="item_support" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="1" @if($edit['item']->item_support == 1) selected="selected" @endif>{{ Helper::translation(2970,$translate,'') }}</option>
                                                    <option value="0" @if($edit['item']->item_support == 0) selected="selected" @endif>{{ Helper::translation(2971,$translate,'') }}</option>
                                                </select>
                                               
                                            </div>
                                            @else
                                            <input type="hidden" name="item_support" value="0" />
                                            @endif 
                                            <div id="pricebox_left" @if($edit['item']->item_support == 1) class="form-group force-block" @else class="form-group force-none" @endif>
                                                <label for="name" class="control-label mb-1">{{ Helper::translation(3072,$translate,'') }} ({{ $additional->regular_license }} {{ Helper::translation(3055,$translate,'') }}) <span class="require">*</span></label>
                                                <input type="text" id="regular_price" name="regular_price"  class="form-control" value="{{ $edit['item']->regular_price }}" data-bvalidator="digit,min[1],required">
                                                ({{ $allsettings->site_currency }})
                                            </div>  
                                            
                                            @if($additional->show_extended_license == 1)
                                            <div id="pricebox_right" @if($edit['item']->item_support == 1) class="form-group force-block" @else class="form-group force-none" @endif>
                                                <label for="name" class="control-label mb-1">{{ Helper::translation(3073,$translate,'') }} ({{ $additional->extended_license }} {{ Helper::translation(3055,$translate,'') }}) </label>
                                                
                                                <input type="text" id="extended_price" name="extended_price" class="form-control" value="@if($edit['item']->extended_price==0) @else {{ $edit['item']->extended_price }} @endif" data-bvalidator="digit,min[1]">
                                                ({{ $allsettings->site_currency }})
                                            </div>
                                            @else
                                            <input type="hidden" name="extended_price" value="0">
                                            @endif 
                                            @if($addition_settings->subscription_mode == 1)   
                                             <div id="subscription_box" @if($edit['item']->item_support == 1) class="form-group force-block" @else class="form-group force-none" @endif>
                                                <label for="site_title" class="control-label mb-1"> {{ Helper::translation('62ea38a0b2564',$translate,'Subscription Item') }}? <span class="require">*</span></label>
                                                <select name="subscription_item" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($edit['item']->subscription_item == 1) selected="selected" @endif>{{ Helper::translation(2970,$translate,'') }}</option>
                                                <option value="0" @if($edit['item']->subscription_item == 0) selected="selected" @endif>{{ Helper::translation(2971,$translate,'') }}</option>
                                                </select>
                                                <small>({{ Helper::translation("62ea3b96bf363",$translate,"if 'Yes' means subscription user will allowed free download this product") }})</small>
                                            </div>                                                                              
                                            @else
                                            <input type="hidden" name="subscription_item" value="0">
                                            @endif
                                            @if($edit['item']->item_flash_request == 1)
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> {{ Helper::translation(2993,$translate,'') }} <span class="require">*</span></label>
                                                <select name="item_flash" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($edit['item']->item_flash == 1) selected="selected" @endif>{{ Helper::translation(2874,$translate,'') }}</option>
                                                <option value="0" @if($edit['item']->item_flash == 0) selected="selected" @endif>{{ Helper::translation(2875,$translate,'') }}</option>
                                                
                                                </select>
                                                
                                            </div> 
                                            @else
                                            <input type="hidden" name="item_flash" value="0">
                                            @endif
                                            
                                                                                                                          
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> {{ Helper::translation(6384,$translate,'') }}? <span class="require">*</span></label>
                                                <select name="item_allow_seo" id="page_allow_seo" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($edit['item']->item_allow_seo == 1) selected @endif>{{ Helper::translation(2970,$translate,'') }}</option>
                                                <option value="0" @if($edit['item']->item_allow_seo == 0) selected @endif>{{ Helper::translation(2971,$translate,'') }}</option>
                                                </select>
                                             </div>
                                            
                                          <div id="ifseo" @if($edit['item']->item_allow_seo == 1) class="form-group force-block" @else class="form-group force-none" @endif>
                                     <div class="form-group">
                                           <label for="site_keywords" class="control-label mb-1">{{ Helper::translation(6387,$translate,'') }} ({{ Helper::translation(6390,$translate,'') }}) <span class="require">*</span></label>
                                            <textarea name="item_seo_keyword" id="page_seo_keyword" rows="4" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[160]">{{ $edit['item']->item_seo_keyword }}</textarea>
                                       </div> 
                                       <div class="form-group">
                                           <label for="site_desc" class="control-label mb-1">{{ Helper::translation(6393,$translate,'') }} ({{ Helper::translation(6390,$translate,'') }}) <span class="require">*</span></label>
                                              <textarea name="item_seo_desc" id="page_seo_desc" rows="4" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[160]">{{ $edit['item']->item_seo_desc }}</textarea>
                                            </div>
                                          </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> {{ Helper::translation(2873,$translate,'') }} <span class="require">*</span></label>
                                                <select name="item_status" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($edit['item']->item_status == 1) selected="selected" @endif>{{ Helper::translation(5232,$translate,'') }}</option>
                                                <option value="0" @if($edit['item']->item_status == 0) selected="selected" @endif>{{ Helper::translation(3092,$translate,'') }}</option>
                                                <option value="2" @if($edit['item']->item_status == 2) selected="selected" @endif>{{ Helper::translation(5235,$translate,'') }}</option>
                                                </select>
                                                
                                            </div>   
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">    
                                        <input type="hidden" name="save_file" value="{{ $edit['item']->item_file }}">
                                        <input type="hidden" name="save_thumbnail" value="{{ $edit['item']->item_thumbnail }}">
                                        <input type="hidden" name="save_preview" value="{{ $edit['item']->item_preview }}">
                                        <input type="hidden" name="save_extended_price" value="{{ $edit['item']->extended_price }}">
                                        <input type="hidden" name="item_token" value="{{ $edit['item']->item_token }}">
                                        <input type="hidden" name="save_video_file" value="{{ $edit['item']->video_file }}">
                                        <input type="hidden" name="save_audio_file" value="{{ $edit['item']->audio_file }}">
                                        <input type="hidden" name="save_file_type" value="{{ $edit['item']->file_type }}">
                                        <input type="hidden" name="save_video_preview_type" value="{{ $edit['item']->video_preview_type }}">
                                        <input type="hidden" name="save_video_url" value="{{ $edit['item']->video_url }}">
                                        <input type="hidden" name="preview_video" value="{{ $edit['item']->preview_video }}">
                                           
                                    </div>
                                </div>

                            </div>
                            </div> 
                             
                             <div class="col-md-12 no-padding">
                             <div class="card-footer">
                                 <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> {{ Helper::translation(2876,$translate,'') }}</button>
                                 <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> {{ Helper::translation(4962,$translate,'') }} </button>
                             </div>
                             
                             </div>
                             
                            
                            </form>
                            
                                                    
                                                    
                                                 
                            
                        </div> 

                     
                    
                    
                    </div>
                    

                </div>
            </div><!-- .animated -->
        </div>
        
        
        <!-- .content -->


    </div><!-- /#right-panel -->
    @else
    @include('admin.denied')
    @endif
    <!-- Right Panel -->


@include('admin.javascript')
@include('admin.zone')
<script type="text/javascript">
	$(document).ready(function()
	{
	$('#video_preview_type1').on('change', function() {
      if ( this.value == 'youtube')
      
      {
	     $("#youtube").show();
		 $("#mp4").hide();
		 $("#mp3").hide();
	  }	
	  else if ( this.value == 'mp4')
	  {
	     $("#mp4").show();
		 $("#youtube").hide();
		 $("#mp3").hide();
	  }
	  else if ( this.value == 'mp3')
	  {
	     $("#mp3").show();
	     $("#mp4").hide();
		 $("#youtube").hide();
	  }
	  else
	  {
	      $("#mp4").hide();
		  $("#youtube").hide();
		  $("#mp3").hide();
	  }
	  
	 });
});
</script>
</body>

</html>
