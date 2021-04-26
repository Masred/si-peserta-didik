@extends('layouts.main')

@section('title', 'Laporan Surat')
@section('laporan-open-menu', 'menu-open')
@section('laporan-menu', 'active')
@section('laporan-surat-menu', 'active')

@section('content')
    <div class="card card-lightblue">
        <div class="card-header">
            <h3 class="card-title d-block float-left"><a href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i>
                    kembali</a></h3>
            <h3 class="card-title d-block float-right">Laporan Surat</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('surat.print') }}" method="post" target="_blank">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="dari" class="col-md-4 col-form-label text-md-right">Dari</label>
                    <div class="col-md-6">
                        <input type="date" name="dari" id="dari" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sampai" class="col-md-4 col-form-label text-md-right">Sampai</label>
                    <div class="col-md-6">
                        <input type="date" name="sampai" id="sampai" class="form-control">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>
            </div>
        </form>
    </div>
@endsection
