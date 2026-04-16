<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreFinancingApplicationRequest extends FormRequest
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
            'business_verifications_id' => 'required|exists:business_verifications,id',
            'jumlah_pembiayaan' => 'required|numeric|min:1000000',
            'tenor_bulan' => 'required|integer|min:1|max:120',
            'tujuan_pembiayaan' => 'required|string|max:255',
            // Analysis fields are optional on creation, filled by verifier later
            'skor_kelayakan' => 'nullable|numeric|min:0|max:100',
            'rekomendasi_limit' => 'nullable|numeric|min:0',
            'catatan_analisis' => 'nullable|string',
            // Status and timestamps are set by system
            'status' => 'nullable|string',
            'submitted_at' => 'nullable|date',
            'approved_at' => 'nullable|date',
            'rejected_reason' => 'nullable|string',
        ];
    }
}
