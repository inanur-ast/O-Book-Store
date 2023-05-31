<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';

    public function getBuku()
    {
        return $this->db->table('buku')
        ->join('kategori','kategori.id = buku.kategori')
        ->join('pengarang','pengarang.id = buku.pengarang')
        ->join('penerbit','penerbit.id = buku.penerbit')
        ->get()->getResultArray();
    }

}
