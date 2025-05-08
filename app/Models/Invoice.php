<?php

namespace App\Models;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    /** @use HasFactory<\Database\Factories\InvoiceFactory> */
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['patient_id', 'amount', 'status', 'path'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
