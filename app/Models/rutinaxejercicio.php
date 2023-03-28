<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rutinaxejercicio extends Model
{
    use HasFactory;
    protected $table = 'rutinaxejercicio';
    // public function rutina() {
    //     return $this->hasMany(\App\rutina::class,'rutina_id');
    // }
    // public function ejercicio() {
    //     return $this->hasMany(\App\ejercicio::class,'ejercicio_id');
    // }
    // con hasMany se indica que una rutina o un ejercicio puede tener varios registros asociados en la tabla "rutinaxejercicio".
}
