<?php

namespace App\Http\Controllers;

use App\Models\pengaturanM;
use App\Models\jabatanM;
use App\Models\pangkatM;
use App\Models\golonganM;
use App\Models\kebutuhanM;
use App\Models\ttdM;
use Illuminate\Http\Request;

class pengaturanC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaturan = pengaturanM::first();
        $bpjs = empty($pengaturan->bpjs)?"":$pengaturan->bpjs;
        $iwp1 = empty($pengaturan->iwp1)?"":$pengaturan->iwp1;
        $iwp2 = empty($pengaturan->iwp2)?"":$pengaturan->iwp2;

        $jabatan = jabatanM::get();
        $pangkat = pangkatM::get();
        return view('pages.pengaturanPages',[
            'bpjs' => $bpjs,
            'iwp1' => $iwp1,
            'iwp2' => $iwp2,
            'jabatan' => $jabatan,
            'pangkat' => $pangkat,
        ]);
    }

    public function tambahJabatan(Request $request)
    {
        $request->validate([
            'namajabatan' => 'required',
        ]);

        try{
            $namajabatan = $request->namajabatan;

            $tambah = new jabatanM;
            $tambah->namajabatan = $namajabatan;
            $tambah->save();

            if($tambah) {
                return redirect()->back()->with('toast_success', 'Data berhasil ditambahkan')->withInput();
            }

        }catch(\Throwable $th){
            return redirect('pengaturan')->with('toast_error', 'Terjadi kesalahan');
        }
    }

    public function ubahJabatan(Request $request, $id)
    {
        $request->validate([
            'namajabatan' => 'required',
        ]);

        try{
            $namajabatan = $request->namajabatan;

            $ubah = jabatanM::where('idjabatan', $id)->update([
                'namajabatan' => $namajabatan,
            ]);

            return redirect()->back()->with('toast_success', 'Data berhasil diubah')->withInput();

        }catch(\Throwable $th){
            return redirect('pengaturan')->with('toast_error', 'Terjadi kesalahan');
        }
    }

    public function tambahPangkat(Request $request)
    {
        $request->validate([
            'namapangkat' => 'required',
        ]);

        try{
            $namapangkat = $request->namapangkat;

            $tambah = new pangkatM;
            $tambah->namapangkat = $namapangkat;
            $tambah->save();

            if($tambah) {
                return redirect()->back()->with('toast_success', 'Data berhasil ditambahkan')->withInput();
            }

        }catch(\Throwable $th){
            return redirect('pengaturan')->with('toast_error', 'Terjadi kesalahan');
        }
    }


    public function ubahPangkat(Request $request, $id)
    {
        $request->validate([
            'namapangkat' => 'required',
        ]);

        try{
            $namapangkat = $request->namapangkat;

            $ubah = pangkatM::where('idpangkat', $id)->update([
                'namapangkat' => $namapangkat,
            ]);

            return redirect()->back()->with('toast_success', 'Data berhasil diubah')->withInput();

        }catch(\Throwable $th){
            return redirect('pengaturan')->with('toast_error', 'Terjadi kesalahan');
        }
    }


    public function pengaturancetak(Request $request)
    {
        $golongan = golonganM::orderBy('golongan', 'ASC')->get();
        $kebutuhan = kebutuhanM::get();

        $ttd = ttdM::first();
        $nip = empty($ttd->nip)?0:$ttd->nip;
        $nama = empty($ttd->nama)?"":$ttd->nama;

        return view('pages.pengaturancetakPages',[
            'golongan' => $golongan,
            'kebutuhan' => $kebutuhan,
            'nip' => $nip,
            'nama' => $nama,
        ]);
    }

    public function tambahkebutuhan(Request $request)
    {
        $request->validate([
            'namakebutuhan' => 'required',
        ],[
            'required' => 'Tidak boleh kosong',
        ]);

        try{
            $namakebutuhan = $request->namakebutuhan;

            $tambah = new kebutuhanM;
            $tambah->namakebutuhan = $namakebutuhan;
            $tambah->save();

            if($tambah) {
                return redirect()->back()->with("toast_success", 'Data berhasil ditambahkan')->withInput();
            }
        
        }catch(\Throwable $th){
            return redirect('pengaturancetak')->with('toast_error', 'Terjadi kesalahan');
        }

    }

    public function tambahgolongan(Request $request)
    {
        $request->validate([
            'golongan' => 'required',
            'pajak' => 'required|numeric',
        ],[
            'required' => 'Tidak boleh kosong',
            'numeric' => 'Hanya angka',
        ]);

        try{
            $golongan = $request->golongan;
            $pajak = $request->pajak;

            $tambah = new golonganM;
            $tambah->pajak = $pajak;
            $tambah->golongan = $golongan;
            $tambah->save();

            if($tambah) {
                return redirect()->back()->with("toast_success", 'Data berhasil ditambahkan')->withInput();
            }
        
        }catch(\Throwable $th){
            return redirect('pengaturancetak')->with('toast_error', 'Terjadi kesalahan');
        }
    }

    public function ubahkebutuhan(Request $request, $idkebutuhan)
    {
     
        $request->validate([
            'namakebutuhan' => 'required',
        ],[
            'required' => 'Tidak boleh kosong',
        ]);

        try{
            $namakebutuhan = $request->namakebutuhan;

            $update = kebutuhanM::where('idkebutuhan', $idkebutuhan)->update([
                'namakebutuhan' => $namakebutuhan,
            ]);

            if($update) {
                return redirect()->back()->with("toast_success", "Data berhasil ditambahkan")->withInput();
            }
        
        }catch(\Throwable $th){
            return redirect('pengaturancetak')->with('toast_error', 'Terjadi kesalahan');
        }
    }
    public function ubahgolongan(Request $request, $idgolongan)
    {
        $request->validate([
            'golongan' => 'required',
            'pajak' => 'required|numeric',
        ],[
            'required' => 'Tidak boleh kosong',
            'numeric' => 'Hanya boleh angka',
        ]);

        try{
            $golongan = $request->golongan;
            $pajak = $request->pajak;

            $update = golonganM::where('idgolongan', $idgolongan)->update([
                'golongan' => $golongan,
                'pajak' => $pajak,
            ]);

            if($update) {
                return redirect()->back()->with("toast_success", "Data berhasil ditambahkan")->withInput();
            }
        
        }catch(\Throwable $th){
            return redirect('pengaturancetak')->with('toast_error', 'Terjadi kesalahan');
        }
    }


    public function ttd(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
        ]);
        
        
        try{
            $nip = $request->nip;
            $nama = $request->nama;
        
            ttdM::truncate();

            $store = new ttdM;
            $store->nip = $nip;
            $store->nama = $nama;
            $store->save();
            if($store) {
                return redirect('pengaturancetak')->with('toast_success', 'success');
            }
        }catch(\Throwable $th){
            return redirect('pengaturancetak')->with('toast_error', 'Terjadi kesalahan');
        }
    }













    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'bpjs' => 'required|numeric',
            'iwp1' => 'required|numeric',
            'iwp2' => 'required|numeric',
        ],[
            'required' => 'Tidak Boleh Kosong',
            'numeric' => 'Hanya angka',
        ]);

        try{
            $bpjs = $request->bpjs;
            $iwp1 = $request->iwp1;
            $iwp2 = $request->iwp2;

            pengaturanM::truncate();

            $tambah = new pengaturanM;
            $tambah->bpjs = $bpjs;
            $tambah->iwp1 = $iwp1;
            $tambah->iwp2 = $iwp2;
            $tambah->save();

            if($tambah) {
                return redirect()->back()->with('toast_success', 'data berhasil diubah')->withInput();
            }


        }catch(\Throwable $th){
            return redirect('/pengaturan')->with('toast_error', 'Terjadi kesalahan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengaturanM  $pengaturanM
     * @return \Illuminate\Http\Response
     */
    public function show(pengaturanM $pengaturanM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengaturanM  $pengaturanM
     * @return \Illuminate\Http\Response
     */
    public function edit(pengaturanM $pengaturanM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengaturanM  $pengaturanM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pengaturanM $pengaturanM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengaturanM  $pengaturanM
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengaturanM $pengaturanM)
    {
        //
    }
}
