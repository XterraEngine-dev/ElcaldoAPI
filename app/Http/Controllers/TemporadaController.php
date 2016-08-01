<?php

namespace App\Http\Controllers;

use App\Temporada;
use Illuminate\Http\Request;

use App\Http\Requests;
use Psy\Exception\Exception;

class TemporadaController extends Controller
{
    public function index()
    {
        $todo = Temporada::all();
        return response()->json(['temporada' => $todo ],201);
    }

    public function store(Request $request)
    {

        $temporada = new Temporada();
        $temporada->nombre = $request->input('nombre');
        $temporada->ingredientes = $request->input('ingredientes');
        $temporada->preparacion = $request ->input('preparacion');
        $temporada->region = $request ->input('region');
        $temporada->imagen = $request ->input('imagen');
        $temporada->save();

        return response()->json(['temporada' => 'temporada insertado'],201);

    }


    public function show($id)
    {
        $tempoadaid = Temporada::find($id);
        return response()->json(['temporada' => $tempoadaid],200);
    }


    public function destroy($id)
    {
        Temporada::destroy($id);
        return response()->json(['temporada' => 'temporada eliminado'],200);
    }



    public function update($id, Request $request){


        $metodo = $request->method();
        $temporada = Temporada::find($id);
        if(!$temporada)
        {
            return response()->json(['mensaje' => 'No se encuentra este temporada', 'codigo' => 404],404);
        }
        if($metodo === 'PATCH')
        {
            $bandera = false;

            /**
             * nombre
             */

            $nombre = $request->input('nombre');
            if($nombre != null && $nombre != '')
            {
                $temporada->nombre = $nombre;
                $bandera = true;
            }

            /**
             * ingredientes
             */

            $ingredientes = $request->input('ingredientes');
            if($ingredientes != null && $ingredientes != '')
            {
                $temporada->ingredientes = $ingredientes;
                $bandera = true;
            }

            /**
             * preparacion
             */

            $preparacion = $request->input('preparacion');
            if($preparacion !=null && $preparacion != ''){

                $temporada->preparacion = $preparacion;
                $bandera = true;

            }

            /**
             * region
             */
            $region = $request->input('region');
            if($region !=null && $region != ''){

                $temporada->region = $region;
                $bandera = true;

            }

            /**
             * imagen
             */

            $imagen = $request->input('imagen');
            if($imagen != null && $imagen != ''){

                $temporada->imagen = $imagen;
                $bandera = true;

            }


            if($bandera)
            {
                $temporada->save();
                return response()->json(['temporada' => 'tempoada editado'],200);
            }
            return response()->json(['temporada' => 'No se modificó ningun temporada'],200);
        }
        $nombre = $request->input('nombre');
        $ingredientes = $request->input('ingredientes');
        $preparacion = $request->input('preparacion');
        $region = $request->input('region');
        $imagen = $request->input('imagen');
        if(!$nombre || !$ingredientes || $preparacion || $region || $imagen)
        {
            return response()->json(['temporada' => 'No se pudieron procesar los valores', 'codigo' => 422],422);
        }
        $temporada->nombre = $nombre;
        $temporada->ingredientes = $ingredientes;
        $temporada->preparacion = $preparacion;
        $temporada->region = $region;
        $temporada->imagen = $imagen;
        $temporada->save();
        return response()->json(['temporada' => 'temporada editado'],200);



    }


}
