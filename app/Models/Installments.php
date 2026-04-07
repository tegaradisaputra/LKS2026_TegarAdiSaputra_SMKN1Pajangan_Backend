<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Installments extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'financing_application_id',
        'installment_number',
        'jatuh_tempo',
        'nominal_pokok',
        'nominal_bunga',
        'total_cicilan',
        'status',
        'paid_at',
    ];

    public function businessVerifications(): BelongsTo {
        return $this->belongsTo(BusinessVerifications::class);
    }

    public function financingApplications(): HasOne {
        return $this->hasOne(FinancingApplications::class);
    }
}
