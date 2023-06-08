<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rutina extends Model
{
    use HasFactory;
    protected $table = 'rutinas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'nivel'
    ];

    // public function rutina() {
    //     return $this->belongsTo(rutina::class, 'rutina_id');
    // }
    public function ejercicio(){
        return $this->belongsToMany('App\Models\ejercicio');
    }
    //relacion muchos a muchos
}
