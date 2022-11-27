<?php

namespace App\Models\UD;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\UD\LegalCase;

class Role extends Model
{
    const LEGAL_TEAM = 0;
    const CLIENT = 1;
    const OWNER = 2;
    const PROP_MGR = 3;
    const OTHER = 4;

    use HasFactory;

    public function user(){
      return $this->belongsTo(User::class);
    }
    public function case(){
      return $this->belongsTo(LegalCase::class, 'legal_case_id');
    }
}
