@extends('layouts.main')
@section('title', 'Data Gejala Hama - Sipagung')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Gejala Hama</h3>
                 <a href="/gejalahama/create" class="btn btn-primary shadow-sm mb-3"><i class="fas fa-plus-circle"></i> Tambah Data</a>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Data Gejala Hama</li>
                        <li class="breadcrumb-item active" aria-current="page">Gejala Hama</li>
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
                            <th>Nama Gejala</th>
                            <th>Aksi</th>
                        </tr> 
                    </thead>
                    <tbody>
                       @foreach($gejalahamas as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$row->nama_gejala}}</td>
                        <td>
                            <form action="/gejalahama/{{ $row->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                            <a href="/gejalahama/{{ $row->id }}/edit" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
        
@endsection