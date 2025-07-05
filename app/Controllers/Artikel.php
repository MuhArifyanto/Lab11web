<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class Artikel extends BaseController
{
    
    public function index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();

        $artikel = $model
            ->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
            ->where('artikel.status', 1) // Hanya tampilkan artikel yang aktif
            ->orderBy('artikel.id', 'DESC') // Urutkan dari yang terbaru
            ->findAll();

        return view('artikel/index', compact('artikel', 'title'));
    }

    public function admin_index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $kategoriModel = new KategoriModel();

        // Ambil keyword pencarian & filter kategori
        $q = $this->request->getGet('q') ?? '';
        $kategori_id = $this->request->getGet('kategori_id') ?? '';

        // Bangun query
        $builder = $model
            ->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left');

        if (!empty($q)) {
            $builder->like('artikel.judul', $q);
        }

        if (!empty($kategori_id)) {
            $builder->where('artikel.id_kategori', $kategori_id);
        }

        $data = [
            'title' => $title,
            'artikel' => $builder->paginate(10),
            'pager' => $model->pager,
            'q' => $q,
            'kategori_id' => $kategori_id,
            'kategori' => $kategoriModel->findAll(),
        ];

        return view('artikel/admin_index', $data);
    }

    public function add()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'judul' => 'required',
            'isi' => 'required',
            'id_kategori' => 'required|integer',
            'gambar' => [
                'label' => 'Gambar',
                'rules' => 'uploaded[gambar]|is_image[gambar]|max_size[gambar,2048]',
                'errors' => [
                    'uploaded' => 'Gambar wajib diunggah.',
                    'is_image' => 'File harus berupa gambar.',
                    'max_size' => 'Ukuran gambar maksimal 2MB.',
                ],
            ],
        ]);

        if ($validation->withRequest($this->request)->run()) {
            $file = $this->request->getFile('gambar');
            $fileName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/gambar', $fileName);

            $model = new ArtikelModel();
            $model->insert([
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
                'slug' => url_title($this->request->getPost('judul'), '-', true),
                'gambar' => $fileName,
                'status' => 1, // Ubah dari 0 (draft) ke 1 (public)
                'id_kategori' => $this->request->getPost('id_kategori'),
            ]);

            return redirect()->to(base_url('admin/artikel'));
        }

        $kategoriModel = new KategoriModel();

        // Cek apakah tabel kategori ada dan memiliki data
        try {
            $kategori = $kategoriModel->findAll();
            if (empty($kategori)) {
                // Jika tidak ada kategori, buat kategori default
                $kategoriModel->insertBatch([
                    ['nama_kategori' => 'Teknologi', 'slug_kategori' => 'teknologi'],
                    ['nama_kategori' => 'Olahraga', 'slug_kategori' => 'olahraga'],
                    ['nama_kategori' => 'Politik', 'slug_kategori' => 'politik'],
                    ['nama_kategori' => 'Ekonomi', 'slug_kategori' => 'ekonomi'],
                    ['nama_kategori' => 'Hiburan', 'slug_kategori' => 'hiburan'],
                ]);
                $kategori = $kategoriModel->findAll();
            }
        } catch (\Exception $e) {
            // Jika tabel kategori tidak ada, buat kategori default
            $kategori = [
                ['id_kategori' => 1, 'nama_kategori' => 'Umum', 'slug_kategori' => 'umum']
            ];
        }

        return view('artikel/form_add', [
            'title' => 'Tambah Artikel',
            'validation' => $validation,
            'kategori' => $kategori
        ]);
    }

    public function edit($id)
    {
        $model = new ArtikelModel();
        $validation = \Config\Services::validation();

        $validation->setRules([
            'judul' => 'required',
            'isi' => 'required',
            'id_kategori' => 'required|integer',
        ]);

        if ($validation->withRequest($this->request)->run()) {
            $model->update($id, [
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
                'id_kategori' => $this->request->getPost('id_kategori'),
            ]);

            return redirect()->to('admin/artikel');
        }

        $data = $model->find($id);
        if (!$data) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Artikel dengan ID $id tidak ditemukan.");
        }

        $kategoriModel = new KategoriModel();

        // Cek apakah tabel kategori ada dan memiliki data
        try {
            $kategori = $kategoriModel->findAll();
            if (empty($kategori)) {
                $kategori = [
                    ['id_kategori' => 1, 'nama_kategori' => 'Umum', 'slug_kategori' => 'umum']
                ];
            }
        } catch (\Exception $e) {
            $kategori = [
                ['id_kategori' => 1, 'nama_kategori' => 'Umum', 'slug_kategori' => 'umum']
            ];
        }

        return view('artikel/form_edit', [
            'title' => 'Edit Artikel',
            'data' => $data,
            'kategori' => $kategori,
            'validation' => $validation
        ]);
    }

    public function delete($id)
    {
        $model = new ArtikelModel();
        $model->delete($id);

        return redirect()->to('admin/artikel');
    }

    public function view($slug)
    {
        $model = new ArtikelModel();
        $artikel = $model
            ->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
            ->where('slug', $slug)
            ->where('artikel.status', 1) // Hanya tampilkan artikel yang aktif
            ->first();

        if (!$artikel) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Artikel dengan slug '$slug' tidak ditemukan atau belum dipublikasikan.");
        }

        return view('artikel/view', [
            'title' => $artikel['judul'],
            'artikel' => $artikel
        ]);
    }
}
