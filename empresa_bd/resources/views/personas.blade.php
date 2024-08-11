@extends('layout')

@section('title', 'Personas')

@section('content')

    @isset($category)
        <div>
            <h1 style="margin-left: 1%"  class="display-4 mb-0">{{ $perfil->name }}</h1>
            <a style="margin-left: 1%"  href="{{ route('personas.index') }}">Regresar a personas</a>
        </div>
    @else
        <h1 style="margin-left: 1%" class="display-4 mb-0">Personas</h1>
    @endisset

    <div class="row">
        <tr>
            @auth
                <a style="margin-left: 1%" href=" {{ route('personas.create') }} ">Nueva Persona</a>
            @endauth
        </tr>
    </div>
    <br>
    <br>
    <table class="table table-bordered" style="width: 40%; margin-left: 1%">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Perfil</th>
        </tr>
            @if($personas)
                @foreach($personas as $persona)
                
                <tr>
                    <td>
                        @if($persona->image)
                            <img src="/storage/{{ $persona->image }}" alt ="{{ $persona->cPerNombre }} width="50" height="50">
                        @endif
                        <a href="{{ route('personas.show', $persona) }}">{{ $persona->cPerNombre }}</a>
                    </td>
                    <td>
                        {{ $persona->cPerApellido }}
                    </td>
                    <td>
                        {{ $persona->nPerEdad }}
                    </td>
                    <td >
                        @if($persona->perfil_id)
                           <a href="{{ route('perfiles.show', $persona->perfil) }}"> {{ $persona->perfil->name }} </a>
                        @endif
                    </td>
                </tr>
                </a>    
                @endforeach
            @else
                <li>No existe ninguna persona que mostar</li>
            @endif
    </table>
   <br>
    <tr>
        <td colspan="1">
            <div style="margin-left: 1%" class="pagination pagination-sm pagination-custom .page-link">
            {{$personas->links()}}
            </div>
        </td>
    </tr>
    
@endsection