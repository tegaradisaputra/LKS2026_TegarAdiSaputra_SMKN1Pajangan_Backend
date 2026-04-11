<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationLogs extends Model
{
    //
    use HasUuid, HasFactory, SoftDeletes;

    protected $fillable = [
        'financing_application_id',
        'status_from',
        'status_to',
        'role',
        'user_id',
        'notes'
    ];

    public function financingApplication()
    {
        return $this->belongsTo(FinancingApplications::class, 'financing_application_id');
    }
}
