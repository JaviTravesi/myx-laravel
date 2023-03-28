<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuario';

    # nos devolverán si un usuario tiene permisos de administrador, coach o atleta
    // public function isAdmin()
    // {
    //     return $this->is_admin;
    // }

    // public function isCoach()
    // {
    //     return $this->is_coach;
    // }

    // public function isAtleta()
    // {
    //     return $this->is_atleta;
    // }
}
