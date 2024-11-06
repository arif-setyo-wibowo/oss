<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\Vendor;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'vendor-page']);
        Permission::create(['name' => 'admin-page']);

        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('admin-page');
        $role1->givePermissionTo('vendor-page');

        $role2 = Role::create(['name' => 'vendor']);
        $role2->givePermissionTo('vendor-page');

        $user = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin1234')
        ]);
        $user->assignRole($role1);
        $user = \App\Models\User::factory()->create([
            'name' => 'John doe',
            'email' => 'john@mail.com',
            'password' => Hash::make('john1234')
        ]);
        $user->assignRole($role2);
        Vendor::create([
            'user_id' => $user->id,
            'nama' => 'Sehat Jaya',
            'dompet' => 0,
            'status' => 'Accepted'
        ]);
    }
}
