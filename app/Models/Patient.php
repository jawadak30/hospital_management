<?php

namespace App\Models;

use App\Models\Appointment;
use App\Models\Bed;
use App\Models\Invoice;
use App\Models\MedicalRecord;
use App\Models\Prescription;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    /** @use HasFactory<\Database\Factories\PatientFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id', 'dob', 'address', 'phone'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

    public function beds()
    {
        return $this->hasMany(Bed::class);
    }

    // Define the relationship to User (if Patient has a related User model)
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function bed()
    {
        return $this->hasOne(Bed::class);
    }
}
