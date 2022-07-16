<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Company;
use App\Models\Profile;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //super admin
        $superAdmin = User::create([
            'fname' => 'Super',
            'lname' => 'Admin',
            'email' => 'info@synnefatech.com',
            'phone' => '9686828230',
            'pin'=>bcrypt('828230'),
            'password' => bcrypt('synnefa@admin')
        ]);
        //insert profile
        $superAdmin_profile = Profile::create([
            'user_id' => $superAdmin->id
        ]);


        //company admin
        $admin = User::create([
            'fname' => 'Shrikant',
            'lname' => 'Desai',
            'phone' => '9890340065',
            'pin'=>bcrypt('123456'),
            'password' => bcrypt('123456'),

        ]);

        //insert profile
        $admin_profile = Profile::create([
            'user_id' => $admin->id,
            'skill_id'=> 4
        ]);


        //company details
        Company::create([
            'name' => 'Shrikant Desai',
            'owner_name' => 'Shrikant Desai',
            'phone' => '9890340065',
        ]);

        $superAdminRole = Role::find(1);
        $adminRole = Role::find(2);

        $superAdminPermissions = Permission::pluck('id', 'id')->all();
        $adminPermissions = Permission::whereNotIn('id', [1, 2, 3, 4])->pluck('id', 'id');

        $superAdminRole->syncPermissions($superAdminPermissions);
        $adminRole->syncPermissions($adminPermissions);

        $superAdmin->assignRole([$superAdmin->id]);
        $admin->assignRole([$admin->id]);
    }
}
