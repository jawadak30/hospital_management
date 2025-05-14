<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrescriptionItem extends Model
{
    /** @use HasFactory<\Database\Factories\PrescriptionItemFactory> */
    use HasFactory,SoftDeletes;
        protected $fillable = ['prescription_id', 'medication', 'dosage'];

    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }
}
