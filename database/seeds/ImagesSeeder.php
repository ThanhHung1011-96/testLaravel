<?php

use App\Model\Image;
use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Image $image)
    {
        $data = [
            [
                'path' => "uploads/images/products/1601027596iphone-x.png",
                'product_id' => 1,

                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path' => "uploads/images/products/1600387054iphone-11-red-2-400x460-400x460.png",
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path' => "uploads/images/products/1600387054oppo-reno3-trang-400x460-400x460.png",
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path' => "uploads/images/products/1600387054xiaomi-redmi-9-114620-094649-400x460.png",
                'product_id' => 2,

                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path' => "uploads/images/products/1600387054iphone-11-red-2-400x460-400x460.png",
                'product_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path' => "uploads/images/products/1600387054oppo-reno3-trang-400x460-400x460.png",
                'product_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'path' => "uploads/images/products/1600387203asus-x441ma-ga024t11-191993-600x600.jpg",
                'product_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path' => "uploads/images/products/1600387203asus-vivobook-x509ma-n4020-br271t-224411-600x600.jpg",
                'product_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path' => "uploads/images/products/1600387203asus-vivobook-x509ja-i3-ej480t-225608-600x600.jpg",
                'product_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path' => "uploads/images/products/1601027788asus-vivobook-x509ja-i3-ej480t-225608-600x600.jpg",
                'product_id' => 4,

                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path' => "uploads/images/products/1600387054iphone-11-red-2-400x460-400x460.png",
                'product_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'path' => "uploads/images/products/1600387054oppo-reno3-trang-400x460-400x460.png",
                'product_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ]

        ];
        $image->insert($data);
    }
}