@extends('layouts.main')

@section('title', 'Tambah Peserta Didik')
@section('peserta-didik-menu', 'active')

@section('content')
    <div class="card card-lightblue">
        <div class="card-header">
            <h3 class="card-title d-block float-left"><a href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> kembali</a></h3>
            <h3 class="card-title d-block float-right">Form Peserta Didik</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('peserta-didik.store') }}" method="post">
            @csrf
            <div class="card-body">
                <h3>Peserta Didik</h3>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                   id="nama" placeholder="Masukan Nama Lengkap" name="nama"
                                   value="{{ old('nama') }}">
                            <small class="form-text text-muted">Nama peserta didik sesuai dokumen resmi
                                yang berlaku (Akta atau Ijazah sebelumnya ).</small>
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nipd">NIPD/NIS</label>
                            <input type="number" min="1" class="form-control @error('nipd') is-invalid @enderror"
                                   id="nipd" placeholder="Masukan NIPD/NIS" name="nipd"
                                   value="{{ old('nipd') }}">
                            <small class="form-text text-muted">
                                Nomor induk peserta didik sesuai yang tercantum pada buku induk</small>
                            @error('nipd')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="number" min="1" class="form-control @error('nisn') is-invalid @enderror"
                                   id="nisn" placeholder="Masukan NISN" name="nisn"
                                   value="{{ old('nisn') }}">
                            <small class="form-text text-muted">Nomor Induk Siswa Nasional peserta didik
                                (jika memiliki). Jika belum memiliki, maka wajib dikosongkan. NISN memiliki format 10
                                digit
                                angka. Contoh: 0009321234.</small>
                            @error('nisn')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tahun_masuk">Tahun Masuk</label>
                            <input type="number" min="2010" max="2099" step="1" placeholder="Mssukan Tahun Masuk"
                                   class="form-control @error('tahun_masuk') is-invalid @enderror"
                                   id="tahun_masuk" name="tahun_masuk"
                                   value="{{ old('tahun_masuk') }}">
                            <small class="form-text text-muted">Tahun masuk peserta didik.</small>
                            @error('tahun_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin"
                                    class="custom-select @error('jenis_kelamin') is-invalid @enderror">
                                <option value="">PILIH</option>
                                <option value="L" {{ (old('jenis_kelamin') == 'L')? 'selected': '' }}>Laki - Laki
                                </option>
                                <option value="P" {{ (old('jenis_kelamin') == 'P')? 'selected': '' }}>Perempuan</option>
                            </select>
                            <small class="form-text text-muted">Jenis kelamin peserta didik.</small>
                            @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                   id="tempat_lahir" placeholder="Masukan Tempat Lahir" name="tempat_lahir"
                                   value="{{ old('tempat_lahir') }}">
                            <small class="form-text text-muted">Tempat lahir peserta didik sesuai dokumen resmi yang
                                berlaku.</small>
                            @error('tempat_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                   id="tanggal_lahir" placeholder="Masukan Tempat Lahir" name="tanggal_lahir"
                                   value="{{ old('tanggal_lahir') }}">
                            <small class="form-text text-muted">Tanggal lahir peserta didik sesuai dokumen resmi yang
                                berlaku.</small>
                            @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama & Kepercayaan</label>
                            <input type="text" name="agama" list="agama"
                                   class="form-control @error('agama') is-invalid @enderror" placeholder="Masukan Agama"
                                   value="{{ old('agama') }}">
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
                            <small class="form-text text-muted">Agama atau kepercayaan yang dianut oleh peserta didik.
                                Apabila peserta didik adalah penghayat kepercayaan (misalnya pada daerah
                                tertentu yang masih memiliki penganut kepercayaan), dapat memilih opsi Kepercayaan kpd
                                Tuhan YME
                            </small>
                            @error('agama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik">Nomor Induk Kependudukan</label>
                            <input type="number" min="1" class="form-control @error('nik') is-invalid @enderror"
                                   id="nik" placeholder="Masukan Nomor Induk Kependudukan" name="nik"
                                   value="{{ old('nik') }}">
                            <small class="form-text text-muted">Nomor Induk Kependudukan yang tercantum
                                pada Kartu Keluarga, Kartu Identitas Anak, atau KTP (jika sudah memiliki) bagi WNI. NIK
                                memiliki format 16 digit angka. Contoh: 6112090906021104.
                            </small>
                            @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_kk">Nomor Kartu Keluarga</label>
                            <input type="number" min="1" class="form-control @error('no_kk') is-invalid @enderror"
                                   id="no_kk" placeholder="Masukan Nomor Kartu Keluarga" name="no_kk"
                                   value="{{ old('no_kk') }}">
                            <small class="form-text text-muted">Nomor Kartu Keluarga yang tercantum
                                pada Kartu Keluarga. No KK
                                memiliki format 16 digit angka. Contoh: 3207090906021104</small>
                            @error('no_kk')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="hp">Nomor HP</label>
                            <input type="tel" class="form-control @error('hp') is-invalid @enderror"
                                   id="hp" placeholder="Masukan Nomor HP" name="hp"
                                   value="{{ old('hp') }}">
                            <small class="form-text text-muted">Diisi nomor telepon selular (ponsel) peserta didik yang
                                dapat dihubungi (milik pribadi, orang tua, atau wali).</small>
                            @error('hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" placeholder="Masukan Email" name="email"
                                   value="{{ old('email') }}">
                            <small class="form-text text-muted">Diisi alamat surat elektronik (surel) peserta didik yang
                                dapat dihubungi (milik pribadi, orang tua, atau wali).</small>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kota">Kota/Kabupaten</label>
                            <input type="text" name="kota" id="kota"
                                   class="form-control @error('kota') is-invalid @enderror"
                                   placeholder="Masukan Kota/Kabupaten" value="{{ old('kota') }}">
                            <small class="form-text text-muted">Kota tempat tinggal peserta didik saat ini.</small>
                            @error('kota')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" name="kecamatan" id="kecamatan"
                                   class="form-control @error('kecamatan') is-invalid @enderror"
                                   placeholder="Masukan Kecamatan" value="{{ old('kecamatan') }}">
                            <small class="form-text text-muted">Kecamatan tempat tinggal peserta didik saat ini.</small>
                            @error('kecamatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kelurahan">Kelurahan/Desa</label>
                            <input type="text" name="kelurahan" id="kelurahan"
                                   class="form-control @error('kelurahan') is-invalid @enderror"
                                   placeholder="Masukan Kelurahan/Desa" value="{{ old('kelurahan') }}">
                            <small class="form-text text-muted">Kelurahan/Desa tempat tinggal peserta didik saat
                                ini.</small>
                            @error('kelurahan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Jalan</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                   id="alamat" placeholder="Masukan Alamat Jalan" name="alamat"
                                   value="{{ old('alamat') }}">
                            <small class="form-text text-muted">Jalur tempat tinggal peserta didik, terdiri atas gang,
                                kompleks, blok, nomor rumah, dan sebagainya selain informasi yang diminta oleh
                                kolom-kolom yang lain pada bagian ini. Sebagai contoh, peserta didik tinggal di sebuah
                                kompleks perumahan Griya Adam yang berada
                                pada Jalan Kemanggisan, dengan nomor rumah 4-C, di lingkungan RT 005 dan RW 011, Dusun
                                Cempaka, Desa Salatiga. Maka dapat
                                diisi dengan Jl. Kemanggisan, Komp. Griya Adam, No. 4-C</small>
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kode_rombel">Rombongan Belajar</label>
                            <select name="kode_rombel" id="kode_rombel"
                                    class="custom-select @error('kode_rombel') is-invalid @enderror">
                                <option value="">PILIH</option>
                                @foreach($rombel as $r)
                                    <option
                                        value="{{ $r->kode_rombel }}" {{ (old('kode_rombel') == $r->kode_rombel)? 'selected': '' }}>{{ $r->kelas }} {{ $r->kode_jurusan }} {{ $r->kelompok }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Rombongan kelas peserta didik saat ini.</small>
                            @error('kode_rombel')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="custom-select @error('status') is-invalid @enderror">
                                <option value="">PILIH</option>
                                <option value="aktif" {{ (old('status') == 'aktif')? 'selected': '' }}>aktif</option>
                                <option value="pindah" {{ (old('status') == 'pindah')? 'selected': '' }}>pindah</option>
                                <option value="tamat" {{ (old('status') == 'tamat')? 'selected': '' }}>tamat</option>
                                <option value="pindahan" {{ (old('status') == 'pindahan')? 'selected': '' }}>pindahan</option>
                                <option value="keluar" {{ (old('status') == 'keluar')? 'selected': '' }}>keluar</option>
                                <option value="dikeluarkan" {{ (old('status') == 'dikeluarkan')? 'selected': '' }}>dikeluarkan</option>
                            </select>
                            <small class="form-text text-muted">Status peserta didik saat ini.</small>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tahun_keluar">Tahun Keluar</label>
                            <input type="number" min="2010" max="2099" step="1" placeholder="Mssukan Tahun Keluar"
                                   class="form-control @error('tahun_keluar') is-invalid @enderror"
                                   id="tahun_keluar" name="tahun_keluar"
                                   value="{{ old('tahun_keluar') }}">
                            <small class="form-text text-muted">Tahun peserta didik keluar.</small>
                            @error('tahun_keluar')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <h3>Ayah Kandung</h3>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nama_ayah">Nama Ayah Kandung</label>
                            <input type="text"
                                   class="form-control @error('nama_ayah') is-invalid @enderror"
                                   id="nama_ayah" placeholder="Masukan Nama Ayah Kandung" name="nama_ayah"
                                   value="{{ old('nama_ayah') }}">
                            <small class="form-text text-muted">Nama ayah kandung peserta didik sesuai dokumen resmi
                                yang berlaku. Hindari penggunaan gelar akademik atau sosial (seperti Alm., Dr., Drs.,
                                S.Pd, dan H.).</small>
                            @error('nama_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik_ayah">Nomor Induk Kependudukan Ayah</label>
                            <input type="number" min="1"
                                   class="form-control @error('nik_ayah') is-invalid @enderror"
                                   id="nik_ayah" placeholder="Masukan Nomor Induk Kependudukan Ayah" name="nik_ayah"
                                   value="{{ old('nik_ayah') }}">
                            <small class="form-text text-muted">Nomor Induk Kependudukan yang tercantum pada Kartu
                                Keluarga atau KTP ayah kandung peserta didik.</small>
                            @error('nik_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tahun_lahir_ayah">Tahun Lahir</label>
                            <input type="number" min="1950" max="2099" step="1" placeholder="Mssukan Tahun Lahir"
                                   class="form-control @error('tahun_lahir_ayah') is-invalid @enderror"
                                   id="tahun_lahir_ayah" name="tahun_lahir_ayah"
                                   value="{{ old('tahun_lahir_ayah') }}">
                            <small class="form-text text-muted">Tahun lahir ayah kandung peserta didik.</small>
                            @error('tahun_lahir_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="jenjang_pendidikan_ayah">Pendidikan</label>
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
                            <small class="form-text text-muted">Pendidikan terakhir ayah kandung peserta didik.</small>
                            @error('jenjang_pendidikan_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_ayah">Pekerjaan</label>
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
                            <small class="form-text text-muted">Pekerjaan utama ayah kandung peserta didik. Pilih
                                Meninggal
                                Dunia apabila ayah kandung peserta didik telah meninggal dunia.</small>
                            @error('pekerjaan_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="penghasilan_ayah">Penghasilan</label>
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
                            <small class="form-text text-muted">Rentang penghasilan ayah kandung peserta didik.
                                Kosongkan
                                kolom
                                ini apabila ayah kandung peserta didik telah meninggal dunia atau tidak bekerja.</small>
                            @error('penghasilan_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <h3>Ibu Kandung</h3>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu Kandung</label>
                            <input type="text"
                                   class="form-control @error('nama_ibu') is-invalid @enderror"
                                   id="nama_ibu" placeholder="Masukan Nama Ibu Kandung" name="nama_ibu"
                                   value="{{ old('nama_ibu') }}">
                            <small class="form-text text-muted">Nama Ibu kandung peserta didik sesuai dokumen resmi
                                yang berlaku. Hindari penggunaan gelar akademik atau sosial (seperti Alm., Dr., Drs.,
                                S.Pd, dan H.).</small>
                            @error('nama_ibu')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik_ibu">Nomor Induk Kependudukan Ibu</label>
                            <input type="number" min="1"
                                   class="form-control @error('nik_ibu') is-invalid @enderror"
                                   id="nik_ibu" placeholder="Masukan Nomor Induk Kependudukan Ibu" name="nik_ibu"
                                   value="{{ old('nik_ibu') }}">
                            <small class="form-text text-muted">Nomor Induk Kependudukan yang tercantum pada Kartu
                                Keluarga atau KTP ibu kandung peserta didik.</small>
                            @error('nik_ibu')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tahun_lahir_ibu">Tahun Lahir</label>
                            <input type="number" min="1950" max="2099" step="1" placeholder="Mssukan Tahun Lahir"
                                   class="form-control @error('tahun_lahir_ibu') is-invalid @enderror"
                                   id="tahun_lahir_ibu" name="tahun_lahir_ibu"
                                   value="{{ old('tahun_lahir_ibu') }}">
                            <small class="form-text text-muted">Tahun lahir ibu kandung peserta didik.</small>
                            @error('tahun_lahir_ibu')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="jenjang_pendidikan_ibu">Pendidikan</label>
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
                            <small class="form-text text-muted">Pendidikan terakhir ibu kandung peserta didik.</small>
                            @error('jenjang_pendidikan_ibu')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_ibu">Pekerjaan</label>
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
                            <small class="form-text text-muted">Pekerjaan utama ibu kandung peserta didik. Pilih
                                Meninggal
                                Dunia apabila ibu kandung peserta didik telah meninggal dunia.</small>
                            @error('pekerjaan_ibu')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="penghasilan_ibu">Penghasilan</label>
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
                            <small class="form-text text-muted">Rentang penghasilan ibu kandung peserta didik.
                                Kosongkan
                                kolom
                                ini apabila ibu kandung peserta didik telah meninggal dunia atau tidak bekerja.</small>
                            @error('penghasilan_ibu')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <h3>Wali</h3>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nama_wali">Nama Wali</label>
                            <input type="text"
                                   class="form-control @error('nama_wali') is-invalid @enderror"
                                   id="nama_wali" placeholder="Masukan Nama Wali" name="nama_wali"
                                   value="{{ old('nama_wali') }}">
                            <small class="form-text text-muted">Nama Wali peserta didik sesuai dokumen resmi
                                yang berlaku. Hindari penggunaan gelar akademik atau sosial (seperti Alm., Dr., Drs.,
                                S.Pd, dan H.).</small>
                            @error('nama_wali')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik_wali">Nomor Induk Kependudukan Wali</label>
                            <input type="number" min="1"
                                   class="form-control @error('nik_wali') is-invalid @enderror"
                                   id="nik_wali" placeholder="Masukan Nomor Induk Kependudukan Wali" name="nik_wali"
                                   value="{{ old('nik_wali') }}">
                            <small class="form-text text-muted">Nomor Induk Kependudukan yang tercantum pada Kartu
                                Keluarga atau KTP ibu kandung peserta didik.</small>
                            @error('nik_wali')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tahun_lahir_wali">Tahun Lahir</label>
                            <input type="number" min="1950" max="2099" step="1" placeholder="Mssukan Tahun Lahir"
                                   class="form-control @error('tahun_lahir_wali') is-invalid @enderror"
                                   id="tahun_lahir_wali" name="tahun_lahir_wali"
                                   value="{{ old('tahun_lahir_wali') }}">
                            <small class="form-text text-muted">Tahun lahir Wali peserta didik.</small>
                            @error('tahun_lahir_wali')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="jenjang_pendidikan_wali">Pendidikan</label>
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
                            <small class="form-text text-muted">Pendidikan terakhir Wali peserta didik.</small>
                            @error('jenjang_pendidikan_wali')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_wali">Pekerjaan</label>
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
                            <small class="form-text text-muted">Pekerjaan utama wali peserta didik.</small>
                            @error('pekerjaan_wali')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="penghasilan_wali">Penghasilan</label>
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
                            <small class="form-text text-muted">Rentang penghasilan wali peserta didik.</small>
                            @error('penghasilan_wali')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
