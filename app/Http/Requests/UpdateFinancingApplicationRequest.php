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
            'jumlah_pembiayaan' => 'sometimes|numeric|min:1000000',
            'tenor_bulan' => 'sometimes|integer|min:1|max:120',
            'tujuan_pembiayaan' => 'sometimes|string|max:255',
            'skor_kelayakan' => 'sometimes|numeric|min:0|max:100',
            'rekomendasi_limit' => 'sometimes|numeric|min:0',
            'catatan_analisis' => 'sometimes|string',
            'status' => 'sometimes|string',
            'submitted_at' => 'sometimes|date',
            'approved_at' => 'sometimes|date',
            'rejected_reason' => 'sometimes|string',
        ];
    }
}
