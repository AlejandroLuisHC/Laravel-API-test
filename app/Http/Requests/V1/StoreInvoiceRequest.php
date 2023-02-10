<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'customerId' => ['required', 'integer'],
            'amout'      => ['required', 'numeric'],
            'status'     => ['required', Rule::in(['B', 'P', 'V', 'b', 'p', 'v'])],
            'billedAt'   => ['required', 'date'],
            'paidAt'     => ['required', 'date'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'customer_id' => $this->customerId,
            'billed_at' => $this->billedAt,
            'paid_at' => $this->paidAt
        ]);
    }
}
