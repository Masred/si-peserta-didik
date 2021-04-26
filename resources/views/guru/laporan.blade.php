@extends('layouts.main')

@section('title', 'Laporan Data Guru')
@section('laporan-open-menu', 'menu-open')
@section('laporan-menu', 'active')
@section('laporan-guru-menu', 'active')

@section('content')
    <div class="card card-lightblue">
        <div class="card-header">
            <h3 class="card-title d-block float-left"><a href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i>
                    kembali</a></h3>
            <h3 class="card-title d-block float-right">Laporan Data Guru</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('guru.print') }}" method="post" target="_blank">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="status" class="col-md-4 col-form-label text-md-right">Guru</label>
                    <div class="col-md-6">
                        <select name="status" id="status" class="custom-select">
                            <option value="semua">Semua</option>
                        </select>
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
