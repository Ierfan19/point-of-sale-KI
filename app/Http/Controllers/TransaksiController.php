<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Models\Barang;
use App\Models\Laporan;
use App\Models\Pembeli;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataParameter['barang'] = Barang::all();
        return view('pages.transaksi.transaksi', $dataParameter);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $nama_pembeli = Request::get('nama_pembeli');
        $id_barang = Request::get('id_barang');
        $id_pembeli = Request::get('id_pembeli');
        $jumlah = Request::get('stok-awal') - Request::get('stok-akhir');
        $poin = Request::get('stok-akhir');
        $poin_pembeli = Request::get('stok-akhir') + Request::get('poin');
        $harga = Request::get('harga') * Request::get('stok-akhir');
        $sale = Request::get('sale') + $poin;
        $hasil = Request::get('hasil') + $harga;
        $jumlah_pembeli = Request::get('jumlah_pembeli') + 1;

        $pembeli = Pembeli::find($id_pembeli);
        $pembeli->poin = $poin_pembeli;
        $pembeli->save();

        $barang = Barang::find($id_barang);
        $barang->stok = $jumlah;
        $barang->save();

        $laporan = new Laporan();
        $laporan->hasil = $hasil;
        $laporan->sale = $sale;
        $laporan->jumlah_pembeli = $jumlah_pembeli;
        $laporan->save();

        return redirect('transaksi');


    }

    public function cari(){
        $id = Request::get('id');
        if ($id=='') {
            $data['val']    = 2;
        }else{
            $isi = Pembeli::where('nama','=',$id)->first();
           if (empty($isi)) {
               $data['val']   = 0;
           }else{
            $data['val']   = 1;
            $data['data']   = $isi;

           }
        }
        return Response($data);
        }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataParameter['transaksi'] = Barang::find($id);
        $dataParameter['user'] = Pembeli::all();
        $dataParameter['laporan'] = Laporan::orderBy('id_laporan', 'desc')->take(1)->get();
        return view('/pages/transaksi/pembelian', $dataParameter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
