<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionTransaction;

class TransactionController extends Controller
{
    /**
     * Display transaction history.
     */
    public function index()
    {
        $transactions = SubscriptionTransaction::with('user')
            ->latest('paid_at')
            ->paginate(15);

        return view('admin.transactions.index', compact('transactions'));
    }

    /**
     * Display transaction details.
     */
    public function show(SubscriptionTransaction $transaction)
    {
        // $transaction->load(['user', 'items']);
        $transaction->load('user');

        return view('admin.transactions.show', compact('transaction'));
    }
}