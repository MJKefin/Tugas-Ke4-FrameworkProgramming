<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;

class DataPelanggan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataPelanggan = Pelanggan::all();


        if($request->query('alamat')){
            $dataPelanggan = Pelanggan::where('alamat', request()->alamat)->get();
        }

        return view('Data_Pelanggan.data-pelanggan', compact('dataPelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('Data_Pelanggan.create-pelanggan');
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
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'no_hp' => 'required|max:12',
        ]);
        Pelanggan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
           
        ]);
        
        return redirect()->route('pelanggan.index')->with('msg', 'Data anda telah diinputkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataPelanggan = Pelanggan::find($id);
        return view('Data_Pelanggan.detail-pelanggan', compact('dataPelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $dataPelanggan= Pelanggan::find($id);
        return view('Data_Pelanggan.edit-pelanggan',compact('dataPelanggan'));
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
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'no_hp' => 'required|max:12',
        ]);

        Pelanggan::whereId($id)->update($validasi);
        return redirect()->route('pelanggan.index')->with('msg', 'Data anda telah diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $Pelanggan = Pelanggan::findOrFail($id);
        $Pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('msg', 'Data anda telah dihapus!');
    }
}
