<?php
// app/Http/Controllers/ProjectController.php
namespace App\Http\Controllers;

use App\Calientes;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CalientesController extends Controller
{
    public function index()
    {
        $todo = Calientes::all();
        return response()->json(['calientes' => $todo ],201);
    }

    public function store(Request $request)
    {

        $calientes = new Calientes;
        $calientes->nombre = $request->input('nombre');
        $calientes->ingredientes = $request->input('ingredientes');
        $calientes->preparacion = $request ->input('preparacion');
        $calientes->region = $request ->input('region');
        $calientes->imagen = $request ->input('imagen');
        $calientes->save();

        return response()->json(['calientes' => 'caliente insertado'],201);


    }


    public function show($id)
    {
        $calienteid = Calientes::find($id);
        return response()->json(['calientes' => $calienteid],200);
    }


    public function destroy($id)
    {
        Calientes::destroy($id);
        return response()->json(['calientes' => 'calientes eliminado'],200);
    }



    public function update($id, Request $request){


        $metodo = $request->method();
        $calientes = Calientes::find($id);
        if(!$calientes)
        {
            return response()->json(['calientes' => 'No se encuentra este calientes', 'codigo' => 404],404);
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
                $calientes->nombre = $nombre;
                $bandera = true;
            }

            /**
             * ingredientes
             */

            $ingredientes = $request->input('ingredientes');
            if($ingredientes != null && $ingredientes != '')
            {
                $calientes->ingredientes = $ingredientes;
                $bandera = true;
            }

            /**
             * preparacion
             */

            $preparacion = $request->input('preparacion');
            if($preparacion !=null && $preparacion != ''){

                $calientes->preparacion = $preparacion;
                $bandera = true;

            }

            /**
             * region
             */
            $region = $request->input('region');
            if($region !=null && $region != ''){

                $calientes->region = $region;
                $bandera = true;

            }

            /**
             * imagen
             */

            $imagen = $request->input('imagen');
            if($imagen != null && $imagen != ''){

                $calientes->imagen = $imagen;
                $bandera = true;

            }


            if($bandera)
            {
                $calientes->save();
                return response()->json(['calientes' => 'calientes editado'],200);
            }
            return response()->json(['calientes' => 'No se modificó ningun calientes'],200);
        }
        $nombre = $request->input('nombre');
        $ingredientes = $request->input('ingredientes');
        $preparacion = $request->input('preparacion');
        $region = $request->input('region');
        $imagen = $request->input('imagen');
        if(!$nombre || !$ingredientes || $preparacion || $region || $imagen)
        {
            return response()->json(['calientes' => 'No se pudieron procesar los valores', 'codigo' => 422],422);
        }
        $calientes->nombre = $nombre;
        $calientes->ingredientes = $ingredientes;
        $calientes->preparacion = $preparacion;
        $calientes->region = $region;
        $calientes->imagen = $imagen;
        $calientes->save();

        return response()->json(['calientes' => 'calientes editado'],200);



    }



}
