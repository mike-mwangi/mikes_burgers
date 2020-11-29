@extends('layouts.app')

@section('title')
Mikes_Burgers

@endsection

@section('content')


<body style="margin: 0px;">

    <header>
        <div class="overlay"></div>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
          <source src="{{asset('img/burger-video3.mp4')}}" type="video/mp4">
        </video>
        <div class="container h-100">
          <div class="d-flex h-100 text-center align-items-center">
            <div class="w-100 text-white">
              <h2 class="display-4">🤩 Welcome to <em>Mike's Burgers</em> 🤩</h2>
              {{-- <p class="lead mb-0">With HTML5 Video and Bootstrap 4</p> --}}
              <a href="{{ url('#burgers') }}" class="btn" style="background-color: lightblue;">View our menu >></a>

            </div>
          </div>
        </div>
      </header>


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

                            <a class="btn btn-primary btn-lg" href="{{route('cart.edit', $burger)}}">Add to cart</a>
                            @else

                            <a class="btn btn-primary btn-lg" href="{{ route('login') }}">Sign in to purchase</a>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
    </section>
</body>
<footer class="footer">©️ Copyright 2020 Burger Place</footer>
@endsection








<style>
    html {
        scroll-behavior: smooth;
    }

    .btn {
  text-decoration: none;
  border: 1px solid rgb(146, 148, 248);
  position: relative;
  overflow: hidden;

}

.btn:hover {
  box-shadow: 1px 1px 25px 10px rgba(146, 148, 248, 0.4);
}

.btn:before {
  content: "";
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(
    120deg,
    transparent,
    rgba(146, 148, 248, 0.4),
    transparent
  );
  transition: all 650ms;
}

.btn:hover:before {
  left: 100%;
}


    header {
  position: relative;
  background-color: black;
  height: 86vh;
  min-height: 25rem;
  width: 100%;
  overflow: hidden;
}

header video {
  position: absolute;
  top: 50%;
  left: 50%;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: 0;
  -ms-transform: translateX(-50%) translateY(-50%);
  -moz-transform: translateX(-50%) translateY(-50%);
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
}

header .container {
  position: relative;
  z-index: 2;
}

header .overlay {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background-color: black;
  opacity: 0.5;
  z-index: 1;
}

@media (pointer: coarse) and (hover: none) {
  header {
    background: url('https://source.unsplash.com/XT5OInaElMw/1600x900') black no-repeat center center scroll;
  }
  header video {
    display: none;
  }
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