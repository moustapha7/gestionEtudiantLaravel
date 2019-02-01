@extends('layouts.app')

@section('content')

<div class="row">
    	<div class="card" style="margin-left:200px">
            <div class="card-header">
            	Details de l'Etudiant
            </div>
            
            <div class="card-body">  
				<div class="form-group">
					<strong>Id  : </strong>
					{{ $etudiant->id}}
				</div>

				<div class="form-group">
					<strong>Nom :</strong>
					{{$etudiant->prenom}}
				</div>
		
				<div class="form-group">
					<strong>Nom :</strong>
					{{$etudiant->nom}}
				</div>
		
				<div class="form-group">
					<strong>Adresse :</strong>
					{{$etudiant->adresse}}
				</div>
		
				<div class="form-group">
					<strong>Date de Naissance :</strong>
					{{$etudiant->dateNaissance}}
				</div>
		
				<div class="form-group">
					<strong>Email :</strong>
					{{$etudiant->email}}
				</div>
		
				<div class="form-group">
					<strong>Telephone :</strong>
					{{$etudiant->telephone}}
				</div>
		
				<div class="form-group">
					<strong>Niveau :</strong>
					{{$etudiant->niveau->libelle}}
				</div>
			</div>
			<a href="{{ route('list_etudiant') }}" class="btn btn-primary" >Retour</a>
		</div>	
   
	
</div>



@endsection