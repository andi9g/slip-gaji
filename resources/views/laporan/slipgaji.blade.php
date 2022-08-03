<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Slip Gaji</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10pt;
            margin: 0;
            padding: 0;
        }

        .content {
            padding: 5px 20px;
        }
        .content2 {
            padding: 5px 15px;
            font-size: 8pt;
        }
    </style>
</head>
<body>
    <table border="0" style="width:100%;line-height: 0px;border-bottom:2px solid">
        <tr>
            <td style="width: 20%;">
                <center>

                    <img src="{{ url('gambar', ['logo.png']) }}" width="60px" alt="" srcset="">
                </center>
            </td>
            <td valign="top" style="width: 65%">
                <center>
                    <h4>DAFTAR RINCIAN GAJI PEGAWAI</h4>
                    <h4>BADAN KEPEGAWAIAN DAERAH DAN KORPRI</h4>
                    <h4>PROVINSI KEPULAUAN RIAU</h4>
                    <h4 style="text-transform: uppercase">BULAN {{$bulan}} TAHUN {{date("Y")}}</h4>
                </center>
            </td>
            <td></td>
            
        </tr>
    </table>

    <div class="content">
        <table border="0" style="width:100%;">
            <tr>
                <td style="width: 25%">Nama </td>
                <td style="width: 3%">:</td>
                <td><b>{{$pegawai->nama}}</b></td>
            </tr>

            <tr>
                <td>Jabatan </td>
                <td>:</td>
                <td>{{$pegawai->namajabatan}}</td>
            </tr>

            <tr>
                <td>NIP </td>
                <td>:</td>
                <td>{{$pegawai->nip}}</td>
            </tr>

            <tr>
                <td>Pangkat Gol/Ruang </td>
                <td>:</td>
                <td>{{$pegawai->namapangkat}}</td>
            </tr>
            
        </table>

        <hr style="border: 1px solid rgb(24, 24, 24)">
    </div>
    <div class="content2">


        <table border="0" style="width: 100%">
            <tr>
                <td style="width: 50%" valign="top">
                    <table border="0" style="width: 100%;padding-right: 10px">
                        <tr>
                            <td colspan="2" style="background: rgba(0, 153, 255, 0.671)"><b>GAJI</b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Gaji Pokok</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($pegawai->gajipokok,0,',','.')}}</td>
                        </tr>
                        <tr>
                            <td>Tunjangan Istri / Suami</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($pegawai->tunjanganistriatausuami,0,',','.')}}</td>
                        </tr>

                        <tr>
                            <td>Tunjangan Anak</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($pegawai->tunjangananak,0,',','.')}}</td>
                        </tr>

                        <tr>
                            <td>Tunjangan Jabatan</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($pegawai->tunjanganjabatan,0,',','.')}}</td>
                        </tr>

                        <tr>
                            <td>Tunjangan Fungsional</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($pegawai->tunjanganfungsionalitas,0,',','.')}}</td>
                        </tr>

                        <tr>
                            <td>Tunjangan Fungsional Umum</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($pegawai->tunjanganfungsionalitasumum,0,',','.')}}</td>
                        </tr>

                        <tr>
                            <td>Tunjangan Beras</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($pegawai->tunjanganberas,0,',','.')}}</td>
                        </tr>

                        <tr>
                            <td>Tunjangan PPH21</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($pegawai->tunjanganpph21,0,',','.')}}</td>
                        </tr>

                        <tr>
                            <td>Tunjangan JKK</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($pegawai->tunjanganjkk,0,',','.')}}</td>
                        </tr>
                        <tr>
                            <td>Tunjangan JKM</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($pegawai->tunjanganjkm,0,',','.')}}</td>
                        </tr>

                        <tr>
                            <td>BPJS {{$pengaturan->bpjs}}%</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($bpjs,0,',','.')}}</td>
                        </tr>
                        <tr>
                            <td>Pembulatan</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($pegawai->pembulatan,0,',','.')}}</td>
                        </tr>
                        @php
                            $totalkotor = ($pegawai->gajipokok + $pegawai->tunjanganistriatausuami + $pegawai->tunjangananak + $pegawai->tunjanganjabatan + $pegawai->tunjanganfungsionalitas + $pegawai->tunjanganfungsionalitasumum + $pegawai->tunjanganberas + $pegawai->tunjanganpph21 + $pegawai->tunjanganjkk + $pegawai->tunjanganjkm + $bpjs + $pegawai->pembulatan);
                        @endphp
                        <tr>
                            <td><b>Jumlah Penghasilan Kotor</b></td>
                            <td style="width: 2%"><b>:</b></td>
                            <td style="width: 2%"><b>Rp</b></td>
                            <td style="text-align: right;border-top:1px solid"><b>{{number_format($totalkotor,0,',','.')}}</b></td>
                        </tr>
                    </table>
                </td>
                {{-- pisah  --}}
                <td style="width: 50%" valign="top">
                    <table border="0" style="width: 100%;padding-left: 10px">
                        <tr>
                            <td colspan="2" style="background: rgba(0, 153, 255, 0.671)"><b>POTONGAN</b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>IWP {{$pengaturan->iwp1}}%</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($iwp1,0,',','.')}}</td>
                        </tr>
                        <tr>
                            <td>IWP {{$pengaturan->iwp2}}%</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($iwp2,0,',','.')}}</td>
                        </tr>
                        <tr>
                            <td>BPJS Kesehatan {{$pengaturan->bpjs}}%</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($bpjs,0,',','.')}}</td>
                        </tr>

                        <tr>
                            <td>JKK</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($pegawai->tunjanganjkk,0,',','.')}}</td>
                        </tr>
                        <tr>
                            <td>JKM</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($pegawai->tunjanganjkm,0,',','.')}}</td>
                        </tr>

                        <tr>
                            <td>BPJS Kesehatan dari TPP</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($pegawai->bpjskesehatandaritpp,0,',','.')}}</td>
                        </tr>
                        

                        <tr>
                            <td>PPH 21 Gaji</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($pegawai->tunjanganpph21,0,',','.')}}</td>
                        </tr>

                        @php
                            $persen = $pegawai->pajak / 100;
                            $tppbulanjanuari = $pegawai->tppbulanjanuari * $persen;
                            $pphhonor = $pegawai->honorpenggunaankeuangan * $persen;
                        @endphp

                        <tr>
                            <td>PPH 21 Dari TPP</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($tppbulanjanuari,0,',','.')}}</td>
                        </tr>

                        <tr>
                            <td style="font-size: 8pt">PPH 21 Honor Peng. Keu</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($pphhonor,0,',','.')}}</td>
                        </tr>

                        <tr>
                            <td>Angsuran Bank</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($pegawai->angsuranbank,0,',','.')}}</td>
                        </tr>

                        <tr>
                            <td>Angsuran Koperasi</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($pegawai->angsurankoperasi,0,',','.')}}</td>
                        </tr>

                        <tr>
                            <td>Anggota Koperasi</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($pegawai->anggotakoperasi,0,',','.')}}</td>
                        </tr>
                        @php
                            $jumlahpotongan = ($iwp1 + $iwp2 + $bpjs + $pegawai->tunjanganjkk + $pegawai->tunjanganjkm + $pegawai->bpjskesehatandaritpp + $pegawai->tunjanganpph21 + $tppbulanjanuari + $pphhonor + $pegawai->angsuranbank + $pegawai->angsurankoperasi +  $pegawai->anggotakoperasi);
                        @endphp
                        <tr>
                            <td><b>Jumlah Potongan</b></td>
                            <td style="width: 2%"><b>:</b></td>
                            <td style="width: 2%"><b>Rp</b></td>
                            <td style="text-align: right;border-top:1px solid"><b>{{number_format($jumlahpotongan,0,',','.')}}</b></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <br>
        <br>

        <table border="0" style="width: 100%">
            <tr>
                <td style="width: 65%" valign="top">
                    <table border="0" style="width: 100%;padding-right: 10px">
                        <tr>
                            <td colspan="2" style="background: rgba(0, 153, 255, 0.671)"><b>TAMBAHAN PENGHASILAN</b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width: 60%">TPP Bulan Januari</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($pegawai->tppbulanjanuari,0,',','.')}}</td>
                        </tr>

                        <tr>
                            <td style="width: 60%">Honor Penanggungjawaban Peng. Keu</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 2%">Rp</td>
                            <td style="text-align: right">{{number_format($pegawai->honorpenggunaankeuangan,0,',','.')}}</td>
                        </tr>

                        
                        
                        @php
                            $jumlahtunjangan = $pegawai->tppbulanjanuari + $pegawai->honorpenggunaankeuangan;
                        @endphp
                        <tr>
                            <td><b>Jumlah Tunjangan</b></td>
                            <td style="width: 2%"><b>:</b></td>
                            <td style="width: 2%"><b>Rp</b></td>
                            <td style="text-align: right;border-top:1px solid"><b>{{number_format($jumlahtunjangan,0,',','.')}}</b></td>
                        </tr>
                        <tr>
                            <td><br></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        
                        @php
                            $bruto = $totalkotor + $jumlahtunjangan;
                        @endphp

                        <tr>
                            <td><b>JUMLAH PENGHASILAN BRUTO</b></td>
                            <td style="width: 2%"><b>:</b></td>
                            <td style="width: 2%"><b>Rp</b></td>
                            <td style="text-align: right"><b>{{number_format($bruto,0,',','.')}}</b></td>
                        </tr>

                    </table>
                </td>
                <td style="width: 45%" valign="top">
                </td>
            </tr>
        </table>

        <br>

        <table border="0" style="width: 100%">
            <tr>
                <td style="width: 65%" valign="top">
                    <table border="0" style="width: 100%;padding-right: 10px">

                        <tr>
                            <td style="width: 60%" ><b>JUMLAH PENGHASILAN SEBELUM ZAKAT</b></td>
                            <td style="width: 2%" valign="top"><b>:</b></td>
                            <td style="width: 2%" valign="top"><b>Rp</b></td>
                            <td style="text-align: right" valign="top"><b>{{number_format($bruto - $jumlahpotongan,0,',','.')}}</b></td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>

                        @php
                            $netto = ($bruto - $jumlahpotongan) - $pegawai->zakat;
                        @endphp
                        <tr>
                            <td style="width: 60%" ><b>JUMLAH PENGHASILAN NETTO</b></td>
                            <td style="width: 2%" valign="top"><b>:</b></td>
                            <td style="width: 2%" valign="top"><b>Rp</b></td>
                            <td style="text-align: right" valign="top"><b>{{number_format($netto,0,',','.')}}</b></td>
                        </tr>

                    </table>
                </td>
                <td style="width: 45%" valign="top">
                    <table border="0" style="width: 70%;padding-left: 20px">

                        <tr>
                            <td style="width: 50%" ><b>Zakat 2,50%</b></td>
                            <td style="width: 2%" valign="top"><b>:</b></td>
                            <td style="width: 2%" valign="top"><b>Rp</b></td>
                            <td style="text-align: right" valign="top"><b>{{number_format($pegawai->zakat,0,',','.')}}</b></td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>

        
        <br>

        <table border="1" style="width: 100%;border-collapse: collapse">
            <tr>
                <td style="width: 15%;color:rgb(87, 87, 248);border-right: 0px" valign="top">
                    <center>
                        <i><b>**Catatan</b></i>
                    </center>
                </td>
                <td style="width: 85%;color:rgb(87, 87, 248);border-left: 0px" valign="top">
                    <table border="0" style="width: 100%">
                        <tr>
                            <td>1. Gaji pokok dan Tunjangan Pegawai yang dibayarkan adalah Gaji dan Tunjangan bulan berjalan sedangkan Tambahan Penghasilan Pegawai yang diterima adalah Tambahan Penghasilan Pegawai Bulan Lalu</td>
                        </tr>
                        <tr>
                            <td>2. Slip gaji ini di buat untuk {{$kebutuhan}}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <br>
        <br>

        <table border="1" style="width: 100%;border-collapse: collapse">
            <tr>
                <td style="width: 50%" valign="top">
                    <center>
                        <p>Dari Amru bin Auf r.a katanya Rasulullah SAW bersabda “Sesungguhnya sedekah seseorang Islam itu memanjangkan umur dan mencegah daripada mati dalam keadaan teruk dan Allah SWT pula menghapuskan dengan sedekah itu sikap sombong, takbur dan membanggakan diri (dari pemberiannya).” (Bukhari)</p>
                    </center>
                </td>
                <td style="width: 50%" valign="top">
                    <center>
                        Tanjungpinang, {{date('d')." ".$bulan." ".date("Y")}}
                        <br>
                        <b>BENDAHARA PENGELUARAN</b>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <u><b>{{$ttdnama}}</b></u>
                        <br>
                        NIP.{{$ttdnip}}

                    </center>
                </td>
            </tr>
        </table>



        
        
    </div>

    
</body>
</html>