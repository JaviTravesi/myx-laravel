<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ejercicio extends Model
{
    use HasFactory;
    protected $table = 'ejercicios';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'n_reps',
        'n_rondas',
        'video',
    ];
    
    /**
     * The attributes that should be cast.
     *
     * 
     * @var array<string, string>
     */
    protected $casts = [
        'create_at' => 'datetime',
        'update_at' => 'datetime'
    ];
    public function rutina(){
        return $this->belongsToMany('App\Models\rutina');
    }
    //relacion muchos a muchos
}
