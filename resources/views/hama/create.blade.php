@extends('layouts.main')
@section('title', 'Tambah Data Hama - Sipagung')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Data Hama</h3>
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
                    <div class="col-md-6">
                        <form method="post" action="/hama" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama_hama">Masukkan Hama</label>
                                <input type="text" class="form-control @error('nama_hama') is-invalid @enderror" name="nama_hama" id="nama_hama" placeholder="Masukkan Hama" value="{{ old('nama_hama') }}">
                                @error('nama_hama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="det_hama">Detail Hama</label>
                                <textarea class="form-control" name="det_hama" id="det_hama" rows="5" placeholder="Masukkan Detail Hama">{{old('det_hama')}}</textarea>
                                @error('det_hama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="srn_hama">Saran Hama</label>
                                <textarea class="form-control" name="srn_hama" id="srn_hama" rows="5" placeholder="Masukkan Saran Hama">{{old('srn_hama')}}</textarea>
                                @error('srn_hama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar" placeholder="Masukkan Hama">
                                @error('gambar')
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