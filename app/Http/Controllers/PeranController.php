<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\peran;
use RealRashid\SweetAlert\Facades\Alert;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peran = peran::all();
        return view('peran.index', compact('peran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/peran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peran = new Peran;

        $request->validate([
            'film' => 'required',
            'cast' => 'required',
            'nama' => 'required',
        ]);

        $cast->film = $request->film;
        $cast->cast = $request->cast;
        $cast->nama = $request->nama;

        $simpan = $peran->save();

        if($simpan){
            Alert::success('Success', 'Data Berhasil Ditambah');
            return redirect('/peran');
        }else{
            Alert::error('Failed', 'Data Gagal Ditambah');
        }

        return redirect('/peran');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peran = Peran::where('id', $id)->first();

        return view('peran.edit', compact('peran'));
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
        $request->validate([
            'film => required',
            'cast => required',
            'nama => required',
        ]);

        $peran =Cast::find($id);
        $peran->film = $request->film;
        $peran->cast = $request->cast;
        $peran->nama = $request->nama;

        $ubah = $peran->save();

        if($ubah){
            Alert::success('Success', 'Data Berhasil Ditambah');
            return redirect('/peran');
        }else{
            Alert::error('Failed', 'Data Gagal Ditambah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peran = Peran::find($id);
        $hapus = $peran -> delete();

        if($hapus){
            Alert::success('Success', 'Data Berhasil Dihapus');
            return redirect('/peran');
        }else{
            Alert::error('Failed', 'Data Gagal Ditambah');
        }

        return redirect('/peran');
    }
}