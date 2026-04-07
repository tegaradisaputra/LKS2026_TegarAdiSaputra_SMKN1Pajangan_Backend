<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessVerifications extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'nama_usaha',
        'nib',
        'npwp',
        'omzet_bulanan',
        'jumlah_karyawan',
        'lama_usaha_tahun'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function financingApplication(): HasOne {
        return $this->hasOne(FinancingApplications::class);
    }

    public function installments(): HasMany {
        return $this->hasMany(Installments::class);
    }
}
