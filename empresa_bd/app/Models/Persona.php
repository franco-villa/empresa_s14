<?php

namespace App\Models;

use App\Models\Perfil;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'persona';
    protected $guarded = [];

    protected $fillable = ['image', 'perfil_id', 'cPerNombre', 'cPerApellido', 'cPerDireccion', 'dPerFecNac', 'nPerEdad', 'nPerSueldo', 'nPerEstado'];

    public function perfil(){
        return $this->belongsTo(Perfil::class);
    }
}
