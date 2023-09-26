<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        // Membuat peran jika belum ada
        $role = Role::firstOrCreate(['name' => 'NamaPeranAnda']);
        
        // Mengaitkan izin dengan peran
        $permissions = Permission::where('name', 'permissions.index')->first();
        
        if ($permissions && $role) {
            $role->givePermissionTo($permissions);
        }
    }
}

