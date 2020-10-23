@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Burger {{$burger->burger_name}}</div>

                <div class="card-body">
                    <form action="{{route('admin.burgers.update', $burger)}}" method="POST" enctype="multipart/form-data">

                        @csrf
                        {{method_field('PUT')}}

                        <div class="form-group row">
                            <label for="burger_name" class="col-md-2 col-form-label text-md-right">Burger Name</label>

                            <div class="col-md-6">
                                <input id="burger_name" type="text" class="form-control @error('burger_name') is-invalid @enderror" name="burger_name" value="{{ $burger->burger_name}}" required autofocus>

                                @error('burger_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="burger_description" class="col-md-2 col-form-label text-md-right">Burger Description</label>

                            <div class="col-md-6">
                                <input id="burger_description" type="text" class="form-control @error('burger_description') is-invalid @enderror" name="burger_description" value="{{ $burger->burger_description}}" required autofocus>

                                @error('burger_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="burger_price" class="col-md-2 col-form-label text-md-right">Burger Price</label>

                            <div class="col-md-6">
                                <input id="burger_price" type="integer" class="form-control @error('burger_price') is-invalid @enderror" name="burger_price" value="{{ $burger->burger_price}}" required autofocus>

                                @error('burger_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="burger_image" class="col-md-2 col-form-label text-md-right">Burger Image</label>

                            <div class="col-md-6">
                                <input type="file" id="burger_image" name="burger_image" value="{{ $burger->burger_image}}">
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection