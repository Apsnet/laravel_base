<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = "admin";
        $admin->description = "Administrador do sistema";
        $admin->save();

        $sudo = new Role();
        $sudo->name = "sudo";
        $sudo->description = "Usuário com privilégios no sistema";
        $sudo->save();

        $user = new Role();
        $user->name = "user";
        $user->description = "Usuário padrão";
        $user->save();
    }
}
