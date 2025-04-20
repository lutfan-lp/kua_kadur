<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //untuk impor class DB

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'kua_kadur@gmail.com',
            'password' => bcrypt('kuakadur12'),
        ]);
    
        DB::table('kategori')->insert([
            'nama_kategori' => 'Nasional'
        ]);

        DB::table('berita')->insert([
            'judul_berita' => 'Kemenag Kabupaten Pamekasan Memberikan Penghargaan Kepada KUA Kadur',
            'isi_berita' => 'lorem Ipsum, lorem Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate enim temporibus ipsa quidem dignissimos quis hic vero laborum quaerat dicta et distinctio modi deserunt animi provident, illo dolorum blanditiis totam.',
            'gambar_berita' => 'lorem.jpeg',
            'id_kategori' => 1
        ]);

        DB::table('profile')->insert([
            'id_profile' => 1,
            'judul_profile' => 'Profile KUA Kadur',
            'isi_profile' => 'lorem Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate enim temporibus ipsa quidem dignissimos quis hic vero laborum quaerat dicta et distinctio modi deserunt animi provident, illo dolorum blanditiis totam.',
            'gambar_profile' => 'lorem.jpeg',
        ]);

        DB::table('page')->insert([
            'judul_page' => 'Lorem ipsum',
            'isi_page' => 'lorem Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate enim temporibus ipsa quidem dignissimos quis hic vero laborum quaerat dicta et distinctio modi deserunt animi provident, illo dolorum blanditiis totam.',
            'status_page' => 1
        ]);

        DB::table('menu')->insert([
            'nama_menu' => 'Lorem ipsum',
            'jenis_menu' => 'page',
            'url_menu' => '1',
            'target_menu' => '_blank',
            'urutan_menu' => 1
        ]);

        DB::table('menu')->insert([
            'nama_menu' => 'Google',
            'jenis_menu' => 'url',
            'url_menu' => 'https://wwww.google.com',
            'target_menu' => '_blank',
            'urutan_menu' => 2
        ]);

        DB::table('menu')->insert([
            'nama_menu' => 'Claud Storage',
            'jenis_menu' => 'url',
            'url_menu' => '#',
            'target_menu' => '_self',
            'urutan_menu' => 3
        ]);

        DB::table('menu')->insert([
            'nama_menu' => 'GCP',
            'jenis_menu' => 'url',
            'url_menu' => 'https://cloud.google.com',
            'target_menu' => '_self',
            'urutan_menu' => 1,
            'parent_menu' => 3
        ]);

        DB::table('menu')->insert([
            'nama_menu' => 'AWS',
            'jenis_menu' => 'url',
            'url_menu' => 'https://asw.amazone.com',
            'target_menu' => '_self',
            'urutan_menu' => 2,
            'parent_menu' => 3
        ]);
    }
}
