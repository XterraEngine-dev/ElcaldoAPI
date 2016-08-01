<?php
// app/Http/Controllers/ProjectController.php
namespace App\Http\Controllers;


use App\Tamales;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TamalesController extends Controller
{
    public function index()
    {
        $todo = Tamales::all();
        return response()->json(['tamales' => $todo ],201);
    }

    public function store(Request $request)
    {

        $tamales = new Tamales();
        $tamales->nombre = $request->input('nombre');
        $tamales->ingredientes = $request->input('ingredientes');
        $tamales->preparacion = $request ->input('preparacion');
        $tamales->region = $request ->input('region');
        $tamales->imagen = $request ->input('imagen');
        $tamales->save();

        return response()->json(['tamales' => 'tamal insertado'],201);

    }


    public function show($id)
    {
        $tamalesid = Tamales::find($id);
        return response()->json(['tamales' => $tamalesid],200);
    }


    public function destroy($id)
    {
        Tamales::destroy($id);
        return response()->json(['tamales' => 'tamal eliminado'],200);
    }



    public function update($id, Request $request){


        $metodo = $request->method();
        $tamales = Tamales::find($id);
        if(!$tamales)
        {
            return response()->json(['mensaje' => 'No se encuentra este tamales', 'codigo' => 404],404);
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
                $tamales->nombre = $nombre;
                $bandera = true;
            }

            /**
             * ingredientes
             */

            $ingredientes = $request->input('ingredientes');
            if($ingredientes != null && $ingredientes != '')
            {
                $tamales->ingredientes = $ingredientes;
                $bandera = true;
            }

            /**
             * preparacion
             */

            $preparacion = $request->input('preparacion');
            if($preparacion !=null && $preparacion != ''){

                $tamales->preparacion = $preparacion;
                $bandera = true;

            }

            /**
             * region
             */
            $region = $request->input('region');
            if($region !=null && $region != ''){

                $tamales->region = $region;
                $bandera = true;

            }

            /**
             * imagen
             */

            $imagen = $request->input('imagen');
            if($imagen != null && $imagen != ''){

                $tamales->imagen = $imagen;
                $bandera = true;

            }


            if($bandera)
            {
                $tamales->save();
                return response()->json(['tamales' => 'tamales editado'],200);
            }
            return response()->json(['tamales' => 'No se modificó ningun tamales'],200);
        }
        $nombre = $request->input('nombre');
        $ingredientes = $request->input('ingredientes');
        $preparacion = $request->input('preparacion');
        $region = $request->input('region');
        $imagen = $request->input('imagen');
        if(!$nombre || !$ingredientes || $preparacion || $region || $imagen)
        {
            return response()->json(['tamales' => 'No se pudieron procesar los valores', 'codigo' => 422],422);
        }
        $tamales->nombre = $nombre;
        $tamales->ingredientes = $ingredientes;
        $tamales->preparacion = $preparacion;
        $tamales->region = $region;
        $tamales->imagen = $imagen;
        $tamales->save();
        return response()->json(['tamales' => 'tamales editado'],200);

    }

}
