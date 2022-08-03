@extends('layout.masterLayout')

@section('activekuPegawai')
    activeku
@endsection

@section('judul')
    <i class="fa fa-users"></i> Data Pegawai
@endsection


@section('content')


<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Button trigger modal -->
                        <a href="{{ route('pegawai.create') }}" class="btn btn-primary">
                            Tambah Data Pegawai
                        </a>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="tambahdatapegawai" tabindex="-1" aria-labelledby="tambahdatapegawaiLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="tambahdatapegawaiLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="NIP" class="col-sm-3 col-form-label text-capitalize">NIP</label>
                                        <div class="col-sm-9">
                                          <input type="number"  class="form-control @error("nip")
                                              is-invalid
                                          @enderror" name="nip" id="NIP" placeholder="Masukan Nip" >
                                        </div>
                                        @error("nip")
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="Nama" class="col-sm-3 col-form-label text-capitalize">Nama Pegawai</label>
                                        <div class="col-sm-9">
                                          <input type="number"  class="form-control" name="nama" id="Nama" placeholder="Masukan Nama">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ url()->current() }}" class="form-inline justify-content-end">
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{empty($_GET['keyword'])?'':$_GET['keyword']}}" name="keyword" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                  <button class="btn btn-outline-success" type="submit" id="button-addon2">Cari</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover table-bordered shadow-sm table-striped table-lg">
                    <thead>
                        <tr style="border-top:1px solid rgb(206, 206, 206)">
                            <th >No</th>
                            <th >Edit</th>
                            <th >NIP</th>
                            <th >Nama Pegawai</th>
                            <th >Pangkat</th>
                            <th >Gaji Pokok</th>
                            <th >Tunjangan Istri/SMI</th>
                            <th >Tunjangan Anak</th>
                            <th >Tunjangan Jabatan</th>
                            <th >Tunjangan Fungsionalitas</th>
                            <th >Tunjangan Fungsionalitas Umum</th>
                            <th >Tunjangan Beras</th>
                            <th >Tunjangan PPH 21</th>
                            <th >Tunjangan JKK</th>
                            <th >Tunjangan JKM</th>
                            <th >BPJS (4%)</th>
                            <th >Pembulatan</th>
                            <th >IWP (1%)</th>
                            <th >IWP (8%)</th>
                            <th >BPJS Kesehatan dari TPP</th>
                            <th >Angsuran Bank</th>
                            <th >Angsuran Koperasi</th>
                            <th >Anggota Koperasi</th>
                            <th >TPP Bulan Januari</th>
                            <th >Honor Peng. Keuangan</th>
                            <th >Zakat</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pegawai as $item)
                        <tr>
                            <td>{{ $loop->iteration + $pegawai->firstItem() - 1 }}</td>
                            <td>
                                <button type="button" class="badge py-1 badge-success border-0" data-toggle="modal" data-target="#ubahpegawai{{$item->nip}}">
                                    <i class="fa fa-edit"></i> Ubah
                                </button>
                            </td>
                            <td class="text-bold">{{ $item->nip }}</td>
                            <td class="text-bold" nowrap>{{ $item->nama }}</td>
                            <td nowrap>{{ $item->namapangkat }}</td>
                            <td nowrap>Rp{{ number_format($item->gajipokok,0,',','.') }}</td>
                            <td nowrap>Rp{{ number_format($item->tunjanganistriatausuami,0,',','.') }}</td>
                            <td nowrap>Rp{{ number_format($item->tunjangananak,0,',','.') }}</td>
                            <td nowrap>Rp{{ number_format($item->tunjanganjabatan,0,',','.') }}</td>
                            <td nowrap>Rp{{ number_format($item->tunjanganfungsionalitas,0,',','.') }}</td>
                            <td nowrap>Rp{{ number_format($item->tunjanganfungsionalitasumum,0,',','.') }}</td>
                            <td nowrap>Rp{{ number_format($item->tunjanganberas,0,',','.') }}</td>
                            <td nowrap>Rp{{ number_format($item->tunjanganpph21,0,',','.') }}</td>
                            <td nowrap>Rp{{ number_format($item->tunjanganjkk,0,',','.') }}</td>
                            <td nowrap>Rp{{ number_format($item->tunjanganjkm,0,',','.') }}</td>
                            <td>none</td>
                            <td>{{$item->pembulatan}}</td>
                            <td>none</td>
                            <td>none</td>
                            <td nowrap>Rp{{ number_format($item->bpjskesehatandaritpp,0,',','.') }}</td>
                            <td nowrap>Rp{{ number_format($item->angsuranbank,0,',','.') }}</td>
                            <td nowrap>Rp{{ number_format($item->angsurankoperasi,0,',','.') }}</td>
                            <td nowrap>Rp{{ number_format($item->anggotakoperasi,0,',','.') }}</td>
                            <td nowrap>Rp{{ number_format($item->tppbulanjanuari,0,',','.') }}</td>
                            <td nowrap>Rp{{ number_format($item->honorpenggunaankeuangan,0,',','.') }}</td>
                            <td nowrap>Rp{{ number_format($item->zakat,0,',','.') }}</td>
                        </tr>


                        <!-- Modal -->
                        <div class="modal fade" id="ubahpegawai{{$item->nip}}" tabindex="-1" aria-labelledby="ubahpegawai{{$item->nip}}Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="ubahpegawai{{$item->nip}}Label">{{$item->nip}} - {{$item->nama}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form action="{{ route('pegawai.update', [$item->nip]) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                
                                <div class="modal-body">
                                    <div class="card-body table-responsive">
                                        <div class="form-group row">
                                            <label for="NIP" class="col-sm-3 col-form-label text-capitalize">NIP</label>
                                            <div class="col-sm-9">
                                              <input type="number"  class="form-control @error("nip")
                                                  is-invalid
                                              @enderror" name="nip" id="NIP" value="{{$item->nip}}" readonly disabled placeholder="Masukan NIP">
                                            </div>
                                            @error("nip")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                        
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-3 col-form-label text-capitalize">nama pegawai</label>
                                            <div class="col-sm-9">
                                              <input type="text" value="{{$item->nama}}" class="form-control @error("nama")
                                                  is-invalid
                                              @enderror" name="nama" id="nama" placeholder="Masukan nama pegawai" >
                                            </div>
                                            @error("nama")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                        
                                        <div class="form-group row">
                                            <label for="jabatan" class="col-sm-3 col-form-label text-capitalize">jabatan</label>
                                            <div class="col-sm-9">
                                              <select name="idjabatan" required class="form-control @error("idjabatan")
                                                  is-invalid
                                              @enderror" id="jabatan">
                                                <option value="">Pilih Jabatan</option>
                                                @foreach ($jabatan as $item2)
                                                    <option value="{{$item2->idjabatan}}" @if ($item->idjabatan == $item2->idjabatan)
                                                        selected
                                                    @endif class="text-capitalize">{{$item2->namajabatan}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                            @error("idjabatan")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                        
                                        <div class="form-group row">
                                            <label for="pangkat" class="col-sm-3 col-form-label text-capitalize">pangkat</label>
                                            <div class="col-sm-9">
                                              <select name="idpangkat" required class="form-control @error("idpangkat")
                                                  is-invalid
                                              @enderror" id="pangkat">
                                                <option value="">Pilih Pangkat</option>
                                                @foreach ($pangkat as $item2)
                                                    <option value="{{$item2->idpangkat}}" @if ($item->idpangkat == $item2->idpangkat)
                                                        selected
                                                    @endif class="text-capitalize">{{$item2->namapangkat}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                            @error("idpangkat")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                        
                                        <div class="form-group row">
                                            <label for="gajipokok" class="col-sm-3 col-form-label text-capitalize">Gaji Pokok</label>
                                            <div class="col-sm-9">
                                              <input type="number"  class="form-control @error("gajipokok")
                                                  is-invalid
                                              @enderror" name="gajipokok" value="{{$item->gajipokok}}" id="gajipokok" placeholder="Gaji Pokok" >
                                            </div>
                                            @error("gajipokok")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                        
                                        <div class="form-group row">
                                            <label for="tunjanganistriatausuami" class="col-sm-3 col-form-label text-capitalize">Tunjangan Istri/Suami</label>
                                            <div class="col-sm-9">
                                              <input type="number" value="{{$item->tunjanganistriatausuami}}" class="form-control @error("tunjanganistriatausuami")
                                                  is-invalid
                                              @enderror" name="tunjanganistriatausuami" id="tunjanganistriatausuami" placeholder="Tunjangan Istri/Suami" >
                                            </div>
                                            @error("tunjanganistriatausuami")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                        
                                        <div class="form-group row">
                                            <label for="tunjangananak" class="col-sm-3 col-form-label text-capitalize">Tunjangan Anak</label>
                                            <div class="col-sm-9">
                                              <input type="number" value="{{$item->tunjangananak}}" class="form-control @error("tunjangananak")
                                                  is-invalid
                                              @enderror" name="tunjangananak" id="tunjangananak" placeholder="Tunjangan Anak" >
                                            </div>
                                            @error("tunjangananak")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                        
                                        <div class="form-group row">
                                            <label for="tunjanganjabatan" class="col-sm-3 col-form-label text-capitalize">Tunjangan Jabatan</label>
                                            <div class="col-sm-9">
                                              <input type="number" value="{{$item->tunjanganjabatan}}" class="form-control @error("tunjanganjabatan")
                                                  is-invalid
                                              @enderror" name="tunjanganjabatan" id="tunjanganjabatan" placeholder="Tunjangan Jabatan" >
                                            </div>
                                            @error("tunjanganjabatan")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                        
                        
                                        <div class="form-group row">
                                            <label for="tunjanganfungsionalitas" class="col-sm-3 col-form-label text-capitalize">Tunjangan Fungsionalitas</label>
                                            <div class="col-sm-9">
                                              <input type="number" value="{{$item->tunjanganfungsionalitas}}" class="form-control @error("tunjanganfungsionalitas")
                                                  is-invalid
                                              @enderror" name="tunjanganfungsionalitas" id="tunjanganfungsionalitas" placeholder="Tunjangan Fungsionalitas" >
                                            </div>
                                            @error("tunjanganfungsionalitas")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                        
                                        <div class="form-group row">
                                            <label for="tunjanganfungsionalitasumum" class="col-sm-3 col-form-label text-capitalize">Tunjangan Fungsionalitas Umum</label>
                                            <div class="col-sm-9">
                                              <input type="number" value="{{$item->tunjanganfungsionalitasumum}}" class="form-control @error("tunjanganfungsionalitasumum")
                                                  is-invalid
                                              @enderror" name="tunjanganfungsionalitasumum" id="tunjanganfungsionalitasumum" placeholder="Tunjangan Fungsionalitas Umum" >
                                            </div>
                                            @error("tunjanganfungsionalitasumum")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                        
                                        <div class="form-group row">
                                            <label for="tunjanganberas" class="col-sm-3 col-form-label text-capitalize">Tunjangan Beras</label>
                                            <div class="col-sm-9">
                                              <input type="number" value="{{$item->tunjanganberas}}" class="form-control @error("tunjanganberas")
                                                  is-invalid
                                              @enderror" name="tunjanganberas" id="tunjanganberas" placeholder="Tunjangan Beras" >
                                            </div>
                                            @error("tunjanganberas")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                        
                                        <div class="form-group row">
                                            <label for="tunjanganpph21" class="col-sm-3 col-form-label text-capitalize">Tunjangan PPH 21</label>
                                            <div class="col-sm-9">
                                              <input type="number" value="{{$item->tunjanganpph21}}" class="form-control @error("tunjanganpph21")
                                                  is-invalid
                                              @enderror" name="tunjanganpph21" id="tunjanganpph21" placeholder="Tunjangan PPH 21" >
                                            </div>
                                            @error("tunjanganpph21")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                        
                        
                                        <div class="form-group row">
                                            <label for="tunjanganjkk" class="col-sm-3 col-form-label text-capitalize">Tunjangan JKK</label>
                                            <div class="col-sm-9">
                                              <input type="number" value="{{$item->tunjanganjkk}}" class="form-control @error("tunjanganjkk")
                                                  is-invalid
                                              @enderror" name="tunjanganjkk" id="tunjanganjkk" placeholder="Tunjangan JKK" >
                                            </div>
                                            @error("tunjanganjkk")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                        
                                        <div class="form-group row">
                                            <label for="tunjanganjkm" class="col-sm-3 col-form-label text-capitalize">Tunjangan JKM</label>
                                            <div class="col-sm-9">
                                              <input type="number" value="{{$item->tunjanganjkm}}" class="form-control @error("tunjanganjkm")
                                                  is-invalid
                                              @enderror" name="tunjanganjkm" id="tunjanganjkm" placeholder="Tunjangan JKM" >
                                            </div>
                                            @error("tunjanganjkm")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                        
                                        <div class="form-group row">
                                            <label for="pembulatan" class="col-sm-3 col-form-label text-capitalize">Pembulatan</label>
                                            <div class="col-sm-9">
                                              <input type="number" value="{{$item->pembulatan}}" class="form-control @error("pembulatan")
                                                  is-invalid
                                              @enderror" name="pembulatan" id="pembulatan" placeholder="Pembulatan" >
                                            </div>
                                            @error("pembulatan")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                        
                        
                                        <div class="form-group row">
                                            <label for="bpjskesehatandaritpp" class="col-sm-3 col-form-label text-capitalize">BPJS Kesehatan dari TPP</label>
                                            <div class="col-sm-9">
                                              <input type="number" value="{{$item->bpjskesehatandaritpp}}" class="form-control @error("bpjskesehatandaritpp")
                                                  is-invalid
                                              @enderror" name="bpjskesehatandaritpp" id="bpjskesehatandaritpp" placeholder="BPJS Kesehatan dari TPP" >
                                            </div>
                                            @error("bpjskesehatandaritpp")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                        
                                        <div class="form-group row">
                                            <label for="angsuranbank" class="col-sm-3 col-form-label text-capitalize">Angsuran Bank</label>
                                            <div class="col-sm-9">
                                              <input type="number" value="{{$item->angsuranbank}}" class="form-control @error("angsuranbank")
                                                  is-invalid
                                              @enderror" name="angsuranbank" id="angsuranbank" placeholder="Angsuran Bank" >
                                            </div>
                                            @error("angsuranbank")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                        
                                        <div class="form-group row">
                                            <label for="angsurankoperasi" class="col-sm-3 col-form-label text-capitalize">Angsuran Koperasi</label>
                                            <div class="col-sm-9">
                                              <input type="number" value="{{$item->angsurankoperasi}}" class="form-control @error("angsurankoperasi")
                                                  is-invalid
                                              @enderror" name="angsurankoperasi" id="angsurankoperasi" placeholder="Angsuran Koperasi" >
                                            </div>
                                            @error("angsurankoperasi")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                        
                        
                                        <div class="form-group row">
                                            <label for="anggotakoperasi" class="col-sm-3 col-form-label text-capitalize">Anggota Koperasi</label>
                                            <div class="col-sm-9">
                                              <input type="number" value="{{$item->anggotakoperasi}}" class="form-control @error("anggotakoperasi")
                                                  is-invalid
                                              @enderror" name="anggotakoperasi" id="anggotakoperasi" placeholder="Anggota Koperasi" >
                                            </div>
                                            @error("anggotakoperasi")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                        
                        
                                        <div class="form-group row">
                                            <label for="tppbulanjanuari" class="col-sm-3 col-form-label text-capitalize">TPP Bulan Januari</label>
                                            <div class="col-sm-9">
                                              <input type="number" value="{{$item->tppbulanjanuari}}" class="form-control @error("tppbulanjanuari")
                                                  is-invalid
                                              @enderror" name="tppbulanjanuari" id="tppbulanjanuari" placeholder="TPP Bulan Januari" >
                                            </div>
                                            @error("tppbulanjanuari")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                        
                        
                                        <div class="form-group row">
                                            <label for="honorpenggunaankeuangan" class="col-sm-3 col-form-label text-capitalize">Honor Penanggung Jawaban Penggunaan Keuangan</label>
                                            <div class="col-sm-9">
                                              <input type="number" value="{{$item->honorpenggunaankeuangan}}" class="form-control @error("honorpenggunaankeuangan")
                                                  is-invalid
                                              @enderror" name="honorpenggunaankeuangan" id="honorpenggunaankeuangan" placeholder="Honor Penanggung Jawaban Penggunaan Keuangan" >
                                            </div>
                                            @error("honorpenggunaankeuangan")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                        
                                        <div class="form-group row">
                                            <label for="zakat" class="col-sm-3 col-form-label text-capitalize">Zakat</label>
                                            <div class="col-sm-9">
                                              <input type="number" value="{{$item->zakat}}" class="form-control @error("zakat")
                                                  is-invalid
                                              @enderror" name="zakat" id="zakat" placeholder="Zakat" >
                                            </div>
                                            @error("zakat")
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


{{-- percobaan --}}


@endsection

