<?php

namespace App\Services;

use App\Models\Transaction;

class TransactionService
{
    // public function getAllByFilter()

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