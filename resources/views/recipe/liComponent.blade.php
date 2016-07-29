@foreach ($tasks as $task)
    <li class="list-info" data-id="{{ $task->id }}" id="{{ $task->id }}">
         <i class=" fa fa-ellipsis-v"></i>
         <div class="task-title">
             <span class="badge">{{ $task->order or '0' }}</span>
             <span class="task-title-sp">{{ $task->name }}</span>
             <div class="pull-right hidden-phone">
                 <button class="btn btn-primary btn-xs fa fa-pencil edit" data-toggle="modal" data-target="#myModal" data-id="{{ $task->id }}" data-name="{{ $task->name }}" data-task="{{ $task->task }}"></button>
                 <a href="{{ url('/recipes/', [$projectId,'delTask', $task->id]) }}" class="btn btn-danger btn-xs fa fa-trash-o"></a>
             </div>
         </div>
     </li>
@endforeach
