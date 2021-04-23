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
                <form action="{{ route('surat.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="jenis_surat" class="col-md-4 col-form-label text-md-right">Jenis Surat</label>
                            <div class="col-md-6">
                                <select name="jenis_surat" id="jenis_surat"
                                        class="custom-select  @error('jenis_surat') is-invalid @enderror">
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
                                <input type="text" name="peserta_didik_id" id="peserta_didik_id" list="list_pd"
                                       class="form-control @error('peserta_didik_id') is-invalid @enderror""
                                placeholder="Cari nama peserta didik">
                                <datalist id="list_pd">
                                    @foreach($peserta_didik as $p)
                                        <option value="{{ $p->id . ' - ' . $p->nama . ' - ' . $p->nipd }}"></option>
                                    @endforeach
                                </datalist>
                                @error('peserta_didik_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nomor_surat" class="col-md-4 col-form-label text-md-right">Nomor Surat</label>
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
                            <label for="alasan_dibuat" class="col-md-4 col-form-label text-md-right">Alasan
                                dibuat (optional)</label>
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
                            <label for="tanda_tangan" class="col-md-4 col-form-label text-md-right">Ditanda tangani oleh</label>
                            <div class="col-md-6">
                                <select name="tanda_tangan" id="tanda_tangan" class="custom-select">
                                    <option value="" selected disabled>PILIH</option>
                                    <option value="kepala sekolah">Kepala Sekolah</option>
                                    <option value="tata usaha">Kasubbag. Tata Usaha</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kepala_sekolah" class="col-md-4 col-form-label text-md-right">Kepala
                                Sekolah - NIP</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control"
                                       id="kepala_sekolah" placeholder="cth: Drs. H. OOM SUPARMAS, M.Pd. - 196209101986031011"
                                       name="kepala_sekolah">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tata_usaha" class="col-md-4 col-form-label text-md-right">Kasubbag. Tata Usaha - NIP</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control"
                                       id="tata_usaha" placeholder="cth: Dra. Hj. HADIANA - 196609081986032006"
                                       name="tata_usaha">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="orang_tua" class="col-md-4 col-form-label text-md-right dispensasi">Orang Tua / Wali Siswa</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control"
                                       id="orang_tua" placeholder="cth: Ujang Supardi"
                                       name="orang_tua">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="guru_mapel" class="col-md-4 col-form-label text-md-right dispensasi">Guru Mapel / BK / Wali Kelas - NIP</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control"
                                       id="guru_mapel" placeholder="cth: Rahman Hidayat S.Pd. - 431101986031011"
                                       name="guru_mapel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="petugas_piket" class="col-md-4 col-form-label text-md-right dispensasi">Guru / Petugas Piket - NIP</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control"
                                       id="petugas_piket" placeholder="cth: Sandi Dahyat, S.Pd. - 196209101986031011"
                                       name="petugas_piket">
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
                            <label for="sampai_jam_ke" class="col-md-4 col-form-label text-md-right dispensasi">Sampai Jam Ke</label>
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
        $('input[name="nomor_surat"]').attr('disabled', true);
        $('input[name="alasan_dibuat"]').attr('disabled', true);
        $('.dispensasi').css('display', 'none');
        $('#orang_tua').attr('disabled', true).css('display', 'none');
        $('#guru_mapel').attr('disabled', true).css('display', 'none');
        $('#petugas_piket').attr('disabled', true).css('display', 'none');
        $('#jam_ke').attr('disabled', true).css('display', 'none');
        $('#sampai_jam_ke').attr('disabled', true).css('display', 'none');
        $('#jenis_surat').change(function () {
            if ($('#jenis_surat option:selected').val() === 'keterangan') {
                $('input[name="nomor_surat"]').val('421.5/XXX/SMKN3.CADSIDIKWIL XII').attr('disabled', false);
                $('input[name="alasan_dibuat"]').attr('disabled', false);
                $('#tanda_tangan').attr('disabled', false);
                $('.dispensasi').css('display', 'none');
                $('#orang_tua').attr('disabled', true).css('display', 'none');
                $('#guru_mapel').attr('disabled', true).css('display', 'none');
                $('#petugas_piket').attr('disabled', true).css('display', 'none');
                $('#jam_ke').attr('disabled', true).css('display', 'none');
                $('#sampai_jam_ke').attr('disabled', true).css('display', 'none');
            } else if ($('#jenis_surat option:selected').val() === 'mutasi') {
                $('input[name="nomor_surat"]').val('421.5/XXX/SMKN3-CADISDIKWIL.XII').attr('disabled', false);
                $('input[name="alasan_dibuat"]').attr('disabled', true);
                $('#tanda_tangan').attr('disabled', false);
                $('.dispensasi').css('display', 'none');
                $('#orang_tua').attr('disabled', true).css('display', 'none');
                $('#guru_mapel').attr('disabled', true).css('display', 'none');
                $('#petugas_piket').attr('disabled', true).css('display', 'none');
                $('#jam_ke').attr('disabled', true).css('display', 'none');
                $('#sampai_jam_ke').attr('disabled', true).css('display', 'none');
            } else if ($('#jenis_surat option:selected').val() === 'dispensasi') {
                $('input[name="nomor_surat"]').val('').attr('disabled', true);
                $('input[name="alasan_dibuat"]').attr('disabled', false);
                $('#tanda_tangan').attr('disabled', true);
                $('.dispensasi').css('display', 'block');
                $('#orang_tua').attr('disabled', false).css('display', 'block');
                $('#guru_mapel').attr('disabled', false).css('display', 'block');
                $('#petugas_piket').attr('disabled', false).css('display', 'block');
                $('#jam_ke').attr('disabled', false).css('display', 'block');
                $('#sampai_jam_ke').attr('disabled', false).css('display', 'block');
            }
        })
        $('#kepala_sekolah').attr('disabled', true);
        $('#tata_usaha').attr('disabled', true);
        $('#tanda_tangan').change(function () {
            if ($('#tanda_tangan option:selected').val() === 'kepala sekolah') {
                $('input[name="kepala_sekolah"]').val('Drs. H. OOM SUPARMAS, M.Pd. - 196209101986031011').attr('disabled', false);
                $('#tata_usaha').val('').attr('disabled', true);
            } else if ($('#tanda_tangan option:selected').val() === 'tata usaha') {
                $('#tata_usaha').val('Dra. Hj. HADIANA - 196609081986032006').attr('disabled', false);
                $('input[name="kepala_sekolah"]').val('').attr('disabled', true);
            }
        })
    </script>
@endsection
