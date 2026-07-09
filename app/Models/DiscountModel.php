<?php

namespace App\Models;

use CodeIgniter\Model;

class DiscountModel extends Model
{
    protected $table = 'discount';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $protectFields = true;

    protected $allowedFields = [
        'tanggal',
        'nominal'
    ];

    protected $useSoftDeletes = true;

    protected $useTimestamps = true;

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $skipValidation = false;

    protected $validationRules = [
        'tanggal' => 'required|is_unique[discount.tanggal,id,{id}]',
        'nominal' => 'required|numeric'
    ];

    protected $validationMessages = [
        'tanggal' => [
            'is_unique' => 'Tanggal sudah memiliki data diskon.'
        ]
    ];
}