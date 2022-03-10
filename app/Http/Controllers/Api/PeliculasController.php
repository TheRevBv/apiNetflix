<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Peliculas;
use App\Http\Resources\PeliculasResource;

class PeliculasController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Peliculas::all();

        return $this->sendResponse(PeliculasResource::collection($peliculas), 'Peliculas mostradas correctamente.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'imagen' => 'required',
            'descripcion' => 'required',
            'actores' => 'required',
            'fechaEstreno' => 'required',
            'url' => 'required',
        ]);
        //PAGINATE funciona para mostrar un numero limitado de registros por paginas
        // return Peliculas::create($request->paginate(numero de elementos a mostrar));
        return Peliculas::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peliculas = Peliculas::find($id);

        if (is_null($peliculas)) {
            return $this->sendError('Pelicula no encontrada.');
        }

        return $this->sendResponse(new PeliculasResource($peliculas), 'Pelicula mostrada correctamente.');
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

        $peliculas = Peliculas::find($id);
        $peliculas->update($request->all());
        return $this->sendResponse(new PeliculasResource($peliculas), 'Peliculas actualizadas correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Peliculas::destroy($id);
    }

    /**
     * Search the specified resource from storage for name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($titulo)
    {
        return Peliculas::where('titulo', 'like', '%' . $titulo . '%')->get();
    }
}
