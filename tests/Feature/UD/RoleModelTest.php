<?php

namespace Tests\Feature\UD;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\UD\Role;
use App\Models\User;
use App\Models\UD\LegalCase;

class RoleModelTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFactory()
    {
       $role = Role::factory()->make();
       $this->assertTrue( is_a( $role, Role::class ) );
    }
    public function testUserRelation(){
       $role = $this->makeRole();
       $user = $role->user;
       $this->assertEquals( User::class, get_class($user) );
       $this->assertEquals( Role::class, get_class($user->role) );
       $this->assertEquals( $role->id, $user->role->id );
    }
    public function testCaseRelation(){
       $role = $this->makeRole();
       $case = $role->case;
       $this->assertEquals( LegalCase::class, get_class($case) );
    }
    public function testUserCaseRelation(){
      $role = $this->makeRole();
      $case = $role->case;
      $user = $role->user;
      $users = $case->users;
      $this->assertTrue( $users->contains( $user ) );
    }

    private function makeRole($overrideSettings=[]){
      $settings = [
         'user_id'=>(User::factory()->create())->id,
         'legal_case_id'=>(LegalCase::factory()->create())->id
      ];
      $settings = array_merge( $settings, $overrideSettings);
      $role = Role::factory()->make($settings);
      $role->save();
      return $role;
    }
}
