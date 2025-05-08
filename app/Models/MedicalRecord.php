<?php

namespace App\Models;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalRecord extends Model
{
    /** @use HasFactory<\Database\Factories\MedicalRecordFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['patient_id', 'diagnosis', 'treatment'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
