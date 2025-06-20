<?php

namespace App\Listeners;

use App\Events\LoanCreated;
use App\Mail\LoanCreatedMail;
use Illuminate\Support\Facades\Mail;

class SendLoanCreatedEmail
{
    public function handle(LoanCreated $event)
    {
        // $loan = $event->loan;
        // $user = $loan->user; // pastikan ada relasi user() di model Loan

        // if ($user && $user->email) {
        //     Mail::to($user->email)->send(new LoanCreatedMail($loan));
        // }
         $loan = $event->loan;
        Mail::to($loan->user->email)->send(new LoanCreatedMail($loan));
    }
}
