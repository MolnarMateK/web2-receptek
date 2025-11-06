<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nev'];

    public function etels()
    {
        // JAVÍTÁS: Kézzel megadjuk a külső kulcs nevét, ami a etels táblában van: 'kategoriaid'
        return $this->hasMany(Etel::class, 'kategoriaid'); 
    }
}