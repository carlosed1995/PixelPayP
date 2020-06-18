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
					<h3 class="panel-title">Nueva Tarea</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('tasks.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">
										<input type="text" name="title" id="title" class="form-control input-sm" placeholder="Título de la tarea">
									</div>
								</div>
				
							</div>

							<div class="form-group">
								<textarea name="description" class="form-control input-sm" placeholder="Descripción de la tarea"></textarea>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">
										<select name="active" id="active" class="form-control input-sm">
											<option>Seleccione</option>
											<option value="1">Activo</option>
											<option value="0">Inactivo</option>
										</select>
									</div>
								</div>
				
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('tasks.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection