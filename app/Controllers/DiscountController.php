<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiscountModel;

class DiscountController extends BaseController
{
    protected $discountModel;

    public function __construct()
    {
        helper('form');
        $this->discountModel = new DiscountModel();
    }

    public function index()
    {
        return view('discount/index', [
            'discounts' => $this->discountModel
                ->orderBy('tanggal', 'ASC')
                ->findAll()
        ]);
    }

    public function create()
    {
        $rules = [
            'tanggal' => 'required|is_unique[discount.tanggal]',
            'nominal' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('failed', $this->validator->listErrors());
        }

        $this->discountModel->insert([
            'tanggal' => $this->request->getPost('tanggal'),
            'nominal' => $this->request->getPost('nominal')
        ]);

        return redirect()->to(base_url('diskon'))
            ->with('success', 'Data diskon berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $discount = $this->discountModel->find($id);

        if (!$discount) {
            return redirect()->to(base_url('diskon'))
                ->with('failed', 'Data tidak ditemukan.');
        }

        $this->discountModel->update($id, [
            'nominal' => $this->request->getPost('nominal')
        ]);

        return redirect()->to(base_url('diskon'))
            ->with('success', 'Data diskon berhasil diubah.');
    }

    public function delete($id)
    {
        $discount = $this->discountModel->find($id);

        if (!$discount) {
            return redirect()->to(base_url('diskon'))
                ->with('failed', 'Data tidak ditemukan.');
        }

        $this->discountModel->delete($id);

        return redirect()->to(base_url('diskon'))
            ->with('success', 'Data diskon berhasil dihapus.');
    }
}