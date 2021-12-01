<?php

namespace Database\Seeders;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // https://www.qcode.in/easy-roles-and-permissions-in-laravel-5-4/
        if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear all old data ?')) {
            $this->command->call('migrate:refresh');
            $this->command->warn('Data cleared, starting from blank database.');
        }

        User::factory(10)->create();
        Topic::factory(4)->create();

        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
