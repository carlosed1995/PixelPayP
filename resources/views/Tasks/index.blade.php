@extends('layouts.layout')
@section('content')

<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
         <div class="pull-left left-margin"><h3>Lista de tareas</h3></div>
        <div class="panel-body">
         
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('tasks.create') }}" class="btn btn-info" >Añadir Tarea</a>
            </div>
          </div>
          <br><br>
          <div class="tareas">
            <div class="wrap">
              <ul class="lista" id="lista">
                @if($tasks->count())
                  @foreach($tasks as $task) 
                    <li><a href="{{action('TasksController@edit', $task->id)}}">{{$task->id}} {{$task->title}}</a></li>
                  @endforeach 
                @else
                  <li><a href="#">0 No hay registros</a></li>
                @endif
              </ul>
            </div>
          </div>
      </div> 
      <div class="left-margin"> {{ $tasks->links() }}</div>
    </div>
  </div>
</section>
</div>

@endsection