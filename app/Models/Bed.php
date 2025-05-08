<?php

namespace App\Models;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bed extends Model
{
    /** @use HasFactory<\Database\Factories\BedFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['patient_id', 'occupied'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
