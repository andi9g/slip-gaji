<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class Pegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->bigIncrements('idpegawai');
            $table->String('nama');
            $table->Integer('idjabatan');
            $table->bigInteger('nip')->unique();
            $table->Integer('idpangkat');
            $table->Integer('gajipokok');
            $table->Integer('tunjanganistriatausuami');
            $table->Integer('tunjangananak');
            $table->Integer('tunjanganjabatan');
            $table->Integer('tunjanganfungsionalitas');
            $table->Integer('tunjanganfungsionalitasumum');
            $table->Integer('tunjanganberas');
            $table->Integer('tunjanganpph21');
            $table->Integer('tunjanganjkk');
            $table->Integer('tunjanganjkm');
            $table->Integer('pembulatan');
            $table->Integer('bpjskesehatandaritpp');
            $table->Integer('angsuranbank');
            $table->Integer('angsurankoperasi');
            $table->Integer('anggotakoperasi');
            $table->Integer('tppbulanjanuari');
            $table->Integer('honorpenggunaankeuangan');
            $table->Integer('zakat');
            $table->timestamps();
        });

        Schema::create('ttd', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nip');
            $table->String('nama');
            $table->timestamps();
        });

        Schema::create('pengaturan', function (Blueprint $table) {
            $table->bigIncrements('idpengaturan');
            $table->Integer("bpjs");
            $table->Integer("iwp1");
            $table->Integer("iwp2");
            $table->timestamps();
        });

        Schema::create('jabatan', function (Blueprint $table) {
            $table->bigIncrements('idjabatan');
            $table->String("namajabatan");
            $table->timestamps();
        });

        Schema::create('pangkat', function (Blueprint $table) {
            $table->bigIncrements('idpangkat');
            $table->String("namapangkat");
            $table->enum("golongan", ['II',"III","IV","V","VI"]);
            $table->timestamps();
        });

        Schema::create('kebutuhan', function (Blueprint $table) {
            $table->bigIncrements('idkebutuhan');
            $table->String('namakebutuhan')->unique();
            $table->timestamps();
        });

        Schema::create('golongan', function (Blueprint $table) {
            $table->bigIncrements('idgolongan');
            $table->enum("golongan", ['II',"III","IV","V","VI"])->unique();
            $table->Integer("pajak");
            $table->timestamps();
        });

        Schema::create('admin', function (Blueprint $table) {
            $table->bigIncrements('idadmin');
            $table->String('nama');
            $table->String('username');
            $table->String('password');
            $table->timestamps();
        });

        $jabatan = [
            'Kepala Badan Kepegawaian Daerah dan KORPRI',
            'Kepala Bidang KORPRI, Pengadaan, Sistem Informasi Kepegawaian',
            'Kepala Bidang Penilaian Kinerja, Disiplin dan Penghargaan',
            'Kepala Bidang Pengembangan Aparatur',
            'Plt. Kepala Bidang Mutasi, Kepangkatan dan Promosi',
            'Analis Kepegawaian Ahli Muda pada Bidang Penilaian Kinerja, Disiplin dan Penghargaan',
            'Analis Kepegawaian Ahli Muda pada Bidang Pengembangan Aparatur',
            'Assessor Sumber Daya Manusia Aparatur Ahli Muda pada Bidang Pengembangan Aparatur',
            'Analis Kepegawaian Ahli Muda pada Bidang KORPRI, Pengadaan, Sistem Informasi Kepegawaian',
            'Kasubbag Keuangan Pada Sekretariat Badan Kepegawaian Daerah dan KORPRI',
            'Analis Kepegawaian Ahli Muda pada Bidang KORPRI, Pengadaan, Sistem Informasi',
            'Analis Kepegawaian Ahli Muda pada Bidang Mutasi, Kepangkatan dan Promosi',
            'Analis Kepegawaian Ahli Muda pada Bidang Penilaian Kinerja, Disiplin dan Penghargaan',
            'Perencana Ahli Muda Pada Sekretariat Badan Kepegawaian Dan Pengembangan Sumber Daya Manusia',
            'Analis Kebijakan Ahli Muda pada Bidang KORPRI, Pengadaan, Sistem Informasi Kepegawaian',
            'Analis Kepegawaian Ahli Muda pada Bidang Pengembangan Aparatur',
            'Kasubag Umum dan Kepegawaian Pada Sekretariat Badan Kepegawaian Daerah dan KORPRI',
            'Analis Kepegawaian Ahli Madya',
            'Analis Kepegawaian Ahli Muda Bidang Penilaian Kinerja, Disiplin dan Penghargaan',
            'Analis Kepegawaian Ahli Muda Bidang KORPRI, Pengadaan, dan Sistem Informasi Kepegawaian',
            'Arsiparis Ahli Muda pada bidang Sekretariat',
            'Pranata Komputer Ahli Muda pada Bidang KORPRI, Pengadaan, dan Sistem Informasi Kepegawaian',
            'Analis Kepegawaian Ahli Muda pada Bidang Pengembangan Aparatur',
            'Arsiparis Ahli Muda pada Sekretariat',
            'Analis Perencanaan, Evaluasi dan Pelaporan pada Sub Bagian Perencanaan dan Evaluasi',
            'Analis Sumber Daya Manusia Aparatur pada Bidang Mutasi, Kepangkatan dan Promosi',
            'Analis Kebijakan Ahli Muda Pada Bidang Penilaian Kinerja, Disiplin dan Penghargaan',
            'Analis Kepegawaian Ahli Pertama pada Bidang Pengembangan Aparatur',
            'Arsiparis Ahli Pertama pada Sub Bagian Umum dan Kepegawaian',
            'Pranata Komputer Ahli Pertama pada  Bidang KORPRI, Pengadaan, dan Sistem Informasi Kepegawaian',
            'Analis Data dan Informasi pada Sub Bidang Mutasi, Kepangkatan dan Promosi',
            'Analis Data dan Informasi pada Sub Bagian Umum dan Kepegawaian',
            'Analis Pengembangan Kompetensi pada Bidang Pengembangan Aparatur',
            'Analis Perencanaan, Evaluasi dan Pelaporan pada Sub Bagian Perencanaan dan Evaluasi',
            'Analis Perencanaan, Evaluasi dan Pelaporan pada Sub Bagian Perencanaan dan Evaluasi',
            'Analis Data dan Informasi pada Bidang Mutasi, Kepangkatan dan Promosi',
            'Penyusun Rencana Mutasi pada Bidang Mutasi, Kepangkatan dan Promosi',
            'Analis Penegakan Integritas dan Disiplin Sumber Daya Manusia Aparatur pada Bidang', 'Penilaian Kinerja, Disiplin dan Penghargaan',
            'Perancang Promosi pada Bidang Mutasi, Kepangkatan dan Promosi',
            'Analis Kepegawaian Pertama pada Bidang Mutasi, Kepangkatan dan Promosi',
            'Assessor Sumber Daya Manusia Aparatur Ahli Pertama pada pada Bidang Pengembangan Aparatur',
            'Analis Kepegawaian Pertama pada  Bidang KORPRI, Pengadaan, dan Sistem Informasi Kepegawaian',
            'Pranata Komputer Terampil Pada Bidang Penilaian Kinerja, Disiplin dan Penghargaan 
            Bendahara pada Subbag Keuangan',
            'Pengelola Bahan Perencanaan pada Subbag Perencanaan dan Evaluasi',
            'Analis Kepegawaian Terampil pada Bidang Mutasi, Kepangkatan dan Promosi',
            'Pengelola Penilaian Kinerja Pegawai pada Bidang Penilaian Kinerja, Disiplin dan Penghargaan',
            'Pengaministrasi Umum pada Sub Bagian Umum dan Kepegawaian',
            'Pengaministrasi Keuangan pada Sub Bagian Keuangan',
            'Pengelola Sistem Informasi Manajemen Kepegawaian',
            'Analis Diklat',
            'Analis Perencanaan Sumber Daya Aparatur'
        ];

        foreach ($jabatan as $item) {
            
            $cek = DB::table('jabatan')->where('namajabatan', $item)->count();

            if($cek == 0) {
                DB::table('jabatan')->insert([
                    'namajabatan' => $item,
                ]);
            }

        }


        $pangkat = [
            'Pembina Utama Madya (IV/d)',
            'Pembina Tk.I (IV/b)',
            'Pembina Tk.I (IV/b)',
            'Pembina (IV/a)',
            'Penata TK.I (III/d)',
            'Pembina (IV/a)',
            'Penata TK.I (III/d)',
            'Penata TK.I (III/d)',
            'Penata TK.I (III/d)',
            'Penata (III/c)',
            'Penata (III/c)',
            'Penata (III/c)',
            'Penata (III/c)',
            'Penata (III/c)',
            'Penata (III/c)',
            'Penata (III/c)',
            'Penata (III/c)',
            'Penata Muda Tk.I (III/b)',
            'Penata Muda Tk.I (III/b)',
            'Pembina (IV/a)',
            'Penata TK.I (III/d)',
            'Penata TK.I (III/d)',
            'Penata (III/c)',
            'Penata (III/c)',
            'Penata (III/c)',
            'Penata (III/c)',
            'Penata (III/c)',
            'Penata (III/c)',
            'Penata Muda Tk.I (III/b)',
            'Penata Muda Tk.I (III/b)',
            'Penata Muda Tk.I (III/b)',
            'Penata Muda Tk.I (III/b)',
            'Penata Muda Tk.I (III/b)',
            'Penata Muda Tk.I (III/b)',
            'Penata Muda (III/a)',
            'Penata Muda (III/a)',
            'Penata Muda (III/a)',
            'Penata Muda (III/a)',
            'Penata Muda (III/a)',
            'Penata Muda (III/a)',
            'Penata Muda (III/a)',
            'Penata Muda (III/a)',
            'Penata Muda (III/a)',
            'Pengatur TK.I (II/d)',
            'Pengatur TK.I (II/d)',
            'Pengatur TK.I (II/d)',
            'Pengatur TK.I (II/d)',
            'Pengatur (II/c)',
            'Pengatur (II/c)',
            'Pengatur (II/c)',
            'Pengatur (II/c)',
            'Penata Muda (III/a)',
            'Penata Muda Tk.I (III/b)'
        ];

        foreach ($pangkat as $item) {
            $ex = explode("(", $item);
            $ex = explode("/", $ex[1]);
            $golongan = $ex[0];

            $cek = DB::table('pangkat')->where('namapangkat', $item)->count();

            if($cek == 0) {
                DB::table('pangkat')->insert([
                    'namapangkat' => $item,
                    'golongan' => $golongan,
                ]);
            }

            $cek2 = DB::table('golongan')->where('golongan', $golongan)->count();
            $pajak = 0;
            if($cek2 == 0) {
                if($golongan == "II") {
                    $pajak = 0;
                }elseif($golongan == "III") {
                    $pajak = 5;
                }elseif($golongan == "IV") {
                    $pajak = 15;
                }

                DB::table("golongan")->insert([
                    'golongan' => $golongan,
                    'pajak' => $pajak,
                ]);

            }
        }

        $kebutuhan = [
            'dokumen Arsip',
            'peminjaman Bank',
            'peminjaman koperasi KSU amanah Tuah Bintan'
        ];

        foreach ($kebutuhan as $item) {
            DB::table('kebutuhan')->insert([
                'namakebutuhan' => $item,
            ]); 
        }



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
