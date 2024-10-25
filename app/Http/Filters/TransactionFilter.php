<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class TransactionFilter extends AbstractFilter
{

    public const START_DATE = 'start_date';
    public const END_DATE = 'end_date';

    protected function getCallbacks(): array
    {
        return [
            self::START_DATE => [$this, 'start_date'],
            self::END_DATE => [$this, 'end_date'],
        ];
    }
    
    public function start_date(Builder $builder, string $start_date): void
    {
        $builder->where('created_at', '>=', $start_date);
    }
    
    public function end_date(Builder $builder, string $end_date): void
    {
        $builder->where('created_at', '<=', $end_date . ' 23:59:59');
    }
}