@extends('layouts.app')

@section('content')
<div class="container">
<h2>Your cart </h2>

<table class="table" BORDER="2">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cartItems as $item)
        <tr>
        <td scope="row">{{$item->name}}</td>
            <td>
                {{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}
            </td>
            <td >

            <form action="{{route('cart.update', $item->id)}}">
                <input style="width: 100px" type="number" name="quantity" value="{{$item->quantity}}">
                <input type="submit" value="save">

            </form>


            </td>
            <td>
            <a href="{{route('cart.destroy',$item->id)}}" class="btn btn-primary" role="button">Delete</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

<h3>
    Total Price: {{Cart::session(auth()->id())->getTotal()}} Ksh
</h3>
<br/>
<a name="" id="" class="btn btn-primary" href="{{route('home')}}" role="button">Continue Ordering</a>


<a name="" id="" class="btn btn-success" href="{{route('cart.checkout')}}" role="button">Proceed to checkout</a>

</div>
@endsection