<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();

        return $user !== null && $user -> tokenCan('create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'      => ['required', 'string', 'max:255'],
            'type'      => ['required', Rule::in(['I', 'i', 'C', 'c'])],
            'email'     => ['required', 'string', 'email', 'unique:customers', 'max:255'],
            'phone'     => ['required', 'string', 'unique:customers', 'max:255'],
            'address'   => ['required', 'string', 'max:255'],
            'city'      => ['required', 'string', 'max:255'],
            'state'     => ['required', 'string', 'max:255'],
            'country'   => ['required', 'string', 'max:255'],
            'zip'       => ['required', 'string', 'max:255'],
        ];
    }
}
