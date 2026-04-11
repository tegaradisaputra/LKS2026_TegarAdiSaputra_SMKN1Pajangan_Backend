<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBusinessVerificationRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'nama_usaha' => 'required',
            'nib' => 'required',
            'npwp' => 'required',
            'omzet_bulanan' => 'required',
            'jumlah_karyawan' => 'required',
            'lama_usaha_tahun' => 'required'
        ];
    }
}
