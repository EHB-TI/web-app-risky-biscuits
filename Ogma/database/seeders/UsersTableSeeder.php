<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default user
        $defaultUser = $this->creatDefaultUser();
        $defaultUser->addRole(Role::where("name", "ROLE_ADMIN")->first()->id);

        User::factory()->count(15)->create();
    }

    private function creatDefaultUser()
    {
        $user = new User();

        $user->name = "admin";
        $user->email = "admin@test.be";
        $user->password = Hash::make("123456");
        $user->remember_token = Str::random(10);
        $user->email_verified_at = now();

        $user->save();

        return $user;
    }
}
