@extends('layouts.app')
@section('content')

		<div class="row">
			<div class="col-12">
				<a  class="btn btn-info" href="/listUser">
					Utilisateurs
				</a>
				<a class="btn btn-info" href="/etudiant/index">
					Etudiants
				</a>
				<a class="btn btn-info" href="/niveaux">
					Niveaux
				</a>
			</div>  
		</div> 
	<p>&nbsp</p>
	<p>&nbsp</p>
	
	@if ($message = Session:: get('success'))
		<div class="alert alert-success">
			<p> {{  $message }}</p>
		</div>


	@endif
	<div class="row">
		<div class="card" style="margin-left:200px">
			<div class="card-header">
				<h2>Niveaux</h2>
			</div>
			
			<div class="card-body">
				<a href="{{route('niveaux.create')}}" class="btn btn-primary">
					Nouveau
				</a>

				<table id="example" class="table table-responsive">
					<thead>
						<tr>	
							<th with="80px">No</th>
							<th>Libelle</th>
							<th>Action	</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($niveau as $key => $value)
							<tr>
								<td>{{$value->id}}</td>
								<td>{{$value->libelle}}</td>	
								<td>										
									<a href="{{route('niveaux.edit',$value->id)}}" class="btn btn-success btn-sm">
										Edit
									</a>
								</td>
								<td>	
									{{ Form::open(['method' => 'DELETE','route' => ['niveaux.destroy', $value->id]]) }}
										<button type="submit" class="btn btn-danger" >
											Delete
										</button>

									{{ Form::close() }}
								</td>


							</tr>
						@endforeach 
						
					</tbody>
				
				</table>
			</div>
		</div>
	</div>	

@endsection