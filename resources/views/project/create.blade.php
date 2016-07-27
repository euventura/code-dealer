@extends('layouts.app')

@section('content')
<div class="col-lg-12">

      <h3><i class="fa fa-angle-right"></i> Create new Project</h3>

      <!-- BASIC FORM ELELEMNTS -->
      <div class="row mt">
          <div class="col-lg-8">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Project data</h4>
                <form class="form-horizontal style-form" method="POST" action="{{ url('/project/new') }}">
                     {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Project Name" name="name">
                            <span class="help-block">Identify your project with name. Ex.: Developer Blog</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Framework" name="framework">
                            <span class="help-block">Framework of yout PHP projec. Ex.: Laravel, Codeigniter</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12 ">
                            <button type="submit" class="btn btn-lg btn-theme03 pull-right">SALVAR</button>
                        </div>
                    </div>


                </form>
            </div>
          </div><!-- col-lg-12-->
      </div><!-- /row -->


</div>
@endsection
