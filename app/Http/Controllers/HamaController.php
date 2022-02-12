<?php

namespace App\Http\Controllers;

use App\Models\Hama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HamaController extends Controller
{
    public function index()
    {
        $hamas = Hama::all();
        return view('hama.index', compact('hamas'));
    }

    public function create()
    {
        return view('hama.create');
    }

     public function store(Request $request)
    {
        $request->validate([
            'nama_hama' => 'required',
            'det_hama' => 'required',
            'srn_hama' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        
        $hama = new Hama;
        $hama->nama_hama = $request->input('nama_hama');
        $hama->det_hama = $request->input('det_hama');
        $hama->srn_hama = $request->input('srn_hama');
        if ($request->hasFile('gambar')) {
            $images = $request->file('gambar');
            $extention = $images->getClientOriginalExtension();
            $imageName = time() . '.' . $extention;
            $images->move(public_path('images/hama/'), $imageName);
        }
        $hama->gambar = $imageName;

        $hama->save();
        return redirect('/hama')->with('status', 'Data Hama Berhasil Ditambahkan!');
    }

     public function edit(Hama $hama)
    {
        return view('hama.edit', compact('hama'));
    }

     public function update(Request $request, Hama $hama)
    {
        $request->validate([
            'nama_hama' => 'required',
            'det_hama' => 'required',
            'srn_hama' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $hama = Hama::find($hama->id);
 
        if ($request->hasFile('gambar')) {
            $destination = 'images/hama/' . $hama->gambar;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $images = $request->file('gambar');
            $extention = $images->getClientOriginalExtension();
            $imageName = time() . '.' . $extention;
            $images->move(public_path('images/hama/'), $imageName);
        }

        Hama::where('id', $hama->id)
            ->update([
                'nama_hama' => $request->nama_hama,
                'det_hama' => $request->det_hama,
                'srn_hama' => $request->srn_hama,
                'gambar' => $imageName
            ]);

        return redirect('/hama')->with('status', 'Data Hama Berhasil Diubah!');
    }

       public function destroy(Hama $hama)
    {
        Hama::destroy($hama->id);
        $destination = 'images/hama/' . $hama->gambar;
        if (File::exists($destination)) {
            File::delete($destination);
        }   
        return redirect('/hama')->with('status', 'Data Hama Berhasil Dihapus!');
    }

}
