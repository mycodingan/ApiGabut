<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class LoanApproved implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $loan;

    public function __construct($loan)
    {
        $this->loan = $loan;
    }

    public function broadcastOn()
    {
        return ['loan-status']; // public channel
    }

    public function broadcastAs()
    {
        return 'LoanApproved'; // frontend listen pakai .LoanApproved
    }
}
