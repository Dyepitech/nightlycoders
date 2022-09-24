<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $category = Category::all();
        $projects = Project::all();
        $teams = Team::all();
        
        return view('welcome', [
            'categories' => $category,
            'projects' => $projects,
            'teams' => $teams,
        ]);
    }
}
