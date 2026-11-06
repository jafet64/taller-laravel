<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            ['nombre' => 'Taladro inalámbrico 12 V', 'precio' => 1249.00],
            ['nombre' => 'Juego de desarmadores 6 piezas', 'precio' => 289.90],
            ['nombre' => 'Cinta métrica 5 m', 'precio' => 89.50],
            ['nombre' => 'Guantes de trabajo', 'precio' => 149.00],
            ['nombre' => 'Caja de herramientas 16"', 'precio' => 599.00],
        ];

        foreach ($productos as $producto) {
            Producto::updateOrCreate(
                ['nombre' => $producto['nombre']],
                ['precio' => $producto['precio']],
            );
        }
    }
}
