<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $count_projects = Project::count();
        $count_types = Type::count();
        $count_techs = Technology::count();

        return view('admin.index', compact('count_projects', 'count_types', 'count_techs'));
    }
}
