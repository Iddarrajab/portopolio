<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $project = Project::latest()->get();

        return view('home', compact('project'));
    }
}
