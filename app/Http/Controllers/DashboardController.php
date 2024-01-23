<?php

namespace App\Http\Controllers;

use App\Models\Task;

class DashboardController extends Controller
{
    public function dashboard(){
        $private = Task::where('status', 'Private')->where('user_id', auth()->id())->count();
        $public = Task::where('status', 'Public')->count();
        return view('layouts.dashboard', compact('private', 'public'));
    }
}
