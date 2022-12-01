<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UD\LegalCase;
use App\Models\UD\Party;
use App\Models\User;

class PartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cases = LegalCase::all();
        $cases->each( function( $case ){
           $legal_case_id = $case->id;
           Party::factory()->create(
             [
               'legal_case_id'=>$legal_case_id,
               'type' => Party::PLAINTIFF,
               'name' => "WATSON REALTY SERVICES, INC",
               'short'=> "WATSON",
             ]
           );
           $limit = rand(1,3);
           for( $i=0; $i<$limit; $i++ ){
             Party::factory()->create(
               [
                 'legal_case_id'=>$legal_case_id,
                 'type' => Party::DEFENDANT
               ]
             );
           }
        } );
    }
}
