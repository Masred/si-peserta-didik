@extends('layouts.main')

@section('title', 'Tambah Peserta Didik')
@section('pd-open-menu', 'menu-open')
@section('peserta-didik-menu', 'active')

@section('content')
    <div class="card card-lightblue">
        <div class="card-header">
            <h3 class="card-title d-block float-left"><a href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i>
                    kembali</a></h3>
            <h3 class="card-title d-block float-right">Form Peserta Didik</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('peserta-didik.store') }}" method="post">
            @csrf
            <div class="card-body">
                <h3>Peserta Didik</h3>
                <hr>
                <div class="form-group row">
                    <label for="nama" class="col-md-4 col-form-label text-md-right"
                        title="Nama peserta didik sesuai dokumen resmi yang berlaku (Akta atau Ijazah sebelumnya ).">Nama
                        Lengkap</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            placeholder="Masukan Nama Lengkap" name="nama" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_pendaftaran" class="col-md-4 col-form-label text-md-right"
                        title="Status peserta didik saat pertama kali diterima di sekolah ini.">Jenis
                        Pendaftaran</label>
                    <div class="col-md-6">
                        <select name="jenis_pendaftaran" id="jenis_pendaftaran"
                            class="custom-select @error('jenis_pendaftaran') is-invalid @enderror">
                            <option value="">PILIH</option>
                            <option value="Siswa baru" {{ old('jenis_pendaftaran') == 'Siswa baru' ? 'selected' : '' }}>
                                Siswa
                                baru
                            </option>
                            <option value="Pindahan" {{ old('jenis_pendaftaran') == 'Pindahan' ? 'selected' : '' }}>
                                Pindahan
                            </option>
                            <option value="Kembali bersekolah"
                                {{ old('jenis_pendaftaran') == 'Kembali bersekolah' ? 'selected' : '' }}>
                                Kembali bersekolah
                            </option>
                        </select>
                        @error('jenis_pendaftaran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sekolah_asal" class="col-md-4 col-form-label text-md-right"
                        title="Nama sekolah peserta didik sebelumnya. Untuk peserta didik baru, isikan nama sekolah pada jenjang sebelumnya. Sedangkan bagi peserta didik mutasi/pindahan, diisi dengan nama sekolah sebelum pindah ke sekolah saat ini.">Sekolah
                        Asal</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('sekolah_asal') is-invalid @enderror"
                            id="sekolah_asal" placeholder="Masukan pindahan dari sekolah mana" name="sekolah_asal"
                            value="{{ old('sekolah_asal') }}">
                        @error('sekolah_asal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal_masuk" class="col-md-4 col-form-label text-md-right"
                        title="Tanggal pertama kali peserta didik diterima di sekolah ini. Jika siswa baru, maka isikan tanggal awal tahun pelajaran saat peserta didik masuk. Jika siswa mutasi/pindahan, maka isikan tanggal sesuai tanggal diterimanya peserta didik di sekolah ini atau tanggal yang tercantum pada lembar mutasi masuk yang umumnya terdapat di bagian akhir buku rapor.">Tanggal
                        Masuk</label>
                    <div class="col-md-6">
                        <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror"
                            id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}">
                        @error('tanggal_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nipd" class="col-md-4 col-form-label text-md-right"
                        title="Nomor induk peserta didik sesuai yang tercantum pada buku induk">NIPD/NIS</label>
                    <div class="col-md-6">
                        <input type="number" min="1" class="form-control @error('nipd') is-invalid @enderror" id="nipd"
                            placeholder="Masukan NIPD/NIS" name="nipd" value="{{ old('nipd') }}">
                        @error('nipd')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nisn" class="col-md-4 col-form-label text-md-right"
                        title="Nomor Induk Siswa Nasional peserta didik (jika memiliki). Jika belum memiliki, maka wajib dikosongkan. NISN memiliki format 10 digit angka. Contoh: 0009321234.">NISN</label>
                    <div class="col-md-6">
                        <input type="number" min="1" class="form-control @error('nisn') is-invalid @enderror" id="nisn"
                            placeholder="Masukan NISN" name="nisn" value="{{ old('nisn') }}">
                        @error('nisn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right"
                        title="Jenis kelamin peserta didik.">Jenis Kelamin</label>
                    <div class="col-md-6">
                        <select name="jenis_kelamin" id="jenis_kelamin"
                            class="custom-select @error('jenis_kelamin') is-invalid @enderror">
                            <option value="">PILIH</option>
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki - Laki
                            </option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tempat_lahir" class="col-md-4 col-form-label text-md-right"
                        title="Tempat lahir peserta didik sesuai dokumen resmi yang berlaku.">Tempat Lahir</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                            id="tempat_lahir" placeholder="Masukan Tempat Lahir" name="tempat_lahir"
                            value="{{ old('tempat_lahir') }}">
                        @error('tempat_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-right"
                        title="Tanggal lahir peserta didik sesuai dokumen resmi yang berlaku.">Tanggal Lahir</label>
                    <div class="col-md-6">
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                            id="tanggal_lahir" placeholder="Masukan Tempat Lahir" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir') }}">
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="agama" class="col-md-4 col-form-label text-md-right"
                        title="Agama atau kepercayaan yang dianut oleh peserta didik. Apabila peserta didik adalah penghayat kepercayaan (misalnya pada daerah tertentu yang masih memiliki penganut kepercayaan), dapat memilih opsi Kepercayaan kpd Tuhan YME.">Agama
                        & Kepercayaan</label>
                    <div class="col-md-6">
                        <input type="text" name="agama" list="agama"
                            class="form-control @error('agama') is-invalid @enderror"
                            placeholder="Masukan Agama & Kepercayaan" value="{{ old('agama') }}">
                        <datalist id="agama">
                            <option value="Islam">
                            <option value="Protestan">
                            <option value="Katolik">
                            <option value="Hindu">
                            <option value="Buddha">
                            <option value="Khonghucu">
                            <option value="Kepercayaan Kpd Tuan YME">
                            <option value="Lainnya">
                        </datalist>
                        @error('agama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nik" class="col-md-4 col-form-label text-md-right"
                        title="Nomor Induk Kependudukan yang tercantum pada Kartu Keluarga, Kartu Identitas Anak, atau KTP (jika sudah memiliki) bagi WNI. NIKmemiliki format 16 digit angka. Contoh: 6112090906021104.">Nomor
                        Induk Kependudukan</label>
                    <div class="col-md-6">
                        <input type="number" min="1" class="form-control @error('nik') is-invalid @enderror" id="nik"
                            placeholder="Masukan Nomor Induk Kependudukan" name="nik" value="{{ old('nik') }}">
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_kk" class="col-md-4 col-form-label text-md-right"
                        title="Nomor Kartu Keluarga yang tercantum pada Kartu Keluarga. No KK memiliki format 16 digit angka. Contoh: 3207090906021104">Nomor
                        Kartu Keluarga</label>
                    <div class="col-md-6">
                        <input type="number" min="1" class="form-control @error('no_kk') is-invalid @enderror" id="no_kk"
                            placeholder="Masukan Nomor Kartu Keluarga" name="no_kk" value="{{ old('no_kk') }}">
                        @error('no_kk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hp" class="col-md-4 col-form-label text-md-right"
                        title="Diisi nomor telepon selular (ponsel) peserta didik yang dapat dihubungi (milik pribadi, orang tua, atau wali).">Nomor
                        HP</label>
                    <div class="col-md-6">
                        <input type="tel" class="form-control @error('hp') is-invalid @enderror" id="hp"
                            placeholder="Masukan Nomor HP" name="hp" value="{{ old('hp') }}">
                        @error('hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right"
                        title="Diisi alamat surat elektronik (surel) peserta didik yang dapat dihubungi (milik pribadi, orang tua, atau wali).">Email</label>
                    <div class="col-md-6">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            placeholder="Masukan Email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kecamatan" class="col-md-4 col-form-label text-md-right"
                        title="Kecamatan tempat tinggal peserta didik saat ini.">Kecamatan</label>
                    <div class="col-md-6">
                        <input type="text" name="kecamatan" id="kecamatan"
                            class="form-control @error('kecamatan') is-invalid @enderror" placeholder="Masukan Kecamatan"
                            value="{{ old('kecamatan') }}">
                        @error('kecamatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelurahan" class="col-md-4 col-form-label text-md-right"
                        title="Kelurahan/Desa tempat tinggal peserta didik saat ini.">Kelurahan/Desa</label>
                    <div class="col-md-6">
                        <input type="text" name="kelurahan" id="kelurahan"
                            class="form-control @error('kelurahan') is-invalid @enderror"
                            placeholder="Masukan Kelurahan/Desa" value="{{ old('kelurahan') }}">
                        @error('kelurahan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rt" class="col-md-4 col-form-label text-md-right"
                        title="Nomor RT tempat tinggal peserta didik saat ini. Dari contoh di atas, misalnya dapat diisi dengan angka 5.">RT</label>
                    <div class="col-md-6">
                        <input type="number" min="1" name="rt" id="rt"
                            class="form-control @error('rt') is-invalid @enderror" placeholder="Masukan RT"
                            value="{{ old('rt') }}">
                        @error('rt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rw" class="col-md-4 col-form-label text-md-right"
                        title="Nomor RW tempat tinggal peserta didik saat ini. Dari contoh di atas, misalnya dapat diisi dengan angka 11.">RW</label>
                    <div class="col-md-6">
                        <input type="number" min="1" name="rw" id="rw"
                            class="form-control @error('rw') is-invalid @enderror" placeholder="Masukan RW"
                            value="{{ old('rw') }}">
                        @error('rw')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-md-4 col-form-label text-md-right"
                        title="Jalur tempat tinggal peserta didik, terdiri atas gang, kompleks, blok, nomor rumah, dan sebagainya selain informasi yang diminta oleh kolom-kolom yang lain pada bagian ini. Sebagai contoh, peserta didik tinggal di sebuah kompleks perumahan Griya Adam yang berada pada Jalan Kemanggisan, dengan nomor rumah 4-C, di lingkungan RT 005 dan RW 011, Dusun Cempaka, Desa Salatiga. Maka dapat diisi dengan Jl. Kemanggisan, Komp. Griya Adam, No. 4-C">Alamat
                        Jalan</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                            placeholder="Masukan Alamat Jalan" name="alamat" value="{{ old('alamat') }}">
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode_pos" class="col-md-4 col-form-label text-md-right"
                        title="Kode pos tempat tinggal peserta didik saat ini.">Kode Pos</label>
                    <div class="col-md-6">
                        <input type="number" min="1" name="kode_pos" id="kode_pos"
                            class="form-control @error('kode_pos') is-invalid @enderror" placeholder="Masukan Kode Pos"
                            value="{{ old('kode_pos') }}">
                        @error('kode_pos')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                <h3>Ayah Kandung</h3>
                <hr>
                <div class="form-group row">
                    <label for="nama_ayah" class="col-md-4 col-form-label text-md-right"
                        title="Nama ayah kandung peserta didik sesuai dokumen resmi ang berlaku. Hindari penggunaan gelar akademik atau sosial (seperti Alm., Dr., Drs., S.Pd, dan H.).">Nama
                        Ayah
                        Kandung</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah"
                            placeholder="Masukan Nama Ayah Kandung" name="nama_ayah" value="{{ old('nama_ayah') }}">
                        @error('nama_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nik_ayah" class="col-md-4 col-form-label text-md-right"
                        title="Nomor Induk Kependudukan yang tercantum pada Kartu Keluarga atau KTP ayah kandung peserta didik.">Nomor
                        Induk Kependudukan
                        Ayah</label>
                    <div class="col-md-6">
                        <input type="number" min="1" class="form-control @error('nik_ayah') is-invalid @enderror"
                            id="nik_ayah" placeholder="Masukan Nomor Induk Kependudukan Ayah" name="nik_ayah"
                            value="{{ old('nik_ayah') }}">
                        @error('nik_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tahun_lahir_ayah" class="col-md-4 col-form-label text-md-right"
                        title="Tahun lahir ayah kandung peserta didik.">Tahun
                        Lahir</label>
                    <div class="col-md-6">
                        <input type="number" min="1950" max="2099" step="1" placeholder="Mssukan Tahun Lahir"
                            class="form-control @error('tahun_lahir_ayah') is-invalid @enderror" id="tahun_lahir_ayah"
                            name="tahun_lahir_ayah" value="{{ old('tahun_lahir_ayah') }}">
                        @error('tahun_lahir_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenjang_pendidikan_ayah" class="col-md-4 col-form-label text-md-right"
                        title="Pendidikan terakhir ayah kandung peserta didik.">Pendidikan</label>
                    <div class="col-md-6">
                        <input list="jenjang_pendidikan_ayah" name="jenjang_pendidikan_ayah"
                            class="form-control @error('jenjang_pendidikan_ayah') is-invalid @enderror"
                            placeholder="Masukan Pendidikan" value="{{ old('jenjang_pendidikan_ayah') }}">
                        <datalist id="jenjang_pendidikan_ayah">
                            <option value="Tidak Sekolah">
                            <option value="Putus SD">
                            <option value="SD Sederajat">
                            <option value="SMP Sederajat">
                            <option value="SMA Sederajat">
                            <option value="D1">
                            <option value="D2">
                            <option value="D3">
                            <option value="D4/S1">
                            <option value="S2">
                            <option value="S3">
                        </datalist>
                        @error('jenjang_pendidikan_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pekerjaan_ayah" class="col-md-4 col-form-label text-md-right"
                        title="Pekerjaan utama ayah kandung peserta didik. Pilih Meninggal Dunia apabila ayah kandung peserta didik telah meninggal dunia.">Pekerjaan</label>
                    <div class="col-md-6">
                        <input list="pekerjaan_ayah" name="pekerjaan_ayah"
                            class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                            placeholder="Masukan Pekerjaan" value="{{ old('pekerjaan_ayah') }}">
                        <datalist id="pekerjaan_ayah">
                            <option value="Tidak Bekerja">
                            <option value="Nelayan">
                            <option value="Petani">
                            <option value="Peternak">
                            <option value="PNS/TNI/POLRI">
                            <option value="Karyawan Swasta">
                            <option value="Pedagang Kecil">
                            <option value="Pedagang Besar">
                            <option value="Wiraswasta">
                            <option value="Wirausaha">
                            <option value="Buruh">
                            <option value="Pensiunan">
                            <option value="Meninggal Dunia">
                            <option value="Lain-lain">
                        </datalist>
                        @error('pekerjaan_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penghasilan_ayah" class="col-md-4 col-form-label text-md-right"
                        title="Rentang penghasilan ayah kandung peserta didik. Kosongkan kolom ini apabila ayah kandung peserta didik telah meninggal dunia atau tidak bekerja.">Penghasilan</label>
                    <div class="col-md-6">
                        <input list="penghasilan_ayah" name="penghasilan_ayah"
                            class="form-control @error('penghasilan_ayah') is-invalid @enderror"
                            placeholder="Masukan Penghasilan" value="{{ old('penghasilan_ayah') }}">
                        <datalist id="penghasilan_ayah">
                            <option value="Kurang dari Rp. 500,000">
                            <option value="Rp. 500.000 - 999.9999">
                            <option value="Rp. 1 juta - 1.999.999 ">
                            <option value="Rp. 2 juta - 4.999.999 ">
                            <option value="Rp. 5 juta - 20 juta">
                            <option value="Lebih dari 20 juta">
                            <option value="Tidak Berpenghasilan">
                        </datalist>
                        @error('penghasilan_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                <h3>Ibu Kandung</h3>
                <hr>
                <div class="form-group row">
                    <label for="nama_ibu" class="col-md-4 col-form-label text-md-right"
                        title="Nama Ibu kandung peserta didik sesuai dokumen resmi yang berlaku. Hindari penggunaan gelar akademik atau sosial (seperti Alm., Dr., Drs., S.Pd, dan H.).">Nama
                        Ibu Kandung</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu"
                            placeholder="Masukan Nama Ibu Kandung" name="nama_ibu" value="{{ old('nama_ibu') }}">
                        @error('nama_ibu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nik_ibu" class="col-md-4 col-form-label text-md-right"
                        title="Nomor Induk Kependudukan yang tercantum pada Kartu Keluarga atau KTP ibu kandung peserta didik.">Nomor
                        Induk Kependudukan
                        Ibu</label>
                    <div class="col-md-6">
                        <input type="number" min="1" class="form-control @error('nik_ibu') is-invalid @enderror"
                            id="nik_ibu" placeholder="Masukan Nomor Induk Kependudukan Ibu" name="nik_ibu"
                            value="{{ old('nik_ibu') }}">
                        @error('nik_ibu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tahun_lahir_ibu" class="col-md-4 col-form-label text-md-right"
                        title="Tahun lahir ibu kandung peserta didik.">Tahun
                        Lahir</label>
                    <div class="col-md-6">
                        <input type="number" min="1950" max="2099" step="1" placeholder="Mssukan Tahun Lahir"
                            class="form-control @error('tahun_lahir_ibu') is-invalid @enderror" id="tahun_lahir_ibu"
                            name="tahun_lahir_ibu" value="{{ old('tahun_lahir_ibu') }}">
                        @error('tahun_lahir_ibu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenjang_pendidikan_ibu" class="col-md-4 col-form-label text-md-right"
                        title="Pendidikan terakhir ibu kandung peserta didik.">Pendidikan</label>
                    <div class="col-md-6">
                        <input list="jenjang_pendidikan_ibu" name="jenjang_pendidikan_ibu"
                            class="form-control @error('jenjang_pendidikan_ibu') is-invalid @enderror"
                            placeholder="Masukan Pendidikan" value="{{ old('jenjang_pendidikan_ibu') }}">
                        <datalist id="jenjang_pendidikan_ibu">
                            <option value="Tidak Sekolah">
                            <option value="Putus SD">
                            <option value="SD Sederajat">
                            <option value="SMP Sederajat">
                            <option value="SMA Sederajat">
                            <option value="D1">
                            <option value="D2">
                            <option value="D3">
                            <option value="D4/S1">
                            <option value="S2">
                            <option value="S3">
                        </datalist>
                        @error('jenjang_pendidikan_ibu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pekerjaan_ibu" class="col-md-4 col-form-label text-md-right"
                        title="Pekerjaan utama ibu kandung peserta didik. Pilih Meninggal Dunia apabila ibu kandung peserta didik telah meninggal dunia.">Pekerjaan</label>
                    <div class="col-md-6">
                        <input list="pekerjaan_ibu" name="pekerjaan_ibu"
                            class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                            placeholder="Masukan Pekerjaan" value="{{ old('pekerjaan_ibu') }}">
                        <datalist id="pekerjaan_ibu">
                            <option value="Tidak Bekerja">
                            <option value="Nelayan">
                            <option value="Petani">
                            <option value="Peternak">
                            <option value="PNS/TNI/POLRI">
                            <option value="Karyawan Swasta">
                            <option value="Pedagang Kecil">
                            <option value="Pedagang Besar">
                            <option value="Wiraswasta">
                            <option value="Wirausaha">
                            <option value="Buruh">
                            <option value="Pensiunan">
                            <option value="Meninggal Dunia">
                            <option value="Lain-lain">
                        </datalist>
                        @error('pekerjaan_ibu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penghasilan_ibu" class="col-md-4 col-form-label text-md-right"
                        title="Rentang penghasilan ibu kandung peserta didik. Kosongkan kolom ini apabila ibu kandung peserta didik telah meninggal dunia atau tidak bekerja.">Penghasilan</label>
                    <div class="col-md-6">
                        <input list="penghasilan_ibu" name="penghasilan_ibu"
                            class="form-control @error('penghasilan_ibu') is-invalid @enderror"
                            placeholder="Masukan Penghasilan" value="{{ old('penghasilan_ibu') }}">
                        <datalist id="penghasilan_ibu">
                            <option value="Kurang dari Rp. 500,000">
                            <option value="Rp. 500.000 - 999.9999">
                            <option value="Rp. 1 juta - 1.999.999 ">
                            <option value="Rp. 2 juta - 4.999.999 ">
                            <option value="Rp. 5 juta - 20 juta">
                            <option value="Lebih dari 20 juta">
                            <option value="Tidak Berpenghasilan">
                        </datalist>
                        @error('penghasilan_ibu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                <h3>Wali</h3>
                <hr>
                <div class="form-group row">
                    <label for="nama_wali" class="col-md-4 col-form-label text-md-right"
                        title="Nama Wali peserta didik sesuai dokumen resmi yang berlaku. Hindari penggunaan gelar akademik atau sosial (seperti Alm., Dr., Drs., S.Pd, dan H.).">Nama
                        Wali</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('nama_wali') is-invalid @enderror" id="nama_wali"
                            placeholder="Masukan Nama Wali" name="nama_wali" value="{{ old('nama_wali') }}">
                        @error('nama_wali')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nik_wali" class="col-md-4 col-form-label text-md-right"
                        title="Nomor Induk Kependudukan yang tercantum pada Kartu Keluarga atau KTP ibu kandung peserta didik.">Nomor
                        Induk Kependudukan
                        Wali</label>
                    <div class="col-md-6">
                        <input type="number" min="1" class="form-control @error('nik_wali') is-invalid @enderror"
                            id="nik_wali" placeholder="Masukan Nomor Induk Kependudukan Wali" name="nik_wali"
                            value="{{ old('nik_wali') }}">
                        @error('nik_wali')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tahun_lahir_wali" class="col-md-4 col-form-label text-md-right"
                        title="Tahun lahir Wali peserta didik.">Tahun
                        Lahir</label>
                    <div class="col-md-6">
                        <input type="number" min="1950" max="2099" step="1" placeholder="Mssukan Tahun Lahir"
                            class="form-control @error('tahun_lahir_wali') is-invalid @enderror" id="tahun_lahir_wali"
                            name="tahun_lahir_wali" value="{{ old('tahun_lahir_wali') }}">
                        @error('tahun_lahir_wali')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenjang_pendidikan_wali" class="col-md-4 col-form-label text-md-right"
                        title="Pendidikan terakhir Wali peserta didik.">Pendidikan</label>
                    <div class="col-md-6">
                        <input list="jenjang_pendidikan_wali" name="jenjang_pendidikan_wali"
                            class="form-control @error('jenjang_pendidikan_wali') is-invalid @enderror"
                            placeholder="Masukan Pendidikan" value="{{ old('jenjang_pendidikan_wali') }}">
                        <datalist id="jenjang_pendidikan_wali">
                            <option value="Tidak Sekolah">
                            <option value="Putus SD">
                            <option value="SD Sederajat">
                            <option value="SMP Sederajat">
                            <option value="SMA Sederajat">
                            <option value="D1">
                            <option value="D2">
                            <option value="D3">
                            <option value="D4/S1">
                            <option value="S2">
                            <option value="S3">
                        </datalist>
                        @error('jenjang_pendidikan_wali')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pekerjaan_wali" class="col-md-4 col-form-label text-md-right"
                        title="Pekerjaan utama wali peserta didik.">Pekerjaan</label>
                    <div class="col-md-6">
                        <input list="pekerjaan_wali" name="pekerjaan_wali"
                            class="form-control @error('pekerjaan_wali') is-invalid @enderror"
                            placeholder="Masukan Pekerjaan" value="{{ old('pekerjaan_wali') }}">
                        <datalist id="pekerjaan_wali">
                            <option value="Tidak Bekerja">
                            <option value="Nelayan">
                            <option value="Petani">
                            <option value="Peternak">
                            <option value="PNS/TNI/POLRI">
                            <option value="Karyawan Swasta">
                            <option value="Pedagang Kecil">
                            <option value="Pedagang Besar">
                            <option value="Wiraswasta">
                            <option value="Wirausaha">
                            <option value="Buruh">
                            <option value="Pensiunan">
                            <option value="Meninggal Dunia">
                            <option value="Lain-lain">
                        </datalist>
                        @error('pekerjaan_wali')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penghasilan_wali" class="col-md-4 col-form-label text-md-right"
                        title="Rentang penghasilan wali peserta didik.">Penghasilan</label>
                    <div class="col-md-6">
                        <input list="penghasilan_wali" name="penghasilan_wali"
                            class="form-control @error('penghasilan_wali') is-invalid @enderror"
                            placeholder="Masukan Penghasilan" value="{{ old('penghasilan_wali') }}">
                        <datalist id="penghasilan_wali">
                            <option value="Kurang dari Rp. 500,000">
                            <option value="Rp. 500.000 - 999.9999">
                            <option value="Rp. 1 juta - 1.999.999 ">
                            <option value="Rp. 2 juta - 4.999.999 ">
                            <option value="Rp. 5 juta - 20 juta">
                            <option value="Lebih dari 20 juta">
                            <option value="Tidak Berpenghasilan">
                        </datalist>
                        @error('penghasilan_wali')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
