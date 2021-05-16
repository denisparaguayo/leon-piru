<?php

namespace App\Http\Controllers;

use App\Models\Cuchillo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CuchilloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['cuchillos']=Cuchillo::paginate(3);
        return view('cuchillo.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cuchillo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'tipo' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'descripcion' => 'required|string|max:800',
            'caracteristica' => 'required|string|max:500',
            'stock' => 'required|string|max:100',
            'foto' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];

        $mensaje=[
            'required' => ':attribute es Requerido',
            'foto.required' => 'La foto es Requerida'
        ];


        $this->validate($request, $campos,$mensaje);

        // $datosCuchillos = request()->all();
        $datosCuchillos = request()->except('_token');
         
        if($request->hasfile('foto')){
            $datosCuchillos['foto']=$request->file('foto')->store('uploads', 'public');
        }

        Cuchillo::insert($datosCuchillos);

        return redirect('cuchillo')->with('mensaje', 'Cuchillo Agregado con Exito');
        // return response()->json($datosCuchillos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuchillo  $cuchillo
     * @return \Illuminate\Http\Response
     */
    public function show(Cuchillo $cuchillo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuchillo  $cuchillo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cuchillo=Cuchillo::findOrFail($id);
        return view('cuchillo.edit', compact('cuchillo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuchillo  $cuchillo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $campos=[
            'tipo' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'descripcion' => 'required|string|max:800',
            'caracteristica' => 'required|string|max:500',
            'stock' => 'required|string|max:100'
            
        ];

        $mensaje=[
            'required' => ':attribute es Requerido',
            
        ];

        if($request->hasfile('foto')){

            $campos=['foto' => 'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['foto.required' => 'La foto es Requerida'];
        };


        $this->validate($request, $campos,$mensaje);
        $datosCuchillos = request()->except(['_token', '_method']);
        
        if($request->hasfile('foto')){
            $cuchillo=Cuchillo::findOrFail($id);
            Storage::delete('public/'.$cuchillo->foto);

            $datosCuchillos['foto']=$request->file('foto')->store('uploads', 'public');
        }

        Cuchillo::where('id','=',$id)->update($datosCuchillos);

        $cuchillo=Cuchillo::findOrFail($id);
        return redirect('cuchillo')->with('mensaje', 'Cuchillo Actualizado con Exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuchillo  $cuchillo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cuchillo=Cuchillo::findOrFail($id);

        if(Storage::delete('public/'.$cuchillo->foto)){

            Cuchillo::destroy($id);
        };
        
        return redirect('cuchillo')->with('mensaje', 'Cuchillo Borrado con Exito');
    }
}
