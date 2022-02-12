<?php

namespace App\Http\Controllers;

use App\Models\BasisHama;
use App\Models\GejalaHama;
use App\Models\Hama;
use Illuminate\Http\Request;

class BasisHamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $basishamas = BasisHama::all();
        $basishamas = BasisHama::join('hamas', 'basis_hamas.id_hama', '=', 'hamas.id')
                ->join('gejala_hamas', 'basis_hamas.id_gejala', '=', 'gejala_hamas.id')
               ->get(['basis_hamas.*', 'hamas.nama_hama','gejala_hamas.nama_gejala']);
        return view('basishama.index', compact('basishamas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hama = Hama::all();
        $gejalahama = GejalaHama::all();
        return view('basishama.create', compact('hama','gejalahama'));
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
            'hama' => 'required',
            'gejalahama' => 'required',
            'mb' => 'required',
            'md' => 'required'
        ]);

        
        $basishama = new BasisHama();
        $basishama->id_hama = $request->input('hama');
        $basishama->id_gejala = $request->input('gejalahama');
        $basishama->mb = $request->input('mb');
        $basishama->md = $request->input('md');

        $basishama->save();
        return redirect('/basishama')->with('status', 'Basis Data Pengetahuan Hama Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BasisHama  $basisHama
     * @return \Illuminate\Http\Response
     */
    public function show(BasisHama $basisHama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BasisHama  $basisHama
     * @return \Illuminate\Http\Response
     */
    public function edit(BasisHama $basishama)
    {
        $hama = Hama::all();
        $gejalahama = GejalaHama::all();
        return view('basishama.edit', compact('basishama','hama','gejalahama'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BasisHama  $basisHama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BasisHama $basishama)
    {
        $request->validate([
            'hama' => 'required',
            'gejalahama' => 'required',
            'mb' => 'required',
            'md' => 'required'
        ]);

        $basishama = BasisHama::find($basishama->id);

        BasisHama::where('id', $basishama->id)
            ->update([
                'id_hama' => $request->hama,
                'id_gejala' => $request->gejalahama,
                'mb' => $request->mb,
                'md' => $request->md
            ]);

        return redirect('/basishama')->with('status', 'Basis Data Pengetahuan Hama Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BasisHama  $basisHama
     * @return \Illuminate\Http\Response
     */
    public function destroy(BasisHama $basishama)
    {
        BasisHama::destroy($basishama->id);
        return redirect('/basishama')->with('status', 'Basis Data Pengetahuan Hama Berhasil Dihapus!');
    }
}
