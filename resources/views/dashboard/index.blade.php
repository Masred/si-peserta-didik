@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fa fa-university"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Jurusan</span>
                    <span class="info-box-number">{{ $total_jurusan }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Rombongan Belajar</span>
                    <span class="info-box-number">{{ $total_rombel }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fa fa-graduation-cap"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Peserta Didik</span>
                    <span class="info-box-number">{{ $total_peserta_didik }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>
@endsection
