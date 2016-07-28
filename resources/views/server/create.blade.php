@extends('layouts.app')

@section('content')
<div class="col-lg-12">

      <h3><i class="fa fa-angle-right"></i>Add new server to project</h3>

      <!-- BASIC FORM ELELEMNTS -->
      <div class="row mt">
          <div class="col-lg-8">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Server data</h4>
                <form class="form-horizontal style-form" method="POST" action="{{ url('/servers/', [$projectId, 'new']) }}">
                     {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Server Name" name="name" value="{{ $server->name or old('name')}}" required>
                            <span class="help-block">Identify your server with name. Ex.: DigitalOcean 01</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Stage (hml, production, test)" value="{{ $server->stage or old('stage')}}" name="stage" required>
                            <span class="help-block">Chose your Stage</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Server UserName" name="user" value="{{ $server->user or old('user')}}" required>
                            <span class="help-block">Username Login, Ex.: Ubuntu, root, ec2-user</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Host" name="host" value="{{ $server->host or old('host')}}" required>
                            <span class="help-block">Host. Ip, PublicDns, url. Ex.: 8.8.8.7</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="password" class="form-control" placeholder="Password" value="{{ old('password')}}" name="password">
                            <span class="help-block">Password</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="password" class="form-control" placeholder="PEM File content" name="pem" value="{{ old('pem')}}">
                            <span class="help-block">Paste PEM file content here</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12 ">
                            <button type="submit" class="btn btn-lg btn-theme03 pull-right">SAVE</button>
                        </div>
                    </div>


                </form>
            </div>
          </div><!-- col-lg-12-->
      </div><!-- /row -->


</div>
@endsection
