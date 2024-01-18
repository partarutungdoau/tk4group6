<?php
use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'categories_name' => 'Lem & Alat Perekat lain',
        ]);

        Category::create([
            'categories_name' => 'Alat Kerajinan Kertas',
        ]);

        Category::create([
            'categories_name' => 'Kertas',
        ]);

        Category::create([
            'categories_name' => 'Baterai',
        ]);

        Category::create([
            'categories_name' => 'Buku',
        ]);

        Category::create([
            'categories_name' => 'Pulpen',
        ]);

        Category::create([
            'categories_name' => 'Pensil',
        ]);

        Category::create([
            'categories_name' => 'Gunting & Cutter',
        ]);
    }
}
