<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        helper('form'); // WAJIB
        helper(['number', 'form']);

        $this->productModel = new ProductModel();
    }

    public function index(): string
    {
        return view('v_home', [
            'products' => $this->productModel->findAll()
        ]);
    }

    public function faq(): string
    {
        return view('v_faq');
    }

    public function profile()
    {
        return view('v_profile');
    }

    public function contact()
    {
        return view('v_contact');
    }
}