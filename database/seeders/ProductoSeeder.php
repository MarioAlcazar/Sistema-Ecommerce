<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $productos = [
            // Carpintería
            [
                'categoria_id' => 1,
                'codigo' => 'CARP001',
                'nombre' => 'Sierra manual para madera',
                'precio' => 15.00,
                'descripcion' => 'Ideal para cortes precisos en carpintería.',
                'imagen' => 'https://via.placeholder.com/150?text=Sierra',
                'estado' => 'activo',
            ],
            [
                'categoria_id' => 1,
                'codigo' => 'CARP002',
                'nombre' => 'Martillo carpintero',
                'precio' => 8.75,
                'descripcion' => 'Martillo con mango de madera para trabajos de carpintería.',
                'imagen' => 'https://via.placeholder.com/150?text=Martillo',
                'estado' => 'activo',
            ],
            [
                'categoria_id' => 1,
                'codigo' => 'CARP003',
                'nombre' => 'Caja de ingletes',
                'precio' => 12.00,
                'descripcion' => 'Permite realizar cortes en ángulo con precisión.',
                'imagen' => 'https://via.placeholder.com/150?text=Ingletes',
                'estado' => 'activo',
            ],

            // Fontanería
            [
                'categoria_id' => 2,
                'codigo' => 'FONT001',
                'nombre' => 'Llave mezcladora cromada',
                'precio' => 18.00,
                'descripcion' => 'Llave de agua para lavabo con diseño moderno.',
                'imagen' => 'https://via.placeholder.com/150?text=Llave',
                'estado' => 'activo',
            ],
            [
                'categoria_id' => 2,
                'codigo' => 'FONT002',
                'nombre' => 'Tubo de PVC 1/2 pulgada',
                'precio' => 7.25,
                'descripcion' => 'Tubo resistente para instalaciones hidráulicas.',
                'imagen' => 'https://via.placeholder.com/150?text=Tubo',
                'estado' => 'activo',
            ],
            [
                'categoria_id' => 2,
                'codigo' => 'FONT003',
                'nombre' => 'Codo PVC 90 grados',
                'precio' => 1.50,
                'descripcion' => 'Conector en forma de codo para unir tuberías de agua.',
                'imagen' => 'https://via.placeholder.com/150?text=Codo',
                'estado' => 'activo',
            ],

            // Construcción
            [
                'categoria_id' => 3,
                'codigo' => 'CONST001',
                'nombre' => 'Paleta de albañil',
                'precio' => 9.99,
                'descripcion' => 'Herramienta para mezclar y aplicar cemento.',
                'imagen' => 'https://via.placeholder.com/150?text=Paleta',
                'estado' => 'activo',
            ],
            [
                'categoria_id' => 3,
                'codigo' => 'CONST002',
                'nombre' => 'Nivel de burbuja 60 cm',
                'precio' => 12.75,
                'descripcion' => 'Nivel de aluminio preciso para construcción.',
                'imagen' => 'https://via.placeholder.com/150?text=Nivel',
                'estado' => 'activo',
            ],
            [
                'categoria_id' => 3,
                'codigo' => 'CONST003',
                'nombre' => 'Saco de cemento gris 50 kg',
                'precio' => 120.00,
                'descripcion' => 'Cemento de uso general para obras de construcción.',
                'imagen' => 'https://via.placeholder.com/150?text=Cemento',
                'estado' => 'activo',
            ],
        ];

        foreach ($productos as $producto) {
            Producto::create($producto);
        }
    }
}
