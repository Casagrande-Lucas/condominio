<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit_tower']);// Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'read_tower']);
        Permission::create(['name' => 'delete_tower']);
        Permission::create(['name' => 'update_tower']);
        Permission::create(['name' => 'create_tower']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'analyst']);
        $role1->givePermissionTo('update_tower');
        $role1->givePermissionTo('read_tower');

        $role2 = Role::create(['name' => 'administrator']);
        $role2->givePermissionTo('update_tower');
        $role2->givePermissionTo('create_tower');
        $role2->givePermissionTo('read_tower');

        $role3 = Role::create(['name' => 'super_admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Analyst 1',
            'email' => 'analyst1@condominio.com.br',
            'password' => Hash::make('Teste@123'),
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Administrator 1',
            'email' => 'administrator1@condominio.com.br',
            'password' => Hash::make('Teste@123'),
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@condominio.com.br',
            'password' => Hash::make('Teste@123'),
        ]);
        $user->assignRole($role3);
    }
}
