@section('title', 'Users')

@extends('layouts.master')
@section('content')

<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>

<div class="col-md-12">
    <div class="card card-plain table-plain-bg">
        <div class="card-header ">
            <h4 class="card-title">Orders</h4>
        </div>
        <div class="card-body table-full-width table-responsive">
            <table class="table table-hover">

                <thead>
                    <th>ID</th>
                    <th>Order number</th>
                    <th>Status</th>
                    <th>Burgers</th>
                    <th>Total</th>
                    <th>Payment Method</th>
                    <th>Shipping Fullname</th>
                    <th>Shipping Address</th>
                    <th>Shipping City</th>
                    <th>Shipping Contact</th>
                </thead>
                <tbody>
                    @foreach($orders as $order)

                    <tr>
                        <input type="hidden"  value="{{$order->id}}">
                        <td>{{$order->id}}</td>
                        <td>{{$order->order_number}}</td>
                        <td>{{$order->status}}</td>
                        <td>{{$order->item_count}}</td>
                        <td>{{$order->total}}</td>
                        <td>{{$order->payment_method}}</td>
                        <td>{{$order->shipping_fullname}}</td>
                        <td>{{$order->shipping_address}}</td>
                        <td>{{$order->shipping_city}}</td>
                        <td>{{$order->shipping_contact}}</td>

                    </tr>

                    @endforeach

                </tbody>

            </table>
        </div>


    </div>

    @endsection

