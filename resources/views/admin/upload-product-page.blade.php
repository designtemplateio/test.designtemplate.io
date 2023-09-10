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
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Upload Product Page - {{ $type_name->item_type_name }}</h1>
                    </div>
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
                           @if($demo_mode == 'on')
                           @include('admin.demo-mode')
                           @else
                        <form action="{{ route('admin.upload-product-page') }}" class="setting_form" id="item_form" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @endif
                             <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                            
                                            <input type="hidden" name="item_type" value="{{ $type_name->item_type_slug }}">
                                            <input type="hidden" name="type_id" value="{{ $type_id }}">
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">{{ Helper::translation(2952,$translate,'') }} <span class="require">*</span></label>
                                               <select name="item_category" id="item_category" class="form-control" data-bvalidator="required">
                                            <option value="">{{ Helper::translation(5931,$translate,'') }}</option>
                                            @foreach($category['menu'] as $menu)
                                                <option value="category_{{ $menu->cat_id }}">{{ $menu->category_name }}</option>
                                                @foreach($category['menu'] as $sub_category)
                                                <option value="subcategory_{{$sub_category->subcat_id}}"> - {{ $sub_category->subcategory_name }}</option>
                                                @endforeach  
                                            @endforeach
                                            </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Heading(H1) Of Page<span class="require">*</span> </label>
                                               <input type="text" id="heading_name" name="heading_name" class="form-control" data-bvalidator="required,maxlen[100]"> 
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Description Of Hesding<span class="require">*</span></label>
                                                <textarea name="heading_para_text" rows="3"  class="form-control" data-bvalidator="required"></textarea>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Sub Heading(H2) Of Page<span class="require">*</span> </label>
                                               <input type="text" id="subheading_name" name="subheading_name" class="form-control" data-bvalidator="required"> 
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Description of Sub-Heading(H2)<span class="require">*</span></label>
                                                <textarea name="subheading_para_text" rows="3"  class="form-control" data-bvalidator="required"></textarea>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Product Paragraph Heading<span class="require">*</span> </label>
                                               <input type="text" id="para_heading" name="para_heading" class="form-control" data-bvalidator="required"> 
                                            </div>
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Product Paragraph Description<span class="require">*</span></label>
                                                
                                            <textarea name="para_desc" id="summary-ckeditor" rows="6"  class="form-control" data-bvalidator="required"></textarea>
                                            </div>
                                            
                                    </div>
                                </div>

                            </div>
                            </div>
                             
                            <div class="col-md-6">
                            
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    <div id="display_message">
                                            <div class="form-group">
                                                <label for="image1" class="control-label mb-1">Banner 1<span class="require">*</span> </label>
                                               <input type="file" class="form-control" id="banner_image1" name="banner_image1"> 
                                            </div>
                                            <div class="form-group">
                                                <label for="image2" class="control-label mb-1">Banner 2<span class="require">*</span> </label>
                                               <input type="file" class="form-control" id="banner_image2" name="banner_image2"> 
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="image1" class="control-label mb-1">Product 1<span class="require">*</span> </label>
                                               <input type="file" class="form-control" id="product_image1" name="product_image1"> 
                                            </div>
                                            <div class="form-group">
                                                <label for="image2" class="control-label mb-1">Product 2<span class="require">*</span> </label>
                                               <input type="file" class="form-control" id="product_image2" name="product_image2"> 
                                            </div>
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">FAQ 1<span class="require">*</span> </label>
                                               <input type="text" id="faq1" name="faq1" class="form-control" data-bvalidator="required"> 
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Answer 1<span class="require">*</span></label>
                                                <textarea name="answer1" rows="3"  class="form-control" data-bvalidator="required"></textarea>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">FAQ 2<span class="require">*</span> </label>
                                               <input type="text" id="faq2" name="faq2" class="form-control" data-bvalidator="required"> 
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Answer 2<span class="require">*</span></label>
                                                <textarea name="answer2" rows="3"  class="form-control" data-bvalidator="required"></textarea>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">FAQ 3<span class="require">*</span> </label>
                                               <input type="text" id="faq3" name="faq3" class="form-control" data-bvalidator="required"> 
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Answer 3<span class="require">*</span></label>
                                                <textarea name="answer3" rows="3"  class="form-control" data-bvalidator="required"></textarea>
                                            </div>
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
</body>

</html>
