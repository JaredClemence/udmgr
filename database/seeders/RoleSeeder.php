<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UD\LegalCase;
use App\Models\UD\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        $cases = LegalCase::all();
        $cases->each(  function($case) use ($user){
          Role::factory()->create([
            'user_id'=>$user->id,
            'legal_case_id'=>$case->id,
            'type'=>Role::ATTORNEY
          ]);
        } );
    }
}
