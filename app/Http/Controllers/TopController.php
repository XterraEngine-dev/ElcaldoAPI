<?php

namespace App\Http\Controllers;

use App\Top;
use Illuminate\Http\Request;

use App\Http\Requests;

class TopController extends Controller
{

    public function index()
    {
        $todo = Top::all();
        return response()->json(['top' => $todo ],201);
    }

    public function store(Request $request)
    {

        $caldos = new top;
        $caldos->nombre = $request->input('nombre');
        $caldos->ingredientes = $request->input('ingredientes');
        $caldos->preparacion = $request ->input('preparacion');
        $caldos->region = $request ->input('region');
        $caldos->imagen = $request ->input('imagen');
        $caldos->save();

        return response()->json(['top' => 'caldo insertado'],201);

    }


    public function show($id)
    {
        $caldoid = Top::find($id);

        return response()->json(['top' => $caldoid],200);
    }


    public function destroy($id)
    {
        Top::destroy($id);
        return response()->json(['top' => 'caldo eliminado'],200);
    }



    public function update($id, Request $request){


        $metodo = $request->method();
        $top = Top::find($id);
        if(!$top)
        {
            return response()->json(['top' => 'No se encuentra este top', 'codigo' => 404],404);
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
                $top->nombre = $nombre;
                $bandera = true;
            }

            /**
             * ingredientes
             */

            $ingredientes = $request->input('ingredientes');
            if($ingredientes != null && $ingredientes != '')
            {
                $top->ingredientes = $ingredientes;
                $bandera = true;
            }

            /**
             * preparacion
             */

            $preparacion = $request->input('preparacion');
            if($preparacion !=null && $preparacion != ''){

                $top->preparacion = $preparacion;
                $bandera = true;

            }

            /**
             * region
             */
            $region = $request->input('region');
            if($region !=null && $region != ''){

                $top->region = $region;
                $bandera = true;

            }

            /**
             * imagen
             */

            $imagen = $request->input('imagen');
            if($imagen != null && $imagen != ''){

                $top->imagen = $imagen;
                $bandera = true;

            }


            if($bandera)
            {
                $top->save();
                return response()->json(['top' => 'caldo editado'],200);
            }
            return response()->json(['top' => 'No se modificó ningun top'],200);
        }
        $nombre = $request->input('nombre');
        $ingredientes = $request->input('ingredientes');
        $preparacion = $request->input('preparacion');
        $region = $request->input('region');
        $imagen = $request->input('imagen');
        if(!$nombre || !$ingredientes || $preparacion || $region || $imagen)
        {
            return response()->json(['top' => 'No se pudieron procesar los valores', 'codigo' => 422],422);
        }
        $top->nombre = $nombre;
        $top->ingredientes = $ingredientes;
        $top->preparacion = $preparacion;
        $top->region = $region;
        $top->imagen = $imagen;
        $top->save();


        return response()->json(['top' => 'editado'],200);



    }

}
