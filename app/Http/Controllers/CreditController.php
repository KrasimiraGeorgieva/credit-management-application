<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCreditRequest;
use App\Models\Credit;
use App\Models\Recipient;
use Illuminate\Contracts\Foundation\Application as ContractsApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class CreditController extends Controller
{
    public function index(): View|Application|Factory|ContractsApplication
    {
        $credits = Credit::with('recipient')->get();

        return view('credits.index', compact('credits'));
    }

    public function create(): View|Application|Factory|ContractsApplication
    {
        return view('credits.create');
    }

    public function store(StoreCreditRequest $request): RedirectResponse
    {
        $recipient = Recipient::firstOrCreate(['name' => $request->recipient_name]);

        //$totalCreditsAmount = $recipient->credits->sum('amount');
        if ($recipient->credits->sum('amount') + $request->amount > 80000) {
            return back()->with('error', 'Кредитополучателят има общо кредити на стойност над 80 000 лв.');
        }

        Credit::create([
            'recipient_id' => $recipient->id,
            'amount' => $request->amount,
            'term_months' => $request->term_months,
        ]);

        return redirect()->route('credits.index')->with('success', 'Кредитът е създаден успешно.');
    }
}
