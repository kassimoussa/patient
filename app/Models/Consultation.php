<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_patient', 'medecin', 'motif','resultats_clinique', 'resultats_paraclinique', 'diagnostiques',
        'traitements', 'date_consult',  
    ];
}
