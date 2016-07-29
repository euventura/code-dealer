@extends('layouts.app')

@section('content')
<div class="row mt mb">
  <div class="col-md-5">
      <section class="task-panel tasks-widget">
    	<div class="panel-heading">
            <div class="pull-left"><h5><i class="fa fa-tasks"></i>  Recipe Details</h5></div>
            <br>
     	</div>
          <div class="panel-body">
              <form class="form-horizontal style-form" method="POST" action="{{ url('/recipes', [$projectId,'save']) }}">
                   {{ csrf_field() }}
                   <input type="hidden" name="id" value="{{ $recipe->id or ''}}">
                  <div class="form-group ">
                      <div class="col-lg-12">
                          <input type="text" class="form-control" placeholder="Server Path" name="path" value="{{ $recipe->path or old('path')}}">
                          <span class="help-block">Path in server, like /var/www/html </span>
                      </div>
                  </div>
                  <div class="form-group ">
                      <div class="col-lg-12">
                          <input type="text" class="form-control" placeholder="Git Repository" name="repo" value="{{ $recipe->repo or old('repo')}}">
                          <span class="help-block">Like git@github.com:euventura/code-dealer.git </span>
                      </div>
                  </div>
                  <div class="form-group ">
                      <div class="col-lg-12">
                          <input type="text" class="form-control" placeholder="Shared Folders, Comma separated" name="shared_folders" value="{{ $recipe->shared_folders or old('shared_folders')}}">
                          <span class="help-block">Shared Folder, like public, folder/uploads</span>
                      </div>
                  </div>
                  <div class="form-group ">
                      <div class="col-lg-12">
                          <input type="text" class="form-control" placeholder="Shared Files, Comma separated" name="shared_files" value="{{ $recipe->shared_files or old('shared_files')}}">
                          <span class="help-block">Shared files, like .env, .config</span>
                      </div>
                  </div>
                  <div class="form-group ">
                      <div class="col-lg-12">
                          <input type="text" class="form-control" placeholder="Writable Folders, Comma separated" name="writable_folders" value="{{ $recipe->writable_folders or old('writable_folders')}}">
                          <span class="help-block">Writable Folders, like public, path/to/folder</span>
                      </div>
                  </div>
                  <div class="form-group ">
                      <div class="col-lg-12">
                          <p>
                              <br />
                              <button type="submit" class="btn btn-lg btn-theme">SAVE RECIPE</button>
                          </p>
                     </div>
                  </div>
              </form>
          </div>
      </section>
  </div><!--/col-md-5 -->
  <div class="col-md-7">
      <section class="task-panel tasks-widget">
    	<div class="panel-heading">
            <div class="pull-left"><h5><i class="fa fa-tasks"></i>  TASKS, baby</h5></div>

            <br>
     	</div>
        <div class="panel-body">
            <div class="task-content">
              <ul id="sortable" class="task-list ui-sortable">
                  @include('recipe.liComponent', ['tasks' => $tasks])
              </ul>
              <div class=" add-task-row">
                  <a class="btn btn-success btn-sm pull-right edit" href="#" data-toggle="modal" data-target="#myModal" data-id="" data-name="" data-task="">Add New Task</a>
              </div>
            </div>
        </div>
  </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Task</h4>

            </div>
            <div class="modal-body">
                <form id="formTask" class="form-horizontal style-form" method="POST" action="{{ url('/recipes/', [$projectId,'addTask']) }}">
                     <input type="hidden" name="id" id="modalId">
                     <div class="form-group ">
                         <div class="col-lg-12">
                             <input type="text" class="form-control" placeholder="Task Name" name="name" id="modalName">
                             <span class="help-block">Task name, like composer-install</span>
                         </div>
                     </div>
                     <div class="form-group ">
                         <div class="col-lg-12">
                             cd /__release_path__/
                             <textarea name="task" class="form-control" placeholder="composer install" id="modalTask"></textarea>
                             <span class="help-block">SH command task, like, composer install. All commands have cd __release_path__ for default</span>
                         </div>
                     </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
        </div>
    </div>
</div>
<script>
$(function() {
    $(document).on('submit', '#formTask', function (){
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(msg){
                $('#sortable').html(msg)
                $('#myModal').modal('toggle');
            },
            error: function(){
                //alert("failure")
            }
        })
        return false
    })
    $(document).on("click", ".edit", function (){

        $("#modalId").val( $(this).data('id') )
        $("#modalName").val( $(this).data('name') )
        $("#modalTask").val( $(this).data('task') )
    })

    $(function() {
        // sorted = ;
        $( "#sortable" ).sortable({
            update: function( event, ui ) {
                data = $( "#sortable" ).sortable(  "toArray" );
                $(data).each( function(a, b) {
                    $('#'+b).find('.badge').html(a+1)
                })


                $.ajax({
                    type: "POST",
                    url: "{{ url('/recipes/', [$projectId,'orderTask']) }}",
                    data: { order: data},
                    success: function(msg){

                    },
                    error: function(){
                        //alert("failure")
                    }
                })
            }
        });
        $( "#sortable" ).disableSelection();
    });

})
</script>
@endsection
