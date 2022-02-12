<?php

namespace App\Http\Controllers;

use App\Models\BasisHama;
use App\Models\GejalaHama;
use App\Models\Hama;
use App\Models\HasilHama;
use App\Models\KondisiHama;
use Illuminate\Http\Request;

class DiagnosahamaController extends Controller
{
    public function index()
    {
        $gejalahamas = GejalaHama::all();
        $kondisihama = KondisiHama::all();
        return view('diagnosahama.index', compact('gejalahamas','kondisihama'));
    }

    public function store(Request $request)
    {
        // Get Data dari Request
        $data = [
            'kondisihama' => $request->kondisihama
        ];
        $tes = array_filter($data);
        $inptanggal = date('Y-m-d H:i:s');

        $arbobot = array('0', '1', '0.8', '0.6', '0.4', '-0.2', '-0.4', '-0.6', '-0.8', '-1');
        $argejala = array();

        dd($tes);
        die;

        for ($i = 0; $i < $kondisihama; $i++) {
            $arkondisi = explode("_", $kondisihama[$i]);
            if (strlen($kondisihama[$i]) > 1) {
            $argejala += array($arkondisi[0] => $arkondisi[1]);
            }
        }

        $sqlkondisi = KondisiHama::orderBy('id+0')->get();
        while ($rkondisi = mysqli_fetch_array($sqlkondisi)) {
            $arkondisitext[$rkondisi['id']] = $rkondisi['kondisi'];
        }

        $sqlpkt = Hama::orderBy('id+0')->get();
        while ($rpkt = mysqli_fetch_array($sqlpkt)) {
            $arpkt[$rpkt['id']] = $rpkt['nama_hama'];
            $ardpkt[$rpkt['id']] = $rpkt['det_hama'];
            $arspkt[$rpkt['id']] = $rpkt['srn_hama'];
            $argpkt[$rpkt['id']] = $rpkt['gambar'];
        }

        // Perhitungan Certainty Factor (CF)
        $sqlpenyakit = Hama::orderBy('id')->get();
        $arpenyakit = array();
        while ($rpenyakit = mysqli_fetch_array($sqlpenyakit)) {
            $cftotal_temp = 0;
            $cf = 0;
            $rpen = $rpenyakit[0];
            $sqlgejala = BasisHama::where('id', '=',  $rpen)->get();;
            $cflama = 0;
            while ($rgejala = mysqli_fetch_array($sqlgejala)) {
            $arkondisi = explode("_", $kondisihama[0]);
            $gejala = $arkondisi[0];

            for ($i = 0; $i < count($kondisihama); $i++) {
                $arkondisi = explode("_", $kondisihama[$i]);
                $gejala = $arkondisi[0];
                if ($rgejala['kode_gejala'] == $gejala) {
                $cf = ($rgejala['mb'] - $rgejala['md']) * $arbobot[$arkondisi[1]];
                if (($cf >= 0) && ($cf * $cflama >= 0)) {
                    $cflama = $cflama + ($cf * (1 - $cflama));
                }
                if ($cf * $cflama < 0) {
                    $cflama = ($cflama + $cf) / (1 - Math . Min(Math . abs($cflama), Math . abs($cf)));
                }
                if (($cf < 0) && ($cf * $cflama >= 0)) {
                    $cflama = $cflama + ($cf * (1 + $cflama));
                }
                }
            } 
            }
            if ($cflama > 0) {
            $arpenyakit += array($rpenyakit[0] => number_format($cflama, 4));
            }
        }

        arsort($arpenyakit);

        $inpgejala = serialize($argejala);
        $inppenyakit = serialize($arpenyakit);

        $np1 = 0;
        foreach ($arpenyakit as $key1 => $value1) {
            $np1++;
            $idpkt1[$np1] = $key1;
            $vlpkt1[$np1] = $value1;
        }

        $hasilhama = new HasilHama();
        $hasilhama->tanggal = $inptanggal;
        $hasilhama->hama = $inppenyakit;
        $hasilhama->gejala = $inpgejala;
        $hasilhama->hasil_id = $idpkt1[$np1];
        $hasilhama->hasil_nilai = $vlpkt1[$np1];

        $hasilhama->save();
        return redirect('/hasilhama');
    }
}
