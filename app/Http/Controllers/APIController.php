<?php

namespace App\Http\Controllers;
use App\liquid;

use Illuminate\Http\Request;

class APIController extends Controller
{
    public function searchdrink(Request $request)
    {
        $cari = $request->input('q');

        $drink = Liquid::where('merek', 'LIKE', "%$cari%")->get();

        if($drink->isEmpty())
        {
            return response()->json([
                'success' => false,
                'data' => 'Data Tidak Ditemukan'
            ], 200)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:5500');
        }
        else
        {
            return response()->json([
                'success' => true,
                'data' => $drink
            ], 200)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:5500');
        }
    }
}
