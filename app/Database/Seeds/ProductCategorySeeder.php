<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'category_name' => 'Elektronik',
                'description'   => 'Produk-produk elektronik seperti TV, laptop, dan smartphone',
            ],
            [
                'category_name' => 'Pakaian',
                'description'   => 'Pakaian pria, wanita, dan anak-anak',
            ],
            [
                'category_name' => 'Makanan & Minuman',
                'description'   => 'Produk makanan ringan dan minuman kemasan',
            ],
        ];

        $this->db->table('product_category')->insertBatch($data);
    }
}
