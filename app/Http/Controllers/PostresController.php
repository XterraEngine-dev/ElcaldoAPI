<?php
// app/Http/Controllers/ProjectController.php
namespace App\Http\Controllers;

use App\Postres;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PostresController extends Controller
{
    public function index()
    {
        $todo = Postres::all();
        return response()->json(['postres' => $todo ],201);
    }

    public function store(Request $request)
    {

        $postres = new Postres();
        $postres->nombre = $request->input('nombre');
        $postres->ingredientes = $request->input('ingredientes');
        $postres->preparacion = $request ->input('preparacion');
        $postres->region = $request ->input('region');
        $postres->imagen = $request ->input('imagen');
        $postres->save();

        return response()->json(['postres' => 'postre insertado'],201);

    }


    public function show($id)
    {
        $postresid = Postres::find($id);
        return response()->json(['postres' => $postresid],200);
    }


    public function destroy($id)
    {
        Postres::destroy($id);
        return response()->json(['postres' => 'postre eliminado'],200);
    }



    public function update($id, Request $request){


        $metodo = $request->method();
        $postres = Postres::find($id);
        if(!$postres)
        {
            return response()->json(['mensaje' => 'No se encuentra este postres', 'codigo' => 404],404);
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
                $postres->nombre = $nombre;
                $bandera = true;
            }

            /**
             * ingredientes
             */

            $ingredientes = $request->input('ingredientes');
            if($ingredientes != null && $ingredientes != '')
            {
                $postres->ingredientes = $ingredientes;
                $bandera = true;
            }

            /**
             * preparacion
             */

            $preparacion = $request->input('preparacion');
            if($preparacion !=null && $preparacion != ''){

                $postres->preparacion = $preparacion;
                $bandera = true;

            }

            /**
             * region
             */
            $region = $request->input('region');
            if($region !=null && $region != ''){

                $postres->region = $region;
                $bandera = true;

            }

            /**
             * imagen
             */

            $imagen = $request->input('imagen');
            if($imagen != null && $imagen != ''){

                $postres->imagen = $imagen;
                $bandera = true;

            }


            if($bandera)
            {
                $postres->save();
                return response()->json(['postres' => 'postres editado'],200);
            }
            return response()->json(['postres' => 'No se modificó ningun postres'],200);
        }
        $nombre = $request->input('nombre');
        $ingredientes = $request->input('ingredientes');
        $preparacion = $request->input('preparacion');
        $region = $request->input('region');
        $imagen = $request->input('imagen');
        if(!$nombre || !$ingredientes || $preparacion || $region || $imagen)
        {
            return response()->json(['postres' => 'No se pudieron procesar los valores', 'codigo' => 422],422);
        }
        $postres->nombre = $nombre;
        $postres->ingredientes = $ingredientes;
        $postres->preparacion = $preparacion;
        $postres->region = $region;
        $postres->imagen = $imagen;
        $postres->save();

        return response()->json(['postres' => 'editado'],200);

    }

}
