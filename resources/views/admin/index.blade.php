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
    @if(in_array('dashboard',$avilable))
    <div id="right-panel" class="right-panel">

       
                       @include('admin.header')
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ Helper::translation(5421,$translate,'') }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">{{ Helper::translation(5421,$translate,'') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

       
        <div class="col-sm-12 mb-4">
        <div class="card-group">
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-users"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span class="count">{{ $totalvendor }}</span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">{{ Helper::translation(5424,$translate,'') }}</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa fa-file"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count">{{ $totalpages }}</span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">{{ Helper::translation(5427,$translate,'') }}</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-cart-plus"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count">{{ $totalorder }}</span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">{{ Helper::translation(5430,$translate,'') }}</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-server"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count">{{ $totalitems }}</span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">{{ Helper::translation(3195,$translate,'') }}</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-comments-o"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count">{{ $itemcomment }}</span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">{{ Helper::translation(5433,$translate,'') }}</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-newspaper-o"></i>
                    </div>
                    <div class="h4 mb-0"><span class="count">{{ $totalpost }}</span></div>
                    <small class="text-muted text-uppercase font-weight-bold">{{ Helper::translation(5436,$translate,'') }}</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-5" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            
            
                        
        </div>
        
        
        
        <div class="card-group">
            <div class="card col-lg-2 col-md-6 no-padding bg-flat-color-1">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-money text-light"></i>
                    </div>

                    <div class="h4 mb-0 text-light">
                        <span>{{ $allsettings->site_currency_symbol }}{{ $total_referral_earnings }}</span>
                    </div>
                    <small class="text-uppercase font-weight-bold text-light">{{ Helper::translation('627a57a897655',$translate,'Total Referral Earnings') }}</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-5">
                    <div class="h1 text-right text-light mb-4">
                        <i class="fa fa-user-plus"></i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count">{{ $total_referrals }}</span>
                    </div>
                    <small class="text-uppercase font-weight-bold text-light">{{ Helper::translation('61e6773edfa2f',$translate,'Total Referrals') }}</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-2">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-money text-light"></i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span>{{ $allsettings->site_currency_symbol }}{{ $admin_total_referral->referral_amount }}</span>
                    </div>
                    <small class="text-uppercase font-weight-bold text-light">{{ Helper::translation('627a57e92c959',$translate,'Admin Referral Earnings') }}</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-4">
                    <div class="h1 text-light text-right mb-4">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span>{{ $allsettings->site_currency_symbol }}{{ $payouts }}</span>
                    </div>
                    <small class="text-light text-uppercase font-weight-bold">{{ Helper::translation('627b8e81c8458',$translate,'Total Withdrawal Payouts') }}</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-3">
                    <div class="h1 text-right mb-4">
                        <i class="fa fa-money text-light"></i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span>{{ $allsettings->site_currency_symbol }}{{ $admin_total_referral->earnings }}</span>
                    </div>
                    <small class="text-light text-uppercase font-weight-bold">{{ Helper::translation('627a5f3f4e709',$translate,'Admin Total Earnings') }}</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            
            
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-1">
                    <div class="h1 text-light text-right mb-4">
                        <i class="fa fa-undo"></i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count">{{ $refunds }}</span>
                    </div>
                    <small class="text-light text-uppercase font-weight-bold">{{ Helper::translation('627b99aabe420',$translate,'Total Refund Request') }}</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
        </div>
        
        
    </div>
     <div class="content mt-3">
          <div class="col-sm-12">
             <div class="card col-md-2 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-download"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span class="count badge badge-warning">{{ $totalsubscrdownload }}</span>
                        <span class="count badge badge-danger">{{ $totalfreedownload }}</span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Total Downloads<br> {{ $today }}</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-2 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-download"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span class="count badge badge-warning">{{ $totalsubscrdownload1 }}</span>
                        <span class="count badge badge-danger">{{ $totalfreedownload1 }}</span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Total Downloads <br> {{ $first_day }}</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-2 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-download"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span class="count badge badge-warning">{{ $totalsubscrdownload2 }}</span>
                        <span class="count badge badge-danger">{{ $totalfreedownload2 }}</span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Total Downloads <br> {{ $second_day }}</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-2 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-download"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span class="count badge badge-warning">{{ $totalsubscrdownload3 }}</span>
                        <span class="count badge badge-danger">{{ $totalfreedownload3 }}</span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Total Downloads <br> {{ $third_day }}</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-2 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-download"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span class="count badge badge-warning">{{ $totalsubscrdownload4 }}</span>
                        <span class="count badge badge-danger">{{ $totalfreedownload4 }}</span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Total Downloads <br> {{ $fourth_day }}</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-2 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-download"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span class="count badge badge-warning">{{ $totalsubscrdownload5 }}</span>
                        <span class="badge badge-danger count">{{ $totalfreedownload5 }}</span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Total Downloads <br> {{ $fifth_day }}</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
          </div>
      
         <div class="col-sm-8 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">{{ Helper::translation(5439,$translate,'') }} </h4>
                                <canvas id="team-chart"></canvas>
                            </div>
                        </div>
                    </div>   
          <div class="col-sm-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">{{ Helper::translation(5442,$translate,'') }} </h4>
                                <canvas id="pieChart"></canvas>
                            </div>
                        </div><!-- /# card -->
                    </div>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    @else
    @include('admin.denied')
    @endif
    <!-- Right Panel -->

    @include('admin.javascript')
    <script type="text/javascript">
	( function ( $ ) {
    'use strict';

   
    var ctx = document.getElementById( "team-chart" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "{{ $sixth_day }}", "{{ $fifth_day }}", "{{ $fourth_day }}", "{{ $third_day }}", "{{ $second_day }}", "{{ $first_day }}", "{{ $today }}" ],
            type: 'line',
            defaultFontFamily: 'Montserrat',
            datasets: [ {
                data: [ {{ $view7 }} , {{ $view6 }}, {{ $view5 }}, {{ $view4 }} , {{ $view3 }} , {{ $view2 }} , {{ $view1 }} ],
                label: "sale",
                backgroundColor: 'rgba(0,103,255,.15)',
                borderColor: 'rgba(0,103,255,0.5)',
                borderWidth: 3.5,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(0,103,255,0.5)',
                    }, ]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#000',
                bodyFontColor: '#000',
                backgroundColor: '#fff',
                titleFontFamily: 'Montserrat',
                bodyFontFamily: 'Montserrat',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: false,
                position: 'top',
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },


            },
            scales: {
                xAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: '{{ Helper::translation(5445,$translate,'') }}'
                    }
                        } ],
                yAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: '{{ Helper::translation(2930,$translate,'') }}'
                    }
                        } ]
            },
            title: {
                display: false,
            }
        }
    } );


    //pie chart
    var ctx = document.getElementById( "pieChart" );
    ctx.height = 330;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ {{ $approved }}, {{ $unapproved }}, {{ $rejected }} ],
                backgroundColor: [
                                    "rgba(6, 163, 61, 1)",
                                    "rgba(255, 193, 7, 1)",
                                    "rgba(226, 27, 26, 1)"
                                    
                                ],
                hoverBackgroundColor: [
                                    "rgba(6, 163, 61, 0.7)",
                                    "rgba(255, 193, 7, 0.7)",
                                    "rgba(226, 27, 26, 0.7)"
                                    
                                ]

                            } ],
            labels: [
                            "{{ Helper::translation(5232,$translate,'') }}",
                            "{{ Helper::translation(3092,$translate,'') }}",
                            "{{ Helper::translation(5235,$translate,'') }}"
                        ]
        },
        options: {
            responsive: true
        }
    } );

    

} )( jQuery );

</script>


</body>
</html>