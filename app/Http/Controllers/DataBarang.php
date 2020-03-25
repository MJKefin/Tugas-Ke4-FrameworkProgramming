<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;

class DataBarang extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataBarang = Barang::all();


        if($request->query('jenis')){
            $dataBarang = Barang::where('jenis', request()->jenis)->get();
        }

        return view('Data_Barang.data-barang', compact('dataBarang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('Data_Barang.create-barang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|max:100',
            'type' => 'required|max:100',
            'jumlah' => 'required|max:100',
        ]);
        Barang::create([
            'jenis' => $request->jenis,
            'type' => $request->type,
            'jumlah' => $request->jumlah,
           
        ]);
        
        return redirect()->route('barang.index')->with('msg', 'Data anda telah diinputkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataBarang = Barang::find($id);
        return view('Data_Barang.detail-barang', compact('dataBarang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $dataBarang= Barang::find($id);
        return view('Data_Barang.edit-barang',compact('dataBarang'));
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
        $validasi =  $request->validate([
            'jenis' => 'required|max:100',
            'type' => 'required|max:100',
            'jumlah' => 'required|max:100',
        ]);

        Barang::whereId($id)->update($validasi);
        return redirect()->route('barang.index')->with('msg', 'Data anda telah diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $Barang = Barang::findOrFail($id);
        $Barang->delete();
        return redirect()->route('barang.index')->with('msg', 'Data anda telah dihapus!');
    }
}