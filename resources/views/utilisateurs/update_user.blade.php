@extends('layouts.app')

@section('content')
    <div class="row">
        <form action="{{ route('update_user') }}" method="post" class="col-6 offset-3">
            @csrf

            <input type="hidden" name="id" value="{{ $user->id }}" required="required">
            
            <label>Prenom</label>
            <div class="form-group">
                <input type="text" class="form-control" name="prenom" placeholder="prenom" required="required"
                value="{{ $user->prenom }}">
            </div>

            <label>Nom</label>
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="nom" required="required"
                value="{{$user->name}}">
            </div>

            <label>Email</label>
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="email"  required="required"
                value="{{ $user->email}}">
            </div>

                         
            <label>Role</label>
            <div class="form-group">
                    <select name="role_id" id="role_id" class="form-control{{ $errors->has('role_id') ? ' is-invalid' : '' }}" required="required">
                                <option ></option>
                                <option value="Admin" >Admin</option>
                                <option value="Professeur" >Professeur</option>
                                <option value="Etudiants" >Etudiant</option>
                            
                    </select>
                
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
@endsection
