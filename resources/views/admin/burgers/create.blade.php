@section('title')
Users
@endsection


@extends('layouts.master')
@section('content')

<div class="container">
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
        {{Session::put('success',null)}}
    </div>
    @endif

    <form action="{{url('admin/addBurger')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}

        <label for="burger_name"><strong>Burger Name</strong></label>
        <input type="text" id="burger_name" name="burger_name" placeholder="Burger name.." required>

        <label for="burger_price">Burger Price</label><br>
        <input type="number" id="burger_price" name="burger_price" placeholder="Burger Price.." required><br><br>


        <label for="burger_description">Burger Description</label>
        <textarea id="burger_description" name="burger_description" placeholder="Write burger description.." style="height:200px" required></textarea>

        <br/>
        <br/>
        <label for="burger_image">Burger Image</label>
        <input type="file" id="burger_image" name="burger_image">

        <br/>
        <br/>


        <input type="submit" value="Submit">
    </form>
</div>


@endsection


<style>
    input[type=text],
    select,
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }
</style>

