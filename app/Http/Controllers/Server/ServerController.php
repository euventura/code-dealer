<?php

namespace App\Http\Controllers\Server;

use \App\Project;
use \App\Server;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ServerController extends Controller
{
    private $project;
    private $server;

    public function __construct(Project $project, Server $server)
    {
        $this->project = $project;
        $this->server = $server;
    }

    protected function create($projectId, $serverId = null)
    {
        $server = null;
        if ($serverId !== null) {
            $server = $this->server->find($serverId)->first();
        }

        return view('server/create', ['projectId' => $projectId, 'server' => $server]);
    }

    protected function save(Request $request, $projectId)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'stage' => 'required|max:255',
            'host' => 'required|max:255',
        ]);

        $this->project->find($projectId)->servers()->create($request->input());

    }

    protected function index($projectId)
    {
        $servers = $this->project->find($projectId)->servers()->get();
        $project = $this->project->find($projectId)->first();
        return view('server.index', ['servers' => $servers, 'project' => $project]);
    }
}
