<?php
// app/Http/Controllers/ProjectController.php
namespace App\Http\Controllers;

use App\Otras;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class OtrasController extends Controller
{
    public function index()
    {
        $todo = Otras::all();
        return response()->json(['otras' => $todo ],201);
    }

    public function store(Request $request)
    {

        $otras = new otras;
        $otras->nombre = $request->input('nombre');
        $otras->ingredientes = $request->input('ingredientes');
        $otras->preparacion = $request ->input('preparacion');
        $otras->region = $request ->input('region');
        $otras->imagen = $request ->input('imagen');
        $otras->save();

        return response()->json(['otras' => 'otras insertado'],201);
    }


    public function show($id)
    {
        $otrasid = Otras::find($id);
        return response()->json(['otras' => $otrasid],200);
    }


    public function destroy($id)
    {
        Otras::destroy($id);
        return response()->json(['otras' => 'otras eliminado'],200);
    }



    public function update($id, Request $request){


        $metodo = $request->method();
        $otras = Otras::find($id);
        if(!$otras)
        {
            return response()->json(['mensaje' => 'No se encuentra este otras', 'codigo' => 404],404);
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
                $otras->nombre = $nombre;
                $bandera = true;
            }

            /**
             * ingredientes
             */

            $ingredientes = $request->input('ingredientes');
            if($ingredientes != null && $ingredientes != '')
            {
                $otras->ingredientes = $ingredientes;
                $bandera = true;
            }

            /**
             * preparacion
             */

            $preparacion = $request->input('preparacion');
            if($preparacion !=null && $preparacion != ''){

                $otras->preparacion = $preparacion;
                $bandera = true;

            }

            /**
             * region
             */
            $region = $request->input('region');
            if($region !=null && $region != ''){

                $otras->region = $region;
                $bandera = true;

            }

            /**
             * imagen
             */

            $imagen = $request->input('imagen');
            if($imagen != null && $imagen != ''){

                $otras->imagen = $imagen;
                $bandera = true;

            }


            if($bandera)
            {
                $otras->save();
                return response()->json(['otras' => 'otras editado'],200);
            }
            return response()->json(['otras' => 'No se modificó ningun otras'],200);
        }
        $nombre = $request->input('nombre');
        $ingredientes = $request->input('ingredientes');
        $preparacion = $request->input('preparacion');
        $region = $request->input('region');
        $imagen = $request->input('imagen');
        if(!$nombre || !$ingredientes || $preparacion || $region || $imagen)
        {
            return response()->json(['otras' => 'No se pudieron procesar los valores', 'codigo' => 422],422);
        }
        $otras->nombre = $nombre;
        $otras->ingredientes = $ingredientes;
        $otras->preparacion = $preparacion;
        $otras->region = $region;
        $otras->imagen = $imagen;
        $otras->save();

        return response()->json(['otras' => 'otras editado'],200);



    }

}
