@extends('layouts.main')

@section('title', 'Buat Surat')
@section('surat-menu', 'active')

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card card-lightblue">
                <div class="card-header">
                    <h3 class="card-title d-block float-left"><a href="{{ url()->previous() }}"><i
                                class="fa fa-arrow-left"></i> kembali</a></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('surat.store') }}" method="post" target="_blank">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="jenis_surat" class="col-md-4 col-form-label text-md-right">Jenis Surat</label>
                            <div class="col-md-6">
                                <select name="jenis_surat" id="jenis_surat"
                                        class="custom-select  @error('jenis_surat') is-invalid @enderror" required>
                                    <option value="" selected disabled>PILIH</option>
                                    <option value="keterangan">Keterangan</option>
                                    <option value="mutasi">Mutasi</option>
                                    <option value="dispensasi">Dispensasi</option>
                                </select>
                                @error('jenis_surat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="peserta_didik_id" class="col-md-4 col-form-label text-md-right">Nama Peserta
                                Didik</label>
                            <div class="col-md-6">
                                <select class="select2 peserta-didik custom-select" multiple="multiple" name="peserta_didik_id[]"
                                        id="peserta_didik_id"
                                        data-placeholder="  Cari Peserta DIdik" required>
                                    @foreach($peserta_didik as $p)
                                        <option
                                            value="{{ $p->id . ' - ' . $p->nama . ' - ' . $p->nipd . ' - ' . $p->kode_rombel }}">{{ $p->nama . ' - ' . $p->nipd}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nomor_surat" class="col-md-4 col-form-label text-md-right dispen-hide">Nomor Surat</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror"
                                       id="nomor_surat" placeholder="Masukan Nomor surat" name="nomor_surat"
                                       value="{{ old('nomor_surat') }}" required>
                                @error('nomor_surat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alasan_dibuat" class="col-md-4 col-form-label text-md-right">Alasan</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('alasan_dibuat') is-invalid @enderror"
                                       id="alasan_dibuat"
                                       placeholder="cth: daftar ulang / registrasi masuk Perguruan Tinggi"
                                       name="alasan_dibuat"
                                       value="{{ old('alasan_dibuat') }}">
                                @error('alasan_dibuat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal" class="col-md-4 col-form-label text-md-right">Tanggal</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                       id="tanggal" name="tanggal"
                                       value="{{ old('tanggal') }}" required>
                                @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanda_tangan" class="col-md-4 col-form-label text-md-right dispen-hide">Ditanda tangani
                                oleh</label>
                            <div class="col-md-6">
                                <select name="tanda_tangan" id="tanda_tangan" class="custom-select">
                                    <option value="" selected disabled>PILIH</option>
                                    <option value="kepala sekolah">Kepala Sekolah</option>
                                    <option value="tata usaha">Kasubbag. Tata Usaha</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kepala_sekolah" class="col-md-4 col-form-label text-md-right dispen-hide">Kepala
                                Sekolah</label>
                            <div class="col-md-6">
                                <select class="kepala-sekolah custom-select" name="kepala_sekolah" id="kepala_sekolah"
                                        required>
                                    <option value="" selected disabled>Cari Kepala Sekolah</option>
                                    @foreach($guru as $g)
                                        <option
                                            value="{{ $g->nama . ' - ' . $g->nip }}">{{ $g->nama . ' - ' . $g->nip }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tata_usaha" class="col-md-4 col-form-label text-md-right dispen-hide">Kasubbag. Tata
                                Usaha</label>
                            <div class="col-md-6">
                                <select class="tata-usaha custom-select" name="tata_usaha" id="tata_usaha" required>
                                    <option value="" selected disabled>Cari Kasubbag. Tata Usaha</option>
                                    @foreach($tendik as $t)
                                        <option
                                            value="{{ $t->nama . ' - ' . $t->nip }}">{{ $t->nama . ' - ' . $t->nip }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="guru_mapel" class="col-md-4 col-form-label text-md-right dispensasi">Guru Mapel / BK / Wali
                                Kelas</label>
                            <div class="col-md-6">
                                <select class="guru-mapel custom-select" name="guru_mapel" id="guru_mapel" required>
                                    <option value="" selected disabled>Cari Guru Mapel / BK / Wali Kelas</option>
                                    @foreach($guru as $g)
                                        <option
                                            value="{{ $g->nama . ' - ' . $g->nip }}">{{ $g->nama . ' - ' . $g->nip }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="petugas_piket" class="col-md-4 col-form-label text-md-right dispensasi">Guru / Petugas
                                Piket</label>
                            <div class="col-md-6">
                                <select class="petugas-piket custom-select" name="petugas_piket" id="petugas_piket"
                                        required>
                                    <option value="" selected disabled>Cari Guru / Petugas Piket</option>
                                    @foreach($guru as $g)
                                        <option
                                            value="{{ $g->nama . ' - ' . $g->nip }}">{{ $g->nama . ' - ' . $g->nip }}</option>
                                    @endforeach
                                    @foreach($tendik as $t)
                                        <option
                                            value="{{ $t->nama . ' - ' . $t->nip }}">{{ $t->nama . ' - ' . $t->nip }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jam_ke" class="col-md-4 col-form-label text-md-right dispensasi">Jam Ke</label>
                            <div class="col-md-6">
                                <input type="number" min="1" class="form-control"
                                       id="jam_ke" placeholder="Masukan Dari jam ke berapa"
                                       name="jam_ke">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sampai_jam_ke" class="col-md-4 col-form-label text-md-right dispensasi">Sampai
                                Jam Ke</label>
                            <div class="col-md-6">
                                <input type="number" min="1" class="form-control"
                                       id="sampai_jam_ke" placeholder="Masukan Sampai jam ke berapa"
                                       name="sampai_jam_ke">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.peserta-didik').select2({
            theme: 'bootstrap4',
            maximumSelectionLength: 1
        })

        $('.kepala-sekolah').select2({
            theme: 'bootstrap4'
        })

        $('.tata-usaha').select2({
            theme: 'bootstrap4'
        })

        $('.guru-mapel').select2({
            theme: 'bootstrap4'
        })

        $('.petugas-piket').select2({
            theme: 'bootstrap4'
        })

        $('#nomor_surat').attr('disabled', true);
        $('#alasan_dibuat').attr('disabled', true);
        $('.dispensasi').css('display', 'none');
        $('.dispen-hide').show();
        $('.guru-mapel').next('.select2-container').hide();
        $('.petugas-piket').next('.select2-container').hide();
        $('#jam_ke').attr('disabled', true).css('display', 'none');
        $('#sampai_jam_ke').attr('disabled', true).css('display', 'none');
        $('#jenis_surat').change(function () {
            if ($('#jenis_surat option:selected').val() === 'keterangan') {
                $('.peserta-didik').select2({
                    maximumSelectionLength: 1,
                    theme: 'bootstrap4'
                })
                $('#nomor_surat').val('421.5/XXX/SMKN3.CADSIDIKWIL XII').attr('disabled', false).show();
                $('#alasan_dibuat').attr('disabled', false);
                $('#tanda_tangan').attr('disabled', false).show();
                $('.dispensasi').css('display', 'none');
                $('.dispen-hide').show();
                $('.kepala-sekolah').next('.select2-container').show();
                $('.tata-usaha').next('.select2-container').show();
                $('.guru-mapel').next('.select2-container').hide();
                $('.petugas-piket').next('.select2-container').hide();
                $('#jam_ke').attr('disabled', true).css('display', 'none');
                $('#sampai_jam_ke').attr('disabled', true).css('display', 'none');
            } else if ($('#jenis_surat option:selected').val() === 'mutasi') {
                $('.peserta-didik').select2({
                    maximumSelectionLength: 1,
                    theme: 'bootstrap4'
                })
                $('#nomor_surat').val('421.5/XXX/SMKN3-CADISDIKWIL.XII').attr('disabled', false).show();
                $('#alasan_dibuat').attr('disabled', false);
                $('#tanda_tangan').attr('disabled', false).show();
                $('.dispensasi').css('display', 'none');
                $('.dispen-hide').show();
                $('.kepala-sekolah').next('.select2-container').show();
                $('.tata-usaha').next('.select2-container').show();
                $('.guru-mapel').next('.select2-container').hide();
                $('.petugas-piket').next('.select2-container').hide();
                $('#jam_ke').attr('disabled', true).css('display', 'none');
                $('#sampai_jam_ke').attr('disabled', true).css('display', 'none');
            } else if ($('#jenis_surat option:selected').val() === 'dispensasi') {
                $('.peserta-didik').select2({
                    maximumSelectionLength: 1000,
                    theme: 'bootstrap4'
                })
                $('.kepala-sekolah').next('.select2-container').hide();
                $('.tata-usaha').next('.select2-container').hide();
                $('.guru-mapel').next('.select2-container').show();
                $('.petugas-piket').next('.select2-container').show();
                $('#nomor_surat').val('').attr('disabled', true).hide();
                $('#alasan_dibuat').attr('disabled', false);
                $('#tanda_tangan').val('').attr('disabled', true).hide();
                $('.dispensasi').css('display', 'block');
                $('.dispen-hide').hide();
                $('#jam_ke').attr('disabled', false).css('display', 'block');
                $('#sampai_jam_ke').attr('disabled', false).css('display', 'block');
                $('#tata_usaha').val('').attr('disabled', true);
                $('#kepala_sekolah').val('').attr('disabled', true);
            }
        })

        $('#kepala_sekolah').attr('disabled', true)
        $('#tata_usaha').attr('disabled', true)
        $('#tanda_tangan').change(function () {
            if ($('#tanda_tangan option:selected').val() === 'kepala sekolah') {
                $('#kepala_sekolah').val('').attr('disabled', false);
                $('#tata_usaha').val(null).attr('disabled', true).trigger('change');
            } else if ($('#tanda_tangan option:selected').val() === 'tata usaha') {
                $('#tata_usaha').val('').attr('disabled', false);
                $('#kepala_sekolah').val(null).attr('disabled', true).trigger('change');
            }
        })
        @if(session('pesan'))
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
        });
        Toast.fire({
            icon: 'error',
            title: '{!! session('pesan') !!}'
        });
        @endif
    </script>
@endsection
