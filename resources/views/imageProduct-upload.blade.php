@extends('layout')
@section('content')
<div class="container mt-4">
  @if(session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      <h2>Image Produit</h2>
    </div>
    <div class="card-body">
      <form name="imageProduct-upload" id="imageProduct-upload" method="post" action="{{url('upload')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
          <label for="exampleInputEmail1 mb-1">Veuillez sélectionner une image</label>
          <input type="file" id="imageProduct" name="imageProduct" class="mt-1 @error('imageProduct') is-invalid @enderror form-control">
          @error('imageProduct')
          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Télécharger</button>
      </form>
    </div>
  </div>
</div>


@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3> Ajouter une catégorie</h3>
                        <!-- Message d'information -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- Formulaire -->
                        <form method="POST" action="{{ route('categories.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="ahead" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">En avant</label>
                            </div>

                            <button type="submit" class="btn btn-primary  rounded-pill shadow-sm"> Ajouter une catégorie </button>
                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection