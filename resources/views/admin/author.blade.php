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
                        <h1>Author</h1>
                    </div>
                </div>
            </div>
            <!--<div class="col-sm-8">-->
            <!--    <div class="page-header float-right">-->
            <!--        <div class="page-title">-->
            <!--            <ol class="breadcrumb text-right">-->
            <!--                <a href="{{ url('/admin/add-vendor') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Subscriber</a>-->
            <!--            </ol>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
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
                                <div class="panel-heading">
                                    <strong class="card-title">Author</strong>
                                    @if(count($requestData['data']) != 0) 
                                       <strong class="card-title float-right btn btn-primary btn-sm" data-toggle="collapse" data-target="#collapseOne">Requests to Become Author <span class="badge badge-light"> {{ $requestCount }} </span> </strong>
                                    @endif
                                </div>
                            </div>
                            
                            <div id="collapseOne" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="card-body">
                                            <table id="" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>{{ Helper::translation(2920,$translate,'') }}</th>
                                                        <th>{{ Helper::translation(5061,$translate,'') }}</th>
                                                        <th>{{ Helper::translation(2917,$translate,'') }}</th>
                                                        <th>{{ Helper::translation(2915,$translate,'') }}</th>
                                                        <th>{{ Helper::translation('628628dc9d5b3',$translate,'Account Verification') }}</th>
                                                        <th>{{ Helper::translation(5199,$translate,'') }}</th>
                                                        <th>{{ Helper::translation(4827,$translate,'') }}</th>
                                                        <th>Request to become Author</th> 
                                                        <!--<th>{{ Helper::translation(5667,$translate,'') }}</th>-->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $no = 1; @endphp
                                                    @foreach($requestData['data'] as $user)
                                                        <tr>
                                                            <td>{{ $no }}</td>
                                                            <td>@if($user->user_photo != '') <img class="lazy userphoto" width="50" height="50" src="{{ url('/') }}/public/storage/users/{{ $user->user_photo }}"  alt="{{ $user->name }}" />@else <img class="lazy userphoto" width="50" height="50" src="{{ url('/') }}/public/img/no-user.png"  alt="{{ $user->name }}" />  @endif</td>
                                                            <td>{{ $user->username }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>@if($user->user_document_verified == 1) <span class="badge badge-success">{{ Helper::translation(5202,$translate,'') }}</span> @else <span class="badge badge-danger">{{ Helper::translation(5205,$translate,'') }}</span> @endif</td>
                                                            <td>@if($user->verified == 1) <span class="badge badge-success">{{ Helper::translation(5202,$translate,'') }}</span> @else <span class="badge badge-danger">{{ Helper::translation(5205,$translate,'') }}</span> @endif</td>
                                                            <td>@if($user->exclusive_author == 1) <span class="badge badge-success">{{ Helper::translation(5883,$translate,'') }}</span> @else <span class="badge badge-danger">{{ Helper::translation(5886,$translate,'') }}</span> @endif</td>
                                                            <td><a href="{{ URL::to('/admin/author') }}/{{ $user->user_token }}/{{ $user->become_author }}" class="btn btn-success btn-sm" onClick="return confirm('Are you sure to approve request to become Author?');"><i class="fa fa-user"></i>&nbsp; Approve Request</a></td>
                                                        </tr>
                                                    @php $no++; @endphp
                                                    @endforeach     
                                        
                                                </tbody>
                                            </table>
                                        </div>  
                                    </div>
                            </div>
                            
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ Helper::translation(2920,$translate,'') }}</th>
                                            <th>{{ Helper::translation(5061,$translate,'') }}</th>
                                            <th>{{ Helper::translation(2917,$translate,'') }}</th>
                                            <th>{{ Helper::translation(2915,$translate,'') }}</th>
                                            <th>{{ Helper::translation('628628dc9d5b3',$translate,'Account Verification') }}</th>
                                            <th>{{ Helper::translation(5199,$translate,'') }}</th>
                                            <th>{{ Helper::translation(4827,$translate,'') }}</th>
                                            <th>Request to become Author</th> 
                                            <!--<th>{{ Helper::translation(5667,$translate,'') }}</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @php $no = 1; @endphp
                                    @foreach($authorData['data'] as $user)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>@if($user->user_photo != '') <img class="lazy userphoto" width="50" height="50" src="{{ url('/') }}/public/storage/users/{{ $user->user_photo }}"  alt="{{ $user->name }}" />@else <img class="lazy userphoto" width="50" height="50" src="{{ url('/') }}/public/img/no-user.png"  alt="{{ $user->name }}" />  @endif</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>@if($user->user_document_verified == 1) <span class="badge badge-success">{{ Helper::translation(5202,$translate,'') }}</span> @else <span class="badge badge-danger">{{ Helper::translation(5205,$translate,'') }}</span> @endif</td>
                                            <td>@if($user->verified == 1) <span class="badge badge-success">{{ Helper::translation(5202,$translate,'') }}</span> @else <span class="badge badge-danger">{{ Helper::translation(5205,$translate,'') }}</span> @endif</td>
                                            <td>@if($user->exclusive_author == 1) <span class="badge badge-success">{{ Helper::translation(5883,$translate,'') }}</span> @else <span class="badge badge-danger">{{ Helper::translation(5886,$translate,'') }}</span> @endif</td>
                                            <td><a href="{{ URL::to('/admin/author') }}/{{ $user->user_token }}/{{ $user->become_author }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure to remove as Author?');"><i class="fa fa-user"></i>&nbsp; Remove As Author</a></td>
                                        </tr>
                                        @php $no++; @endphp
                                   @endforeach     
                                        
                                    </tbody>
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


</body>

</html>