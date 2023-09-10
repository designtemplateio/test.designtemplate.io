<?php

namespace Fickrr\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Fickrr\Models\Users;
use Fickrr\Models\Settings;
use Fickrr\Models\EmailTemplate;
use Mail;

class SendSubscriptionExpirationReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder email for expiring subscriptions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $expirationDate = Carbon::now()->addDays(2)->format('Y-m-d');
       $completed = 'completed';
	   $subscriptions = Users::where('user_subscr_date',  $expirationDate)->where('user_subscr_payment_status', $completed)->get();

        foreach ($subscriptions as $subscription) {
            $name = $subscription->name;
            $email = $subscription->email;
            $user_token = $subscription->user_token;
        $sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		$from_name = $setting['setting']->sender_name;
        $from_email = $setting['setting']->sender_email;
		$record = array('user_token' => $user_token, 'from_email' => $from_email, 'name' => $name);
		/* email template code */
	          $checktemp = EmailTemplate::checkTemplate(25);
			  if($checktemp != 0)
			  {
			  $template_view['mind'] = EmailTemplate::viewTemplate(25);
			  $template_subject = $template_view['mind']->et_subject;
			  }
			  else
			  {
			  $template_subject = "Forgot Password";
			  }
			  /* email template code */
		Mail::send('subscription_reminder_mail', $record, function($message) use ($from_name, $from_email, $email, $name, $user_token, $template_subject) {
			$message->to($email, $name)
					->subject($template_subject);
			$message->from($from_email,$from_name);
		});
          
        }

        $this->info('Subscription expiration reminders sent successfully!');
    }
}
