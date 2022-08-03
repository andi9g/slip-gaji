<?php

namespace App\Http\Controllers;

use App\Models\adminM;
use Hash;
use Illuminate\Http\Request;

class aksesC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = empty($request->keyword)?"":$request->keyword;
        $admin = adminM::where('nama', 'like', "$keyword%")->paginate(10);

        $admin->appends($request->only('limit', 'keyword'));

        return view('pages.adminpages', [
            'admin' => $admin,
        ]);
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
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
        
        
        try{
            $nama = $request->nama;
            $username = $request->username;
            $password = Hash::make($request->password);
        
            $store = new adminM;
            $store->nama = $nama;
            $store->username = $username;
            $store->password = $password;
            $store->save();
            if($store) {
                return redirect('admin')->with('toast_success', 'success');
            }
        }catch(\Throwable $th){
            return redirect('admin')->with('toast_error', 'Terjadi kesalahan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\adminM  $adminM
     * @return \Illuminate\Http\Response
     */
    public function show(adminM $adminM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\adminM  $adminM
     * @return \Illuminate\Http\Response
     */
    public function edit(adminM $adminM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\adminM  $adminM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, adminM $adminM, $id)
    {
        $request->validate([
            'nama' => 'required',
            'password' => 'required',
        ]);
        
        
        try{
            $nama = $request->nama;
            $password = Hash::make($request->password);
        
            $update = adminM::where('idadmin', $id)->update([
                'nama' => $nama,
                'password' => $password,
            ]);
            if($update) {
                return redirect('admin')->with('toast_success', 'success');
            }
        }catch(\Throwable $th){
            return redirect('admin')->with('toast_error', 'Terjadi kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\adminM  $adminM
     * @return \Illuminate\Http\Response
     */
    public function destroy(adminM $adminM, $id)
    {
        try{
            $destroy = adminM::where('idadmin', $id)->delete();
            if($destroy) {
                return redirect('admin')->with('toast_success', 'success');
            }
        }catch(\Throwable $th){
            return redirect('admin')->with('toast_error', 'Terjadi kesalahan');
        }
    }


    public function login()
    {
        return view('pages.pageslogin');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('login');
    }

    public function proseslogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        try{
            $request->session()->flush();
            $username = $request->username;
            $password = $request->password;

            $cek = adminM::where('username', $username);
            if($cek->count() === 1) {
                if(Hash::check($password, $cek->first()->password)){
                    $request->session()->put('login', true);
                    $request->session()->put('posisi', 'admin');
                    $request->session()->put('nama', $cek->first()->nama);
                    $request->session()->put('idadmin', $cek->first()->idadmin);

                    return redirect('home')->with('success', 'welcome');

                }else {
                    return redirect('login')->with('toast_error', 'Password atau username tidak benar');
                }
            }else {
                return redirect('login')->with('toast_error', 'Password atau username tidak benar');
            }

        }catch(\Throwable $th){
            return redirect('/login')->with('toast_error', 'Password atau username tidak benar');
        }
    }
}
