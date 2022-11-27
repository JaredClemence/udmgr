<?php

namespace App\Models\UD;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    const PLAINTIFF = 1;
    const DEFENDANT = 0;

    use HasFactory;
}
