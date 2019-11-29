<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['name' => 'Coca Cola', 'price' => '1.80'],
            ['name' => 'Pepsi Cola', 'price' => '1.60'],
            ['name' => 'Sprite Cola', 'price' => '1.50'],
            ['name' => 'Fanta Cola', 'price' => '1.40'],
            ['name' => 'Mirinda Cola', 'price' => '1.45'],
            ['name' => 'Sting', 'price' => '1.90'],
            ['name' => 'Mango Juice', 'price' => '1.20'],
            ['name' => 'Orange Juice', 'price' => '1.15'],
            ['name' => 'Apple Juice', 'price' => '1.10'],
            ['name' => 'Grapes Juice', 'price' => '1.30'],
        ];

        foreach ($products as $product) {
            factory(Product::class)
                ->create([
                    'name' => $product['name'],
                    'price' => $product['price']
                ]);
        }
    }
}
