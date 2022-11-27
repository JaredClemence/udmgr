<?php

namespace Tests\Feature\UD;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\UD\LegalCase;
use App\Models\UD\Party;

class LegalCaseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFactory()
    {
       $case = LegalCase::factory()->create();
       $this->assertTrue( is_a( $case, LegalCase::class ) );
    }

    public function testPartyRelation()
    {
       $case = LegalCase::factory()->create();
       $noParties = $case->parties();
       $this->assertEquals( 0, $noParties->count() );
       $this->addParty( $case );
       $oneParties = $case->parties();
       $this->assertEquals( 1, $oneParties->count() );
       $this->addParty( $case );
       $twoParties = $case->parties();
       $this->assertEquals( 2, $twoParties->count() );
    }

    private function addParty( $case ){
       $party = Party::factory()->make();
       $case->parties()->save($party);
    }
}
