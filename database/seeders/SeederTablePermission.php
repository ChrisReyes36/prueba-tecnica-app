<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederTablePermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            // Business
            'business-list',
            'business-create',
            'business-edit',
            'business-delete',
            // Role
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            // User
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            // Category Item
            'category-item-list',
            'category-item-create',
            'category-item-edit',
            'category-item-delete',
            // Menu Item
            'menu-item-list',
            'menu-item-create',
            'menu-item-edit',
            'menu-item-delete',
        ];

        foreach ($permisos as $permiso) {
            \Spatie\Permission\Models\Permission::create(['name' => $permiso]);
        }
    }
}
