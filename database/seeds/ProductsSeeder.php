<?php

use App\Model\Category;
use App\Model\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Product $product)
    {
        $data = [
            [
                'name'          => "Iphone X",
                'quantity'      => 30,
                'category_id'   => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
                'price'         =>  10000000
            ],
            [
                'name'          => "Iphone 6",
                'quantity'      => 30,
                'category_id'   => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
                'price'         =>  11000000
            ],
            [
                'name'          => "Laptop dell",
                'quantity'      => 30,
                'category_id'   => 2,
                'created_at'    => now(),
                'updated_at'    => now(),
                'price'         =>  12500000

            ],
            [
                'name'          => "Laptop Asus",
                'quantity'      => 30,
                'category_id'   => 2,
                'created_at'    => now(),
                'updated_at'    => now(),
                'price'         =>  15500000
            ]

        ];
        $product->insert($data);
    }
}