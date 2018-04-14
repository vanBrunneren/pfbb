<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'User')->first();
		
		$employee = new User();
		$employee->name = 'Employee Name';
		$employee->email = 'employee@example.com';
		$employee->password = bcrypt('secret');
		$employee->save();
		$employee->roles()->attach($role_user);
		
		$manager = new User();
		$manager->name = 'Manager Name';
		$manager->email = 'manager@example.com';
		$manager->password = bcrypt('secret');
		$manager->save();
		$manager->roles()->attach($role_user);
    }
}
