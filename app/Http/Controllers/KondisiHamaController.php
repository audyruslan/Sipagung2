<?php

namespace App\Http\Controllers;

use App\Models\KondisiHama;
use Illuminate\Http\Request;

class KondisiHamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kondisihamas = KondisiHama::all();
        return view('kondisihama.index', compact('kondisihamas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kondisihama.create');
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
            'kondisi' => 'required'
        ]);

        
        $kondisihama = new KondisiHama();
        $kondisihama->kondisi = $request->input('kondisi');

        $kondisihama->save();
        return redirect('/kondisihama')->with('status', 'Data Kondisi Hama Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KondisiHama  $kondisiHama
     * @return \Illuminate\Http\Response
     */
    public function show(KondisiHama $kondisiHama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KondisiHama  $kondisiHama
     * @return \Illuminate\Http\Response
     */
    public function edit(KondisiHama $kondisihama)
    {
        return view('kondisihama.edit', compact('kondisihama'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KondisiHama  $kondisiHama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KondisiHama $kondisihama)
    {
        $request->validate([
            'kondisi' => 'required'
        ]);

        $kondisihama = KondisiHama::find($kondisihama->id);

        KondisiHama::where('id', $kondisihama->id)
            ->update([
                'kondisi' => $request->kondisi
            ]);

        return redirect('/kondisihama')->with('status', 'Data Kondisi Hama Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KondisiHama  $kondisiHama
     * @return \Illuminate\Http\Response
     */
    public function destroy(KondisiHama $kondisihama)
    {
        KondisiHama::destroy($kondisihama->id);
        return redirect('/kondisihama')->with('status', 'Data Kondisi Hama Berhasil Dihapus!');
    }
}
