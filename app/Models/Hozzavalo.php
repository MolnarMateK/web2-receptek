<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hozzavalo extends Model
{
    use HasFactory;

    // Hogy a Seeder működjön
    protected $fillable = ['nev'];

    // Egy hozzávaló TÖBB ételben is szerepelhet
    public function etels()
    {
        return $this->belongsToMany(Etel::class, 'hasznalts', 'hozzavaloid', 'etelid');
    }
}