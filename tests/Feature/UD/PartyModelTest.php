<?php

namespace Tests\Feature\UD;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\UD\Party;
use App\Models\UD\LegalCase;
use Database\Seeders\DatabaseSeeder;

class PartyModelTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFactory()
    {
        $party = Party::factory()->make();
        $this->assertTrue( is_a( $party, Party::class ) );
    }

    /**
    * Tests that the same party cannot be added to the same case twice.
    * @group 0.2
    */
    public function testNoDuplicates(){
        $this->seed(DatabaseSeeder::class);
        $case = LegalCase::all()->random();
        $legal_case_id = $case->id;
        $name = fake()->name;
        $type = collect( [Party::PLAINTIFF, Party::DEFENDANT] )->random();
        $settings = compact( 'legal_case_id', 'name', 'type' );
        Party::create( $settings ); //should be successful
        $this->assertEquals( 1, Party::where( $settings )->get()->count() );
        try{
          Party::create( $settings ); //should not be successful
          $this->assertFalse( true, "The system failed to throw the expected exception." );
        }catch( \Exception $e ){
          $this->assertEquals( "Illuminate\Database\QueryException", get_class($e) );
        }
        $settings['type'] = (int)(!$settings['type']);
        try{
          Party::create( $settings ); //should not be successful
          $this->assertFalse( true, "The system failed to throw the expected exception." );
        }catch( \Exception $e ){
          $this->assertEquals( "Illuminate\Database\QueryException", get_class($e) );
        }
        $settings['name'] = fake()->name;
        //changing the name will permit a new record to be created.
        Party::create( $settings ); //should be successful
        $bail = 0;
        do{
          $i = LegalCase::all()->random()->id;
        }while( $i == $legal_case_id && $bail++ < 10);
        $this->assertLessThan( 10, $bail, "The test failed to test more than one case id.");
        $settings['legal_case_id']=$i;
        //changing the case will permit a new record to be created.
        Party::create( $settings ); //should be successful
    }
}
