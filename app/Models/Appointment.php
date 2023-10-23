<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function scopeSearch($query, $term) {
        $term = "%$term%";
        $query->where('ap_patient_firstname','LIKE', $term)
            ->orWhere('ap_patient_lastname','LIKE', $term)
            ->orWhere('ap_appointment_date','LIKE', $term)
            ->orWhere('ap_patient_email','LIKE', $term)
            ->orWhere('ap_patient_telephone','LIKE', $term);
    }

    // public function scopeSearchDate($query, $term) {
    //     $term = "%$term%";
    //     $query->where('ap_appointment_date','LIKE', $term);
    // }
}
