<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compania;
use App\Models\Empleado;
use Illuminate\Support\Facades\DB;

class CompaniaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compania = Compania::paginate(10);
        $empleado = DB::select('SELECT empleados.id, empleados.primer_nombre, empleados.apellido, empleados.correo, empleados.telefono, companias.nombre as compania FROM
        prueba.companias, prueba.empleados WHERE empleados.id_compania = companias.id');

        return view('home', compact('compania', 'empleado'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compania = new Compania();

        $request->validate([
            'nombre' => 'required',
            'logo' => '|image|mimes:png,jpg,jpeg'
        ]);

        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $direccion = 'storage/logos/';
            $nombre = time(). '-'. $logo->getClientOriginalName();
            $subir = $request->file('logo')->move($direccion, $nombre);
            $compania->logo = $direccion.$nombre;
        }

        $compania->nombre = $request->nombre;
        $compania->correo = $request->correo;
        $compania->pagina_web = $request->pagina_web;

        $compania->save();

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
        $compania = Compania::where('id',$id)->get();
        return view('edit.show_compania', compact('compania'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $compania = Compania::where('id',$id)->get();

        return view('edit.edit_compania', compact('compania'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compania $compania)
    {
        $request->validate([
            'nombre' => 'required',
            'logo' => '|image|mimes:png,jpg,jpeg'
        ]);
        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $direccion = 'storage/logos/';
            $nombre = time(). '-'. $logo->getClientOriginalName();
            $subir = $request->file('logo')->move($direccion, $nombre);
            $compania->logo = $direccion.$nombre;
        }
         $compania->nombre = $request->nombre;
         $compania->correo = $request->correo;
         $compania->pagina_web = $request->pagina_web;
         
         $compania->save();

         return redirect()->route('index.compania', $compania);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::table('companias')->where('id',$id)->delete();

        return redirect()->route('index.compania', $delete);
    }
}
