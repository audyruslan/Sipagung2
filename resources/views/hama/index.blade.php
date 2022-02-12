@extends('layouts.main')
@section('title', 'Data Hama - Sipagung')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Hama</h3>
                 <a href="/hama/create" class="btn btn-primary shadow-sm mb-3"><i class="fas fa-plus-circle"></i> Tambah Data</a>
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

    @if (session('status'))
        <div class="alert alert-success alert-dismissible show fade">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Hama</th>
                            <th>Detail Hama</th>
                            <th>Saran Hama</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($hamas as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$row->nama_hama}}</td>
                        <td>{{$row->det_hama}}</td>
                        <td>{{$row->srn_hama}}</td>
                        <td><img src="{{url('images/hama/',$row->gambar)}}" width="50" height="50" alt=""></td>
                        <td>
                            <form action="/hama/{{ $row->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                            <a href="/hama/{{ $row->id }}/edit" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
        
@endsection