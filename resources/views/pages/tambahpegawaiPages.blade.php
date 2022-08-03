@extends('layout.masterLayout')

@section('activekuPegawai')
    activeku
@endsection

@section('judul')
    +<i class="fa fa-users"></i> Tambah Data Pegawai
@endsection


@section('content')


<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Button trigger modal -->
                        <a href="{{ url("pegawai") }}" class="btn btn-danger btn-sm">
                            < Kembali >
                        </a>
                        
                        
                    </div>
                    <div class="col-md-6">
                        
                    </div>
                </div>
            </div>
            <form action="{{ route('pegawai.store', []) }}" method="post">
                @csrf
            
            <div class="card-body table-responsive">
                <div class="form-group row">
                    <label for="NIP" class="col-sm-2 col-form-label text-capitalize">NIP</label>
                    <div class="col-sm-10">
                      <input type="number"  class="form-control @error("nip")
                          is-invalid
                      @enderror" name="nip" id="NIP" placeholder="Masukan NIP" >
                    </div>
                    @error("nip")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label text-capitalize">nama pegawai</label>
                    <div class="col-sm-10">
                      <input type="text"  class="form-control @error("nama")
                          is-invalid
                      @enderror" name="nama" id="nama" placeholder="Masukan nama pegawai" >
                    </div>
                    @error("nama")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="jabatan" class="col-sm-2 col-form-label text-capitalize">jabatan</label>
                    <div class="col-sm-10">
                      <select name="idjabatan" required class="form-control @error("idjabatan")
                          is-invalid
                      @enderror" id="jabatan">
                        <option value="">Pilih Jabatan</option>
                        @foreach ($jabatan as $item)
                            <option value="{{$item->idjabatan}}" class="text-capitalize">{{$item->namajabatan}}</option>
                        @endforeach
                    </select>
                    </div>
                    @error("idjabatan")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="pangkat" class="col-sm-2 col-form-label text-capitalize">pangkat</label>
                    <div class="col-sm-10">
                      <select name="idpangkat" required class="form-control @error("idpangkat")
                          is-invalid
                      @enderror" id="pangkat">
                        <option value="">Pilih Pangkat</option>
                        @foreach ($pangkat as $item)
                            <option value="{{$item->idpangkat}}" class="text-capitalize">{{$item->namapangkat}}</option>
                        @endforeach
                    </select>
                    </div>
                    @error("idpangkat")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="gajipokok" class="col-sm-2 col-form-label text-capitalize">Gaji Pokok</label>
                    <div class="col-sm-10">
                      <input type="number"  class="form-control @error("gajipokok")
                          is-invalid
                      @enderror" name="gajipokok" id="gajipokok" placeholder="Gaji Pokok" >
                    </div>
                    @error("gajipokok")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="tunjanganistriatausuami" class="col-sm-2 col-form-label text-capitalize">Tunjangan Istri/Suami</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error("tunjanganistriatausuami")
                          is-invalid
                      @enderror" name="tunjanganistriatausuami" id="tunjanganistriatausuami" placeholder="Tunjangan Istri/Suami" >
                    </div>
                    @error("tunjanganistriatausuami")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="tunjangananak" class="col-sm-2 col-form-label text-capitalize">Tunjangan Anak</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error("tunjangananak")
                          is-invalid
                      @enderror" name="tunjangananak" id="tunjangananak" placeholder="Tunjangan Anak" >
                    </div>
                    @error("tunjangananak")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="tunjanganjabatan" class="col-sm-2 col-form-label text-capitalize">Tunjangan Jabatan</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error("tunjanganjabatan")
                          is-invalid
                      @enderror" name="tunjanganjabatan" id="tunjanganjabatan" placeholder="Tunjangan Jabatan" >
                    </div>
                    @error("tunjanganjabatan")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>


                <div class="form-group row">
                    <label for="tunjanganfungsionalitas" class="col-sm-2 col-form-label text-capitalize">Tunjangan Fungsionalitas</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error("tunjanganfungsionalitas")
                          is-invalid
                      @enderror" name="tunjanganfungsionalitas" id="tunjanganfungsionalitas" placeholder="Tunjangan Fungsionalitas" >
                    </div>
                    @error("tunjanganfungsionalitas")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="tunjanganfungsionalitasumum" class="col-sm-2 col-form-label text-capitalize">Tunjangan Fungsionalitas Umum</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error("tunjanganfungsionalitasumum")
                          is-invalid
                      @enderror" name="tunjanganfungsionalitasumum" id="tunjanganfungsionalitasumum" placeholder="Tunjangan Fungsionalitas Umum" >
                    </div>
                    @error("tunjanganfungsionalitasumum")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="tunjanganberas" class="col-sm-2 col-form-label text-capitalize">Tunjangan Beras</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error("tunjanganberas")
                          is-invalid
                      @enderror" name="tunjanganberas" id="tunjanganberas" placeholder="Tunjangan Beras" >
                    </div>
                    @error("tunjanganberas")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="tunjanganpph21" class="col-sm-2 col-form-label text-capitalize">Tunjangan PPH 21</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error("tunjanganpph21")
                          is-invalid
                      @enderror" name="tunjanganpph21" id="tunjanganpph21" placeholder="Tunjangan PPH 21" >
                    </div>
                    @error("tunjanganpph21")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>


                <div class="form-group row">
                    <label for="tunjanganjkk" class="col-sm-2 col-form-label text-capitalize">Tunjangan JKK</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error("tunjanganjkk")
                          is-invalid
                      @enderror" name="tunjanganjkk" id="tunjanganjkk" placeholder="Tunjangan JKK" >
                    </div>
                    @error("tunjanganjkk")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="tunjanganjkm" class="col-sm-2 col-form-label text-capitalize">Tunjangan JKM</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error("tunjanganjkm")
                          is-invalid
                      @enderror" name="tunjanganjkm" id="tunjanganjkm" placeholder="Tunjangan JKM" >
                    </div>
                    @error("tunjanganjkm")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="pembulatan" class="col-sm-2 col-form-label text-capitalize">Pembulatan</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error("pembulatan")
                          is-invalid
                      @enderror" name="pembulatan" id="pembulatan" placeholder="Pembulatan" >
                    </div>
                    @error("pembulatan")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>


                <div class="form-group row">
                    <label for="bpjskesehatandaritpp" class="col-sm-2 col-form-label text-capitalize">BPJS Kesehatan dari TPP</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error("bpjskesehatandaritpp")
                          is-invalid
                      @enderror" name="bpjskesehatandaritpp" id="bpjskesehatandaritpp" placeholder="BPJS Kesehatan dari TPP" >
                    </div>
                    @error("bpjskesehatandaritpp")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="angsuranbank" class="col-sm-2 col-form-label text-capitalize">Angsuran Bank</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error("angsuranbank")
                          is-invalid
                      @enderror" name="angsuranbank" id="angsuranbank" placeholder="Angsuran Bank" >
                    </div>
                    @error("angsuranbank")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="angsurankoperasi" class="col-sm-2 col-form-label text-capitalize">Angsuran Koperasi</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error("angsurankoperasi")
                          is-invalid
                      @enderror" name="angsurankoperasi" id="angsurankoperasi" placeholder="Angsuran Koperasi" >
                    </div>
                    @error("angsurankoperasi")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>


                <div class="form-group row">
                    <label for="anggotakoperasi" class="col-sm-2 col-form-label text-capitalize">Anggota Koperasi</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error("anggotakoperasi")
                          is-invalid
                      @enderror" name="anggotakoperasi" id="anggotakoperasi" placeholder="Anggota Koperasi" >
                    </div>
                    @error("anggotakoperasi")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>


                <div class="form-group row">
                    <label for="tppbulanjanuari" class="col-sm-2 col-form-label text-capitalize">TPP Bulan Januari</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error("tppbulanjanuari")
                          is-invalid
                      @enderror" name="tppbulanjanuari" id="tppbulanjanuari" placeholder="TPP Bulan Januari" >
                    </div>
                    @error("tppbulanjanuari")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>


                <div class="form-group row">
                    <label for="honorpenggunaankeuangan" class="col-sm-2 col-form-label text-capitalize">Honor Penanggung Jawaban Penggunaan Keuangan</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error("honorpenggunaankeuangan")
                          is-invalid
                      @enderror" name="honorpenggunaankeuangan" id="honorpenggunaankeuangan" placeholder="Honor Penanggung Jawaban Penggunaan Keuangan" >
                    </div>
                    @error("honorpenggunaankeuangan")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="zakat" class="col-sm-2 col-form-label text-capitalize">Zakat</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error("zakat")
                          is-invalid
                      @enderror" name="zakat" id="zakat" placeholder="Zakat" >
                    </div>
                    @error("zakat")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                


                
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary btn-block text-bold btn-lg">Tambah Pegawai</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection