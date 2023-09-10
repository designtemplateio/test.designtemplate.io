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
                                <a href="{{ URL::to('/admin/upload-product-page') }}/{{ $encrypted }}">{{ $item_type->item_type_name }}</a>
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
                                            <th>Category</th>
                                            <th>Subcategory</th>
                                            <th>Titles</th>
                                            <th>Description</th>
                                            <th>Sub-heading</th>
                                            <th>Sub-description</th>
                                            <th>{{ Helper::translation(2873,$translate,'') }}</th>
                                            <th>{{ Helper::translation(2922,$translate,'') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($itemData['item'] as $item)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $no }}</td>
                                            <td>{{ $no }}</td>
                                            <td><a href="{{ url('/product-page') }}/category/{{ $item->heading }}" target="_blank" class="black-color">{{ mb_substr($item->heading, 0, 50, 'UTF-8') }}</a></td>
                                            <td>{{ mb_substr($item->heading_desc, 0, 50, 'UTF-8').'...' }}</td>
                                            <td>{{ $item->sub_heading }}</td>
                                            <td>{{ mb_substr($item->subheading_desc, 0, 50, 'UTF-8').'...' }}</td>
                                            <td>@if($item->drop_status == 1) <span class="badge badge-success">Active</span>  @else <span class="badge badge-danger">Deactive</span> @endif</td>
                                            <td><a href="edit-product-page/{{ $item->id }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; {{ Helper::translation(2923,$translate,'') }}</a>
                                            <a href="/admin/product-page-delete/{{ $item->id }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ Helper::translation(5064,$translate,'') }}?');"><i class="fa fa-trash"></i>&nbsp;{{ Helper::translation(2924,$translate,'') }}</a>
                                            </td>
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
