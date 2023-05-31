<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Cart extends BaseController
{
    protected $product;
    public function __construct()
    {
        $this->product = new ProductModel();
        helper('number');
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => "Cart | O'Book Store",
            'cart' => \Config\Services::cart(),
        ];
        return view('pages/cart', $data);
    }

    public function cek()
    {
        $cart = \Config\Services::cart();
        $response = $cart->contents();
        echo '<pre>';
        print_r($response);
        echo '</pre>';
    }

    public function add()
    {
        $cart = \Config\Services::cart();
        $cart->insert(array(
            'id'        => $this->request->getPost('id'),
            'qty'       => 1,
            'price'     => $this->request->getPost('price'),
            'name'      => $this->request->getPost('name'),
            'options'   => array(
                'sampul'    => $this->request->getPost('sampul'),
                'author'    => $this->request->getPost('author'),
            )
        ));
        return redirect()->to(base_url('cart'));
    }

    public function clear()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->to(base_url('cart'));
    }

    public function update()
    {
        $cart = \Config\Services::cart();
        $i = 1;
        foreach ($cart->contents() as $key => $value) {
            # code...
            $cart->update(array(
                'rowid'   => $value['rowid'],
                'qty'     => $this->request->getPost('qty' . $i++),
            ));
        }
        return redirect()->to(base_url('cart'));
    }

    public function delete($rowid)
    {
        $cart = \Config\Services::cart();
        $cart->remove($rowid);
        session()->setflashdata('delete', 'Item berhasil dihapus dari keranjang');
        return redirect()->to(base_url('cart'));
    }
}
