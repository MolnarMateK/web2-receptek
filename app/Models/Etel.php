<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etel extends Model
{
    use HasFactory;
    
    protected $fillable = ['nev', 'kategoriaid', 'felirdatum', 'elsodatum'];

    // JAVÍTÁS: Kézzel megadjuk a külső kulcs oszlop nevét: 'kategoriaid'
   public function kategoria()
{
    // Kézzel megadjuk a külső kulcs oszlop nevét: 'kategoriaid'
    return $this->belongsTo(Kategoria::class, 'kategoriaid'); 
}

    // A többi függvény (hozzavalok) marad
    public function hozzavalok()
    {
        return $this->belongsToMany(Hozzavalo::class, 'hasznalts', 'etelid', 'hozzavaloid')
            ->withPivot('mennyiseg', 'egyseg');
    }
}