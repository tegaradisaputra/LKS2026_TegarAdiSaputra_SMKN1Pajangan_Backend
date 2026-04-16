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
            'nama_usaha' => 'required|string|max:255',
            'alamat_usaha' => 'required|string',
            'jenis_usaha' => 'required|string|max:255',
            'nib' => 'required|string|max:255',
            'npwp' => 'required|string|max:255',
            'omset_bulanan' => 'required|numeric|min:0',
            'lama_beroperasi' => 'required|integer|min:0',
            'status_kepemilikan' => 'required|string|max:255',
            'jumlah_karyawan' => 'required|integer|min:0',
            'deskripsi_usaha' => 'required|string',
        ];
    }
}
