<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Installments extends Model
{
    //
    use HasUuids, HasFactory, SoftDeletes;

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

    public function financingApplication()
    {
        return $this->belongsTo(FinancingApplications::class, 'financing_application_id');
    }
}
