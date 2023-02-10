<?php

namespace App\Http\Requests\V1;

use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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
                'name'      => ['required', 'string', 'max:255'],
                'type'      => ['required', Rule::in(['I', 'i', 'C', 'c'])],
                'email'     => ['required', 'string', 'email', 'max:255'],
                'phone'     => ['required', 'string', 'max:255'],
                'address'   => ['required', 'string', 'max:255'],
                'city'      => ['required', 'string', 'max:255'],
                'state'     => ['required', 'string', 'max:255'],
                'country'   => ['required', 'string', 'max:255'],
                'zip'       => ['required', 'string', 'max:255'],
            ];
        } else {
            return [
                'name'      => ['sometimes', 'required', 'string', 'max:255'],
                'type'      => ['sometimes', 'required', Rule::in(['I', 'i', 'C', 'c'])],
                'email'     => ['sometimes', 'required', 'string', 'email', 'max:255'],
                'phone'     => ['sometimes', 'required', 'string', 'max:255'],
                'address'   => ['sometimes', 'required', 'string', 'max:255'],
                'city'      => ['sometimes', 'required', 'string', 'max:255'],
                'state'     => ['sometimes', 'required', 'string', 'max:255'],
                'country'   => ['sometimes', 'required', 'string', 'max:255'],
                'zip'       => ['sometimes', 'required', 'string', 'max:255'],
            ];
        }
    }
}
