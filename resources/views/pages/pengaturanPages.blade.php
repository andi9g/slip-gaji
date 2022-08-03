@extends('layout.masterLayout')

@section('activekuPengaturan')
    activeku
@endsection

@section('judul')
    <i class="fa fa-wrench"></i> Pengaturan Umum 
@endsection


@section('content')




<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h5>Pengaturan Dasar</h5></div>
            <form action="{{ route('tambah.pengaturan') }}" method="post">
                @csrf
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="" class="col-md-3">BPJS</label>
                            <div class="col-md-8 d-inline">
                                <div class="input-group">
                                    <input type="number" name="bpjs" value="{{$bpjs}}" class="form-control text-bold text-center @error('bpjs')
                                        is-invalid
                                    @enderror" placeholder="">
                                    <div class="input-group-append">
                                      <span class="input-group-text" id="basic-addon2">%</span>
                                    </div>
                                    @error('bpjs')
                                    <div class="invalid-feedback">{{$message}}</div>
                                        
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="" class="col-md-3">IWP 1</label>
                            <div class="col-md-8 d-inline">
                                <div class="input-group">
                                    <input type="number" name="iwp1" value="{{$iwp1}}" class="form-control text-bold text-center @error('iwp1')
                                        is-invalid
                                    @enderror" placeholder="">
                                    <div class="input-group-append">
                                      <span class="input-group-text" id="basic-addon2">%</span>
                                    </div>
                                    @error('iwp1')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="" class="col-md-3">IWP 2</label>
                            <div class="col-md-8 d-inline">
                                <div class="input-group">
                                    <input type="number" name="iwp2" value="{{$iwp2}}" class="form-control text-bold text-center @error('iwp2')
                                        is-invalid
                                    @enderror" placeholder="">
                                    <div class="input-group-append">
                                      <span class="input-group-text" id="basic-addon2">%</span>
                                    </div>
                                    @error('iwp2')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                
            </div>
            <div class="card-footer text-right">
                <button type="submit" onclick="return confirm('Lanjutkan Proses?')" class="btn btn-success btn-block"> Update Data</button>
            </div>
            </form>

        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="text-uppercase">Data Jabatan</h5>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-secondary mb-2" data-toggle="modal" data-target="#tambahjabatan">
                    Tambah Jabatan
                </button>

                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jabatan as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->namajabatan}}</td>
                            <td>
                                <button type="button" class="badge badge-danger border-0" data-toggle="modal" data-target="#editjabatan{{$item->idjabatan}}">
                                    <i class="fa fa-edit"></i> Ubah
                                </button>
                            </td>

                        </tr>
                            

                            <div class="modal fade" id="editjabatan{{$item->idjabatan}}" tabindex="-1" aria-labelledby="editjabatan{{$item->idjabatan}}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="editjabatan{{$item->idjabatan}}Label">Tambah Jabatan</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="{{ route('ubah.jabatan', [$item->idjabatan]) }}"  method="post">
                                        @csrf
                                        @method('PUT')
                                    
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Nama Jabatan</label>
                                            <input type="text" value="{{$item->namajabatan}}" name="namajabatan" id="" class="form-control @error("jabatan")
                                                is-invalid
                                            @enderror">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Save changes</button>
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
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="text-uppercase">Data Pangkat</h5>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-secondary mb-2" data-toggle="modal" data-target="#tambahpangkat">
                    Tambah Pangkat
                </button>

                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pangkat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pangkat as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->namapangkat}}</td>
                                <td>
                                    <button type="button" class="badge badge-danger border-0" data-toggle="modal" data-target="#editpangkat{{$item->idpangkat}}">
                                        <i class="fa fa-edit"></i> Ubah
                                    </button>
                                </td>
                            </tr>
                            

                            <div class="modal fade" id="editpangkat{{$item->idpangkat}}" tabindex="-1" aria-labelledby="editpangkat{{$item->idpangkat}}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="editpangkat{{$item->idpangkat}}Label">Tambah Pangkat</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="{{ route('ubah.pangkat', [$item->idpangkat]) }}" method="post">
                                    @csrf
                                    @method("PUT")
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Nama Pangkat</label>
                                            <input type="text" value="{{$item->namapangkat}}" name="namapangkat" id="" class="form-control @error("pangkat")
                                                is-invalid
                                            @enderror">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Save changes</button>
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






<!-- Modal -->
<div class="modal fade" id="tambahjabatan" tabindex="-1" aria-labelledby="tambahjabatanLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahjabatanLabel">Tambah Jabatan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('tambah.jabatan') }}" method="post">
            @csrf
        
        <div class="modal-body">
            <div class="form-group">
                <label for="">Nama Jabatan</label>
                <input type="text" name="namajabatan" id="" class="form-control @error("jabatan")
                    is-invalid
                @enderror">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>

<div class="modal fade" id="tambahpangkat" tabindex="-1" aria-labelledby="tambahpangkatLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahpangkatLabel">Tambah Pangkat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('tambah.pangkat', []) }}" method="post">
            @csrf
        
        <div class="modal-body">
            <div class="form-group">
                <label for="">Nama Pangkat</label>
                <input type="text" name="namapangkat" id="" class="form-control @error("pangkat")
                    is-invalid
                @enderror">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Pangkat</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection