@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>{{ $page['page']->page_title }} - {{ $allsettings->site_title }}</title>
@if($page['page']->page_allow_seo == 1)
<meta name="Keywords" content="{{ $page['page']->page_seo_keyword }}">
<meta name="Description" content="{{ $page['page']->page_seo_desc }}">
@else
@include('meta')
@endif
@include('style')
<style>
.sub-heading{
   font-weight: 500;
   font-size: 47px;
   line-height: 70px;
   text-align: center;
   color: #4D4D4D;
}
ul{
  margin:0;
  padding:0;
  list-style:none;
}
.team-photo{
 width:60%; 
 height:60%;
}
.heading.heading-icon {
    display: block;
}

.practice-area .inner{ 
     border:1px solid #999999; 
	 text-align:center; 
	 margin-bottom:28px; 
	
}
.practice-area .inner h3{ 
    color:#3c3c3c; 
	font-size:24px; 
	font-weight:500;

}
.practice-area .inner p{ 
    font-weight: 300;
    font-size: 16px;
    line-height: 20px;
    text-align: center;
    color: #4D4D4D;
}

.our-webcoderskull{
  background: #ffffff;
  
}
.our-webcoderskull .cnt-block{ 
   float:left; 
   width:100%; 
   background:#fff;
   text-align:center; 
}

.our-webcoderskull .cnt-block h3{ 
   font-weight: 500;
   font-size: 25px;
   line-height: 38px;
   text-align: center;
   color: #4D4D4D;
}
.our-webcoderskull .cnt-block h3 a{
  text-decoration:none;
	color:#2a2a2a;
}
.our-webcoderskull .cnt-block h3 a:hover{
	color:#3F57EF;
}
.our-webcoderskull .cnt-block p{ 
   color:#2a2a2a; 
   font-size:13px; 
   line-height:20px; 
   font-weight:400;
}
</style>
</head>
<body>
@include('header')
@if($page['page']->page_title != "About Us")
<section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
      <div class="py-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{ URL::to('/') }}"><i class="dwg-home"></i>{{ Helper::translation(2862,$translate,'') }}</a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ $page['page']->page_title }}</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0">{{ $page['page']->page_title }}</h1>
        </div>
      </div>
      </div>
    </section>
@if($page['page']->page_title != "Faq")
<div class="container py-5 mt-md-2 mb-2">
      <div class="row">
        <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
          <div class="font-size-md">@php echo html_entity_decode($page['page']->page_desc); @endphp</div>
         </div>
      </div>
    </div>
@endif
@endif

