@extends('layouts.main')

@section('title', 'Edit Peserta Didik')
@section('pd-open-menu', 'menu-open')
@section('peserta-didik-menu', 'active')
@section('aktif-menu', 'active')

@section('content')
    <div class="card card-lightblue">
        <div class="card-header">
            <h3 class="card-title d-block float-left"><a href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i>
                    kembali</a></h3>
            <h3 class="card-title d-block float-right">Form Peserta Didik</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('peserta-didik.update', $peserta_didik->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="card-body">
                <h3>Peserta Didik</h3>
                <hr>
                <div class="form-group row">
                    <label for="nama" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                               id="nama" placeholder="Masukan Nama Lengkap" name="nama"
                               value="{{ old('nama', $peserta_didik->nama) }}">
                        <small class="form-text text-muted">Nama peserta didik sesuai dokumen resmi
                            yang berlaku (Akta atau Ijazah sebelumnya ).</small>
                        @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_pendaftaran" class="col-md-4 col-form-label text-md-right">Jenis
                        Pendaftaran</label>
                    <div class="col-md-6">
                        <select name="jenis_pendaftaran" id="jenis_pendaftaran"
                                class="custom-select @error('jenis_pendaftaran') is-invalid @enderror">
                            <option value="">PILIH</option>
                            <option
                                value="Siswa baru" {{ (old('jenis_pendaftaran', $peserta_didik->jenis_pendaftaran) == 'Siswa baru')? 'selected': '' }}>
                                Siswa
                                baru
                            </option>
                            <option
                                value="Pindahan" {{ (old('jenis_pendaftaran', $peserta_didik->jenis_pendaftaran) == 'Pindahan')? 'selected': '' }}>
                                Pindahan
                            </option>
                            <option
                                value="Kembali bersekolah" {{ (old('jenis_pendaftaran', $peserta_didik->jenis_pendaftaran) == 'Kembali bersekolah')? 'selected': '' }}>
                                Kembali bersekolah
                            </option>
                        </select>
                        <small class="form-text text-muted">Status peserta didik saat pertama kali diterima di sekolah
                            ini.</small>
                        @error('jenis_pendaftaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sekolah_asal" class="col-md-4 col-form-label text-md-right">Sekolah Asal</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('sekolah_asal') is-invalid @enderror"
                               id="sekolah_asal" placeholder="Masukan pindahan dari sekolah mana" name="sekolah_asal"
                               value="{{ old('sekolah_asal', $peserta_didik->sekolah_asal) }}">
                        <small class="form-text text-muted">
                            Nama sekolah peserta didik sebelumnya. Untuk peserta didik baru, isikan nama sekolah pada
                            jenjang sebelumnya. Sedangkan bagi
                            peserta didik mutasi/pindahan, diisi dengan nama sekolah sebelum pindah ke sekolah saat
                            ini.</small>
                        @error('sekolah_asal')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal_masuk" class="col-md-4 col-form-label text-md-right">Tanggal Masuk</label>
                    <div class="col-md-6">
                        <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror"
                               id="tanggal_masuk" name="tanggal_masuk"
                               value="{{ old('tanggal_masuk', $peserta_didik->tanggal_masuk) }}">
                        <small class="form-text text-muted">
                            Tanggal pertama kali peserta didik diterima di sekolah ini. Jika siswa baru, maka isikan
                            tanggal awal tahun pelajaran saat peserta didik
                            masuk. Jika siswa mutasi/pindahan, maka isikan tanggal sesuai tanggal diterimanya peserta
                            didik di sekolah ini atau tanggal yang
                            tercantum pada lembar mutasi masuk yang umumnya terdapat di bagian akhir buku rapor.</small>
                        @error('tanggal_masuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nipd" class="col-md-4 col-form-label text-md-right">NIPD/NIS</label>
                    <div class="col-md-6">
                        <input type="number" min="1" class="form-control @error('nipd') is-invalid @enderror"
                               id="nipd" placeholder="Masukan NIPD/NIS" name="nipd"
                               value="{{ old('nipd', $peserta_didik->nipd) }}">
                        <small class="form-text text-muted">
                            Nomor induk peserta didik sesuai yang tercantum pada buku induk</small>
                        @error('nipd')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nisn" class="col-md-4 col-form-label text-md-right">NISN</label>
                    <div class="col-md-6">
                        <input type="number" min="1" class="form-control @error('nisn') is-invalid @enderror"
                               id="nisn" placeholder="Masukan NISN" name="nisn"
                               value="{{ old('nisn', $peserta_didik->nisn) }}">
                        <small class="form-text text-muted">Nomor Induk Siswa Nasional peserta didik
                            (jika memiliki). Jika belum memiliki, maka wajib dikosongkan. NISN memiliki format 10
                            digit
                            angka. Contoh: 0009321234.</small>
                        @error('nisn')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">Jenis Kelamin</label>
                    <div class="col-md-6">
                        <select name="jenis_kelamin" id="jenis_kelamin"
                                class="custom-select @error('jenis_kelamin') is-invalid @enderror">
                            <option value="">PILIH</option>
                            <option
                                value="L" {{ (old('jenis_kelamin', $peserta_didik->jenis_kelamin) == 'L')? 'selected': '' }}>
                                Laki - Laki
                            </option>
                            <option
                                value="P" {{ (old('jenis_kelamin', $peserta_didik->jenis_kelamin) == 'P')? 'selected': '' }}>
                                Perempuan
                            </option>
                        </select>
                        <small class="form-text text-muted">Jenis kelamin peserta didik.</small>
                        @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tempat_lahir" class="col-md-4 col-form-label text-md-right">Tempat Lahir</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                               id="tempat_lahir" placeholder="Masukan Tempat Lahir" name="tempat_lahir"
                               value="{{ old('tempat_lahir', $peserta_didik->tempat_lahir) }}">
                        <small class="form-text text-muted">Tempat lahir peserta didik sesuai dokumen resmi yang
                            berlaku.</small>
                        @error('tempat_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-right">Tanggal Lahir</label>
                    <div class="col-md-6">
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                               id="tanggal_lahir" placeholder="Masukan Tempat Lahir" name="tanggal_lahir"
                               value="{{ old('tanggal_lahir', $peserta_didik->tanggal_lahir) }}">
                        <small class="form-text text-muted">Tanggal lahir peserta didik sesuai dokumen resmi yang
                            berlaku.</small>
                        @error('tanggal_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="agama" class="col-md-4 col-form-label text-md-right">Agama & Kepercayaan</label>
                    <div class="col-md-6">
                        <input type="text" name="agama" list="agama"
                               class="form-control @error('agama') is-invalid @enderror" placeholder="Masukan Agama"
                               value="{{ old('agama', $peserta_didik->agama) }}">
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
                </div>
                <div class="form-group row">
                    <label for="nik" class="col-md-4 col-form-label text-md-right">Nomor Induk Kependudukan</label>
                    <div class="col-md-6">
                        <input type="number" min="1" class="form-control @error('nik') is-invalid @enderror"
                               id="nik" placeholder="Masukan Nomor Induk Kependudukan" name="nik"
                               value="{{ old('nik', $peserta_didik->nik) }}">
                        <small class="form-text text-muted">Nomor Induk Kependudukan yang tercantum
                            pada Kartu Keluarga, Kartu Identitas Anak, atau KTP (jika sudah memiliki) bagi WNI. NIK
                            memiliki format 16 digit angka. Contoh: 6112090906021104.
                        </small>
                        @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_kk" class="col-md-4 col-form-label text-md-right">Nomor Kartu Keluarga</label>
                    <div class="col-md-6">
                        <input type="number" min="1" class="form-control @error('no_kk') is-invalid @enderror"
                               id="no_kk" placeholder="Masukan Nomor Kartu Keluarga" name="no_kk"
                               value="{{ old('no_kk', $peserta_didik->no_kk) }}">
                        <small class="form-text text-muted">Nomor Kartu Keluarga yang tercantum
                            pada Kartu Keluarga. No KK
                            memiliki format 16 digit angka. Contoh: 3207090906021104</small>
                        @error('no_kk')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hp" class="col-md-4 col-form-label text-md-right">Nomor HP</label>
                    <div class="col-md-6">
                        <input type="tel" class="form-control @error('hp') is-invalid @enderror"
                               id="hp" placeholder="Masukan Nomor HP" name="hp"
                               value="{{ old('hp', $peserta_didik->hp) }}">
                        <small class="form-text text-muted">Diisi nomor telepon selular (ponsel) peserta didik yang
                            dapat dihubungi (milik pribadi, orang tua, atau wali).</small>
                        @error('hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                    <div class="col-md-6">
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               id="email" placeholder="Masukan Email" name="email"
                               value="{{ old('email', $peserta_didik->email) }}">
                        <small class="form-text text-muted">Diisi alamat surat elektronik (surel) peserta didik yang
                            dapat dihubungi (milik pribadi, orang tua, atau wali).</small>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kecamatan" class="col-md-4 col-form-label text-md-right">Kecamatan</label>
                    <div class="col-md-6">
                        <input type="text" name="kecamatan" id="kecamatan"
                               class="form-control @error('kecamatan') is-invalid @enderror"
                               placeholder="Masukan Kecamatan"
                               value="{{ old('kecamatan', $peserta_didik->kecamatan) }}">
                        <small class="form-text text-muted">Kecamatan tempat tinggal peserta didik saat ini.</small>
                        @error('kecamatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelurahan" class="col-md-4 col-form-label text-md-right">Kelurahan/Desa</label>
                    <div class="col-md-6">
                        <input type="text" name="kelurahan" id="kelurahan"
                               class="form-control @error('kelurahan') is-invalid @enderror"
                               placeholder="Masukan Kelurahan/Desa"
                               value="{{ old('kelurahan', $peserta_didik->kelurahan) }}">
                        <small class="form-text text-muted">Kelurahan/Desa tempat tinggal peserta didik saat
                            ini.</small>
                        @error('kelurahan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rt" class="col-md-4 col-form-label text-md-right">RT</label>
                    <div class="col-md-6">
                        <input type="number" min="1" name="rt" id="rt"
                               class="form-control @error('rt') is-invalid @enderror"
                               placeholder="Masukan RT" value="{{ old('rt', $peserta_didik->rt) }}">
                        <small class="form-text text-muted">Nomor RT tempat tinggal peserta didik saat ini. Dari contoh
                            di atas, misalnya dapat diisi dengan angka 5.</small>
                        @error('rt')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rw" class="col-md-4 col-form-label text-md-right">RW</label>
                    <div class="col-md-6">
                        <input type="number" min="1" name="rw" id="rw"
                               class="form-control @error('rw') is-invalid @enderror"
                               placeholder="Masukan RW" value="{{ old('rw', $peserta_didik->rw) }}">
                        <small class="form-text text-muted">Nomor RW tempat tinggal peserta didik saat ini. Dari contoh
                            di atas, misalnya dapat diisi dengan angka 11.</small>
                        @error('rw')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat Jalan</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                               id="alamat" placeholder="Masukan Alamat Jalan" name="alamat"
                               value="{{ old('alamat', $peserta_didik->alamat) }}">
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
                </div>
                <div class="form-group row">
                    <label for="kode_pos" class="col-md-4 col-form-label text-md-right">Kode Pos</label>
                    <div class="col-md-6">
                        <input type="number" min="1" name="kode_pos" id="kode_pos"
                               class="form-control @error('kode_pos') is-invalid @enderror"
                               placeholder="Masukan Kode Pos"
                               value="{{ old('kode_pos', $peserta_didik->kode_pos) }}">
                        <small class="form-text text-muted">Kode pos tempat tinggal peserta didik saat ini.</small>
                        @error('kode_pos')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode_rombel" class="col-md-4 col-form-label text-md-right">Rombongan Belajar</label>
                    <div class="col-md-6">
                        <select name="kode_rombel" id="kode_rombel"
                                class="custom-select @error('kode_rombel') is-invalid @enderror">
                            <option value="">PILIH</option>
                            @foreach($rombel as $r)
                                <option
                                    value="{{ $r->kode_rombel }}" {{ (old('kode_rombel', $peserta_didik->kode_rombel) == $r->kode_rombel)? 'selected': '' }}>{{ $r->kelas }} {{ $r->kode_jurusan }} {{ $r->kelompok }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Rombongan kelas peserta didik saat ini.</small>
                        @error('kode_rombel')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                    <div class="col-md-6">
                        <select name="status" id="status"
                                class="custom-select @error('status') is-invalid @enderror">
                            <option value="">PILIH</option>
                            <option
                                value="aktif" {{ (old('status', $peserta_didik->status) == 'aktif')? 'selected': '' }}>
                                Aktif
                            </option>
                            <option
                                value="keluar" {{ (old('status', $peserta_didik->status) == 'keluar')? 'selected': '' }}>
                                Keluar
                            </option>
                        </select>
                        <small class="form-text text-muted">Status peserta didik saat ini.</small>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                <h3>Di Isi Saat Sudah Keluar</h3>
                <small class="form-text text-muted">hanya dapat diakses oleh peserta didik yang berstatus
                    <b>"Keluar"</b></small>
                <hr>
                <div class="form-group row">
                    <label for="keluar_karena" class="col-md-4 col-form-label text-md-right">Keluar Karena</label>
                    <div class="col-md-6">
                        <select name="keluar_karena" id="keluar_karena"
                                class="custom-select @error('keluar_karena') is-invalid @enderror">
                            <option value="">PILIH</option>
                            <option value="Lulus" {{ (old('keluar_karena') == 'Lulus')? 'selected': '' }}>Lulus</option>
                            <option value="Mutasi" {{ (old('keluar_karena') == 'Mutasi')? 'selected': '' }}>Mutasi
                            </option>
                            <option value="Dikeluarkan" {{ (old('keluar_karena') == 'Dikeluarkan')? 'selected': '' }}>
                                Dikeluarkan
                            </option>
                            <option
                                value="Mengundurkan diri" {{ (old('keluar_karena') == 'Mengundurkan diri')? 'selected': '' }}>
                                Mengundurkan diri
                            </option>
                            <option
                                value="Putus Sekolah" {{ (old('keluar_karena') == 'Putus Sekolah')? 'selected': '' }}>
                                Putus
                                Sekolah
                            </option>
                            <option value="Wafat" {{ (old('keluar_karena') == 'Wafat')? 'selected': '' }}>Wafat</option>
                            <option value="Hilang" {{ (old('keluar_karena') == 'Hilang')? 'selected': '' }}>Hilang
                            </option>
                        </select>
                        <small class="form-text text-muted">Alasan utama peserta didik keluar dari sekolah. Pilih Lulus
                            apabila peserta didik telah lulus dari seklolah, pilih Mengundurkan diri apabila peserta
                            didik
                            keluar sekolah karena mengundurkan diri dengan catatan (dibuktikan adanya surat pengunduran
                            diri), pilih Putus sekolah apabila peserta didik
                            meninggalkan sekolah tanpa keterangan yang jelas.</small>
                        @error('keluar_karena')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pindah_ke" class="col-md-4 col-form-label text-md-right">Pindah Ke</label>
                    <div class="col-md-6">
                        <input type="text"
                               class="form-control @error('pindah_ke') is-invalid @enderror"
                               id="pindah_ke" placeholder="Masukan Nama sekolah tujuan" name="pindah_ke"
                               value="{{ old('pindah_ke') }}">
                        <small class="form-text text-muted">Diisi dengan nama sekolah yang peserta didik tuju untuk
                            pindah.</small>
                        @error('pindah_ke')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alasan_keluar" class="col-md-4 col-form-label text-md-right">Alasan</label>
                    <div class="col-md-6">
                        <input type="text"
                               class="form-control @error('alasan_keluar') is-invalid @enderror"
                               id="alasan_keluar" placeholder="Masukan Alasan keluar" name="alasan_keluar"
                               value="{{ old('alasan_keluar') }}">
                        <small class="form-text text-muted">Alasan khusus yang melatarbelakangi peserta didik keluar
                            dari sekolah.</small>
                        @error('alasan_keluar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal_keluar" class="col-md-4 col-form-label text-md-right">Tanggal Keluar</label>
                    <div class="col-md-6">
                        <input type="date" class="form-control @error('tanggal_keluar') is-invalid @enderror"
                               id="tanggal_keluar" name="tanggal_keluar"
                               value="{{ old('tanggal_keluar') }}">
                        <small class="form-text text-muted">
                            Tanggal saat peserta didik diketahui/tercatat keluar dari sekolah.</small>
                        @error('tanggal_keluar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                <h3>Ayah Kandung</h3>
                <hr>
                <div class="form-group row">
                    <label for="nama_ayah" class="col-md-4 col-form-label text-md-right">Nama Ayah Kandung</label>
                    <div class="col-md-6">
                        <input type="text"
                               class="form-control @error('nama_ayah') is-invalid @enderror"
                               id="nama_ayah" placeholder="Masukan Nama Ayah Kandung" name="nama_ayah"
                               value="{{ old('nama_ayah', $peserta_didik->nama_ayah) }}">
                        <small class="form-text text-muted">Nama ayah kandung peserta didik sesuai dokumen resmi
                            yang berlaku. Hindari penggunaan gelar akademik atau sosial (seperti Alm., Dr., Drs.,
                            S.Pd, dan H.).</small>
                        @error('nama_ayah')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nik_ayah" class="col-md-4 col-form-label text-md-right">Nomor Induk Kependudukan
                        Ayah</label>
                    <div class="col-md-6">
                        <input type="number" min="1"
                               class="form-control @error('nik_ayah') is-invalid @enderror"
                               id="nik_ayah" placeholder="Masukan Nomor Induk Kependudukan Ayah" name="nik_ayah"
                               value="{{ old('nik_ayah', $peserta_didik->nik_ayah) }}">
                        <small class="form-text text-muted">Nomor Induk Kependudukan yang tercantum pada Kartu
                            Keluarga atau KTP ayah kandung peserta didik.</small>
                        @error('nik_ayah')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tahun_lahir_ayah" class="col-md-4 col-form-label text-md-right">Tahun Lahir</label>
                    <div class="col-md-6">
                        <input type="number" min="1950" max="2099" step="1" placeholder="Mssukan Tahun Lahir"
                               class="form-control @error('tahun_lahir_ayah') is-invalid @enderror"
                               id="tahun_lahir_ayah" name="tahun_lahir_ayah"
                               value="{{ old('tahun_lahir_ayah', $peserta_didik->tahun_lahir_ayah) }}">
                        <small class="form-text text-muted">Tahun lahir ayah kandung peserta didik.</small>
                        @error('tahun_lahir_ayah')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenjang_pendidikan_ayah"
                           class="col-md-4 col-form-label text-md-right">Pendidikan</label>
                    <div class="col-md-6">
                        <input list="jenjang_pendidikan_ayah" name="jenjang_pendidikan_ayah"
                               class="form-control @error('jenjang_pendidikan_ayah') is-invalid @enderror"
                               placeholder="Masukan Pendidikan"
                               value="{{ old('jenjang_pendidikan_ayah', $peserta_didik->jenjang_pendidikan_ayah) }}">
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
                </div>
                <div class="form-group row">
                    <label for="pekerjaan_ayah" class="col-md-4 col-form-label text-md-right">Pekerjaan</label>
                    <div class="col-md-6">
                        <input list="pekerjaan_ayah" name="pekerjaan_ayah"
                               class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                               placeholder="Masukan Pekerjaan"
                               value="{{ old('pekerjaan_ayah', $peserta_didik->pekerjaan_ayah) }}">
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
                </div>
                <div class="form-group row">
                    <label for="penghasilan_ayah" class="col-md-4 col-form-label text-md-right">Penghasilan</label>
                    <div class="col-md-6">
                        <input list="penghasilan_ayah" name="penghasilan_ayah"
                               class="form-control @error('penghasilan_ayah') is-invalid @enderror"
                               placeholder="Masukan Penghasilan"
                               value="{{ old('penghasilan_ayah', $peserta_didik->penghasilan_ayah) }}">
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
                <hr>
                <h3>Ibu Kandung</h3>
                <hr>
                <div class="form-group row">
                    <label for="nama_ibu" class="col-md-4 col-form-label text-md-right">Nama Ibu Kandung</label>
                    <div class="col-md-6">
                        <input type="text"
                               class="form-control @error('nama_ibu') is-invalid @enderror"
                               id="nama_ibu" placeholder="Masukan Nama Ibu Kandung" name="nama_ibu"
                               value="{{ old('nama_ibu', $peserta_didik->nama_ibu) }}">
                        <small class="form-text text-muted">Nama Ibu kandung peserta didik sesuai dokumen resmi
                            yang berlaku. Hindari penggunaan gelar akademik atau sosial (seperti Alm., Dr., Drs.,
                            S.Pd, dan H.).</small>
                        @error('nama_ibu')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nik_ibu" class="col-md-4 col-form-label text-md-right">Nomor Induk Kependudukan
                        Ibu</label>
                    <div class="col-md-6">
                        <input type="number" min="1"
                               class="form-control @error('nik_ibu') is-invalid @enderror"
                               id="nik_ibu" placeholder="Masukan Nomor Induk Kependudukan Ibu" name="nik_ibu"
                               value="{{ old('nik_ibu', $peserta_didik->nik_ibu) }}">
                        <small class="form-text text-muted">Nomor Induk Kependudukan yang tercantum pada Kartu
                            Keluarga atau KTP ibu kandung peserta didik.</small>
                        @error('nik_ibu')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tahun_lahir_ibu" class="col-md-4 col-form-label text-md-right">Tahun Lahir</label>
                    <div class="col-md-6">
                        <input type="number" min="1950" max="2099" step="1" placeholder="Mssukan Tahun Lahir"
                               class="form-control @error('tahun_lahir_ibu') is-invalid @enderror"
                               id="tahun_lahir_ibu" name="tahun_lahir_ibu"
                               value="{{ old('tahun_lahir_ibu', $peserta_didik->tahun_lahir_ibu) }}">
                        <small class="form-text text-muted">Tahun lahir ibu kandung peserta didik.</small>
                        @error('tahun_lahir_ibu')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenjang_pendidikan_ibu" class="col-md-4 col-form-label text-md-right">Pendidikan</label>
                    <div class="col-md-6">
                        <input list="jenjang_pendidikan_ibu" name="jenjang_pendidikan_ibu"
                               class="form-control @error('jenjang_pendidikan_ibu', $peserta_didik->jenjang_pendidikan_ibu) is-invalid @enderror"
                               placeholder="Masukan Pendidikan"
                               value="{{ old('jenjang_pendidikan_ibu', $peserta_didik->jenjang_pendidikan_ibu) }}">
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
                </div>
                <div class="form-group row">
                    <label for="pekerjaan_ibu" class="col-md-4 col-form-label text-md-right">Pekerjaan</label>
                    <div class="col-md-6">
                        <input list="pekerjaan_ibu" name="pekerjaan_ibu"
                               class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                               placeholder="Masukan Pekerjaan"
                               value="{{ old('pekerjaan_ibu', $peserta_didik->pekerjaan_ibu) }}">
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
                </div>
                <div class="form-group row">
                    <label for="penghasilan_ibu" class="col-md-4 col-form-label text-md-right">Penghasilan</label>
                    <div class="col-md-6">
                        <input list="penghasilan_ibu" name="penghasilan_ibu"
                               class="form-control @error('penghasilan_ibu') is-invalid @enderror"
                               placeholder="Masukan Penghasilan"
                               value="{{ old('penghasilan_ibu', $peserta_didik->penghasilan_ibu) }}">
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
                <hr>
                <h3>Wali</h3>
                <hr>
                <div class="form-group row">
                    <label for="nama_wali" class="col-md-4 col-form-label text-md-right">Nama Wali</label>
                    <div class="col-md-6">
                        <input type="text"
                               class="form-control @error('nama_wali') is-invalid @enderror"
                               id="nama_wali" placeholder="Masukan Nama Wali" name="nama_wali"
                               value="{{ old('nama_wali', $peserta_didik->nama_wali) }}">
                        <small class="form-text text-muted">Nama Wali peserta didik sesuai dokumen resmi
                            yang berlaku. Hindari penggunaan gelar akademik atau sosial (seperti Alm., Dr., Drs.,
                            S.Pd, dan H.).</small>
                        @error('nama_wali')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nik_wali" class="col-md-4 col-form-label text-md-right">Nomor Induk Kependudukan
                        Wali</label>
                    <div class="col-md-6">
                        <input type="number" min="1"
                               class="form-control @error('nik_wali') is-invalid @enderror"
                               id="nik_wali" placeholder="Masukan Nomor Induk Kependudukan Wali" name="nik_wali"
                               value="{{ old('nik_wali', $peserta_didik->nik_wali) }}">
                        <small class="form-text text-muted">Nomor Induk Kependudukan yang tercantum pada Kartu
                            Keluarga atau KTP ibu kandung peserta didik.</small>
                        @error('nik_wali')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tahun_lahir_wali" class="col-md-4 col-form-label text-md-right">Tahun Lahir</label>
                    <div class="col-md-6">
                        <input type="number" min="1950" max="2099" step="1" placeholder="Mssukan Tahun Lahir"
                               class="form-control @error('tahun_lahir_wali') is-invalid @enderror"
                               id="tahun_lahir_wali" name="tahun_lahir_wali"
                               value="{{ old('tahun_lahir_wali', $peserta_didik->tahun_lahir_wali) }}">
                        <small class="form-text text-muted">Tahun lahir Wali peserta didik.</small>
                        @error('tahun_lahir_wali')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenjang_pendidikan_wali"
                           class="col-md-4 col-form-label text-md-right">Pendidikan</label>
                    <div class="col-md-6">
                        <input list="jenjang_pendidikan_wali" name="jenjang_pendidikan_wali"
                               class="form-control @error('jenjang_pendidikan_wali') is-invalid @enderror"
                               placeholder="Masukan Pendidikan"
                               value="{{ old('jenjang_pendidikan_wali', $peserta_didik->jenjang_pendidikan_wali) }}">
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
                </div>
                <div class="form-group row">
                    <label for="pekerjaan_wali" class="col-md-4 col-form-label text-md-right">Pekerjaan</label>
                    <div class="col-md-6">
                        <input list="pekerjaan_wali" name="pekerjaan_wali"
                               class="form-control @error('pekerjaan_wali') is-invalid @enderror"
                               placeholder="Masukan Pekerjaan"
                               value="{{ old('pekerjaan_wali', $peserta_didik->pekerjaan_wali) }}">
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
                </div>
                <div class="form-group row">
                    <label for="penghasilan_wali" class="col-md-4 col-form-label text-md-right">Penghasilan</label>
                    <div class="col-md-6">
                        <input list="penghasilan_wali" name="penghasilan_wali"
                               class="form-control @error('penghasilan_wali') is-invalid @enderror"
                               placeholder="Masukan Penghasilan"
                               value="{{ old('penghasilan_wali', $peserta_didik->penghasilan_wali) }}">
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
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#pindah_ke').attr('disabled', true);
            $('#keluar_karena').attr('DISABLED', true);
            $('#alasan_keluar').attr('disabled', true);
            $('#tanggal_keluar').attr('disabled', true);
            $('#status').change(function () {
                if ($('#status option:selected').val() === 'keluar') {
                    $('#keluar_karena').attr('disabled', false);
                    $('#alasan_keluar').attr('disabled', false);
                    $('#tanggal_keluar').attr('disabled', false);
                } else {
                    $('#keluar_karena').attr('disabled', true);
                    $('#alasan_keluar').attr('disabled', true);
                    $('#tanggal_keluar').attr('disabled', true);
                }
            })
            $('#keluar_karena').change(function () {
                if ($('#keluar_karena option:selected').val() === 'Mutasi') {
                    $('#pindah_ke').attr('disabled', false);
                } else {
                    $('#pindah_ke').attr('disabled', true);
                }
            })
        });
    </script>
@endsection
