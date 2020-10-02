<?php

use Illuminate\Database\Seeder;
use App\Model\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Category $category)
    {
        $data = [
            [
                'name' => "Điện Thoại",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "Laptop",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "Phụ Kiện",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "Đồng hồ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        $category->insert($data);
    }
}