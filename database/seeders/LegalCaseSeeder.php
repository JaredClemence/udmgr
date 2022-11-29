<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\UD\LegalCase;
use App\Models\User;

class LegalCaseSeeder extends Seeder
{
    use RefreshDatabase, WithoutMiddleware;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      while( LegalCase::all()->count() < 5 ){
        LegalCase::factory()->create();
      }
    }
}