@if($page['page']->page_title == "Faq")
<div class="container py-3 mt-md-2 mb-2">
<div class="questions-container">
          <h2 class="sm-heading text-center py-1 px-3 text-black"> Account Help </h2>
            <div class="question">
                <button>
                    <span>1 . Why I cannot Log in ?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Firstly , it is requested to check your email ID and password correctly , try to refresh the page before trying again.</p>
            </div>
            <div class="question">
                <button>
                    <span>2 . How to reset password ?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>In case you log out ,  go to log in , forgot password , enter your e mail ID ,click on send password reset link , check your email inbox or spam , click on the link to reset your password , enter your new password   , confirm it  and your password will be updated or you can go to profile information and  change your password by entering new password and confirming password.</p>
            </div>
            <div class="question">
                <button>
                    <span>3 . What is an Item, End Product and Project?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Item is what you download from designtemplate.io  , End product is the product made after modifications made by you by putting skills and efforts and is  diffrent in nature , Project is intended use of the item </p>
            </div>
            <div class="question">
                <button>
                    <span>4 . How to update account information ?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Go to my account , visit profile information and you can make changes and update the account information </p>
            </div>
            <div class="question">
                <button>
                    <span>5 . Where do I locate my downloads ?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Go to my account , in the dropdown you will see a  of list of items and a section named as "Downloads"  and thats where you should be able to view your favourite products </p>
            </div>
            <div class="question">
                <button>
                    <span>6 . How to download my free assets ?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>The limit for downloading an item for free is one per day , you can download it by clicking on the download icon besides the heart shaped indicating favourite or by clicking on the image and then by selecting an option on your right hand side "Download Now "</p>
            </div>
            <div class="question">
                <button>
                    <span>7 . I am an existing customer , am I eligible for discount ?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Yes , everyday you can download one free template as well  , there are ocassional discounts for existing customers which you can avail and   </p>
            </div>
        <h2 class="sm-heading text-center py-1 px-3 text-black"> Payments  </h2>
            <div class="question">
                <button>
                    <span>1 . What payment methods are accepted ?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Firstly , it is requested to check your email ID and password correctly , try to refresh the page before trying again.</p>
            </div>
            <div class="question">
                <button>
                    <span>2 . What is continuity plan ?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>After discontinuing the subscription , you can use the assets downloaded during the time of subscription by renewing the license.</p>
            </div>
            <div class="question">
                <button>
                    <span>3 . Will my subscription automatically renew?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Yes , the subscription gets renewed automatically , you have to cancel the subscription in order to avoid deduction of fees </p>
            </div>
            <h2 class="sm-heading text-center py-1 px-3 text-black"> Refund  </h2>
            <div class="question">
                <button>
                    <span>1 . Can I get a refund ?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Yes , you can get a refund based on our refund policy , if you are eligible according to the policy you will shortly recieve your refund </p>
            </div>
            <div class="question">
                <button>
                    <span>2 . Can I recieve partial refund on my annual plan ?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>No ,  if you have  already paid for your subscription the subscription remains valid , after cancellation there is no renewal but  existing subscription remains the same </p>
            </div>
            <div class="question">
                <button>
                    <span>3 . Am I eligible for a refund ?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Yes , you are eligible for a refund if there has been a mistake from our end and you request matches our refund policy </p>
            </div>
            <h2 class="sm-heading text-center py-1 px-3 text-black"> Author  </h2>
            <div class="question">
                <button>
                    <span>1 . How can I become a author ?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Go to profile  information , on your  left hand side you will see a list in that click on the option "Become  Author"  enter necesssary details ,  read the terms & conditions and wait for approval as an author</p>
            </div>
            <div class="question">
                <button>
                    <span>2 . How to earn as a author ?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>After a customer buys an item made by an author either by licensing or subscription author will recieve  royalties based on the sale.</p>
            </div>
            <div class="question">
                <button>
                    <span>3 . Where can I see my earnings as a author ?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Go to my account , click on profile information , go to author  , click on my payouts / wallet you will be able to view the amount of  royalties you have earned. </p>
            </div>
            <div class="question">
                <button>
                    <span>4 . How to withdraw my payment ?</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p>Go to my account , click on profile information , go to withdrawls, My Gateways ,  select withdrawl options , you can enter the amount you want to withdraw ,minimum withdrawl option is  $50 , you can check your withdrawl history just below withdrawl amount and withdrawl option.</p>
            </div>
        </div>
       
  <div class="mt-12 text-center lg:mt-10">
      <div class="text-black">
        Still have questions? We’re here to help you
      </div> 
      <div class="text-center pb-5">
             <a class="dropdown-item" href="{{ URL::to('/contact') }}"> 
             <button class="btn btn-primary" type="submit">Contact Us</button>
             </a>
      </div>
  </div>
</div>
</div>
@endif
@if($page['page']->page_title == "About Us")
<section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
      <div class="py-4">
        <div class="container py-2 py-lg-3">
        <div class="order-lg-1 pr-lg-4 text-center text-lg-center">
           <h1 class="h3 mb-0">About DesignTemplate</h1>
          <p>Bringing your vision to life with DesignTemplate</p>
          
          <p>Welcome to DesignTemplate.io, a new and exciting design marketplace that has been created to provide an innovative solution to the problems faced by designers and customers alike. Our founder, Dadasaheb Bhagat, has been working with leading design marketplaces like Envato for the past 10 years, and has gained extensive experience in the industry.</p>
        </div>
      </div>
      </div>
</section>

<section class="our-webcoderskull">
  <div class="container">
    <div class="row heading heading-icon">
        <h2 class="sub-heading pt-3">Team & Cheerleaders</h2>
    </div>
    <ul class="row justify-content-center">
      <li class="col-12 col-md-6 col-lg-4">
          <div class="cnt-block equal-hight">
            <img src="https://designtemplate.io/public/img/Dadasaheb-Bhagat.webp" class="img-responsive team-photo" alt="Dadasaheb Bhagat">
            <h3><a href="#">Dadasaheb Bhagat</a></h3>
            <p>Founder And CEO</p>
      </li>
    </ul>
    <ul class="row">
      <li class="col-12 col-md-6 col-lg-4">
          <div class="cnt-block equal-hight">
            <figure><img src="https://designtemplate.io/public/img/Krushna-Zinjurke.webp" class="img-responsive team-photo" alt="Krushna Zinjurke"></figure>
            <h3><a href="#">Krushna Zinjurke</a></h3>
            <p>Product Manager</p>
      </li>
      <li class="col-12 col-md-6 col-lg-4">
          <div class="cnt-block equal-hight">
            <figure><img src="https://designtemplate.io/public/img/Gitanjali.webp" class="img-responsive team-photo" alt="Gitanjali Jamdade"></figure>
            <h3><a href="#">Gitanjali Jamdade </a></h3>
            <p>CTO</p>
          </div>
      </li>
      <li class="col-12 col-md-6 col-lg-4">
          <div class="cnt-block equal-hight">
            <figure><img src="https://designtemplate.io/public/img/Shahid-J.webp" class="img-responsive team-photo"  alt="Shahid Jamadar"></figure>
            <h3><a href="#">Shahid Jamadar </a></h3>
            <p>Content Head</p>
          </div>
       </li>    
    </ul>
    <ul class="row">
      <li class="col-12 col-md-6 col-lg-4">
          <div class="cnt-block equal-hight">
            <figure><img src="https://designtemplate.io/public/img/Santosh-Bamane.webp" class="img-responsive team-photo" alt="Santosh Bamane"></figure>
            <h3><a href="#">Santosh Bamane</a></h3>
            <p>Sales Manager</p>
      </li>
      <li class="col-12 col-md-6 col-lg-4">
          <div class="cnt-block equal-hight">
            <figure><img src="https://designtemplate.io/public/img/Eshwar.webp" class="img-responsive team-photo" alt="Eshwar Bhagat"></figure>
            <h3><a href="#">Eshwar Bhagat </a></h3>
            <p>Motion Graphic Lead</p>
          </div>
      </li>
      <li class="col-12 col-md-6 col-lg-4">
          <div class="cnt-block equal-hight">
            <figure><img src="https://designtemplate.io/public/img/Dhananjay-Raut.webp" class="img-responsive team-photo" alt="Dhananjay Raut"></figure>
            <h3><a href="#">Dhananjay Raut</a></h3>
            <p>Animation Lead</p>
          </div>
      </li>   
    </ul>
  </div>
