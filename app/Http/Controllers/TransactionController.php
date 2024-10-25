<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Inertia\Inertia;
use App\Http\Requests\Transaction\StoreRequest;
use App\Http\Requests\Transaction\UpdateRequest;
use App\Services\TransactionService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private TransactionService $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $transactions = auth()->user()->transactions;
        $sumByCategory = $transactions->groupBy('category')->map(function ($group) {
            return $group->sum('sum');
        });
        return Inertia::render('Transaction/Index', [
            'title' => 'Transactions',
            'transactions' => $transactions,
            'sumByCategory' => $sumByCategory,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Transaction/Create', [
            'title' => 'Create Transaction'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $transaction = $this->transactionService->store($data);

        return redirect()->route('transactions.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        Gate::authorize('update', $transaction);
        return Inertia::render('Transaction/Edit', [
            'title' => 'Create Transaction',
            'transaction' => $transaction
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Transaction $transaction)
    {
        Gate::authorize('update', $transaction);
        
        $data = $request->validated();

        $this->transactionService->update($transaction, $data);

        return redirect()->route('transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        Gate::authorize('delete', $transaction);
        
        $this->transactionService->delete($transaction);

        return redirect()->route('transactions.index');
    }
}
