@extends('layouts.main')
@section('title', 'Tambah Data Gejala Hama - Sipagung')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Data Gejala Hama</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Data Hama</li>
                        <li class="breadcrumb-item active" aria-current="page">Hama</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-md">
                        <form method="post" action="/gejalahama" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama_gejala">Gejala Hama</label>
                                <textarea class="form-control" name="nama_gejala" id="nama_gejala" rows="5" placeholder="Masukkan Gejala Hama">{{old('nama_gejala')}}</textarea>
                                @error('nama_gejala')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
        
@endsection