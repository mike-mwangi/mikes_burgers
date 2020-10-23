@section('title', 'Users')

@extends('layouts.master')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">Users</div>

        <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Address</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <input type="hidden" class="deleteValue" value="{{$user->id}}">
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->contact}}</td>
                        <td>{{$user->address}}</td>

                        <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                        <td>
                            @can('edit-users')
                            <a href="{{route('admin.users.edit', $user->id)}}"><button type="button" class="btn btn-primary float-right">Edit</button></a>
                            @endcan

                            @can('delete-users')
                            <form action="{{route('admin.users.destroy', $user)}}" method="POST" class="float-left">
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


</div>
@endsection


@section('script')
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
                            url: '/admin/users/' + delete_id,
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

@endsection