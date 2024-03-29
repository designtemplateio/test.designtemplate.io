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
    @if(in_array('withdrawal',$avilable))
    <div id="right-panel" class="right-panel">

        
                       @include('admin.header')
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ Helper::translation(5625,$translate,'') }}</h1>
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

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">{{ Helper::translation(5625,$translate,'') }}</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ Helper::translation(2920,$translate,'') }}</th>
                                            <th>{{ Helper::translation(5895,$translate,'') }}</th>
                                            <th>{{ Helper::translation(3172,$translate,'') }}</th>
                                            <th>{{ Helper::translation(5898,$translate,'') }}</th>
                                            <th>{{ Helper::translation(2915,$translate,'') }} / {{ Helper::translation(4816,$translate,'') }} / {{ Helper::translation('622f1e467a4f0',$translate,'UPI') }} / {{ Helper::translation('622f1e6cef9c5',$translate,'Paytm') }}</th>
                                            <?php /*?><th>{{ Helper::translation(3222,$translate,'') }}</th>
                                            <th>{{ Helper::translation(3223,$translate,'') }}</th>
                                            <th>{{ Helper::translation(5901,$translate,'') }}</th>
                                            <th width="200">{{ Helper::translation(4816,$translate,'') }}</th><?php */?>
                                            <th>{{ Helper::translation(3224,$translate,'') }}</th>
                                            <th>{{ Helper::translation(2873,$translate,'') }}</th>
                                            <th>{{ Helper::translation(2922,$translate,'') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($itemData['item'] as $withdraw)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td><a href="{{ URL::to('/user') }}/{{ $withdraw->username }}" target="_blank" class="blue-color">{{ $withdraw->username }}</a></td>
                                            <td>{{ $withdraw->wd_date }} </td>
                                            <td>{{ $withdraw->withdraw_type }} </td>
                                            <td>
                                            @if($withdraw->paypal_email != "") {{ $withdraw->paypal_email }}@endif
                                            @if($withdraw->stripe_email != "") {{ $withdraw->stripe_email }}@endif
                                            @if($withdraw->paystack_email != "") {{ $withdraw->paystack_email }}@endif
                                            @if($withdraw->payfast_email != "") {{ $withdraw->payfast_email }}@endif
                                            @if($withdraw->skrill_email != ""){{ $withdraw->skrill_email }}@endif
                                            @if($withdraw->upi_id != ""){{ $withdraw->upi_id }}@endif
                                            @if($withdraw->paytm_no != ""){{ $withdraw->paytm_no }}@endif
                                            @if($withdraw->bank_details != "") @php echo nl2br($withdraw->bank_details); @endphp @endif
                                            </td>
                                            <td>{{ $withdraw->wd_amount }} {{ $allsettings->site_currency }}</td>
                                            <td>
                                            <span class="badge badge-success">{{ $withdraw->wd_status }}</span>
                                            </td>
                                            <td>
                                            @if($withdraw->wd_status == 'pending')
                                            <a href="{{ URL::to('/admin/withdrawal') }}/{{ $withdraw->wd_id }}/{{ $withdraw->wd_user_id }}" class="btn btn-success btn-sm" onClick="return confirm('{{ Helper::translation(5904,$translate,'') }}?');"><i class="fa fa-money"></i>&nbsp; {{ Helper::translation(5907,$translate,'') }}</a>
                                            @endif
                                            @if($demo_mode == 'on') 
                                            <a href="{{ URL::to('/admin/demo-mode') }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;{{ Helper::translation(2924,$translate,'') }}</a>
                                            @else
                                            <a href="{{ URL::to('/admin/withdrawal') }}/{{ $withdraw->wd_id }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ Helper::translation(5064,$translate,'') }}?');"><i class="fa fa-trash"></i>&nbsp;{{ Helper::translation(2924,$translate,'') }}</a>@endif
                                            </td>
                                        </tr>
                                        
                                        @php $no++; @endphp
                                   @endforeach     
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

 
                </div>
            </div>
        </div>


    </div>
    @else
    @include('admin.denied')
    @endif 
    


   @include('admin.javascript')


</body>

</html>
