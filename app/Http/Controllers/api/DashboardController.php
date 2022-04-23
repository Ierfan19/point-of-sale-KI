<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;
use App\Models\Barang;
use App\Models\Category;
use App\Models\User;
use App\Models\Pembeli;

class DashboardController extends Controller
{
    
    function getViewDash(){
        $dataParameter['barang'] = Barang::all();
        $dataParameter['category'] = Category::all();
        $dataParameter['user'] = User::all();
        $dataParameter['pembeli'] = Pembeli::all();
        return view('/dashboard', $dataParameter);
    }
}
