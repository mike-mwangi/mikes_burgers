@extends('layouts.app')

@section('title')
Mikes_Burgers

@endsection

@section('content')






<body style="margin: 0px;">
    <!-- <ul>
        <img src="{{asset('img/burger_logo.png')}}" width="150px;" height="100px;" alt="" style="margin-left: 10px" />
        @if (Route::has('login'))
        <li>
            @auth
            <a href="{{ url('/home') }}">Home</a>
            <a href="{{ url('#burgers') }}">Menu</a>

            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <a style="padding: 20px; background-color:#4ebafe" disabled>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            @else
            <a href="{{ url('#burgers') }}">Menu</a>

            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endif
        </li>
        @endif

    </ul> -->

    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://cdn.pixabay.com/photo/2016/11/19/12/44/burgers-1839090__480.jpg" height="750px;" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>
                        <p style="color: white; text-align: center; font-size: 30px">
                            🤩 Welcome to <em>Burger Place</em> 🤩
                        </p>
                    </h5>
                    <h4>👨🏽‍🍳 For the best burgers in town 🍔</h4>

                </div>
            </div>
            <div class="carousel-item">
                <img src="https://cdn.pixabay.com/photo/2017/11/06/21/42/burger-2924978__480.jpg" height="750px;" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>We have amazing offers and deals for you.</h5>

                </div>
            </div>
            <div class="carousel-item">
                <img src="https://cdn.pixabay.com/photo/2020/09/16/20/59/hamburger-5577498__480.jpg" height="750px;" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Get your burgers at affordable prices.</h5>

                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <section id="burgers">
        <div class="container">
            <h3 class="my-4"><strong>Burgers on our menu</strong></h3>
            <div class="row">
                @foreach($burgers as $burger)

                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="{{asset('uploads/burgerImages/' . $burger->burger_image)}}" width="auto;" height="300px;" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">{{$burger->burger_name}}</a>
                            </h4>
                            <p class="card-text">{{$burger->burger_description}}</p>
                            @if (Route::has('login'))
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Price: </span>
                                </div>

                                <div class="input-group-append">
                                    <span class="input-group-text">{{$burger->burger_price}}</span>
                                </div>
                            </div>
                            @auth

                            <a class="btn btn-primary btn-lg" href="{{ route('login') }}">Purchase</a>
                            @else

                            <a class="btn btn-primary btn-lg" href="{{ route('login') }}">Sign in to purchase</a>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRO5N0fw6rEg9-s6cXzZsxQemb6n8w8vB60fQ&usqp=CAU" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Beef Burger </a>
                            </h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                            @if (Route::has('login'))
                            @auth
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Quantity:</span>
                                </div>
                                <input type="text" class="form-control" name="quantity">
                                <div class="input-group-append">
                                    <span class="input-group-text"></span>
                                </div>
                            </div>
                            <a class="btn btn-primary btn-lg" href="{{ route('login') }}">Purchase</a>
                            @else

                            <a class="btn btn-primary btn-lg" href="{{ route('login') }}">Sign in to purchase</a>
                            @endif
                            @endif
                        </div>
                    </div>
                </div> -->






            </div>
    </section>
</body>
<footer class="footer">©️ Copyright 2020 Burger Place</footer>
@endsection








<style>
    html {
        scroll-behavior: smooth;
    }

    .footer {
        padding-top: 20px;
        padding-bottom: 20px;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: grey;
        color: white;
        text-align: center;
    }
</style>


<script>
    $("#link").click(function() {
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 1000);
    });
</script>