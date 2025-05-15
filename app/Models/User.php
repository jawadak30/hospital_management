<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Secretary;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'google_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function hasRole($role)
    {
        return $this->getAttribute('role') === $role;
    }

    public function isPatient()
    {
        return $this->hasRole('patient');
    }

    public function isSecretary()
    {
        return $this->hasRole('secretary');
    }

    public function isDoctor()
    {
        return $this->hasRole('doctor');
    }
        public function isSuperAdmin()
    {
        return $this->hasRole('super_admin');
    }

    // Check if the user is a Google user (based on the google_id field)
    public function isGoogleUser()
    {
        return !is_null($this->google_id);
    }

    // Redirect authenticated user based on role
    public function redirectAuthUser()
    {
        if ($this->isGoogleUser()) {
            return redirect()->route('google_dashboard');
        } elseif ($this->isDoctor()) {
            return redirect()->route('doctor_dashboard');
        } elseif ($this->isSecretary()) {
            return redirect()->route('secretary_dashboard');
        } elseif ($this->isPatient()) {
            return redirect()->route('patient_dashboard');
        } elseif ($this->isSuperAdmin()) {
            return redirect()->route('admin_dashboard');
        }


        return redirect()->route('guest_welcome');
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function secretary()
    {
        return $this->hasOne(Secretary::class);
    }

    public function patient()
    {
        return $this->hasOne(Patient::class);
    }
}
