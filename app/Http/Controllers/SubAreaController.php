<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubArea;

class SubAreaController extends Controller
{
    public function consulta(Request $request) {

        $id = json_decode($request->id) ;
        $subAreas = SubArea::where('area_id', $id)->orderBy('nome')->get();
        return response()->json($subAreas);
        //return $subAreas->toJson();
    }
}
