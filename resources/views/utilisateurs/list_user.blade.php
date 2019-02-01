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

    <div class="row">
        <div class="card" style="margin-left:200px">
            <div class="card-header">
            <h2> Utilisateurs</h2>
            </div>
            
            <div class="card-body">   
                    <a class="btn btn-primary" href="{{ route('register') }}">Nouveau Utilisateur</a>
                
                @if (count($users) > 0)
                    <table class="table table-responsive">
                        <thead>
                            <th with="80px">No</th>
                            <th>Prenom</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </thead>
                        <tbody>

                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->prenom }}</td>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role_id }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('user_edit', ['id' => $user->id ] ) }}">
                                        edit
                                    </a>
                                    <a class="btn btn-danger" href="{{ route('deleteUser', ['id' => $user->id ] ) }}">
                                        delete
                                    </a>
                                </td> 
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-danger">
                        <strong>Pas de demandes dans la base de données</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>    
    
@endsection
