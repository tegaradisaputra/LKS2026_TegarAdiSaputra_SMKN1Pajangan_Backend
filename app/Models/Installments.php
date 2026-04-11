<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Installments extends Model
{
    //
    use HasUuid, HasFactory, SoftDeletes;

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
