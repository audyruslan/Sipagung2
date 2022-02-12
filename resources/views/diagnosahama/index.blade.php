@extends('layouts.app')
@section('title', 'Diagnosa Hama - Sipagung')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Diagnosa Hama</h3>
            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Diagnosa Hama</li>
                        <li class="breadcrumb-item active" aria-current="page">Hama</li>
                    </ol>
                </nav>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <div class="alert alert-success alert-dismissible show fade">
                    <i class="bi bi-exclamation-triangle-fill"></i> Perhatian ! <br>
                        Silahkan memilih gejala sesuai dengan kondisi ayam anda, anda dapat memilih kepastian kondisi ayam dari pasti tidak sampai pasti ya,jika sudah tekan tombol ( <i class="fas fa-search-plus"></i>) di bawah untuk melihat hasil.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form method="post" action="/diagnosahama" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Gejala</th>
                                <th>Gejala</th>
                                <th>Kondisi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($gejalahamas as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>G00{{ $loop->iteration }}</td>
                            <td>{{$row->nama_gejala}}</td>
                            <td>
                                <select class="form-control" name="kondisihama[]">
                                    <option value="">Silahkan Pilih</option>
                                    @foreach($kondisihama as $kond)
                                        <option data-id="{{$kond->id}}" value="{{$row->id}}_{{$kond->id}}">{{$kond->kondisi}}</option>
                                    @endforeach
                                </select>
                            </td>

                        </tr>
                        @endforeach
                        </tbody>
                            <button type="submit" name="tambah" class="float">
                                <i class="fa fa-search-plus my-float"></i>
                            </button>
                    </table>
                </form>
            </div>
        </div>

    </section>
        
@endsection