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

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">{{ Helper::translation(5442,$translate,'') }}</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered datatableee">
                                    <thead>
                                        <tr>
                                            <th>{{ Helper::translation(2920,$translate,'') }}</th>
                                            <th width="50">{{ Helper::translation(5463,$translate,'') }}</th>
                                            <th width="100">{{ Helper::translation(2938,$translate,'') }}</th>
                                            <th  width="100">{{ Helper::translation(5466,$translate,'') }}?</th>
                                            <th  width="40">{{ Helper::translation(5469,$translate,'') }}?</th>
                                            <th>{{ Helper::translation(5472,$translate,'') }}?</th>
                                            <th>{{ Helper::translation(3142,$translate,'') }}</th>
                                            <th>{{ Helper::translation(2873,$translate,'') }}</th>
                                            <th>{{ Helper::translation(2922,$translate,'') }}</th>
                                        </tr>
                                    </thead>
                                 </table>
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
   <script>
    $(document).ready(function() {
        $('.datatableee').DataTable({
		    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
               return nRow;
            },
            processing: true,
            serverSide: true,
            autoWidth: false,
            pageLength: 10,
            // scrollX: true,
            "order": [[ 0, "desc" ]],
            ajax: '{{ route("admin.items-data") }}',
			language: 
            {          
               processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'},
            columns: [
                {data: 'item_id', name: 'Sno'},
				{data: 'Item Image', name: 'Item Image'},
                {data: 'Item Name', name: 'Item Name'},
				{data: 'Featured Item', name: 'Featured Item'},
				{data: 'Free Item', name: 'Free Item'},
				{data: 'Flash Request', name: 'Flash Request'},
				{data: 'Vendor', name: 'Vendor'},
                {data: 'Status', name: 'Status'},
                {data: 'Actions', name: 'Actions',orderable:false,serachable:false,sClass:'text-center'},
            ]
        });
    });
</script>

</body>

</html>
