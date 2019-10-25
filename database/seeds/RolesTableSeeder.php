<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = new Role();
        $role->nom = "Administrateur";
        $role->description = "Gestion de compte artiste";
        $role->save();

        $role = new Role();
        $role->nom = "Utilisateur";
        $role->description = "Utilisateur du site";
        $role->save();
    }
}
