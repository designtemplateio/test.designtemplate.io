@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>{{ $allsettings->site_title }} - Send Mails & Notifications</title>
@include('meta')
@include('style')
</head>
<body>
@include('header')
@if($addition_settings->verify_mode == 1)
<section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
    <div class="py-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{ URL::to('/') }}"><i class="dwg-home"></i>{{ Helper::translation(2862,$translate,'') }}</a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Send Mails & Notifications</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0">Send Mails & Notifications</h1>
        </div>
      </div>
    </div>
</section>
   
   
      
    <?php
        //   ini_set('display_errors',1);
        //   error_reporting( E_ALL );
        //   $from="help@designtemplate.io";
        //   foreach ($userData['data'] as $user) 
        //   {
        //   $to="$user->email";
        //   $subject= "Welcome Email From Design Template.io.";
        //   $message = "Welcome to designtemplate.io. Grab Weekly Free Items from our plateform.";
        //   $headers = "From:" . $from;
        //   mail($to,$subject,$message,$headers);
        //   }
        //   echo "The email was successfully sent.";
        //   echo "Thank You";
          
          ini_set('display_errors',1);
error_reporting( E_ALL );
$from="help@designtemplate.io";
$to="gitanjali.doographics@gmail.com";

$subject= "Welcome Email From Design Template.io.";
$message = "Welcome to designtemplate.io. Grab Weekly Free Items from our plateform.";
$headers = "From:" . $from;

mail($to,$subject,$message,$headers);

echo "The email message Was successfully sent.";
echo "Thank You";
    ?>
@else
@include('not-found')
@endif    
@include('footer')
@include('script')
</body>
</html>
@else
@include('503')
@endif