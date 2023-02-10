<?php

namespace App\Services\V1;

use Illuminate\Http\Request;

class CustomerQuery
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

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<'
    ];

    public function transform(Request $request)
    {
        $queryItems = [];
        foreach ($this->allowedParams as $param => $operators) {
            $query = $request->query($param);

            if (!isset($query)) {
                continue;
            }

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $queryItems[] = [$param, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }
        return $queryItems;
    }
}
