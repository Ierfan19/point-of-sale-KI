<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use Illuminate\Support\Facades\Request;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $dataParameter['listbarang'] = Barang::with('Category')->get();
        return view('operator.barang.barang-table', $dataParameter);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataParameter['listcat'] = Category::all();
        return view('operator.barang.tambahbarang', $dataParameter);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $nama = Request::get('nama_barang');
        $harga = Request::get('harga');
        $stok = Request::get('stok');
        $expired = Request::get('expired');
        $category = Request::get('category');
        $poin = Request::get('poin');

        $barang = new Barang();
        $barang->nama_barang = $nama;
        $barang->harga = $harga;
        $barang->stok = $stok;
        $barang->tgl_expired = $expired;
        $barang->id_category = $category;
        $barang->poin = $poin;
        $barang->save();
        return redirect('/barang/barang-table');
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
        return view('/operator/barang/editbarang', $dataParameter);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $id = Request::get('id');
        $nama = Request::get('nama_barang');
        $harga = Request::get('harga');
        $stok = Request::get('stok');
        $expired = Request::get('expired');
        $category = Request::get('category');
        $poin = Request::get('poin');

        $barang = Barang::find($id);
        $barang->nama_barang = $nama;
        $barang->harga = $harga;
        $barang->stok = $stok;
        $barang->tgl_expired = $expired;
        $barang->id_category = $category;
        $barang->poin = $poin;
        $barang->save();
        return redirect('/barang/barang-table');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/barang/barang-table');
    }
}
