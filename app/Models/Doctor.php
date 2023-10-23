<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function scopeSearch($query, $term) {
        $term = "%$term%";
        $query->where('dr_firstname','LIKE', $term)
            ->orWhere('dr_lastname','LIKE', $term);
    }

    public function scopeSearch2($query, $term) {
        $term = "%$term%";
        dd("Term : " . $term);
    }
}
