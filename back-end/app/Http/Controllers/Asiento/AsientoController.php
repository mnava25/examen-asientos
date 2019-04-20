<?php
namespace App\Http\Controllers\Asiento;

use App\Movimiento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AsientoController extends Controller
{
    public function guardar(Request $request){
        $movimiento = Movimiento::create($request->all());
        if ($movimiento->wasRecentlyCreated) {
            return response()->json(["msg" => "Correcto",200]);
        }
        return response()->json(["msg" => "Error",500]);
    }
}
