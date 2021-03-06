@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Liste des catégories</h3>
                        <a href="{{ route('admin.categories.create')}}" class="btn btn-primary btn-sm mb-3">Ajouter</a>
                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                        @endif

                        <!-- Tableau -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">En avant</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $categorie)
                                <tr>
                                    <td>{{$categorie->id}}</td>
                                    <td>{{$categorie->name}}</td>
                                    <td><input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="ahead" value="{{$categorie->ahead}}"></td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', $categorie->id)}}" class="btn btn-primary btn-sm"">Editer</a>
                                        <form action=" {{ route('admin.categories.destroy', $categorie->id)}}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"" type=" submit">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- Fin du Tableau -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection