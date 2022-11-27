<?php

namespace Tests\Feature\UD;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\UD\Party;

class PartyModelTest extends TestCase
{
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
}
