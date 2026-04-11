<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancingApplications extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'business_verification_id',
        'jumlah_pembiayaan',
        'tenor_bulan',
        'tujuan_pembiayaan',
        'skor_kelayakan',
        'rekomendasi_limit',
        'catatan_analisis',
        'status',
        'submitted_at',
        'approved_at',
        'rejected_reason',
    ];

    public function installments()
    {
        return $this->hasMany(Installments::class, 'financing_application_id');
    }

    public function logs(): HasMany {
        return $this->hasMany(ApplicationLogs::class);
    }
}
