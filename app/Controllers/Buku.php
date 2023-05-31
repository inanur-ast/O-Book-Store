<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BukuModel;

class Buku extends Controller
{
    public function index()
    {
        $model = new BukuModel();
        $data['buku'] = $model->getBuku();
        return view('view-buku', $data);
    }
}
