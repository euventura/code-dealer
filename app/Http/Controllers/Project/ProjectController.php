<?php

namespace App\Http\Controllers\Project;

use \App\Project;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ProjectController extends Controller
{
    private $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    protected function create($projectId = null)
    {
        if ($projectId !== null) {
            //
        }
        return view('project/create');
    }

    protected function save(Request $request)
    {
         Auth::user()->project()->create($request->input());
    }

    protected function index()
    {
        $projects = Auth::user()->project()->get();
        return view('project.index', ['projects' => $projects]);
    }
}
