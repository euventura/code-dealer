@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <h3><i class="fa fa-angle-right"></i> Awesome Projects</h3>
    @foreach ($projects as $project)
        <div class="col-lg-4 col-md-4 col-sm-4 mb">
    		<div class="content-panel pn">
    			<div id="profile-01">
    				<h3>{{ $project->name }}</h3>
    				<h6>{{ $project->framework }}</h6>
    			</div>
    			<div class="profile-01 centered">
    				<p>Last deploy at 21/05/2016</p>
    			</div>
                <div class="pr2-social centered">
					<a href="#" alt="deploy" title="deploy"><i class="fa fa-cloud-upload"></i></a>
					<a href="{{ url('/servers', $project->id)  }}" alt="Server Configuration" title="Server Configuration"><i class="fa fa-cloud"></i></a>
                    <a href="#" alt="Recipie Configuration" title="Recipie Configuration"><i class="fa fa-book"></i></a>
                    <a href="#" alt="Hooks Configuration" title="Hooks Configuration"><i class="fa fa-bullhorn"></i></a>
                    <a href="#" alt="history log" title="history log"><i class="fa fa-history"></i></a>
				</div>
    		</div><!-- --/content-panel ---->
    	</div>
    @endforeach

    @include('components/addnew', ['title' => 'project', 'url' =>  url('/projects/new')  ])
</div>
@endsection
