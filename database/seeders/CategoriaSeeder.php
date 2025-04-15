<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create(['nombre' => 'Carpinteria', 'descripcion' => 'Material de carpinteria']);
        Categoria::create(['nombre' => 'Fontanería', 'descripcion' => 'Material de plomería']);
        Categoria::create(['nombre' => 'Construcción', 'descripcion' => 'Materiales de construcción']);
    }
}
