<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInvoiceRequest extends FormRequest
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
        $method = $this->method();

        if ($method === 'PUT') {
            return [
                'customerId' => ['required', 'integer'],
                'amout'      => ['required', 'numeric'],
                'status'     => ['required', Rule::in(['B', 'P', 'V', 'b', 'p', 'v'])],
                'billedAt'   => ['required', 'date'],
                'paidAt'     => ['required', 'date'],
            ];
        } else {
            return [
                'customerId' => ['sometimes', 'integer'],
                'amout'      => ['sometimes', 'numeric'],
                'status'     => ['sometimes', Rule::in(['B', 'P', 'V', 'b', 'p', 'v'])],
                'billedAt'   => ['sometimes', 'date'],
                'paidAt'     => ['sometimes', 'date'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        if ($this->customerId) {
            $this->merge(['customer_id' => $this->customerId]);
        }
        if ($this->billedAt) {
            $this->merge(['billed_at' => $this->billedAt]);
        }
        if ($this->paidAt) {
            $this->merge(['paid_at' => $this->paidAt]);
        }
    }
}
