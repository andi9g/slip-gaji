@extends('layout.masterLayout')

@section('activekuSlip')
    activeku
@endsection

@section('judul')
    <i class="fa fa-print"></i> Cetak Slip Gaji
@endsection


@section('content')

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header text-center text-bold">
                <h5 class="text-bold">CETAK SLIP</h5>
            </div>

            <form action="{{ route('cetak.slip') }}" method="get" target="_blank">
                @csrf
            
            <div class="card-body">
                <div class="form-group">
                    <label for="">Nama Pegawai</label>
                    <select class="pilihanpegawai form-control" required  name="pegawai">
                        <option value="">Pilih Pegawai</option>
                        @foreach ($pegawai as $item)
                            <option value="{{$item->nip}}">{{$item->nama}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Kebutuhan</label>
                    <select class="pilihankebutuhan form-control" required  name="kebutuhan">
                        <option value="">Pilih Kebutuhan</option>
                        @foreach ($kebutuhan as $item)
                            <option value="{{$item->idkebutuhan}}">{{$item->namakebutuhan}}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="card-footer p-0 m-1">
                <button type="submit" class="btn btn-block btn-success ">
                    <i class="fa fa-print"></i> Cetak
                </button>
            </div>
            </form>

        </div>
    </div>
</div>

@endsection


@section('myscript')
    <script>
        $(document).ready(function() {
            $('.pilihankebutuhan').select2();
            $('.pilihanpegawai').select2();
        });
    </script>
@endsection