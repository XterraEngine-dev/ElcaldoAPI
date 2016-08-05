<?php

namespace App\Http\Controllers;

use App\Agregar;
use App\AgregarAdmin;
use Illuminate\Http\Request;


class AgregarController extends Controller
{

    public function index()
    {
        $todo = AgregarAdmin::all();
        return response()->json(['agregar' => $todo ],201);
    }

    public function store(Request $request)
    {

        $caldos = new Agregar;
        $caldos->nombre = $request->input('nombre');
        $caldos->ingredientes = $request->input('ingredientes');
        $caldos->preparacion = $request ->input('preparacion');
        $caldos->region = $request ->input('region');
        $caldos->imagen = $request ->input('imagen');
        $caldos->save();

        return response()->json(['agregar' => 'agregar insertado'],201);

    }


    public function show($id)
    {
        $caldoid = AgregarAdmin::find($id);

        return response()->json(['agregar' => $caldoid],200);
    }


    public function destroy($id)
    {
        AgregarAdmin::destroy($id);
        return response()->json(['agregar' => 'agregar eliminado'],200);
    }



    public function update($id, Request $request){


        $metodo = $request->method();
        $agregar = AgregarAdmin::find($id);
        if(!$agregar)
        {
            return response()->json(['agregar' => 'No se encuentra este agregar', 'codigo' => 404],404);
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
                $agregar->nombre = $nombre;
                $bandera = true;
            }

            /**
             * ingredientes
             */

            $ingredientes = $request->input('ingredientes');
            if($ingredientes != null && $ingredientes != '')
            {
                $agregar->ingredientes = $ingredientes;
                $bandera = true;
            }

            /**
             * preparacion
             */

            $preparacion = $request->input('preparacion');
            if($preparacion !=null && $preparacion != ''){

                $agregar->preparacion = $preparacion;
                $bandera = true;

            }

            /**
             * region
             */
            $region = $request->input('region');
            if($region !=null && $region != ''){

                $agregar->region = $region;
                $bandera = true;

            }

            /**
             * imagen
             */

            $imagen = $request->input('imagen');
            if($imagen != null && $imagen != ''){

                $agregar->imagen = $imagen;
                $bandera = true;

            }


            if($bandera)
            {
                $agregar->save();
                return response()->json(['agregar' => 'agregar editado'],200);
            }
            return response()->json(['agregar' => 'No se modificó ningun agregar'],200);
        }
        $nombre = $request->input('nombre');
        $ingredientes = $request->input('ingredientes');
        $preparacion = $request->input('preparacion');
        $region = $request->input('region');
        $imagen = $request->input('imagen');
        if(!$nombre || !$ingredientes || $preparacion || $region || $imagen)
        {
            return response()->json(['agregar' => 'No se pudieron procesar los valores', 'codigo' => 422],422);
        }
        $agregar->nombre = $nombre;
        $agregar->ingredientes = $ingredientes;
        $agregar->preparacion = $preparacion;
        $agregar->region = $region;
        $agregar->imagen = $imagen;
        $agregar->save();


        return response()->json(['agregar' => 'editado'],200);



    }


}
