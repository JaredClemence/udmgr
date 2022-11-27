<?php

namespace App\Models\UD;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UD\Party;

class LegalCase extends Model
{
    use HasFactory;

    public function parties(){
      return $this->hasMany( Party::class );
    }
}
