@extends('layouts.app')

@section('content')
<div class="container">
<h2>Checkout</h2>

<form action="{{route('orders.store')}}" method="POST">
    @csrf

    <div class="form-group">
        <label for="">Full Name</label>
        <input type="text" name="shipping_fullname" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="">City</label>
        <input type="text" name="shipping_city" id="" class="form-control">
    </div>



    <div class="form-group">
        <label for="">Full Address</label>
        <input type="text" name="shipping_address" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="">Contact</label>
        <input type="text" name="shipping_contact" id="" class="form-control">
    </div>

    <h4>Payment option</h4>

    <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="payment_method" id="" value="cash_on_delivery">
            Cash on delivery

        </label>

    </div>

    <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="payment_method" id="" value="card" >
            Card
        </label>

    </div>


    <button type="submit" class="btn btn-primary mt-3">Place Order</button>


</form>


@endsection