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
            'jumlah_pembiayaan' => 'somtimes|required|min:',
            'tenor_bulan' => 'somtimes|required',
            'tujuan_pembiayaan' => 'somtimes|required',
            'skor_kelayakan' => 'somtimes|required',
            'rekomendasi_limit' => 'somtimes|required',
            'catatan_analisis' => 'somtimes|required',
            'status' => 'somtimes|required',
            'submitted_at' => 'somtimes|required',
            'approved_at' => 'somtimes|required',
            'rejected_reason' => 'somtimes|required',
        ];
    }
}
