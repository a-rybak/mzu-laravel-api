<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PurchaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_name' => ['required', 'max:64', Rule::unique('purchases', 'product_name')->ignore($this->purchase)],
            'quantity' => ['required', 'numeric', 'between:0,100'],
            'price' => ['required', 'decimal:2', 'between:10,1000'],
        ];
    }
}
