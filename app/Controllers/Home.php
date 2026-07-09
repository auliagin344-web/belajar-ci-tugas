<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\DiscountModel;

class Home extends BaseController
{
    protected $productModel;
    protected $discountModel;

    public function __construct()
    {
        helper(['number', 'form']);

        $this->productModel = new ProductModel();
        $this->discountModel = new DiscountModel();
    }

    public function index(): string
    {
        $today = date('Y-m-d');

        $discount = $this->discountModel
            ->where('tanggal', $today)
            ->first();

        return view('v_home', [
            'products' => $this->productModel->findAll(),
            'discount' => $discount
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