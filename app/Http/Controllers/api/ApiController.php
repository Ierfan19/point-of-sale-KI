<?php

namespace App\Http\Controllers\api;

use App\Models\Barang;

class ApiController extends Controller
{
    public function index()
    {
        
        $dataParameter = Barang::with('Category')->get();
        return response()->json($dataParameter);
    }
}
