<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFinancingApplicationRequest extends FormRequest
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
            'jumlah_pembiayaan' => 'required|min:',
            'tenor_bulan' => 'required',
            'tujuan_pembiayaan' => 'required',
            'skor_kelayakan' => 'required',
            'rekomendasi_limit' => 'required',
            'catatan_analisis' => 'required',
            'status' => 'required',
            'submitted_at' => 'required',
            'approved_at' => 'required',
            'rejected_reason' => 'required',
        ];
    }
}
