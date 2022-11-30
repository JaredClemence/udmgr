<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Seeders\LegalCaseSeeder;
use Database\Seeders\RoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
          'name'=>'Jared Clemence',
          'email'=>'jaredclemence@gmail.com',
          'password'=>bcrypt('abcabc123')
        ]);
        $this->call([
          LegalCaseSeeder::class,
          RoleSeeder::class
        ]);
    }
}
