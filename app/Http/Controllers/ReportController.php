<?php
namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function daily()
    {
        $today = now()->toDateString();

        $report = Report::firstOrCreate(
            ['report_date' => $today],
            [
                'total_users' => User::count(),
                'total_loans' => Loan::whereDate('created_at', $today)->count(),
                'total_approved_loans' => Loan::whereDate('created_at', $today)->where('status', 'approved')->count(),
            ]
        );

        return response()->json($report);
    }
}
