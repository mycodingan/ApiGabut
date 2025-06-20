<?php

namespace App\Listeners;

use App\Events\LoanCreated;
use App\Jobs\SendLoanEmailJob;

class SendLoanNotification
{
    public function handle(LoanCreated $event)
    {
        // Dispatch job to send email
        SendLoanEmailJob::dispatch($event->loan);
    }
}
