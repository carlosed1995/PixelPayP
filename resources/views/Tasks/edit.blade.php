@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Editar Tarea</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('tasks.update',$tasks->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">
										<input type="text" name="title" id="title" class="form-control input-sm" value="{{$tasks->title}}">
									</div>
								</div>
							</div>

							<div class="form-group">
								<textarea name="description" class="form-control input-sm"  placeholder="Descripción de la tarea">{{$tasks->description}}</textarea>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">
										<select name="active" id="active" class="form-control input-sm">
											<option {{ $tasks->statusTask->first()->status == '' ? 'selected' : '' }}>Seleccione</option>
											<option value="1" {{ $tasks->statusTask->first()->status == 1 ? 'selected' : '' }}>Activo</option>
											<option value="0" {{ $tasks->statusTask->first()->status == 0 ? 'selected' : '' }}>Inactivo</option>
										</select>
									</div>
								</div>
				
							</div>
							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{ route('tasks.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	

							</div>
						</form>
				<br>
				<form action="{{action('TasksController@destroy', $tasks->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE"> 
                   <button class="btn btn-danger col-xs-12 col-sm-12 col-md-12" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </form>
				 </div>
				</div>

			</div>
		</div>
	</section>
	@endsection