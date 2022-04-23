<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembeli;
use Illuminate\Support\Facades\Request;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataParameter['listpembeli'] = Pembeli::all();
        return view('pages/pembeli/pembeli', $dataParameter);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/pembeli/tambahpembeli');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $nama = Request::get('nama');
        $alamat = Request::get('alamat');
        $telp = Request::get('telp');

        $pembeli = new Pembeli();
        $pembeli->nama = $nama;
        $pembeli->alamat = $alamat;
        $pembeli->no_telp = $telp;
        $pembeli->save();
        return redirect('pembeli/pembeli');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataParameter['pembeli'] = Pembeli::find($id);
        $dataParameter['listbarang'] = Barang::all();
        return view('pages/tukar_poin/index', $dataParameter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataParameter['pembeli'] = Pembeli::find($id);
        return view('pages/pembeli/edit', $dataParameter);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        
        $id = Request::get('id');
        $nama = Request::get('nama');
        $alamat = Request::get('alamat');
        $telp = Request::get('telp');
        $poin = Request::get('poin');

        $pembeli = Pembeli::find($id);
        $pembeli->nama = $nama;
        $pembeli->alamat = $alamat;
        $pembeli->no_telp = $telp;
        $pembeli->poin = $poin;
        $pembeli->save();
        return redirect('pembeli/pembeli');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembeli = Pembeli::find($id);
        $pembeli->delete();
        return redirect('pembeli/pembeli');
    }
    function tukarpoin(){
        $poin = Request::get('pembeli');
        $poinbarang = Request::get('poin');
    }
}
