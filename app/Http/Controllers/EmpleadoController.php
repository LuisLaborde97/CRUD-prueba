<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\compania;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $empleado = new Empleado();

        $empleado->primer_nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->id_compania = $request->compania;
        $empleado->correo = $request->correo;
        $empleado->telefono = $request->telefono;

        $empleado->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = DB::select('SELECT empleados.id, empleados.primer_nombre, empleados.apellido, empleados.correo, empleados.telefono, companias.nombre as compania FROM
        prueba.companias, prueba.empleados WHERE empleados.id_compania = companias.id');

        return view('edit.show_empleado', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = DB::select("SELECT empleados.id_compania, empleados.id, empleados.primer_nombre, empleados.apellido, empleados.correo, empleados.telefono, companias.nombre as compania FROM
        prueba.companias, prueba.empleados WHERE empleados.id_compania = companias.id AND empleados.id = '$id'");

        $compania = Compania::paginate(10);

        return view('edit.edit_empleado', compact('empleado', 'compania'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        
        
         $empleado->primer_nombre = $request->nombre;
         $empleado->apellido = $request->apellido;
         $empleado->id_compania = $request->compania;
         $empleado->correo = $request->correo;
         $empleado->telefono = $request->telefono;
         
         $empleado->save();

         return redirect()->route('index.compania');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::table('empleados')->where('id',$id)->delete();

        return redirect()->route('index.compania', $delete);
    }
}
