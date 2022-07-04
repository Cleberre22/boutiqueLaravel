@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3 class="text-center mb-5">Modifier une promotion</h3>
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
                        <form method="POST" action="{{ route('admin.promotions.update', $promotion->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3 col-12 form-group">
                                <label>Nom</label>
                                <input type="text" name="name" class="form-control" value="{{$promotion->name}}">
                            </div>
                            <div class="mb-3 col-12 form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" value="{{ $promotion->description }} rows=" 3">{{ $promotion->description }}</textarea>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><span class="hidden-xs">Date de départ</span></label>
                                        <div class="input-group">
                                            <input type="date" name="start_date" class="form-control" value="{{$promotion->start_date}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>date de fin</label>
                                        <input type="date" name="end_date" class="form-control" value="{{$promotion->end_date}}">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <label for="image" class="form-label">Image de la promotion</label>
                                <input type="file" class="form-control" name="image" id="image" aria-describedby="imageHelp" value="{{ $promotion->image }}>
                            </div>


                            <div class=" mb-3 col-12">
                                @foreach($products as $product)
                                <div class="form-check">
{{ dump($product->product) }}
{{ dump($product->id) }}
                                    @if($product->id == $product->product)
                                    <input class="form-check-input" type="checkbox" name="products[]"  value="{{$product->id}}" {{ $product->promotion->id == $promotion->product->id ? 'checked' : null }}"   checked />
                                    @else
                                    <input class="form-check-input" type="checkbox" value="{{ $product->id }}" id="flexCheckDefault" name="products[]" />
                                    @endif
                                    
                                    <label class="form-check-label" for="flexCheckDefault" value="{{$product->id}}" />
                                    {{$product->name}}
                                    </label>
                               
                                </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary shadow-sm my-3">Modifier la promotion</button>
                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection