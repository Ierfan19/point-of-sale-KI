<?php

namespace App\Http\Controllers\api;

use App\Models\Barang;
use App\Models\Category;
use Illuminate\Support\Facades\Request;
use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\TryCatch;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $dataParameter = Barang::with('Category')->get();
        return response()->json($dataParameter);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataParameter['listcat'] = Category::all();
        return view('pages.barang.tambahbarang', $dataParameter);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        try{

        $nama = Request::get('nama_barang');
        $harga = Request::get('harga');
        $stok = Request::get('stok');
        $expired = Request::get('tgl_expired');
        $category = Request::get('id_category');

        $barang = new Barang();
        $barang->nama_barang = $nama;
        $barang->harga = $harga;
        $barang->stok = $stok;
        $barang->tgl_expired = $expired;
        $barang->id_category = $category;
        $barang->save();
        return response()->json([
            'succes' => true,
            'message' => 'succes'
        ]);
        }catch(\Exception $e){
            return response()->json([
                'error' => 'err',
                'message' => $e->getmessage()
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataParameter['editbarang'] = Barang::find($id);
        return view('/barang/editbarang', $dataParameter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataParameter['listcat'] = Category::all();
        $dataParameter['editbarang'] = Barang::find($id);
        return view('/pages/barang/editbarang', $dataParameter);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        try{
        // $id = Request::get('id');
        $nama = Request::get('nama_barang');
        $harga = Request::get('harga');
        $stok = Request::get('stok');
        $expired = Request::get('tgl_expired');
        $category = Request::get('id_category');

        $barang = Barang::find($id);
        $barang->nama_barang = $nama;
        $barang->harga = $harga;
        $barang->stok = $stok;
        $barang->tgl_expired = $expired;
        $barang->id_category = $category;
        $barang->save();
        return response()->json([
            'succes' => true,
            'message' => 'succes'
        ]);
        }catch(\Exception $e){
            return response()->json([
                'error' => 'err',
                'message' => $e->getmessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
        $barang = Barang::find($id);
        $barang->delete();
        return response()->json([
            'succes' => true,
            'message' => 'succes'
        ]);
        }catch(\Exception $e){
            return response()->json([
                'error' => 'err',
                'message' => $e->getmessage()
            ]);
        }
    }
}
