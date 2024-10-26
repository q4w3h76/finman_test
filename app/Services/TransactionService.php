<?php

namespace App\Services;

use App\Models\Transaction;
use App\Http\Filters\TransactionFilter;
use Illuminate\Database\Eloquent\Collection;

class TransactionService
{
    public function getAll($filters)
    {
        $filter = app()->make(TransactionFilter::class, ['queryParams' => array_filter($filters)]);
        
        $transactions = Transaction::whereUserId(auth()->user()->id)->filter($filter)->orderByDesc('created_at')->get();
        
        return $transactions;
    }

    public function getSumByCategory($transactions)
    {
        return $transactions->groupBy('category')->map(function ($group) {
            return round($group->sum('sum'), 2);
        });   
    }

    public function store(array $data): Transaction
    {
        $data['user_id'] = auth()->user()->id;

        $transaction = Transaction::create($data);

        return $transaction;
    }
    
    public function update(Transaction $transaction, array $data): void
    {
        $transaction->update($data);
    }
    
    public function delete(Transaction $transaction): void
    {
        $transaction->delete();
    }
}