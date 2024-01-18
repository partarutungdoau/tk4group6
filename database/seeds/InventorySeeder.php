<?php

use Illuminate\Database\Seeder;
use App\Product;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'product_name'  => 'kertas Folio',
            'categories'    => '3',
            'stock'         => '100',
            'buy_price'     => '20000',
            'sell_price'    => '25000',
            'description'   => 'Test description'
        ]);
        
        Product::create([
            'product_name'  => 'kertas HVS A4',
            'categories'    => '3',
            'stock'         => '50',
            'buy_price'     => '21000',
            'sell_price'    => '26000',
            'description'   => 'Test description 1'
        ]);
        
        Product::create([
            'product_name'  => 'Parker Vector 2',
            'categories'    => '6',
            'stock'         => '100',
            'buy_price'     => '10000',
            'sell_price'    => '14000',
            'description'   => 'Test description 1'
        ]);
        
        Product::create([
            'product_name'  => 'Faster C600',
            'categories'    => '6',
            'stock'         => '50',
            'buy_price'     => '7000',
            'sell_price'    => '9000',
            'description'   => 'Test description 1'
        ]);
        
        Product::create([
            'product_name'  => 'Sinar Dunia',
            'categories'    => '5',
            'stock'         => '50',
            'buy_price'     => '6000',
            'sell_price'    => '9000',
            'description'   => 'Test description 1'
        ]);
        
        Product::create([
            'product_name'  => 'Kiky',
            'categories'    => '5',
            'stock'         => '120',
            'buy_price'     => '7000',
            'sell_price'    => '10000',
            'description'   => 'Test description 1'
        ]);
    }
}
