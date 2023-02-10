<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;


class CustomerFilter extends ApiFilter
{
    protected $allowedParams = [
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'phone' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'zip' => ['eq', 'gt', 'lt']
    ];
    
    protected $columnMap = [];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<'
    ];
}
