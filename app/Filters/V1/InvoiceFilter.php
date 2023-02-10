<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;


class InvoiceFilter extends ApiFilter
{
    protected $allowedParams = [
        'customerId' => ['eq'],
        'amount' => ['eq', 'gt', 'lt', 'gte', 'lte'],
        'status' => ['eq', 'neq'],
        'billedAt' => ['eq', 'gt', 'lt', 'gte', 'lte'],
        'paidAt' => ['eq', 'gt', 'lt', 'gte', 'lte'],
    ];
    
    protected $columnMap = [
        'customerId' => 'customer_id',
        'billedAt' => 'billed_at',
        'paidAt' => 'paid_at',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<',
        'gte' => '>=',
        'lte' => '<=',
        'neq' => '!=',
    ];
}

