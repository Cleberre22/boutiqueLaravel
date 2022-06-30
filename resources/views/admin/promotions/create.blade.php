@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3 class="text-center mb-5"> Ajouter une promotion</h3>
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
                        <form method="POST" action="{{ route('admin.promotions.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 col-12 form-group">
                                <label>Nom</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3 col-12 form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><span class="hidden-xs">Date de départ</span></label>
                                        <div class="input-group">
                                            <input type="date" name="start_date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>date de fin</label>
                                        <input type="date" name="end_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><span class="hidden-xs">Nouveau prix</span></label>
                                        <div class="input-group">
                                            <input type="number" name="price_promo" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Pourcentage</label>
                                        <input type="number" name="percentage" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <label for="image" class="form-label">Image de la promotion</label>
                                <input type="file" class="form-control" name="image" id="image" aria-describedby="imageHelp">
                            </div>


                            <div class="mb-3 col-12">
                            @foreach($products as $product)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                {{$product->name}}
                                </label>
                            </div>
                            @endforeach
                            </div>




                            <button type="submit" class="btn btn-primary shadow-sm my-3"> Ajouter un produit </button>
                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection