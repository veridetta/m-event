<?php

namespace Database\Seeders;

use App\Models\Eo;
use App\Models\Piu;
use App\Models\User;
use App\Models\kegiatan;
use App\Models\Pengawas;
use App\Models\levelakun;
use App\Models\pelaporan;
use App\Models\Pertanyaan;
use Illuminate\Database\Seeder;
use App\Models\kategori_pertanyaan;
use App\Models\PelaporanEfektivitas;
use App\Models\PelaporanPaskaPelaksanaan;
use App\Models\PelaporanPelaksanaan;
use App\Models\PelaporanPersiapan;
use App\Models\PertanyaanEfektivitas;
use App\Models\PertanyaanPaskaPelaksanaan;
use App\Models\PertanyaanPelaksanaan;
use App\Models\PertanyaanPersiapan;
use App\Models\UserEO;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        levelakun::create([
            'Level' => "Super Admin"
        ]);

        levelakun::create([
            'Level' => "EO"
        ]);

        levelakun::create([
            'Level' => "User EO"
        ]);

        levelakun::create([
            'Level' => "Pengawas"
        ]);

        levelakun::create([
            'Level' => "PIU"
        ]);

        User::create([
            'level_akun_id' => '1' ,
            'name' => 'Spero Mahakarya Nusantara',
            'email' => 'spero@event.com',
            'password' => bcrypt('abcd1234'),
            //'Status_Aktif' => '1'
        ]);

        User::create([
            'level_akun_id' => '2',
            'name' => 'Diamond Event Organizer',
            'email' => 'diamond@event.com',
            'password' => bcrypt('diamond1234'),
        ]);

        User::create([
            'level_akun_id' => '3',
            'name' => 'Elysa Choiro Umma',
            'email' => 'elysa@event.com',
            'password' => bcrypt('elysa123'),
        ]);

        User::create([
            'level_akun_id' => '4' ,
            'name' => 'Pengawas DKI Jakarta',
            'email' => 'dkijkt@gmail.com',
            'password' => bcrypt('dkijkt12'),
            //'Status_Aktif' => '1'
        ]);

        User::create([
            'level_akun_id' => '5' ,
            'name' => 'Dino PIU',
            'email' => 'dino@event.com',
            'password' => bcrypt('dinoabc'),
            //'Status_Aktif' => '1'
        ]);

        User::create([
            'level_akun_id' => '2' ,
            'name' => 'SVT Event Organizer',
            'email' => 'svteo@event.com',
            'password' => bcrypt ('svtsvt13'),
        ]);

        User::create([
            'level_akun_id' => '3' ,
            'name' => 'Jennie User EO',
            'email' => 'jennieueo@event.com',
            'password' => bcrypt ('jennie1234'),
        ]);

        Piu::create([
            //'level_akun_id' => '4' ,
            'name' => 'Scoups',
            'email' => 'scoups@event.com',
            'NoHp'=> '088999111223',
            'jenis_kelamin' => 'Laki-laki',
            'password' => bcrypt ('scoups123'),
            //'Status_Aktif' => '1'
        ]);

        Piu::create([
            //'level_akun_id' => '4' ,
            'name' => 'Jeonghan',
            'email' => 'jeonghan@event.com',
            'NoHp'=> '088999111223',
            'jenis_kelamin' => 'Laki-laki',
            'password' => bcrypt ('jeonghan123'),
            //'Status_Aktif' => '1'
        ]);

        Piu::create([
            //'level_akun_id' => '4' ,
            'name' => 'Hoshi',
            'email' => 'hoshi@event.com',
            'NoHp'=> '088999111223',
            'jenis_kelamin' => 'Laki-laki',
            'password' => bcrypt ('hoshi123'),
            //'Status_Aktif' => '1'
        ]);

        Piu::create([
            //'level_akun_id' => '4' ,
            'name' => 'Woozi',
            'email' => 'woozi@event.com',
            'NoHp'=> '088999111223',
            'jenis_kelamin' => 'Laki-laki',
            'password' => bcrypt ('woozi123'),
            //'Status_Aktif' => '1'
        ]);

        Piu::create([
            //'level_akun_id' => '4' ,
            'name' => 'Seungkwan ',
            'email' => 'boo@event.com',
            'NoHp'=> '088999111223',
            'jenis_kelamin' => 'Laki-laki',
            'password' => bcrypt ('seungkwan'),
            //'Status_Aktif' => '1'
        ]);

        Pengawas::create([
            //'level_akun_id' => '4' ,
            'name' => 'Joshua',
            'email' => 'josh@event.com',
            'NoHp'=> '088999111223',
            'jenis_kelamin' => 'Laki-laki',
            'password' => bcrypt ('joshua123'),
            //'Status_Aktif' => '1'
        ]);

        Pengawas::create([
            //'level_akun_id' => '4' ,
            'name' => 'Jun',
            'email' => 'jun@event.com',
            'NoHp'=> '088999111223',
            'jenis_kelamin' => 'Laki-laki',
            'password' => bcrypt ('jun12345'),
            //'Status_Aktif' => '1'
        ]);

        Pengawas::create([
            //'level_akun_id' => '4' ,
            'name' => 'Vernon',
            'email' => 'vernon@event.com',
            'NoHp'=> '088999111223',
            'jenis_kelamin' => 'Laki-laki',
            'password' => bcrypt ('vernon123'),
            //'Status_Aktif' => '1'
        ]);

        Pengawas::create([
            //'level_akun_id' => '4' ,
            'name' => 'Dino',
            'email' => 'dino@event.com',
            'NoHp'=> '088999111223',
            'jenis_kelamin' => 'Laki-laki',
            'password' => bcrypt ('dinoabc'),
            //'Status_Aktif' => '1'
        ]);

        Pengawas::create([
            //'level_akun_id' => '4' ,
            'name' => 'Wonwoo ',
            'email' => 'wonu@event.com',
            'NoHp'=> '088999111223',
            'jenis_kelamin' => 'Laki-laki',
            'password' => bcrypt ('wonwoo123'),
            //'Status_Aktif' => '1'
        ]);

        EO::create([
            'name' => 'Diamond Event Organizer',
            'nomorhp' => '02197911562',
            'alamat'=> 'Jalan HR Rasuna Said No. 89 Jakarta Selatan',
            'email' => 'diamond@event.com',
            'password' => bcrypt('diamond1234'),
        ]);

        Eo::create([
            //'level_akun_id' => '4' ,
            'name' => 'SM Event Organizer',
            'nomorhp' => '02199810123',
            'alamat'=> 'Jalan Hayam Wuruk No. 12 Bandung',
            'email' => 'sment@event.com',
            'password' => bcrypt ('vernon123'),
        ]);

        Eo::create([
            //'level_akun_id' => '4' ,
            'name' => 'JYP Event Organizer',
            'nomorhp' => '02198911333',
            'alamat'=> 'Jalan Kartini No. 33 Jakarta Barat',
            'email' => 'jypent@event.com',
            'password' => bcrypt ('vernon123'),
        ]);

        Eo::create([
            //'level_akun_id' => '4' ,
            'name' => 'YG Event Organizer',
            'nomorhp' => '02188911122',
            'alamat'=> 'Jalan Ahmad Yani No. 91 Surabaya',
            'email' => 'ygent@event.com',
            'password' => bcrypt ('vernon123'),
        ]);

        Eo::create([
            //'level_akun_id' => '4' ,
            'name' => 'HYBE Event Organizer',
            'nomorhp' => '021999222122',
            'alamat'=> 'Jalan Gajah Mada No. 62 Yogyakarta',
            'email' => 'hybeent@event.com',
            'password' => bcrypt ('vernon123'),
        ]);

        UserEO::create([
            'name' => 'Elysa Choiro Umma',
            'nomorhp' => '087796658026',
            'email' => 'elysa@event.com',
            'password' => bcrypt('elysa123'),
        ]);

        UserEO::create([
            'name' => 'Aurelia Az Zahra',
            'nomorhp' => '089996632029',
            'email' => 'aurelia@event.com',
            'password' => bcrypt('aurelia12'),
        ]);

        UserEO::create([
            'name' => 'Naurah Zhafirah',
            'nomorhp' => '085796750023',
            'email' => 'naurah@event.com',
            'password' => bcrypt('naurah12'),
        ]);

        UserEO::create([
            'name' => 'Helena Putri',
            'nomorhp' => '081389201367',
            'email' => 'helena@event.com',
            'password' => bcrypt('helena12'),
        ]);

        UserEO::create([
            'name' => 'Faralita Widya',
            'nomorhp' => '089965190273',
            'email' => 'faralita@event.com',
            'password' => bcrypt('faralita'),
        ]);

        PertanyaanPersiapan::create([
            'kegiatan' => 'Webinar Meraih Prestasi',
            'pertanyaan1' => 'Apakah persiapan dijalankan dengan baik?',
        ]);
        PertanyaanPelaksanaan::create([
            'kegiatan' => 'Webinar Meraih Prestasi',
            'pertanyaan1' => 'Apakah terdapat kendala selama kegiatan berlangsung?',
        ]);
        PertanyaanPaskaPelaksanaan::create([
            'kegiatan' => 'Webinar Meraih Prestasi',
            'pertanyaan1' => 'Apakah press release sudah di post?',
        ]);
        PertanyaanEfektivitas::create([
            'kegiatan' => 'Webinar Meraih Prestasi',
            'pertanyaan1' => 'Apakah peserta sesuai dengan target?',
        ]);

        PertanyaanPersiapan::create([
            'kegiatan' => 'Webinar Membangun Bisnis',
            'pertanyaan1' => 'Apakah persiapan berjalan baik?',
        ]);
        PertanyaanPelaksanaan::create([
            'kegiatan' => 'Webinar Membangun Bisnis',
            'pertanyaan1' => 'Apakah terdapat kendala selama kegiatan berlangsung?',
        ]);
        PertanyaanPaskaPelaksanaan::create([
            'kegiatan' => 'Webinar Membangun Bisnis',
            'pertanyaan1' => 'Apakah acara memuaskan?',
        ]);
        PertanyaanEfektivitas::create([
            'kegiatan' => 'Webinar Membangun Bisnis',
            'pertanyaan1' => 'Apakah pelaksanaan sesuai dengan target?',
        ]);

        PertanyaanPersiapan::create([
            'kegiatan' => 'Webinar bersama Treasure',
            'pertanyaan1' => 'Apakah persiapan berjalan baik?',
        ]);
        PertanyaanPelaksanaan::create([
            'kegiatan' => 'Webinar bersama Treasure',
            'pertanyaan1' => 'Apakah terdapat kendala selama kegiatan berlangsung?',
        ]);
        PertanyaanPaskaPelaksanaan::create([
            'kegiatan' => 'Webinar bersama Treasure',
            'pertanyaan1' => 'Apakah acara memuaskan?',
        ]);
        PertanyaanEfektivitas::create([
            'kegiatan' => 'Webinar bersama Treasure',
            'pertanyaan1' => 'Apakah pelaksanaan sesuai dengan target?',
        ]);

        PertanyaanPersiapan::create([
            'kegiatan' => 'Bedah Buku "Bridgerton"',
            'pertanyaan1' => 'Apakah persiapan berjalan baik?',
        ]);
        PertanyaanPelaksanaan::create([
            'kegiatan' => 'Bedah Buku "Bridgerton"',
            'pertanyaan1' => 'Apakah terdapat kendala selama kegiatan berlangsung?',
        ]);
        PertanyaanPaskaPelaksanaan::create([
            'kegiatan' => 'Bedah Buku "Bridgerton"',
            'pertanyaan1' => 'Apakah acara memuaskan?',
        ]);
        PertanyaanEfektivitas::create([
            'kegiatan' => 'Bedah Buku "Bridgerton"',
            'pertanyaan1' => 'Apakah pelaksanaan sesuai dengan target?',
        ]);

        PertanyaanPersiapan::create([
            'kegiatan' => 'Webinar Merajut Mimpi',
            'pertanyaan1' => 'Apakah persiapan berjalan baik?',
        ]);
        PertanyaanPelaksanaan::create([
            'kegiatan' => 'Webinar Merajut Mimpi',
            'pertanyaan1' => 'Apakah terdapat kendala selama kegiatan berlangsung?',
        ]);
        PertanyaanPaskaPelaksanaan::create([
            'kegiatan' => 'Webinar Merajut Mimpi',
            'pertanyaan1' => 'Apakah acara memuaskan?',
        ]);
        PertanyaanEfektivitas::create([
            'kegiatan' => 'Webinar Merajut Mimpi',
            'pertanyaan1' => 'Apakah pelaksanaan sesuai dengan target?',
        ]);

        kategori_pertanyaan::create([
            'id' => '1',
            'kategori' => 'Dokumen',
        ]);
        kategori_pertanyaan::create([
            'id' => '2',
            'kategori' => 'Essay',
        ]);
        kategori_pertanyaan::create([
            'id' => '3',
            'kategori' => 'Pilihan',
        ]);
        // kegiatan::create([
        //     'namakegiatan' => 'Bedah Buku',
        // ]);
        // kegiatan::create([
        //     'namakegiatan' => 'Bedah Buku 2',
        // ]);
        // kegiatan::create([
        //     'namakegiatan' => 'Seminar Hasil',
        // ]);
        // kegiatan::create([
        //     'namakegiatan' => 'Webinar Meraih Prestasi',
        // ]);
        // kegiatan::create([
        //     'namakegiatan' => 'Webinar Membangun Bisnis',
        // ]);
        // kegiatan::create([
        //     'namakegiatan' => 'Webinar bersama Treasure',
        // ]);
        // kegiatan::create([
        //     'namakegiatan' => 'Bedah Buku "Bridgerton"',
        // ]);
        // kegiatan::create([
        //     'namakegiatan' => 'Webinar Merajut Mimpi',
        // ]);

        PelaporanPersiapan::create([
            'kegiatan' => 'Webinar Meraih Mimpi',
            'kategori1' => '1',
            'pertanyaan1' => 'Apakah persiapan dijalankan dengan baik?',
        ]);
        PelaporanPelaksanaan::create([
            'kegiatan' => 'Webinar Meraih Mimpi',
            'kategori1' => '2',
            'pertanyaan1' => 'Apakah terdapat kendala selama kegiatan berlangsung?',
        ]);
        PelaporanPaskaPelaksanaan::create([
            'kegiatan' => 'Webinar Meraih Mimpi',
            'kategori1' => '1',
            'pertanyaan1' => 'Apakah press release sudah di post?',
        ]);
        PelaporanEfektivitas::create([
            'kegiatan' => 'Webinar Meraih Mimpi',
            'kategori1' => '3',
            'pertanyaan1' => 'Apakah peserta sesuai dengan target?',
        ]);

        PelaporanPersiapan::create([
            'kegiatan' => 'Webinar Membangun Start-Up',
            'kategori1' => '1',
            'pertanyaan1' => 'Apakah persiapan berjalan baik?',
        ]);
        PelaporanPelaksanaan::create([
            'kegiatan' => 'Webinar Membangun Start-Up',
            'kategori1' => '2',
            'pertanyaan1' => 'Apakah terdapat kendala selama kegiatan berlangsung?',
        ]);
        PelaporanPaskaPelaksanaan::create([
            'kegiatan' => 'Webinar Membangun Start-Up',
            'kategori1' => '1',
            'pertanyaan1' => 'Apakah acara memuaskan?',
        ]);
        PelaporanEfektivitas::create([
            'kegiatan' => 'Webinar Membangun Start-Up',
            'kategori1' => '3',
            'pertanyaan1' => 'Apakah pelaksanaan sesuai dengan target?',
        ]);

        PelaporanPersiapan::create([
            'kegiatan' => 'Webinar bersama Carat',
            'kategori1' => '1',
            'pertanyaan1' => 'Apakah persiapan berjalan baik?',
        ]);
        PelaporanPelaksanaan::create([
            'kegiatan' => 'Webinar bersama Carat',
            'kategori1' => '2',
            'pertanyaan1' => 'Apakah terdapat kendala selama kegiatan berlangsung?',
        ]);
        PelaporanPaskaPelaksanaan::create([
            'kegiatan' => 'Webinar bersama Carat',
            'kategori1' => '1',
            'pertanyaan1' => 'Apakah acara memuaskan?',
        ]);
        PelaporanEfektivitas::create([
            'kegiatan' => 'Webinar bersama Carat',
            'kategori1' => '3',
            'pertanyaan1' => 'Apakah pelaksanaan sesuai dengan target?',
        ]);

        PelaporanPersiapan::create([
            'kegiatan' => 'Bedah Buku "Hunter"',
            'kategori1' => '1',
            'pertanyaan1' => 'Apakah persiapan berjalan baik?',
        ]);
        PelaporanPelaksanaan::create([
            'kegiatan' => 'Bedah Buku "Hunter"',
            'kategori1' => '2',
            'pertanyaan1' => 'Apakah terdapat kendala selama kegiatan berlangsung?',
        ]);
        PelaporanPaskaPelaksanaan::create([
            'kegiatan' => 'Bedah Buku "Hunter"',
            'kategori1' => '1',
            'pertanyaan1' => 'Apakah acara memuaskan?',
        ]);
        PelaporanEfektivitas::create([
            'kegiatan' => 'Bedah Buku "Hunter"',
            'kategori1' => '3',
            'pertanyaan1' => 'Apakah pelaksanaan sesuai dengan target?',
        ]);

        PelaporanPersiapan::create([
            'kegiatan' => 'Webinar Merajut Asa',
            'kategori1' => '1',
            'pertanyaan1' => 'Apakah persiapan berjalan baik?',
        ]);
        PelaporanPelaksanaan::create([
            'kegiatan' => 'Webinar Merajut Asa',
            'kategori1' => '2',
            'pertanyaan1' => 'Apakah terdapat kendala selama kegiatan berlangsung?',
        ]);
        PelaporanPaskaPelaksanaan::create([
            'kegiatan' => 'Webinar Merajut Asa',
            'kategori1' => '1',
            'pertanyaan1' => 'Apakah acara memuaskan?',
        ]);
        PelaporanEfektivitas::create([
            'kegiatan' => 'Webinar Merajut Asa',
            'kategori1' => '3',
            'pertanyaan1' => 'Apakah pelaksanaan sesuai dengan target?',
        ]);

        PelaporanEfektivitas::create([
            'kegiatan' => 'Baca Buku',
            'kategori1' => '1',
            'pertanyaan1' => 'Apakah lancar?',
        ]);
        PelaporanEfektivitas::create([
            'kegiatan' => 'Baca Buku 2',
            'kategori1' => '3',
            'pertanyaan1' => 'Apakah lancar?',
            'kategori2' => '2',
            'pertanyaan2' => 'Apakah BAGUS?',
        ]);
    }
}
