<?php
namespace App\Models;
use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'judul',
        'isi',
        'status',
        'slug',
        'gambar',
        'id_kategori'
    ];

    protected $useTimestamps = false;

    // Default values untuk insert
    protected $beforeInsert = ['setDefaultStatus'];

    protected function setDefaultStatus(array $data)
    {
        // Jika status tidak diset, default ke public (1)
        if (!isset($data['data']['status'])) {
            $data['data']['status'] = 1;
        }

        // Jika slug tidak diset, generate dari judul
        if (!isset($data['data']['slug']) && isset($data['data']['judul'])) {
            $data['data']['slug'] = url_title($data['data']['judul'], '-', true);
        }

        return $data;
    }
}