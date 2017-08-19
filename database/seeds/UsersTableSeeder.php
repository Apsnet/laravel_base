<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use App\Service;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->cpf = '01234567891';
        $user->password = Hash::make('$LSaP$*v');
        $user->role_id = 1;
        $user->save();
    }
}
