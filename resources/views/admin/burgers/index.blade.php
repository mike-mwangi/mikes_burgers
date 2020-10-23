@section('title', 'Users')

@extends('layouts.master')
@section('content')

<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>

<div class="col-md-12">
    <div class="card card-plain table-plain-bg">
        <div class="card-header ">
            <h4 class="card-title">Burgers</h4>
        </div>
        <div class="card-body table-full-width table-responsive">
            <table class="table table-hover">

                <thead>
                    <th>ID</th>
                    <th>Burger Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Burger Image</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach($burgers as $burger)

                    <tr>
                        <input type="hidden" class="deleteValue" value="{{$burger->id}}">
                        <td>{{$burger->id}}</td>
                        <td>{{$burger->burger_name}}</td>
                        <td>{{$burger->burger_description}}</td>
                        <td>{{$burger->burger_price}}</td>
                        <td><img src="{{asset('uploads/burgerImages/' . $burger->burger_image)}}" width="auto;" height="70px;" alt="burger_image"></td>

                        <td>
                            @can('edit-burgers')
                            <a href="{{route('admin.burgers.edit', $burger->id)}}"><button type="button" class="btn btn-primary float-right">Edit</button></a>
                            @endcan

                            @can('delete-burgers')
                            <form action="{{route('admin.burgers.destroy', $burger)}}" method="POST" class="float-left">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger deleteBtn">Delete</button>
                            </form>
                            @endcan
                        </td>
                    </tr>

                    @endforeach

                </tbody>

            </table>
        </div>


    </div>

    @endsection

    <script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('.deleteBtn').click(function(e) {
                e.preventDefault();
                var delete_id = $(this).closest('tr').find('.deleteValue').val();
                // alert(delete_id)

                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this data!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({
                                type: "DELETE",
                                url: '/admin/burgers/' + delete_id,
                                data: {
                                    "_token": "{{ csrf_token() }}"
                                },
                                success: function(response) {
                                    swal(response.status, {
                                        icon: "success",
                                    }).then((result) => {
                                        location.reload();
                                    }).catch((err) => {
                                        console.error(err)
                                    });

                                }
                            });


                        }
                    });

            });
        });
    </script>