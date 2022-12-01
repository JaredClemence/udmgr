<?php

namespace App\Models\UD;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $fillable = [
      'legal_case_id',
      'type',
      'name'
    ];
    
    const PLAINTIFF = 1;
    const DEFENDANT = 0;

    use HasFactory;
}
