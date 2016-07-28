@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <h3><i class="fa fa-angle-right"></i>Project __{{$project->name}}__ Servers</h3>
    @foreach ($servers as $server)
    <div class="col-md-4 col-sm-4 mb">
  		<div class="darkblue-panel pn">
  			<div class="darkblue-header">
	  			<h5>{{$server->stage}}</h5>
  			</div>
  			<h1 class="mt"><i class="fa fa-terminal fa-3x"></i></h1>
			<p>{{$server->user}} @ {{$server->host}}</p>
			<footer>
				<div class="centered">
					<h5><i class="fa fa-pencil"></i> <a href="{{ url('/servers/', [$server->project_id, 'new', $server->id]) }}">{{$server->name}}</a></h5>

				</div>
			</footer>
  		</div><!-- -- /darkblue panel ---->
  	</div>
    @endforeach

     @include('components/addnew', ['title' => 'server', 'url' =>  url('/servers/', [$server->project_id, 'new'])  ])


</div>
@endsection
