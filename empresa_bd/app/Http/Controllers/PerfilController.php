<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function show(Perfil $perfil){        

        return view('personas', [
            'perfil' => $perfil,
            
            'personas' => $perfil->personas()->with('perfil')->latest()->paginate()
        ]);       
    }
}
