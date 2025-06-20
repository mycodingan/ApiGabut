<?php

namespace App\Http\Controllers;

use App\Events\LoanApproved;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\LoanCreated;
use App\Mail\LoanCreatedMail;
use Illuminate\Support\Facades\Mail;

class LoanController extends Controller
{
    public function approve(Request $request)
    {

        $request->validate([
            'loan_id' => 'required|exists:loans,id',
        ]);

        $loan = Loan::findOrFail($request->loan_id);
        $loan->status = 'approved';
        $loan->save();

        // Broadcast event
        event(new LoanApproved($loan));

        return response()->json([
            'message' => 'Loan berhasil disetujui & dibroadcast ke frontend.',
            'data' => $loan
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        $loan = Loan::create([
            'user_id' => Auth::id(),
            'amount' => $validated['amount'],
            'status' => 'pending',
            'notes' => $validated['notes'] ?? null,
        ]);

        // event(new LoanCreatedMail($loan));
        Mail::to(Auth::user()->email)->send(new LoanCreatedMail($loan));

        return response()->json([
            'message' => 'Pinjaman berhasil dibuat dan email berhasil dikirim.',
            'data' => $loan,
        ], 201);
    }
}
