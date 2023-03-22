<?php

namespace App\Http\Controllers;

use App\Area;
use App\GrandeArea;
use App\SubArea;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function consulta(Request $request) {
        $id = json_decode($request->id) ;
        $areas = Area::where('grande_area_id', $id)->orderBy('nome')->get();
        return response()->json($areas);
        return $areas->toJson();
    }
}
