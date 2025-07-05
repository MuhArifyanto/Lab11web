<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;

class AjaxController extends BaseController
{
    /**
     * Menampilkan halaman awal AJAX.
     */
    public function index()
    {
        return view('ajax/index');
    }

    /**
     * Mengambil semua data artikel dan mengembalikannya dalam format JSON.
     */
    public function getData()
    {
        $model = new ArtikelModel();
        $data = $model->findAll();

        return $this->response->setJSON($data);
    }

    /**
     * Menghapus data artikel berdasarkan ID dan kirimkan response JSON.
     *
     * @param int $id
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function delete($id)
    {
        $model = new ArtikelModel();

        if ($model->delete($id)) {
            return $this->response->setJSON(['status' => 'OK']);
        } else {
            return $this->response->setJSON([
                'status' => 'ERROR',
                'message' => 'Data gagal dihapus.'
            ])->setStatusCode(400);
        }
    }
}
