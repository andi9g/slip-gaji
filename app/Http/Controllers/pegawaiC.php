<?php

namespace App\Http\Controllers;

use App\Models\pegawaiM;
use App\Models\jabatanM;
use App\Models\pangkatM;
use Illuminate\Http\Request;

class pegawaiC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = empty($request->keyword)?"":$request->keyword;
        
        $pegawai = pegawaiM::join('jabatan', 'jabatan.idjabatan','=','pegawai.idjabatan')
                   ->join('pangkat', 'pangkat.idpangkat','=','pegawai.idpangkat')
                   ->select('pegawai.*', 'jabatan.namajabatan','pangkat.namapangkat')
                   ->where('pegawai.nama', 'like', "%$keyword%")
                   ->orWhere('pegawai.nip', 'like', "$keyword%")
                   ->paginate(15);
        $pegawai->appends($request->only(['limit','keyword']));

        $pangkat = pangkatM::orderBy('namapangkat', 'asc')->get();
        $jabatan = jabatanM::orderBy('namajabatan', 'asc')->get();

        return view('pages.pegawaiPages', [
            'pegawai' => $pegawai,
            'pangkat' => $pangkat,
            'jabatan' => $jabatan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pangkat = pangkatM::orderBy('namapangkat', 'asc')->get();
        $jabatan = jabatanM::orderBy('namajabatan', 'asc')->get();
        return view('pages.tambahpegawaiPages',[
            'jabatan' => $jabatan,
            'pangkat' => $pangkat,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|numeric',
            'idjabatan' => 'required|numeric',
            'idpangkat' => 'required|numeric',
            'gajipokok' => 'required|numeric',
            'pembulatan' => 'required|numeric',
        ],[
            'required' => 'Tidak boleh kosong',
            'numeric' => 'Hanya boleh angka',
        ]);


        try{
            $nama = $request->nama;
            $nip = $request->nip;
            $idjabatan = $request->idjabatan;
            $idpangkat = $request->idpangkat;
            $gajipokok = empty($request->gajipokok)?0:$request->gajipokok;
            $tunjanganistriatausuami = empty($request->tunjanganistriatausuami)?0:$request->tunjanganistriatausuami;
            $tunjangananak = empty($request->tunjangananak)?0:$request->tunjangananak;
            $tunjanganjabatan = empty($request->tunjanganjabatan)?0:$request->tunjanganjabatan;
            $tunjanganfungsionalitas = empty($request->tunjanganfungsionalitas)?0:$request->tunjanganfungsionalitas;
            $tunjanganfungsionalitasumum = empty($request->tunjanganfungsionalitasumum)?0:$request->tunjanganfungsionalitasumum;
            $tunjanganberas = empty($request->tunjanganberas)?0:$request->tunjanganberas;
            $tunjanganpph21 = empty($request->tunjanganpph21)?0:$request->tunjanganpph21;
            $tunjanganjkk = empty($request->tunjanganjkk)?0:$request->tunjanganjkk;
            $tunjanganjkm = empty($request->tunjanganjkm)?0:$request->tunjanganjkm;
            $pembulatan = empty($request->pembulatan)?0:$request->pembulatan;
            $bpjskesehatandaritpp = empty($request->bpjskesehatandaritpp)?0:$request->bpjskesehatandaritpp;
            $angsuranbank = empty($request->angsuranbank)?0:$request->angsuranbank;
            $angsurankoperasi = empty($request->angsurankoperasi)?0:$request->angsurankoperasi;
            $anggotakoperasi = empty($request->anggotakoperasi)?0:$request->anggotakoperasi;
            $tppbulanjanuari = empty($request->tppbulanjanuari)?0:$request->tppbulanjanuari;
            $honorpenggunaankeuangan = empty($request->honorpenggunaankeuangan)?0:$request->honorpenggunaankeuangan;
            $zakat = empty($request->zakat)?0:$request->zakat;

            $tambah = new pegawaiM;
            $tambah->nip = $nip;
            $tambah->nama = $nama;
            $tambah->idjabatan = $idjabatan;
            $tambah->idpangkat = $idpangkat;
            $tambah->gajipokok = $gajipokok;
            $tambah->tunjanganistriatausuami = $tunjanganistriatausuami;
            $tambah->tunjangananak = $tunjangananak;
            $tambah->tunjanganjabatan = $tunjanganjabatan;
            $tambah->tunjanganfungsionalitas = $tunjanganfungsionalitas;
            $tambah->tunjanganfungsionalitasumum = $tunjanganfungsionalitasumum;
            $tambah->tunjanganberas = $tunjanganberas;
            $tambah->tunjanganpph21 = $tunjanganpph21;
            $tambah->tunjanganjkk = $tunjanganjkk;
            $tambah->tunjanganjkm = $tunjanganjkm;
            $tambah->pembulatan = $pembulatan;
            $tambah->bpjskesehatandaritpp = $bpjskesehatandaritpp;
            $tambah->angsuranbank = $angsuranbank;
            $tambah->angsurankoperasi = $angsurankoperasi;
            $tambah->anggotakoperasi = $anggotakoperasi;
            $tambah->tppbulanjanuari = $tppbulanjanuari;
            $tambah->honorpenggunaankeuangan = $honorpenggunaankeuangan;
            $tambah->zakat = $zakat;
            $tambah->save();
            
            if($tambah) {
                return redirect('pegawai')->with('success', 'Data berhasil ditambahkan');
            }

        }catch(\Throwable $th){
            return redirect('pegawai')->with('toast_error', 'Terjadi kesalahan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pegawai)
    {
        $request->validate([
            'nama' => 'required',
            'idjabatan' => 'required|numeric',
            'idpangkat' => 'required|numeric',
            'gajipokok' => 'required|numeric',
            'pembulatan' => 'required|numeric',
        ],[
            'required' => 'Tidak boleh kosong',
            'numeric' => 'Hanya boleh angka',
        ]);

        try{
            $nip = $pegawai;
            $nama = $request->nama;
            $idjabatan = $request->idjabatan;
            $idpangkat = $request->idpangkat;
            $gajipokok = empty($request->gajipokok)?0:$request->gajipokok;
            $tunjanganistriatausuami = empty($request->tunjanganistriatausuami)?0:$request->tunjanganistriatausuami;
            $tunjangananak = empty($request->tunjangananak)?0:$request->tunjangananak;
            $tunjanganjabatan = empty($request->tunjanganjabatan)?0:$request->tunjanganjabatan;
            $tunjanganfungsionalitas = empty($request->tunjanganfungsionalitas)?0:$request->tunjanganfungsionalitas;
            $tunjanganfungsionalitasumum = empty($request->tunjanganfungsionalitasumum)?0:$request->tunjanganfungsionalitasumum;
            $tunjanganberas = empty($request->tunjanganberas)?0:$request->tunjanganberas;
            $tunjanganpph21 = empty($request->tunjanganpph21)?0:$request->tunjanganpph21;
            $tunjanganjkk = empty($request->tunjanganjkk)?0:$request->tunjanganjkk;
            $tunjanganjkm = empty($request->tunjanganjkm)?0:$request->tunjanganjkm;
            $pembulatan = empty($request->pembulatan)?0:$request->pembulatan;
            $bpjskesehatandaritpp = empty($request->bpjskesehatandaritpp)?0:$request->bpjskesehatandaritpp;
            $angsuranbank = empty($request->angsuranbank)?0:$request->angsuranbank;
            $angsurankoperasi = empty($request->angsurankoperasi)?0:$request->angsurankoperasi;
            $anggotakoperasi = empty($request->anggotakoperasi)?0:$request->anggotakoperasi;
            $tppbulanjanuari = empty($request->tppbulanjanuari)?0:$request->tppbulanjanuari;
            $honorpenggunaankeuangan = empty($request->honorpenggunaankeuangan)?0:$request->honorpenggunaankeuangan;
            $zakat = empty($request->zakat)?0:$request->zakat;

            $ubah = pegawaiM::where('nip', $nip)->update([
                'nama' => $nama,
                'idjabatan' => $idjabatan,
                'idpangkat' => $idpangkat,
                'gajipokok' => $gajipokok,
                'tunjanganistriatausuami' => $tunjanganistriatausuami,
                'tunjangananak' => $tunjangananak,
                'tunjanganjabatan' => $tunjanganjabatan,
                'tunjanganfungsionalitas' => $tunjanganfungsionalitas,
                'tunjanganfungsionalitasumum' => $tunjanganfungsionalitasumum,
                'tunjanganberas' => $tunjanganberas,
                'tunjanganpph21' => $tunjanganpph21,
                'tunjanganjkk' => $tunjanganjkk,
                'tunjanganjkm' => $tunjanganjkm,
                'pembulatan' => $pembulatan,
                'bpjskesehatandaritpp' => $bpjskesehatandaritpp,
                'angsuranbank' => $angsuranbank,
                'angsurankoperasi' => $angsurankoperasi,
                'anggotakoperasi' => $anggotakoperasi,
                'tppbulanjanuari' => $tppbulanjanuari,
                'honorpenggunaankeuangan' => $honorpenggunaankeuangan,
                'zakat' => $zakat,
            ]);

            if ($ubah) {
                return redirect()->back()->with('toast_success','Data Berhasil Diubah')->withInput();
            }

        
        }catch(\Throwable $th){
            return redirect('pegawai')->with('toast_error', 'Terjadi kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(pegawai $pegawai)
    {
        //
    }
}
