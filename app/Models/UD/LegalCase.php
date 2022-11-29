<?php

namespace App\Models\UD;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UD\Party;
use App\Models\User;
use App\Models\UD\Role;

class LegalCase extends Model
{
    const OPEN = 0;
    const CLOSED = 100;

    use HasFactory;

    public function parties(){
      return $this->hasMany( Party::class );
    }

    public function users(){
      return $this->hasManyThrough(User::class, Role::class,'legal_case_id','id','id','user_id');
    }
}
