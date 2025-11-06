<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasznalt extends Model
{
    use HasFactory;

    // Hogy a Seeder működjön
    protected $fillable = ['mennyiseg', 'egyseg', 'etelid', 'hozzavaloid'];
}