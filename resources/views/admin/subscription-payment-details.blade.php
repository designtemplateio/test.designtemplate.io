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
    @if(Auth::user()->id == 1) 
    <div id="right-panel" class="right-panel">

        
                       @include('admin.header')
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ Helper::translation(6138,$translate,'') }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="{{ url('/admin/vendor') }}" class="btn btn-success btn-sm"><i class="fa fa-chevron-left"></i> {{ Helper::translation(5175,$translate,'') }}</a>
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

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title" v-if="headerText">{{ Helper::translation(6138,$translate,'') }}</strong>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-striped table-align-middle mb-0">
                                
                                <tbody>
                                    <tr>
                                        <td>
                                            {{ Helper::translation(2917,$translate,'') }}
                                        </td>
                                        
                                        <td>
                                            {{ $userData['data']->username }}
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            {{ Helper::translation(6156,$translate,'') }}
                                        </td>
                                        
                                        <td>
                                            {{ $userData['data']->user_subscr_type }} @if($userData['data']->user_subscr_date < date('Y-m-d'))<span class="badge badge-danger">{{ Helper::translation(6225,$translate,'') }}</span>@endif
                                        </td>
                                    </tr>
                                    @if($userData['data']->user_subscr_payment_type == 'localbank')
                                    <tr>
                                        <td>
                                            {{ Helper::translation(6219,$translate,'') }}
                                            <small>({{ Helper::translation(6222,$translate,'') }})</small>
                                        </td>
                                        
                                        <td>
                                            @if($userData['data']->user_purchase_token != '') {{ $userData['data']->user_purchase_token }} @else <span>---</span> @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{ Helper::translation(5670,$translate,'') }}
                                            <small>({{ Helper::translation(6222,$translate,'') }})</small>
                                        </td>
                                        
                                        <td>
                                            @if($userData['data']->user_purchase_token != '') <a href="{{ URL::to('/admin/customer') }}/{{ $userData['data']->user_token }}/{{ $userData['data']->user_subscr_id }}" class="btn btn-success btn-sm" onClick="return confirm('{{ Helper::translation(6228,$translate,'') }}?');"><i class="fa fa-money"></i>&nbsp; {{ Helper::translation(5475,$translate,'') }}</a> @else <span>---</span> @endif
                                        </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td>
                                            {{ Helper::translation(3103,$translate,'') }}
                                        </td>
                                        
                                        <td>
                                            {{ date('d M Y',strtotime($userData['data']->user_subscr_date)) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{ Helper::translation(3175,$translate,'') }}
                                        </td>
                                        
                                        <td>
                                            {{ $userData['data']->user_subscr_payment_type }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{ Helper::translation(5667,$translate,'') }}
                                        </td>
                                        
                                        <td>
                                            @if($userData['data']->user_subscr_payment_status == 'completed') <span class="badge badge-success">{{ Helper::translation(5673,$translate,'') }}</span> @else <span class="badge badge-danger">{{ Helper::translation(5676,$translate,'') }}</span> @endif
                                        </td>
                                    </tr>
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
