<?php

namespace App\Http\Controllers;

use App\Models\GejalaHama;
use Illuminate\Http\Request;

class GejalaHamaController extends Controller
{
     public function index()
    {
        $gejalahamas = GejalaHama::all();
        return view('gejalahama.index', compact('gejalahamas'));
    }

    public function create()
    {
        return view('gejalahama.create');
    }

     public function store(Request $request)
    {
        $request->validate([
            'nama_gejala' => 'required'
        ]);

        
        $gejalahama = new GejalaHama();
        $gejalahama->nama_gejala = $request->input('nama_gejala');

        $gejalahama->save();
        return redirect('/gejalahama')->with('status', 'Data Gejala Hama Berhasil Ditambahkan!');
    }

     public function edit(GejalaHama $gejalahama)
    {
        return view('gejalahama.edit', compact('gejalahama'));
    }

     public function update(Request $request, GejalaHama $gejalahama)
    {
        $request->validate([
            'nama_gejala' => 'required'
        ]);

        $gejalahama = GejalaHama::find($gejalahama->id);

        GejalaHama::where('id', $gejalahama->id)
            ->update([
                'nama_gejala' => $request->nama_gejala
            ]);

        return redirect('/gejalahama')->with('status', 'Data Gejala Hama Berhasil Diubah!');
    }

       public function destroy(GejalaHama $gejalahama)
    {
        GejalaHama::destroy($gejalahama->id);
        return redirect('/gejalahama')->with('status', 'Data Gejala Hama Berhasil Dihapus!');
    }
}
