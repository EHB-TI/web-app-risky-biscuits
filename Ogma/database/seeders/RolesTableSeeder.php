<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $this->creatRole("ROLE_ADMIN");
        $this->creatRole("ROLE_USER");
    }

    private function creatRole($name)
    {
        $role = new Role();

        $role->name = $name;

        $role->save();
    }
}
