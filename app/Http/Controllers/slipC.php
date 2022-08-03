<?php

namespace App\Http\Controllers;

use App\Models\pegawaiM;
use App\Models\jabatanM;
use App\Models\pangkatM;
use App\Models\pengaturanM;
use App\Models\ttdM;
use App\Models\kebutuhanM;
use PDF;
use Illuminate\Http\Request;

class slipC extends Controller
{
    public function home(Request $request)
    {
        $pegawai = pegawaiM::count();
        $kebutuhan = kebutuhanM::count();
        $jabatan = jabatanM::count();

        return view('pages.pageshome', [
            'pegawai' => $pegawai,
            'kebutuhan' => $kebutuhan,
            'jabatan' => $jabatan,
        ]);
    }
    
    public function index(Request $request)
    {
        $pegawai = pegawaiM::select("nip",'nama')->get();
        $kebutuhan = kebutuhanM::get();

        return view('pages.slipPages', [
            'pegawai' => $pegawai,
            'kebutuhan' => $kebutuhan,
        ]);
    }

    public function cetak(Request $request)
    {
        $request->validate([
            'pegawai' => 'required',
            'kebutuhan' => 'required',
        ],[
            'required' => 'tidak boleh kosong',
        ]);

        try{
            $nip = $request->pegawai;
            $idkebutuhan = $request->kebutuhan;
            
            $pegawai = pegawaiM::join('jabatan', 'jabatan.idjabatan','=','pegawai.idjabatan')
                       ->join('pangkat', 'pangkat.idpangkat', '=', 'pegawai.idpangkat')
                       ->join('golongan', 'golongan.golongan','=','pangkat.golongan')
                       ->select("golongan.pajak", 'pangkat.namapangkat', 'pegawai.*', 'jabatan.namajabatan')
                       ->where('pegawai.nip', $nip)
                       ->first();
            
            $ambilkebutuhan = kebutuhanM::where('idkebutuhan', $idkebutuhan)->first();
            $kebutuhan = $ambilkebutuhan->namakebutuhan;
            
            $pengaturan = pengaturanM::first();
            $bpjs = empty($pengaturan->bpjs)?0:$pengaturan->bpjs / 100;
            $bpjs = (int) round(($pegawai->gajipokok + $pegawai->tunjanganistriatausuami + $pegawai->tunjangananak + $pegawai->tunjanganjabatan) * $bpjs);
            
            $iwp1 = empty($pengaturan->iwp1)?0:$pengaturan->iwp1 / 100;
            $iwp1 = (int) round(($pegawai->gajipokok + $pegawai->tunjanganistriatausuami + $pegawai->tunjangananak + $pegawai->tunjanganjabatan) * $iwp1 );
            
            $iwp2 = empty($pengaturan->iwp2)?0:$pengaturan->iwp2 / 100;
            $iwp2 = (int) round(($pegawai->gajipokok + $pegawai->tunjanganistriatausuami + $pegawai->tunjangananak) * $iwp2 );

            if($bpjs == 0){
                return redirect('pengaturan')->with("warning", 'Pastikan telah melengkapi data pada pengaturan umum');
            }

            $databulan = ['bulan', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            $bulan = $databulan[(int)(date('m'))];



            $ttd = ttdM::first();
            $ttdnip = empty($ttd->nip)?0:$ttd->nip;
            $ttdnama = empty($ttd->nama)?"":$ttd->nama;


            $pdf = PDF::loadView('laporan.slipgaji', [
                'pegawai' => $pegawai,
                'kebutuhan' => $kebutuhan,
                'bpjs' => $bpjs,
                'iwp1' => $iwp1,
                'iwp2' => $iwp2,
                'bulan' => $bulan,
                'pengaturan' => $pengaturan,
                'ttdnip' => $ttdnip,
                'ttdnama' => $ttdnama,
            ]);

            return $pdf->stream();




        }catch(\Throwable $th){
            return redirect('slip')->with('toast_error', 'Terjadi kesalahan');
        }
    }
}

