<?php

use Illuminate\Database\Seeder;
use App\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Supplier::create([
            'name'  => 'Suppier Kita',
            'address'   => 'Jl.Mawar No.14',
            'email' => 'supplierkita@gmail.com'
        ]);
        
        Supplier::create([
            'name'  => 'Suppier Jaya',
            'address'   => 'Jl.Dipenogoro No.23',
            'email' => 'supplierjaya@gmail.com'
        ]);
        
        Supplier::create([
            'name'  => 'Suppier Bersama',
            'address'   => 'Jl.Sudirman No.3',
            'email' => 'supplierbersama@gmail.com'
        ]);
    }
}
