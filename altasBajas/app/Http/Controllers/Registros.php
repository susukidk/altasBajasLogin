<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Registro;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Registros extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth'])->only(['index']);
    }

    public function index()
    {
        
        
        $titulo = 'Inicio';
        $items = Registro::all();

        $Ganado = DB::table('registro')
            ->where('tipo', '=', 'Ingresos')
            ->sum('cantidad');
        $Gastado = DB::table('registro')
            ->where('tipo', '=', 'Gastos')
            ->sum('cantidad');


        return view('/modules/clientes/index',compact('titulo','items','Ganado', 'Gastado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = 'Agregar Datos';
        return view('/modules/clientes/create', compact('titulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Registro();
        $item->tipo = $request->tipo;
        $item->categoria = $request->categoria;
        $item->cantidad = $request->cantidad;
        $item->descripcion = $request->descripcion;
        $item->fecha = $request->fecha;
        $item->save();
        Alert::success('Agregado', 'Agregado con Exito');
        return redirect('/modules/clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $titulo = "Eliminar ingreso";
        $items = Registro::find($id);
        return view( "/modules/clientes/eliminar" , compact( 'items' , 'titulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $titulo = 'Actualizar datos';
        $items = Registro::find($id);
        return view('/modules/clientes/edit', compact('items' , 'titulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Registro::find($id);
        $item->tipo = $request->tipo;
        $item->categoria = $request->categoria;
        $item->cantidad = $request->cantidad;
        $item->descripcion = $request->descripcion;
        $item->fecha = $request->fecha;
        $item->save();
        Alert::success('Actualizo', 'Se actualizo correctamente');
        return redirect('/modules/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Registro::find($id);
        $item->delete();
        Alert::success('Elimino', 'Se elimino correctamente');
        return redirect('/modules/clientes');

    }
}
