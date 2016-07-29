<?php

namespace App\Http\Controllers\Recipe;

use \App\Project;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class RecipeController extends Controller
{
    private $project;


    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function save(Request $request, $projectId)
    {
        $this->validate($request, [
            'path' => 'required|max:255',
            'repo' => 'required|max:255'
        ]);

        $recipe = $this->project->find($projectId)->recipe()->updateOrCreate(['id' => $request->input('id')], $request->input());
        return view('recipe.create', ['projectId' => $projectId, 'recipe' => $recipe]);
    }

    public function addTask(Request $request, $projectId)
    {
        $this->project->find($projectId)->recipe()->first()->tasks()->updateOrCreate(['id' => $request->input('id')], $request->input());
        return view('recipe.liComponent', ['projectId' => $projectId,  'tasks' => $this->project->find($projectId)->recipe()->first()->tasks()->orderBy('order')->get()]);
    }

    public function orderTask(Request $request)
    {
        $input = $request->all('order');
        if (isset($input['order'])) {
            foreach ($input['order'] as $order => $id) {
                $model = new \App\RecipeTask;
                $model->find($id)->update(['order' => $order+1]);
            }
        }
    }
    public function delTask($projectId, $taskId)
    {
        $this->project->find($projectId)->recipe()->first()->tasks()->find($taskId)->delete();
        return redirect('/recipes/'. $projectId);
    }

    public function index($projectId)
    {
        $recipe = $this->project->find($projectId)->recipe()->first();
        $tasks = $this->project->find($projectId)->recipe()->first()->tasks()->orderBy('order')->get();
        return view('recipe.create', ['projectId' => $projectId, 'recipe' => $recipe, 'tasks' => $tasks]);
    }
}
