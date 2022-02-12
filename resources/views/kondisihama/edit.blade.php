@extends('layouts.main')
@section('title', 'Ubah Data Kondisi Hama - Sipagung')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Ubah Data Kondisi Hama</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Data Hama</li>
                        <li class="breadcrumb-item active" aria-current="page">Kondisi Hama</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-6">
                        <form method="post" action="/kondisihama/{{ $kondisihama->id }}" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="kondisi">Masukkan Kondisi</label>
                                <input type="text" class="form-control @error('kondisi') is-invalid @enderror" name="kondisi" id="kondisi" placeholder="Masukkan Hama" value="{{ $kondisihama->kondisi }}">
                                @error('kondisi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" name="tambah" class="btn btn-primary">Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
        
@endsection