<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $role1 = Role::create(['name'=>'Admin']);
       $role2 = Role::create(['name'=>'Bloger']);

       Permission::create(['name' => 'admin.home'])->syncRoles([$role1,$role2]);
	
	Permission::create(['name' => 'admin.categories.index'])->syncRoles([$role1,$role2]);
	Permission::create(['name' => 'admin.categories.create'])->syncRoles([$role1,$role2]);
	Permission::create(['name' => 'admin.categories.edit'])->syncRoles([$role1,$role2]);
	Permission::create(['name' => 'admin.categories.destroy'])->syncRoles([$role1,$role2]);
	
	Permission::create(['name' => 'admin.tags.index'])->syncRoles([$role1,$role2]);
	Permission::create(['name' => 'admin.tags.create'])->syncRoles([$role1,$role2]);
	Permission::create(['name' => 'admin.tags.edit'])->syncRoles([$role1,$role2]);
	Permission::create(['name' => 'admin.tags.destroy'])->syncRoles([$role1,$role2]);
	
	Permission::create(['name' => 'admin.posts.index'])->syncRoles([$role1,$role2]);
	Permission::create(['name' => 'admin.posts.create'])->syncRoles([$role1,$role2]);
	Permission::create(['name' => 'admin.posts.edit'])->syncRoles([$role1,$role2]);
	Permission::create(['name' => 'admin.posts.destroy'])->syncRoles([$role1,$role2]);
    }
}
