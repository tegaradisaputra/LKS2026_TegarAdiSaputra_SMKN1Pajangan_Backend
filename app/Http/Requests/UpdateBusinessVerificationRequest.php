<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBusinessVerificationRequest extends FormRequest
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
            'nama_usaha' => 'somtimes|required',
            'nib' => 'somtimes|required',
            'npwp' => 'somtimes|required',
            'omzet_bulanan' => 'somtimes|required',
            'jumlah_karyawan' => 'somtimes|required',
            'lama_usaha_tahun' => 'somtimes|required'
        ];
    }
}
