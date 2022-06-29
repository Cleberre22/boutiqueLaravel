@extends('layout')
@section('content')
<form class="my-5 row" method="POST" action="{{ route('admin.categories.update', $categorie->id) }}">
    @csrf
    @method('PATCH')
    <h1 class="text-center col-12">Editer une catégorie</h1>

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

    <div class="mb-3 col-12">
        <label for="name" class="form-label">Nom de la catégorie</label>
        <input type="text" class="form-control" value="{{$categorie->name}}" name="name" id="name" aria-describedby="nameHelp">
    </div>
    <div class="mb-3 col-12">
        <label for="name" class="form-label">En avant</label>
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="ahead" value="{{$categorie->ahead}}">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
@endsection
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>