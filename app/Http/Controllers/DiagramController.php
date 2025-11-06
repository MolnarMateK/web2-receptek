<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiagramController extends Controller
{
    /**
     * Display the database schema diagram.
     */
    public function index()
    {
        // E/1. A diagram.blade.php View fájl visszatérése
        return view('diagram.index');
    }
}