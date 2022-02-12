@extends('layouts.main')
@section('title', 'Ubah Basis Data Pengetahuan Hama - Sipagung')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Ubah Basis Data Pengetahuan Hama</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Data Hama</li>
                        <li class="breadcrumb-item active" aria-current="page">Basis Data Pengetahuan Hama</li>
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
                        <form method="post" action="/basishama/{{ $basishama->id }}" >
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="hama">Pilih Hama</label>
                                <select class="form-control @error('hama') is-invalid @enderror" name="hama" id="hama">
                                    <option>Silahkan Pilih</option>
                                    @foreach($hama as $row)
                                        <option value="{{$row->id}}">{{$row->nama_hama}}</option>
                                    @endforeach
                                </select>
                                @error('hama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> 
                            <div class="form-group">
                                <label for="gejalahama">Pilih Gejala</label>
                                <select class="form-control @error('gejalahama') is-invalid @enderror" name="gejalahama" id="gejalahama">
                                    <option>Silahkan Pilih</option>
                                    @foreach($gejalahama as $row)
                                        <option value="{{$row->id}}">{{$row->nama_gejala}}</option>
                                    @endforeach
                                </select>
                                @error('gejalahama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="mb">Masukkan MB</label>
                                <input type="text" class="form-control @error('mb') is-invalid @enderror" name="mb" id="mb" placeholder="Masukkan MB" value="{{ $basishama->mb }}">
                                @error('mb')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="md">Masukkan MD</label>
                                <input type="text" class="form-control @error('md') is-invalid @enderror" name="md" id="md" placeholder="Masukkan MD" value="{{ $basishama->md }}">
                                @error('md')
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