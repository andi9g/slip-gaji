@extends('layout.masterLayout')

@section('activekuPengaturancetak')
    activeku
@endsection

@section('judul')
    <i class="fa fa-wrench"></i> Pengaturan Cetak 
@endsection


@section('content')



<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="text-uppercase">Data Kebutuhan</h5>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-secondary mb-2" data-toggle="modal" data-target="#tambahkebutuhan">
                    Tambah Kebutuhan
                </button>

                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kebutuhan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kebutuhan as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->namakebutuhan}}</td>
                            <td>
                                <button type="button" class="badge badge-danger border-0" data-toggle="modal" data-target="#editkebutuhan{{$item->idkebutuhan}}">
                                    <i class="fa fa-edit"></i> Ubah
                                </button>
                            </td>

                        </tr>
                            

                            <div class="modal fade" id="editkebutuhan{{$item->idkebutuhan}}" tabindex="-1" aria-labelledby="editkebutuhan{{$item->idkebutuhan}}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="editkebutuhan{{$item->idkebutuhan}}Label">Tambah Kebutuhan</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="{{ route('ubah.kebutuhan', [$item->idkebutuhan]) }}"  method="post">
                                        @csrf
                                        @method('PUT')
                                    
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Nama Kebutuhan</label>
                                            <input type="text" value="{{$item->namakebutuhan}}" name="namakebutuhan" id="" class="form-control @error("kebutuhan")
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
                <h5 class="text-uppercase">Data Golongan</h5>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-secondary mb-2" data-toggle="modal" data-target="#tambahgolongan">
                    Tambah Golongan
                </button>

                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Golongan</th>
                            <th>Pajak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($golongan as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->golongan}}</td>
                                <td>{{$item->pajak}}%</td>
                                <td>
                                    <button type="button" class="badge badge-danger border-0" data-toggle="modal" data-target="#editgolongan{{$item->idgolongan}}">
                                        <i class="fa fa-edit"></i> Ubah
                                    </button>
                                </td>
                            </tr>
                            

                            <div class="modal fade" id="editgolongan{{$item->idgolongan}}" tabindex="-1" aria-labelledby="editgolongan{{$item->idgolongan}}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="editgolongan{{$item->idgolongan}}Label">Tambah Golongan</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="{{ route('ubah.golongan', [$item->idgolongan]) }}" method="post">
                                    @csrf
                                    @method("PUT")
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Nama Golongan</label>
                                            <input type="text" value="{{$item->golongan}}" name="golongan" id="" class="form-control @error("golongan")
                                                is-invalid
                                            @enderror">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Pajak</label>
                                            <div class="input-group">
                                                <input type="number" name="pajak" value="{{$item->pajak}}" class="form-control text-bold text-center @error('pajak')
                                                    is-invalid
                                                @enderror" placeholder="">
                                                <div class="input-group-append">
                                                  <span class="input-group-text" id="basic-addon2">%</span>
                                                </div>
                                                @error('pajak')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
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
            <div class="card-header"><h5>Penandatangan Slip Gaji</h5></div>
            <form action="{{ route('tambah.ttd') }}" method="post">
                @csrf
            
                <div class="card-body">
                    <div class="form-group">
                        <label for="">NIP</label>
                        <input type="number" name="nip" value="{{$nip}}" id="" class="form-control" placeholder="masukan nip">
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="" value="{{$nama}}" class="form-control" placeholder="masukan nama">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>






<!-- Modal -->
<div class="modal fade" id="tambahkebutuhan" tabindex="-1" aria-labelledby="tambahkebutuhanLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahkebutuhanLabel">Tambah Kebutuhan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('tambah.kebutuhan') }}" method="post">
            @csrf
        
        <div class="modal-body">
            <div class="form-group">
                <label for="">Nama Kebutuhan</label>
                <input type="text" name="namakebutuhan" id="" class="form-control @error("kebutuhan")
                    is-invalid
                @enderror">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Kebutuhan</button>
        </div>
        </form>
      </div>
    </div>
  </div>

<div class="modal fade" id="tambahgolongan" tabindex="-1" aria-labelledby="tambahgolonganLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahgolonganLabel">Tambah Golongan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('tambah.golongan', []) }}" method="post">
            @csrf
        
        <div class="modal-body">
            <div class="form-group">
                <label for="">Nama Golongan</label>
                <input type="text" name="golongan" placeholder="contoh : II, III, IV (Romawi)" id="" class="form-control @error("golongan")
                    is-invalid
                @enderror">
            </div>
            <div class="form-group">
                <label for="">Pajak</label>
                <div class="input-group">
                    <input type="number" name="pajak" class="form-control text-bold text-center @error('pajak')
                        is-invalid
                    @enderror" placeholder="">
                    <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon2">%</span>
                    </div>
                    @error('pajak')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Golongan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection