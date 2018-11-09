<?php

namespace App\Jobs;


use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Model\Contact;
use App\Http\Controller\ExcelController;

use App\Mail\sendEmailMailable;
use Illuminate\Support\Facades\Mail;

use Carbon;
use Log;

class insertContactJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $jobData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($jobData)
    {
        //
        $this->jobData = $jobData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //

        // Mail::to('tonmoy.mmj@gmail.com')->send(new sendEmailMailable());
        
        foreach ($this->jobData as $key => $value) {
            Log::info('inserted'.$value[0]);
            /*$asd  = [
                [
                    'number' => $value[0],
                ],
                [
                    'number' => $value[0],
                ]
            ];*/
            $data = array(
                array('number' => $value[0], 'created_at' => Carbon\Carbon::Now(), 'updated_at' => Carbon::Now(), ),
                array('number' => $value[0], 'created_at' => Carbon\Carbon::Now(), 'updated_at' => Carbon::Now(), ),
            );

            Contact::insert($data);
        }
        // Log::info($this->jobData);
    }
}
