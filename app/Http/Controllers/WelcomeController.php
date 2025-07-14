<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Hero;
use App\Models\Portfolio;
use App\Models\Skill;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $hero = Hero::first();
        $skills = Skill::all();
        $portfolios = Portfolio::orderBy('id', 'desc')->get();
        $contact = Contact::first();
        
        return view('welcome2', compact('hero', 'skills', 'portfolios', 'contact'));
    }
}
