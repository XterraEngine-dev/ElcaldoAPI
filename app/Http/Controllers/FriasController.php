<?php
// app/Http/Controllers/ProjectController.php
namespace App\Http\Controllers;

use App\Frias;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FriasController extends Controller
{
    public function index()
    {
        $todo = Frias::all();
        return response()->json(['frias' => $todo ],201);
    }

    public function store(Request $request)
    {

        $frias = new frias;
        $frias->nombre = $request->input('nombre');
        $frias->ingredientes = $request->input('ingredientes');
        $frias->preparacion = $request ->input('preparacion');
        $frias->region = $request ->input('region');
        $frias->imagen = $request ->input('imagen');
        $frias->save();

        return response()->json(['frias' => 'frias insertado'],201);

    }


    public function show($id)
    {
        $friasid = Frias::find($id);

        return response()->json(['frias' => $friasid],200);
    }


    public function destroy($id)
    {
        Frias::destroy($id);
        return response()->json(['frias' => 'frias eliminado'],200);
    }



    public function update($id, Request $request){


        $metodo = $request->method();
        $frias = Frias::find($id);
        if(!$frias)
        {
            return response()->json(['mensaje' => 'No se encuentra este frias', 'codigo' => 404],404);
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
                $frias->nombre = $nombre;
                $bandera = true;
            }

            /**
             * ingredientes
             */

            $ingredientes = $request->input('ingredientes');
            if($ingredientes != null && $ingredientes != '')
            {
                $frias->ingredientes = $ingredientes;
                $bandera = true;
            }

            /**
             * preparacion
             */

            $preparacion = $request->input('preparacion');
            if($preparacion !=null && $preparacion != ''){

                $frias->preparacion = $preparacion;
                $bandera = true;

            }

            /**
             * region
             */
            $region = $request->input('region');
            if($region !=null && $region != ''){

                $frias->region = $region;
                $bandera = true;

            }

            /**
             * imagen
             */

            $imagen = $request->input('imagen');
            if($imagen != null && $imagen != ''){

                $frias->imagen = $imagen;
                $bandera = true;

            }


            if($bandera)
            {
                $frias->save();
                return response()->json(['frias' => 'frias editado'],200);
            }
            return response()->json(['frias' => 'No se modificó ningun frias'],200);
        }
        $nombre = $request->input('nombre');
        $ingredientes = $request->input('ingredientes');
        $preparacion = $request->input('preparacion');
        $region = $request->input('region');
        $imagen = $request->input('imagen');
        if(!$nombre || !$ingredientes || $preparacion || $region || $imagen)
        {
            return response()->json(['frias' => 'No se pudieron procesar los valores', 'codigo' => 422],422);
        }
        $frias->nombre = $nombre;
        $frias->ingredientes = $ingredientes;
        $frias->preparacion = $preparacion;
        $frias->region = $region;
        $frias->imagen = $imagen;
        $frias->save();

        return response()->json(['frias' => 'frias editado'],200);



    }

}
