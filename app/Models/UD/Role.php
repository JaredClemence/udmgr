<?php

namespace App\Models\UD;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\UD\LegalCase;

class Role extends Model
{
    const ATTORNEY = 0;
    const LEGAL_TEAM = 5;
    const CLIENT = 10;
    const OWNER = 20;
    const PROP_MGR = 30;
    const OTHER = 40;

    use HasFactory;

    public function user(){
      return $this->belongsTo(User::class);
    }
    public function case(){
      return $this->belongsTo(LegalCase::class, 'legal_case_id');
    }
}
