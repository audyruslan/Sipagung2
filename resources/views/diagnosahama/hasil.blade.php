@extends('layouts.app')
@section('title', 'Hasil Diagnosa Hama - Sipagung')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Hasil Diagnosa Hama</h3>
            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Hasil Diagnosa Hama</li>
                        <li class="breadcrumb-item active" aria-current="page">Hama</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Gejala</th>
                                <th>Gejala</th>
                                <th>Kondisi</th>
                            </tr>
                        </thead>
                    </table>
            </div>
        </div>

    </section>
        
@endsection