<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hasznalts', function (Blueprint $table) {
            $table->id();
            $table->string('mennyiseg')->nullable(); // Ez hiányzott (lehet üres, és string a "2 fej" miatt)
            $table->string('egyseg')->nullable(); // Ez hiányzott (lehet üres)

            // Külső kulcs: 'etelid' az 'etels' táblához
            $table->foreignId('etelid')->constrained('etels');

            // Külső kulcs: 'hozzavaloid' a 'hozzavalos' táblához
            $table->foreignId('hozzavaloid')->constrained('hozzavalos');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasznalts');
    }
};
