<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Birthday;
use Carbon\Carbon;
use Auth;
use Kavenegar;

class SendBirthdaySms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
      $today_birthdays = Birthday::whereMonth('birthday_date', '=', date('m'))->whereDay('birthday_date', '=', Carbon::tomorrow()->day)->get();
      foreach ($today_birthdays as $birth) {
        $sender = "10004346";
        $message = "فراموش نکنید که فردا تولد " . $birth->name . " است.  ";
        $receptor = $birth->user->phone;
        $result = Kavenegar::Send($sender,$receptor,$message);


      }

      $this->info('Birthday messages sent successfully!');
    }
}
