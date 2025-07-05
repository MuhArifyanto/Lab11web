<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ArtikelModel;

class Post extends ResourceController
{
    use ResponseTrait;

    // GET /post
    public function index()
    {
        $model = new ArtikelModel();
        $data = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond(['status' => 200, 'data' => $data]);
    }

    // POST /post
    public function create()
    {
        $model = new ArtikelModel();

        $data = [
            'judul' => $this->request->getVar('judul'),
            'isi'   => $this->request->getVar('isi'),
            'status' => 1, // Set status ke public (1) secara default
            'slug' => url_title($this->request->getVar('judul'), '-', true),
        ];

        if ($model->insert($data)) {
            return $this->respondCreated([
                'status' => 201,
                'error' => null,
                'messages' => [
                    'success' => 'Data artikel berhasil ditambahkan.'
                ]
            ]);
        }

        return $this->failValidationErrors($model->errors());
    }

    // GET /post/{id}
    public function show($id = null)
    {
        $model = new ArtikelModel();
        $data = $model->find($id);

        if ($data) {
            return $this->respond(['status' => 200, 'data' => $data]);
        }

        return $this->failNotFound("Data artikel dengan ID $id tidak ditemukan.");
    }

    // PUT /post/{id}
    public function update($id = null)
    {
        $model = new ArtikelModel();

        $data = [
            'judul' => $this->request->getVar('judul'),
            'isi'   => $this->request->getVar('isi'),
        ];

        if (!$model->find($id)) {
            return $this->failNotFound("Data artikel dengan ID $id tidak ditemukan.");
        }

        $model->update($id, $data);

        return $this->respond([
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data artikel berhasil diubah.'
            ]
        ]);
    }

    // DELETE /post/{id}
    public function delete($id = null)
    {
        $model = new ArtikelModel();

        $data = $model->find($id);
        if (!$data) {
            return $this->failNotFound("Data artikel dengan ID $id tidak ditemukan.");
        }

        $model->delete($id);

        return $this->respondDeleted([
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data artikel berhasil dihapus.'
            ]
        ]);
    }
}