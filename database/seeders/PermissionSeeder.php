<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permission::create(['name' => 'Create-', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Create-', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-', 'guard_name' => 'admin']);

        //*******************ADMIN*****************************

        // Permission::create(['name' => 'Create-Admin', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Admins', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Admin', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Admin', 'guard_name' => 'admin']);


        //*******************CONTACT*****************************
        // Permission::create(['name' => 'Read-Contacts', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Contact', 'guard_name' => 'admin']);
        //*******************PERMISSION*****************************
        Permission::create(['name' => 'Read-Permissions', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-Permission', 'guard_name' => 'admin']);

        //*******************BASIC INFO*****************************
        // Permission::create(['name' => 'Update-Basic_info', 'guard_name' => 'admin']);
        //*******************Details INFO*****************************
        // Permission::create(['name' => 'Update-Detail', 'guard_name' => 'admin']);
        //*******************QUESTION*****************************
        // Permission::create(['name' => 'Update-Question', 'guard_name' => 'admin']);

        //*******************SERVICES*****************************
        // Permission::create(['name' => 'Create-Service', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Services', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Service', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Service', 'guard_name' => 'admin']);
        //*******************ANSWER*****************************
        // Permission::create(['name' => 'Create-Answer', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Answers', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Answer', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Answer', 'guard_name' => 'admin']);
        //*******************PARTNER*****************************
        // Permission::create(['name' => 'Create-Partner', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Partners', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Partner', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Partner', 'guard_name' => 'admin']);





    }
}
