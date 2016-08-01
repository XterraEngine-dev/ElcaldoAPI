<?php

namespace App\Http\Controllers;

use App\Caldos;
use Illuminate\Http\Request;

use App\Http\Requests;

class CaldosController extends Controller
{

    public function index()
    {
        $todo = Caldos::all();
        return response()->json(['caldos' => $todo ],201);
    }

    public function store(Request $request)
    {

        $caldos = new Caldos;
        $caldos->nombre = $request->input('nombre');
        $caldos->ingredientes = $request->input('ingredientes');
        $caldos->preparacion = $request ->input('preparacion');
        $caldos->region = $request ->input('region');
        $caldos->imagen = $request ->input('imagen');
        $caldos->save();

        return response()->json(['caldos' => 'caldo insertado'],201);

    }


    public function show($id)
    {
        $caldoid = Caldos::find($id);

        return response()->json(['caldos' => $caldoid],200);
    }


    public function destroy($id)
    {
        Caldos::destroy($id);
        return response()->json(['caldos' => 'caldo eliminado'],200);
    }



    public function update($id, Request $request){


        $metodo = $request->method();
        $caldos = Caldos::find($id);
        if(!$caldos)
        {
            return response()->json(['caldo' => 'No se encuentra este caldos', 'codigo' => 404],404);
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
                $caldos->nombre = $nombre;
                $bandera = true;
            }

            /**
             * ingredientes
             */

            $ingredientes = $request->input('ingredientes');
            if($ingredientes != null && $ingredientes != '')
            {
                $caldos->ingredientes = $ingredientes;
                $bandera = true;
            }

            /**
             * preparacion
             */

            $preparacion = $request->input('preparacion');
            if($preparacion !=null && $preparacion != ''){

                $caldos->preparacion = $preparacion;
                $bandera = true;

            }

            /**
             * region
             */
             $region = $request->input('region');
            if($region !=null && $region != ''){

                $caldos->region = $region;
                $bandera = true;

            }

            /**
             * imagen
             */

            $imagen = $request->input('imagen');
            if($imagen != null && $imagen != ''){

                $caldos->imagen = $imagen;
                $bandera = true;

            }


            if($bandera)
            {
                $caldos->save();
                return response()->json(['mensaje' => 'caldo editado'],200);
            }
            return response()->json(['mensaje' => 'No se modificó ningun caldos'],200);
        }
        $nombre = $request->input('nombre');
        $ingredientes = $request->input('ingredientes');
        $preparacion = $request->input('preparacion');
        $region = $request->input('region');
        $imagen = $request->input('imagen');
        if(!$nombre || !$ingredientes || $preparacion || $region || $imagen)
        {
            return response()->json(['caldos' => 'No se pudieron procesar los valores', 'codigo' => 422],422);
        }
        $caldos->nombre = $nombre;
        $caldos->ingredientes = $ingredientes;
        $caldos->preparacion = $preparacion;
        $caldos->region = $region;
        $caldos->imagen = $imagen;
        $caldos->save();


        return response()->json(['caldos' => 'editado'],200);



    }




}
