<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rutina extends Model
{
    use HasFactory;
    protected $table = 'rutina';
    
    // public function rutina() {
    //     return $this->belongsTo(rutina::class, 'rutina_id');
    // }
}
