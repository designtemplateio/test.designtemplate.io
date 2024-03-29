<aside class="col-lg-4">
            <div class="cz-sidebar-static h-100 border-right  mr-0">
              <h6><?php echo e(Helper::translation(4950,$translate,'')); ?></h6>
              <?php if($user['user']->user_type == 'vendor'): ?>
            <div class="item-details badge-size" data-aos="fade-up" data-aos-delay="200">
                                    <ul>
                                        <?php if($sold_amount >= $badges['setting']->author_sold_level_six): ?>
                                        <div class="sidebar-card card--metadata">
                                            <div>
                                                    <img class="lazy single-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->power_elite_author_icon); ?>"  border="0" title="<?php echo e($badges['setting']->author_sold_level_six_label); ?> : <?php echo e(Helper::translation(5982,$translate,'')); ?> <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_six); ?>+ <?php echo e(Helper::translation(5325,$translate,'')); ?> <?php echo e($allsettings->site_title); ?>"> <?php echo e($badges['setting']->author_sold_level_six_label); ?>

                                            </div>
                                        </div> 
                                        <?php endif; ?>
                                         <?php if($user['user']->country_badge == 1): ?>
                                        <?php if($country['view']->country_badges != ""): ?>
                                        <li>
                                          <img class="lazy icon-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/flag/<?php echo e($country['view']->country_badges); ?>"  border="0" title="<?php echo e(Helper::translation(5985,$translate,'')); ?> <?php echo e($country['view']->country_name); ?>">  
                                        </li>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($featured_count->has($user['user']->id) ? count($featured_count[$user['user']->id]) : 0 != 0): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->featured_item_icon); ?>"  border="0" title="<?php echo e(Helper::translation(5994,$translate,'')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($free_count->has($user['user']->id) ? count($free_count[$user['user']->id]) : 0 != 0): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->free_item_icon); ?>"  border="0"  title="<?php echo e(Helper::translation(5997,$translate,'')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($tren_count->has($user['user']->id) ? count($tren_count[$user['user']->id]) : 0 != 0): ?>
                                         <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->trends_icon); ?>"  border="0"  title="<?php echo e(Helper::translation(5991,$translate,'')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($user['user']->exclusive_author == 1): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->exclusive_author_icon); ?>"  border="0" title="<?php echo e(Helper::translation(5988,$translate,'')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($year == 1): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->one_year_icon); ?>"  border="0" title="<?php echo e($year); ?> <?php echo e(Helper::translation(6000,$translate,'')); ?> <?php echo e($allsettings->site_title); ?> <?php echo e(Helper::translation(6003,$translate,'')); ?> <?php echo e($year); ?> <?php echo e(Helper::translation(6006,$translate,'')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($year == 2): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->two_year_icon); ?>"  border="0"  title="<?php echo e($year); ?> <?php echo e(Helper::translation(6000,$translate,'')); ?> <?php echo e($allsettings->site_title); ?> <?php echo e(Helper::translation(6003,$translate,'')); ?> <?php echo e($year); ?> <?php echo e(Helper::translation(6006,$translate,'')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        
                                        <?php if($year == 3): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->three_year_icon); ?>"  border="0"  title="<?php echo e($year); ?> <?php echo e(Helper::translation(6000,$translate,'')); ?> <?php echo e($allsettings->site_title); ?> <?php echo e(Helper::translation(6003,$translate,'')); ?> <?php echo e($year); ?> <?php echo e(Helper::translation(6006,$translate,'')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($year == 4): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->four_year_icon); ?>"  border="0"  title="<?php echo e($year); ?> <?php echo e(Helper::translation(6000,$translate,'')); ?> <?php echo e($allsettings->site_title); ?> <?php echo e(Helper::translation(6003,$translate,'')); ?> <?php echo e($year); ?> <?php echo e(Helper::translation(6006,$translate,'')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($year == 5): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->five_year_icon); ?>"  border="0"  title="<?php echo e($year); ?> <?php echo e(Helper::translation(6000,$translate,'')); ?> <?php echo e($allsettings->site_title); ?> <?php echo e(Helper::translation(6003,$translate,'')); ?> <?php echo e($year); ?> <?php echo e(Helper::translation(6006,$translate,'')); ?>">
                                        </li>
                                        <?php endif; ?> 
                                        <?php if($year == 6): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->six_year_icon); ?>"  border="0"  title="<?php echo e($year); ?> <?php echo e(Helper::translation(6000,$translate,'')); ?> <?php echo e($allsettings->site_title); ?> <?php echo e(Helper::translation(6003,$translate,'')); ?> <?php echo e($year); ?> <?php echo e(Helper::translation(6006,$translate,'')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($year == 7): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->seven_year_icon); ?>"  border="0"  title="<?php echo e($year); ?> <?php echo e(Helper::translation(6000,$translate,'')); ?> <?php echo e($allsettings->site_title); ?> <?php echo e(Helper::translation(6003,$translate,'')); ?> <?php echo e($year); ?> <?php echo e(Helper::translation(6006,$translate,'')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($year == 8): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->eight_year_icon); ?>"  border="0"  title="<?php echo e($year); ?> <?php echo e(Helper::translation(6000,$translate,'')); ?> <?php echo e($allsettings->site_title); ?> <?php echo e(Helper::translation(6003,$translate,'')); ?> <?php echo e($year); ?> <?php echo e(Helper::translation(6006,$translate,'')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($year == 9): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->nine_year_icon); ?>"  border="0"  title="<?php echo e($year); ?> <?php echo e(Helper::translation(6000,$translate,'')); ?> <?php echo e($allsettings->site_title); ?> <?php echo e(Helper::translation(6003,$translate,'')); ?> <?php echo e($year); ?> <?php echo e(Helper::translation(6006,$translate,'')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($year >= 10): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->ten_year_icon); ?>"  border="0"  title="<?php if($year >= 10): ?> 10+ <?php else: ?> <?php echo e($year); ?> <?php endif; ?> <?php echo e(Helper::translation(6000,$translate,'')); ?> <?php echo e($allsettings->site_title); ?> <?php echo e(Helper::translation(6003,$translate,'')); ?> <?php if($year >= 10): ?> 10+ <?php else: ?> <?php echo e($year); ?> <?php endif; ?> <?php echo e(Helper::translation(6006,$translate,'')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($sold_amount >= $badges['setting']->author_sold_level_one && $badges['setting']->author_sold_level_two > $sold_amount): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_sold_level_one_icon); ?>"  border="0"  title="<?php echo e(Helper::translation(6009,$translate,'')); ?> 1: <?php echo e(Helper::translation(6012,$translate,'')); ?> <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_one); ?>+ <?php echo e(Helper::translation(5325,$translate,'')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        
                                        <?php if($sold_amount >= $badges['setting']->author_sold_level_two &&  $badges['setting']->author_sold_level_three > $sold_amount): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_sold_level_two_icon); ?>"  border="0"  title="<?php echo e(Helper::translation(6009,$translate,'')); ?> 2: <?php echo e(Helper::translation(6012,$translate,'')); ?> <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_two); ?>+ <?php echo e(Helper::translation(5325,$translate,'')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($sold_amount >= $badges['setting']->author_sold_level_three &&  $badges['setting']->author_sold_level_four > $sold_amount): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->	author_sold_level_three_icon); ?>"  border="0"  title="<?php echo e(Helper::translation(6009,$translate,'')); ?> 3: <?php echo e(Helper::translation(6012,$translate,'')); ?> <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_three); ?>+ <?php echo e(Helper::translation(5325,$translate,'')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($sold_amount >= $badges['setting']->author_sold_level_four &&  $badges['setting']->author_sold_level_five > $sold_amount): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_sold_level_four_icon); ?>"  border="0"  title="<?php echo e(Helper::translation(6009,$translate,'')); ?> 4: <?php echo e(Helper::translation(6012,$translate,'')); ?> <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_four); ?>+ <?php echo e(Helper::translation(5325,$translate,'')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($sold_amount >= $badges['setting']->author_sold_level_five &&  $badges['setting']->author_sold_level_six > $sold_amount): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_sold_level_five_icon); ?>"  border="0"  title="<?php echo e(Helper::translation(6009,$translate,'')); ?> 5: <?php echo e(Helper::translation(6012,$translate,'')); ?> <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_five); ?>+ <?php echo e(Helper::translation(5325,$translate,'')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($sold_amount >= $badges['setting']->author_sold_level_six): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_sold_level_six_icon); ?>"  border="0"  title="<?php echo e(Helper::translation(6009,$translate,'')); ?> 6: <?php echo e(Helper::translation(6012,$translate,'')); ?> <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_six); ?>+ <?php echo e(Helper::translation(5325,$translate,'')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($sold_amount >= $badges['setting']->author_sold_level_six): ?>
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->power_elite_author_icon); ?>"  border="0"  title="<?php echo e($badges['setting']->author_sold_level_six_label); ?> : Sold more than <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_six); ?>+ <?php echo e(Helper::translation(5325,$translate,'')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($collect_amount >= $badges['setting']->author_collect_level_one && $badges['setting']->author_collect_level_two > $collect_amount): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_one_icon); ?>"  border="0"  title="<?php echo e(Helper::translation(6015,$translate,'')); ?> 1: <?php echo e(Helper::translation(6018,$translate,'')); ?> <?php echo e($badges['setting']->author_collect_level_one); ?>+ <?php echo e(Helper::translation(6021,$translate,'')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($collect_amount >= $badges['setting']->author_collect_level_two && $badges['setting']->author_collect_level_three > $collect_amount): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_two_icon); ?>"  border="0"  title="<?php echo e(Helper::translation(6015,$translate,'')); ?> 2: <?php echo e(Helper::translation(6018,$translate,'')); ?> <?php echo e($badges['setting']->author_collect_level_two); ?>+ <?php echo e(Helper::translation(6021,$translate,'')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($collect_amount >= $badges['setting']->author_collect_level_three && $badges['setting']->author_collect_level_four > $collect_amount): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_three_icon); ?>"  border="0"  title="<?php echo e(Helper::translation(6015,$translate,'')); ?> 3: <?php echo e(Helper::translation(6018,$translate,'')); ?> <?php echo e($badges['setting']->author_collect_level_three); ?>+ <?php echo e(Helper::translation(6021,$translate,'')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($collect_amount >= $badges['setting']->author_collect_level_four && $badges['setting']->author_collect_level_five > $collect_amount): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_four_icon); ?>"  border="0"  title="<?php echo e(Helper::translation(6015,$translate,'')); ?> 4: <?php echo e(Helper::translation(6018,$translate,'')); ?> <?php echo e($badges['setting']->author_collect_level_four); ?>+ <?php echo e(Helper::translation(6021,$translate,'')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($collect_amount >= $badges['setting']->author_collect_level_five && $badges['setting']->author_collect_level_six > $collect_amount): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_five_icon); ?>"  border="0"  title="<?php echo e(Helper::translation(6015,$translate,'')); ?> 5: <?php echo e(Helper::translation(6018,$translate,'')); ?> <?php echo e($badges['setting']->author_collect_level_five); ?>+ <?php echo e(Helper::translation(6021,$translate,'')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($collect_amount >= $badges['setting']->author_collect_level_six): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_six_icon); ?>"  border="0"  title="<?php echo e(Helper::translation(6015,$translate,'')); ?> 6: <?php echo e(Helper::translation(6018,$translate,'')); ?> <?php echo e($badges['setting']->author_collect_level_six); ?>+ <?php echo e(Helper::translation(6021,$translate,'')); ?> <?php echo e($allsettings->site_title); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($referral_count >= $badges['setting']->author_referral_level_one && $badges['setting']->author_referral_level_two > $referral_count): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_one_icon); ?>"  border="0"  title="<?php echo e(Helper::translation(6024,$translate,'')); ?> 1: <?php echo e(Helper::translation(6027,$translate,'')); ?> <?php echo e($badges['setting']->author_referral_level_one); ?>+ <?php echo e(Helper::translation(3002,$translate,'')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($referral_count >= $badges['setting']->author_referral_level_two && $badges['setting']->author_referral_level_three > $referral_count): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_two_icon); ?>"  border="0"  title="<?php echo e(Helper::translation(6024,$translate,'')); ?> 2: <?php echo e(Helper::translation(6027,$translate,'')); ?> <?php echo e($badges['setting']->author_referral_level_two); ?>+ <?php echo e(Helper::translation(3002,$translate,'')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($referral_count >= $badges['setting']->author_referral_level_three && $badges['setting']->author_referral_level_four > $referral_count): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_three_icon); ?>"  border="0"  title="<?php echo e(Helper::translation(6024,$translate,'')); ?> 3: <?php echo e(Helper::translation(6027,$translate,'')); ?> <?php echo e($badges['setting']->author_referral_level_three); ?>+ <?php echo e(Helper::translation(3002,$translate,'')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($referral_count >= $badges['setting']->author_referral_level_four && $badges['setting']->author_referral_level_five > $referral_count): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_four_icon); ?>"  border="0"  title="<?php echo e(Helper::translation(6024,$translate,'')); ?> 4: <?php echo e(Helper::translation(6027,$translate,'')); ?> <?php echo e($badges['setting']->author_referral_level_four); ?>+ <?php echo e(Helper::translation(3002,$translate,'')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($referral_count >= $badges['setting']->author_referral_level_five && $badges['setting']->author_referral_level_six > $referral_count): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_five_icon); ?>"  border="0" title="<?php echo e(Helper::translation(6024,$translate,'')); ?> 5: <?php echo e(Helper::translation(6027,$translate,'')); ?> <?php echo e($badges['setting']->author_referral_level_five); ?>+ <?php echo e(Helper::translation(3002,$translate,'')); ?>">
                                        </li>
                                        <?php endif; ?>
                                        <?php if($referral_count >= $badges['setting']->author_referral_level_six): ?> 
                                        <li>
                                        <img class="lazy other-badges" width="30" height="30" src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_six_icon); ?>"  border="0" title="<?php echo e(Helper::translation(6024,$translate,'')); ?> 6: <?php echo e(Helper::translation(6027,$translate,'')); ?> <?php echo e($badges['setting']->author_referral_level_six); ?>+ <?php echo e(Helper::translation(3002,$translate,'')); ?>">
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
              <?php if($user['user']->profile_heading != ""): ?>
              <div data-aos="fade-up" data-aos-delay="200">
              <hr class="my-4">
              <h6><?php echo e(Helper::translation(3124,$translate,'')); ?></h6>
              <p class="font-size-ms text-muted">
              <b><?php echo e($user['user']->profile_heading); ?></b><br/>
              <?php echo e($user['user']->about); ?>

              </p>
              </div>
              <?php endif; ?>
              <div data-aos="fade-up" data-aos-delay="200">
              <hr class="my-4">
              <h6><?php echo e(Helper::translation(3206,$translate,'')); ?></h6>
              <?php if($user['user']->facebook_url != ""): ?>
              <a class="social-btn sb-facebook sb-outline sb-sm mr-2 mb-2" href="<?php echo e($user['user']->facebook_url); ?>" target="_blank"><i class="dwg-facebook"></i></a>
              <?php else: ?>
              <?php if(Auth::check() && $user['user']->username == Auth::user()->username): ?>
              Add links
              <a class="social-btn sb-facebook sb-outline sb-sm mr-2 mb-2" href="<?php echo e(URL::to('/')); ?>/profile-settings"><i class="dwg-facebook"></i></a>
              <?php endif; ?>
              <?php endif; ?>
              <?php if($user['user']->twitter_url != ""): ?>
              <a class="social-btn sb-twitter sb-outline sb-sm mr-2 mb-2" href="<?php echo e($user['user']->twitter_url); ?>" target="_blank"><i class="dwg-twitter"></i></a>
              <?php else: ?>
               <?php if(Auth::check() && $user['user']->username == Auth::user()->username): ?>
              <a class="social-btn sb-twitter sb-outline sb-sm mr-2 mb-2" href="<?php echo e(URL::to('/')); ?>/profile-settings"><i class="dwg-twitter"></i></a>
              <?php endif; ?>
              <?php endif; ?>
              <?php if($user['user']->instagram_url != ""): ?>
              <a class="social-btn sb-instagram sb-outline sb-sm mr-2 mb-2" href="<?php echo e($user['user']->instagram_url); ?>" target="_blank"><i class="dwg-instagram"></i></a>
              <?php else: ?>
              <?php if(Auth::check() && $user['user']->username == Auth::user()->username): ?>
              <a class="social-btn sb-instagram sb-outline sb-sm mr-2 mb-2" href="<?php echo e(URL::to('/')); ?>/profile-settings"><i class="dwg-instagram"></i></a>
              <?php endif; ?>
              <?php endif; ?>
              <?php if($user['user']->linkedin_url != ""): ?>
              <a class="social-btn sb-linkedin sb-outline sb-sm mr-2 mb-2" href="<?php echo e($user['user']->linkedin_url); ?>" target="_blank"><i class="dwg-linkedin"></i></a>
              <?php else: ?>
              <?php if(Auth::check() && $user['user']->username == Auth::user()->username): ?>
              <a class="social-btn sb-linkedin sb-outline sb-sm mr-2 mb-2" href="<?php echo e(URL::to('/')); ?>/profile-settings"><i class="dwg-linkedin"></i></a>
              <?php endif; ?>
              <?php endif; ?>
              <?php if($user['user']->pinterest_url != ""): ?>
              <a class="social-btn sb-pinterest sb-outline sb-sm mr-2 mb-2" href="<?php echo e($user['user']->pinterest_url); ?>" target="_blank"><i class="dwg-pinterest"></i></a>
              <?php else: ?>
               <?php if(Auth::check() && $user['user']->username == Auth::user()->username): ?>
              <a class="social-btn sb-pinterest sb-outline sb-sm mr-2 mb-2" href="<?php echo e(URL::to('/')); ?>/profile-settings"><i class="dwg-pinterest"></i></a>
              <?php endif; ?>
              <?php endif; ?>
              </div>
              
              <div data-aos="fade-up" data-aos-delay="200">
              <hr class="my-4">
              <ul class="profile-menu">
                <li>
                  <a href="<?php echo e(url('/user')); ?>/<?php echo e($user['user']->username); ?>"><span class="dwg-home"></span> <?php echo e(Helper::translation(2926,$translate,'')); ?></a>
                </li>
                <?php if($user['user']->user_type == 'vendor'): ?>
                <li>
                <a href="<?php echo e(url('/user-reviews')); ?>/<?php echo e($user['user']->username); ?>"><span class="dwg-star"></span> <?php echo e(Helper::translation(3207,$translate,'')); ?></a>
                </li>
                <?php endif; ?>
                <li>
                <a href="<?php echo e(url('/user-followers')); ?>/<?php echo e($user['user']->username); ?>"><span class="dwg-user"></span> <?php echo e(Helper::translation(3197,$translate,'')); ?> (<?php echo e($followercount); ?>)</a>
                </li>
                <li>
                <a href="<?php echo e(url('/user-following')); ?>/<?php echo e($user['user']->username); ?>"><span class="dwg-user"></span> <?php echo e(Helper::translation(3201,$translate,'')); ?> (<?php echo e($followingcount); ?>)</a>
                </li>
              </ul>
              </div>
              <?php if(Auth::check()): ?>
              <?php if($user['user']->username != Auth::user()->username): ?>
              <div data-aos="fade-up" data-aos-delay="200">
              <hr class="my-4">
              <h6 class="pb-1"><?php echo e(Helper::translation(2915,$translate,'')); ?> <?php echo e($user['user']->username); ?></h6>
              <form action="<?php echo e(route('user')); ?>" class="setting_form" id="item_form" method="post" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <div class="form-group">
                  <textarea name="message" class="form-control" id="author-message" rows="6" placeholder="<?php echo e(Helper::translation(3209,$translate,'')); ?>" data-bvalidator="required"></textarea>
                  <input type="hidden" name="from_email" value="<?php echo e(Auth::user()->email); ?>" />
                  <input type="hidden" name="from_name" value="<?php echo e(Auth::user()->name); ?>" />
                  <input type="hidden" name="to_email" value="<?php echo e($user['user']->email); ?>" />
                  <input type="hidden" name="to_name" value="<?php echo e($user['user']->name); ?>" />
                  <input type="hidden" name="to_id" value="<?php echo e($user['user']->id); ?>" />
                </div>
                <?php if($additional->site_google_recaptcha == 1): ?>
                <div class="form-group">
                  <label for="cf-message"><?php echo e(Helper::translation(3244,$translate,'')); ?><span class="text-danger">*</span></label>
                  <?php echo app('captcha')->display(); ?>

                    <?php if($errors->has('g-recaptcha-response')): ?>
                      <span class="help-block">
                         <span class="red"><?php echo e($errors->first('g-recaptcha-response')); ?></span>
                      </span>
                     <?php endif; ?>
                </div>
                <?php endif; ?>
                <button class="btn btn-primary btn-sm btn-block" type="submit"><?php echo e(Helper::translation(3210,$translate,'')); ?></button>
              </form>
              </div>
              <?php endif; ?>
              <?php endif; ?>
              <?php if(Auth::guest()): ?>
              <div data-aos="fade-up" data-aos-delay="200">
              <hr class="my-4">
              <h6 class="pb-1"><?php echo e(Helper::translation(2915,$translate,'')); ?> <?php echo e($user['user']->username); ?></h6>
              <p class="font-size-ms text-muted">
                  <?php echo e(Helper::translation(3061,$translate,'')); ?> <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><?php echo e(Helper::translation(3020,$translate,'')); ?></a> <?php echo e(Helper::translation(3062,$translate,'')); ?>

              </p>
              <!--<p class="font-size-ms text-muted">-->
              <!--    <?php echo e(Helper::translation(3061,$translate,'')); ?> <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><?php echo e(Helper::translation(3020,$translate,'')); ?></a> <?php echo e(Helper::translation(3062,$translate,'')); ?>-->
              <!--</p>-->
              </div>
              <?php endif; ?> 
            </div>
          </aside><?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/user-menu.blade.php ENDPATH**/ ?>