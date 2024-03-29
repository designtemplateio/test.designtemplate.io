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
                        <h1>{{ Helper::translation(5442,$translate,'') }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        
                        <ol class="breadcrumb text-right">
                            <a href="{{ url('/admin/products-import-export') }}" class="btn btn-primary btn-sm"><i class="fa fa-file-excel-o"></i> {{ Helper::translation(5457,$translate,'') }}</a>&nbsp;
                            <a href="{{ url('/admin/trash-items') }}" class="btn btn-danger btn-sm"><i class="fa fa-location-arrow"></i> {{ Helper::translation('614dc2391d535',$translate,'Trash Items') }}</a>
                            &nbsp;
                            <button onClick="myFunction()" class="btn btn-success btn-sm dropbtn"><i class="fa fa-plus"></i> {{ Helper::translation(5460,$translate,'') }}</button>
                            <div id="myDropdown" class="dropdown-content">
                                @foreach($viewitem['type'] as $item_type)
                                @php $encrypted = $encrypter->encrypt($item_type->item_type_id); @endphp
                                <a href="{{ URL::to('/admin/upload-item') }}/{{ $encrypted }}">{{ $item_type->item_type_name }}</a>
                                @endforeach
                            </div>
                            
                            
                        </ol>
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
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-3 ml-auto">
                    <form action="{{ route('admin.items') }}" method="post" id="setting_form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <input id="search" name="search" type="text" class="move-bars" value="{{ $search }}" placeholder="{{ Helper::translation(2938,$translate,'') }}">
                    
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Search
                    </button>
                    
                    </div>
                    </form>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">{{ Helper::translation(5442,$translate,'') }}</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export-items" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ Helper::translation(2920,$translate,'') }}</th>
                                            <th width="50">{{ Helper::translation(5463,$translate,'') }}</th>
                                            <th width="100">{{ Helper::translation(2938,$translate,'') }}</th>
                                            <th width="100">{{ Helper::translation(5466,$translate,'') }}?</th>
                                            <th>{{ Helper::translation(5472,$translate,'') }}?</th>
                                            <th>{{ Helper::translation('62ea38a0b2564',$translate,'Subscription Item') }}?</th>
                                            <th>{{ Helper::translation(5469,$translate,'') }}?</th>
                                            <th>{{ Helper::translation(3142,$translate,'') }}</th>
                                            <th>{{ Helper::translation(2873,$translate,'') }}</th>
                                            <th>{{ Helper::translation(2922,$translate,'') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($itemData['item'] as $item)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>@if($item->item_thumbnail != '') <img class="lazy" width="50" height="50" src="{{ Helper::Image_Path($item->item_thumbnail,'no-image.png') }}"  alt="{{ $item->item_name }}"/>@else <img class="lazy" width="50" height="50" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $item->item_name }}" />  @endif</td>
                                            <td><a href="{{ url('/item') }}/{{ $item->item_slug }}" target="_blank" class="black-color">{{ mb_substr($item->item_name, 0, 50, 'UTF-8') }}</a></td>
                                            <td>@if($item->item_featured == 'no') <span class="badge badge-danger">{{ Helper::translation(2971,$translate,'') }}</span> @else <span class="badge badge-success">{{ Helper::translation(2970,$translate,'') }}</span> @endif <a href="items/{{ $item->item_featured }}/{{ $item->item_token }}" style="font-size:12px; color:#0000FF; text-decoration:underline;">{{ Helper::translation(5916,$translate,'') }}</a></td>
                                            <!--<td>@if($item->free_download == 1) <span class="badge badge-success">{{ Helper::translation(2970,$translate,'') }}</span> @else <span class="badge badge-danger">{{ Helper::translation(2971,$translate,'') }}</span> @endif</td>-->
                                            
                                            <td>@if($item->item_flash_request == 1) @if($item->item_flash == 0) <span class="badge badge-danger">{{ Helper::translation(5475,$translate,'') }}</span> @else <span class="badge badge-success">{{ Helper::translation(5232,$translate,'') }}</span> @endif @else <span>---</span> @endif</td>
                                            <td>@if($item->subscription_item == 1) <span class="badge badge-success">{{ Helper::translation(2970,$translate,'') }}</span> @else <span class="badge badge-danger">{{ Helper::translation(2971,$translate,'') }}</span> @endif<a href="items/{{ $item->subscription_item}}/{{ $item->item_token }}/{{ $item->free_download}}" style="font-size:12px; color:#0000FF; text-decoration:underline;">{{ Helper::translation(5916,$translate,'') }}</a></td>
                                            <td>@if($item->subscription_item == 0) <span class="badge badge-success">{{ Helper::translation(2970,$translate,'') }}</span> @else <span class="badge badge-danger">{{ Helper::translation(2971,$translate,'') }}</span> @endif  </td>
                                            <td><a href="{{ url('/user') }}/{{ $item->username }}" target="_blank" class="black-color">{{ $item->username }}</a></td>
                                            <td>@if($item->item_status == 1) <span class="badge badge-success">{{ Helper::translation(5232,$translate,'') }}</span> @elseif($item->item_status == 2) <span class="badge badge-danger">{{ Helper::translation(5235,$translate,'') }}</span> @else <span class="badge badge-warning">{{ Helper::translation(3092,$translate,'') }}</span> @endif</td>
                                            <td><a href="edit-item/{{ $item->item_token }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; {{ Helper::translation(2923,$translate,'') }}</a> 
                                            @if($demo_mode == 'on') 
                                            <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;{{ Helper::translation('614dc152e18b4',$translate,'Trash') }}</a>
                                            <a href="demo-mode" class="btn btn-primary btn-sm"><i class="fa fa-download"></i>&nbsp;{{ Helper::translation(3144,$translate,'') }}</a>
                                            @else
                                            <a href="items/{{ $item->item_token }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ Helper::translation('614dc5af68305',$translate,'Are you sure you want to remove') }}?');"><i class="fa fa-trash"></i>&nbsp;{{ Helper::translation('614dc152e18b4',$translate,'Trash') }}</a>
                                            <a href="download/{{ $item->item_token }}" class="btn btn-primary btn-sm"><i class="fa fa-download"></i>&nbsp;{{ Helper::translation(3140,$translate,'') }}</a>
                                            @endif</td>
                                        </tr>
                                        @php $no++; @endphp
                                   @endforeach  
                                    </tbody>
                                </table>
                                <div>
                                {{ $itemData['item']->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
    
    
    @else
    @include('admin.denied')
    @endif
    <!-- Right Panel -->


   @include('admin.javascript')


</body>

</html>
