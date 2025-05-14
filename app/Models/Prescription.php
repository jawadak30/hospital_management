<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{
    /** @use HasFactory<\Database\Factories\PrescriptionFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['doctor_id', 'patient_id'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function items()
{
    return $this->hasMany(PrescriptionItem::class);
}
}
