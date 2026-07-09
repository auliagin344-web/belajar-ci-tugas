<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiscountSeeder extends Seeder
{
    public function run()
    {
        $today = date('Y-m-d');

        $discounts = [
            100000,
            100000,
            200000,
            150000,
            250000,
            300000,
            300000,
            300000,
            300000,
            300000
        ];

        foreach ($discounts as $i => $nominal) {

            $this->db->table('discount')->insert([

                'tanggal' => date('Y-m-d', strtotime($today . " +{$i} days")),

                'nominal' => $nominal,

                'created_at' => date('Y-m-d H:i:s'),

                'updated_at' => date('Y-m-d H:i:s')

            ]);

        }
    }
}