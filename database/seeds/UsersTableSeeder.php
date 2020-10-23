<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $riderRole = Role::where('name', 'rider')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'contact' =>'0712345678',
            'address' => 'qwerty',
            'password' => Hash::make('12345678'),
        ]);

        $rider = User::create([
            'name' => 'Rider',
            'email' => 'rider@rider.com',
            'contact' =>'0712345678',
            'address' => 'qwerty',
            'password' => Hash::make('12345678')
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'contact' =>'0712345678',
            'address' => 'qwerty',
            'password' => Hash::make('12345678')
        ]);

        $admin->roles()->attach($adminRole);
        $rider->roles()->attach($riderRole);
        $user->roles()->attach($userRole);


    }
}
