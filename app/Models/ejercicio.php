<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ejercicio extends Model
{
    use HasFactory;
    protected $table = 'ejercicio';
    
    // public function ejercicio() {
    //     return $this->belongsTo(ejercicio::class, 'ejercicio_id');
    // }
}
