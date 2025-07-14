<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Skill;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $hero = Hero::first();
        $skills = Skill::all();
        return view('welcome', compact('hero', 'skills'));
    }
}
