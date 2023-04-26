@extends('layouts/main')
@section('contenido')
    <div class="container">
        <h1 class="Titulo mt-4 text-center">
            Editar el Ingreso
        </h1>
        <div class="row">
            <div class="col">
                <a href="/" class="btn btn-info"> Regresar </a>
                <hr>
                <form action="{{route ('update', $items->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="tipo">Seleciona El Tipo</label>
                    <select name="tipo" id="tipo" class="form-control" value="{{$items->tipo}}" >
                        @foreach (['Gastos', 'Ingresos'] as $tipo)
                            <option value="{{ $tipo }}">{{ $tipo }}</option>
                        @endforeach
                    </select>

                    <label for="categoria">Selecciona La Categoria</label>
                    <select name="categoria" id="categoria" class="form-control" value="{{$items->categoria}}"  >
                        @foreach (['Pasajes', 'Salidas', 'Comida', 'Dulces', 'Mandado',
                                   'Medicamentos', 'Videojuegos', 'Componentes', 'Trabajo', 
                                   'Reparacion de Algun Equipo', 'Venta de Dulces', 'Trabajo Extras', 
                                   'Dinero Encontrado','Otros'] as $categoria)

                            <option value="{{ $categoria }}">{{ $categoria }}</option>
                        @endforeach
                    </select>


                    <label for="cantidad">Escribe la Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{$items->cantidad}}"  >
                    <label for="descripcion">Escribe la descripcion</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control"  value="{{$items->descripcion}}" >
                    <label for="fecha">Escribe la fecha</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" value="{{$items->fecha}}">
                    <button class="btn btn-primary mt-3">
                        Actualizar
                    </button>

                </form>
            </div>
        </div>
    </div> 
    
    
    
@endsection