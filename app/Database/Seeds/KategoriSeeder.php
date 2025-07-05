<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_kategori' => 'Teknologi',
                'slug_kategori' => 'teknologi',
            ],
            [
                'nama_kategori' => 'Olahraga',
                'slug_kategori' => 'olahraga',
            ],
            [
                'nama_kategori' => 'Politik',
                'slug_kategori' => 'politik',
            ],
            [
                'nama_kategori' => 'Ekonomi',
                'slug_kategori' => 'ekonomi',
            ],
            [
                'nama_kategori' => 'Hiburan',
                'slug_kategori' => 'hiburan',
            ],
        ];

        // Insert data
        $this->db->table('kategori')->insertBatch($data);
    }
}
