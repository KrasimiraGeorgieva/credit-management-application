<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Models\Credit;
use App\Models\Payment;
use Illuminate\Contracts\Foundation\Application as ContractsApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create(): View|Application|Factory|ContractsApplication
    {
        $credits = Credit::all();

        return view('payments.create', compact('credits'));
    }

    public function store(StorePaymentRequest $request): RedirectResponse
    {
        $credit = Credit::find($request->credit_id);
        $remainingBalance = $credit->amount - $credit->payments->sum('amount');

        if ($request->amount > $remainingBalance) {
            Payment::create([
                'credit_id' => $request->credit_id,
                'amount' => $remainingBalance,
            ]);

            return back()->with('warning', 'Сумата за плащане надвишава останалата дължима сума. Изтеглено е дължимото');
        }

        Payment::create([
            'credit_id' => $request->credit_id,
            'amount' => $request->amount,
        ]);

        return redirect()->route('credits.index')->with('success', 'Плащането е успешно направено.');
    }
}
