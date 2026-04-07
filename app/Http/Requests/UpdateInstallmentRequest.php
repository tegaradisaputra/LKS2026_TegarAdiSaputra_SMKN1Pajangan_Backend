<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateInstallmentRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'installment_number' => 'required|ineger',
            'jatuh_tempo' => 'required',
            'nominal_pokok' => 'required',
            'nominal_bunga' => 'required',
            'total_cicilan' => 'required',
            'status' => 'required',
            'paid_at' => 'required'
        ];
    }
}
