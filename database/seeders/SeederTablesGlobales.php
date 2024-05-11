<?php

namespace Database\Seeders;

use App\Models\CategoryItem;
use App\Models\MenuItem;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SeederTablesGlobales extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Administrador'],
            ['name' => 'Cliente'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        $role = Role::find(2);
        $role->syncPermissions([1, 2, 3, 4, 9, 10, 11, 12]);

        $role = Role::find(3);
        $role->syncPermissions([17, 18, 19, 20]);

        $categories = [
            ['name' => 'Deportes'],
            ['name' => 'Tecnología'],
            ['name' => 'Hogar'],
            ['name' => 'Moda'],
            ['name' => 'Salud'],
            ['name' => 'Juguetes'],
            ['name' => 'Mascotas'],
            ['name' => 'Libros'],
            ['name' => 'Electrodomésticos'],
            ['name' => 'Jardinería'],
            ['name' => 'Belleza'],
            ['name' => 'Automóviles'],
            ['name' => 'Música'],
            ['name' => 'Cine'],
            ['name' => 'Videojuegos'],
            ['name' => 'Herramientas'],
            ['name' => 'Muebles'],
            ['name' => 'Alimentos'],
            ['name' => 'Bebidas'],
            ['name' => 'Arte'],
            ['name' => 'Decoración'],
            ['name' => 'Religión'],
            ['name' => 'Viajes'],
            ['name' => 'Educación'],
            ['name' => 'Finanzas'],
            ['name' => 'Inmobiliaria'],
            ['name' => 'Seguros'],
            ['name' => 'Telecomunicaciones'],
            ['name' => 'Transporte'],
            ['name' => 'Turismo'],
            ['name' => 'Otros'],
        ];

        foreach ($categories as $category) {
            CategoryItem::create($category);
        }

        $usuarios = [
            [
                'names' => 'Christopher',
                'surnames' => 'Muñoz',
                'email' => 'creyes@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 2,
            ],
            [
                'names' => 'David',
                'surnames' => 'García',
                'email' => 'dgarcia@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 3,
            ],
            [
                'names' => 'Josseline',
                'surnames' => 'Abarca',
                'email' => 'jabarca@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 3,
            ],
        ];

        foreach ($usuarios as $usuario) {
            $userCopia = Arr::except($usuario, ['role_id']);
            $user = User::create($userCopia);
            $user->assignRole($usuario['role_id']);
        }

        $businesses = [
            [
                'name' => 'Tienda de deportes',
                'description' => 'Venta de artículos deportivos',
                'user_id' => 4,
            ],
            [
                'name' => 'Tienda de tecnología',
                'description' => 'Venta de artículos tecnológicos',
                'user_id' => 4,
            ],
            [
                'name' => 'Tienda de hogar',
                'description' => 'Venta de artículos para el hogar',
                'user_id' => 4,
            ],
            [
                'name' => 'Tienda de moda',
                'description' => 'Venta de ropa y accesorios',
                'user_id' => 4,
            ],
            [
                'name' => 'Tienda de salud',
                'description' => 'Venta de productos para la salud',
                'user_id' => 4,
            ],
            [
                'name' => 'Tienda de juguetes',
                'description' => 'Venta de juguetes',
                'user_id' => 3,
            ],
            [
                'name' => 'Tienda de mascotas',
                'description' => 'Venta de productos para mascotas',
                'user_id' => 3,
            ],
            [
                'name' => 'Librería',
                'description' => 'Venta de libros',
                'user_id' => 3,
            ],
            [
                'name' => 'Tienda de electrodomésticos',
                'description' => 'Venta de electrodomésticos',
                'user_id' => 3,
            ],
            [
                'name' => 'Tienda de jardinería',
                'description' => 'Venta de productos para jardinería',
                'user_id' => 3,
            ],
            [
                'name' => 'Tienda de belleza',
                'description' => 'Venta de productos de belleza',
                'user_id' => 3,
            ],
        ];

        foreach ($businesses as $business) {
            $user = User::find($business['user_id']);
            $user->businesses()->create($business);
        }

        $menuItems = [
            [
                'name' => 'Balón de fútbol',
                'description' => 'Balón de fútbol profesional',
                'price' => 50.00,
                'category_item_id' => 1,
                'business_id' => 1,
            ],
            [
                'name' => 'Balón de baloncesto',
                'description' => 'Balón de baloncesto profesional',
                'price' => 40.00,
                'category_item_id' => 1,
                'business_id' => 1,
            ],
            [
                'name' => 'Balón de voleibol',
                'description' => 'Balón de voleibol profesional',
                'price' => 30.00,
                'category_item_id' => 1,
                'business_id' => 1,
            ],
            [
                'name' => 'Computadora',
                'description' => 'Computadora profesional',
                'price' => 50.00,
                'category_item_id' => 2,
                'business_id' => 2,
            ],
            [
                'name' => 'Laptop',
                'description' => 'Laptop profesional',
                'price' => 40.00,
                'category_item_id' => 2,
                'business_id' => 2,
            ],
            [
                'name' => 'Tablet',
                'description' => 'Tablet profesional',
                'price' => 30.00,
                'category_item_id' => 2,
                'business_id' => 2,
            ],
            [
                'name' => 'Sofá',
                'description' => 'Sofá profesional',
                'price' => 50.00,
                'category_item_id' => 3,
                'business_id' => 3,
            ],
            [
                'name' => 'Mesa',
                'description' => 'Mesa profesional',
                'price' => 40.00,
                'category_item_id' => 3,
                'business_id' => 3,
            ],
            [
                'name' => 'Silla',
                'description' => 'Silla profesional',
                'price' => 30.00,
                'category_item_id' => 3,
                'business_id' => 3,
            ],
            [
                'name' => 'Camisa',
                'description' => 'Camisa profesional',
                'price' => 50.00,
                'category_item_id' => 4,
                'business_id' => 4,
            ],
            [
                'name' => 'Pantalón',
                'description' => 'Pantalón profesional',
                'price' => 40.00,
                'category_item_id' => 4,
                'business_id' => 4,
            ],
            [
                'name' => 'Zapatos',
                'description' => 'Zapatos profesionales',
                'price' => 30.00,
                'category_item_id' => 4,
                'business_id' => 4,
            ],
            [
                'name' => 'Vitaminas',
                'description' => 'Vitaminas profesionales',
                'price' => 50.00,
                'category_item_id' => 5,
                'business_id' => 5,
            ],
            [
                'name' => 'Suplementos',
                'description' => 'Suplementos profesionales',
                'price' => 40.00,
                'category_item_id' => 5,
                'business_id' => 5,
            ],
        ];

        foreach ($menuItems as $menuItem) {
            MenuItem::create($menuItem);
        }
    }
}
