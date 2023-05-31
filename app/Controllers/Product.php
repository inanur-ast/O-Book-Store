<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Product extends BaseController
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
        $product = $this->product->getProduct();
        $data = [
            'title' => "Home | O'Book Store",
            'cart' => \Config\Services::cart(),
            'produk' => $product
        ];
        return view('pages/product', $data);
    }

    public function detail($slug)
    {
        $product = $this->product->getProduct($slug);
        $data = [
            'title' => 'detail',
            'cart' => \Config\Services::cart(),
            'product' => $product,
        ];
        return view('pages/detail', $data);
    }

    
}