</section>
<section class="our-webcoderskull pt-3">
  <div class="container">
    <div class="row justify-content-center">
      <div class="container justify-content-center text-center">
        <h2 class="sub-heading">Vision & Mission</h2>
        <p>At DesignTemplate, we understand that the current design marketplace is riddled with problems, from concerns over copyright infringement to the limited availability of premium design templates. That's why we have set out to create a platform that not only addresses these issues but provides a better overall experience for our customers.<br><br>
            One of our key advantages is that we create original design assets, so you don't have to worry about copyright issues. We believe that this is essential to providing our customers with the highest quality designs possible.<br><br>
            Additionally, we offer a range of premium design templates that are not available from a single author. Our templates are designed by multiple experienced designers, each bringing their own unique style and expertise to the table. This allows us to offer a diverse selection of premium templates that you won't find anywhere else.<br><br>
            And the best part? We offer all of this at an incredibly low price. We believe that quality design should be accessible to everyone at resonable price, and we are committed to making this a reality.<br><br>
            So whether you're a designer looking to showcase your work or a customer looking for high-quality design assets, you've come to the right place. At DesignTemplate, we are dedicated to providing a better design marketplace experience for everyone.</p>
      <h2 class="sub-heading">Keep Creating New Designs</h2>
      <p>We're always an email away - please say hello at help@designtemplate.io if we can be of any help or you have any questions.</p>
    </div>
    </div>
    <div class="widget my-4 text-md-nowrap text-center text-md-center">
            @if($allsettings->facebook_url != '')
            <a class="social-btn sb-facebook mr-2 mb-2" href="{{ $allsettings->facebook_url }}" target="_blank"><i class="dwg-facebook"></i></a>
            @endif
            @if($allsettings->twitter_url != '')
            <a class="social-btn sb-twitter mr-2 mb-2" href="{{ $allsettings->twitter_url }}" target="_blank"><i class="dwg-twitter"></i></a>
            @endif
            @if($allsettings->pinterest_url != '')
            <a class="social-btn sb-pinterest mr-2 mb-2" href="{{ $allsettings->pinterest_url }}" target="_blank"><i class="dwg-pinterest"></i></a>
            @endif
            @if($allsettings->gplus_url != '')
            <a class="social-btn sb-dribbble mr-2 mb-2" href="{{ $allsettings->gplus_url }}" target="_blank"><i class="dwg-google"></i></a>
            @endif
            @if($allsettings->linkedin_url != '')
            <a class="social-btn sb-behance mr-2 mb-2" href="{{ $allsettings->linkedin_url }}" target="_blank"><i class="dwg-linkedin"></i></a>
            @endif
            @if($allsettings->instagram_url != '')
            <a class="social-btn sb-behance mr-2 mb-2" href="{{ $allsettings->instagram_url }}" target="_blank"><i class="dwg-instagram"></i></a>
            @endif
            </div>
    </div>
</section>
@endif
@include('footer')
@include('script')
<script>
    const buttons = document.querySelectorAll('button');
    buttons.forEach( button =>{
    button.addEventListener('click',()=>{
        const faq = button.nextElementSibling;
        const icon = button.children[1];
        faq.classList.toggle('show');
        icon.classList.toggle('rotate');})})
</script>
</body>
</html>
@else
@include('503')
@endif