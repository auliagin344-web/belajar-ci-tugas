<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransactionModel;
use App\Models\TransactionDetailModel;

class PembelianController extends BaseController
{
    protected $transactionModel;
    protected $transactionDetailModel;

    public function __construct()
    {
        helper(['number']);

        $this->transactionModel = new TransactionModel();
        $this->transactionDetailModel = new TransactionDetailModel();
    }

    public function index()
    {
        $transactions = $this->transactionModel
            ->orderBy('id', 'DESC')
            ->findAll();

        $transactionIds = array_column($transactions, 'id');

        $products = $this->transactionDetailModel
            ->getProductsByTransactionIds($transactionIds);

        return view('pembelian/index', [
            'transactions' => $transactions,
            'products' => $products
        ]);
    }

    public function status($id)
    {
        $trx = $this->transactionModel->find($id);

        if (!$trx) {
            return redirect()->back();
        }

        $status = ($trx['status'] == 0) ? 1 : 0;

        $this->transactionModel->update($id, [
            'status' => $status
        ]);

        return redirect()->to(base_url('pembelian'));
    }
}