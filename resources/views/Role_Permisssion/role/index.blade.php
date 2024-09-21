@extends('layout.master')
@section('content')
@include('Role_Permisssion.nav-link')
    <div class=" container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                    @endif
                <div class="card mt-3">
                    <div class="card-header">
                        <h4 >
                            Role
                            <a href="{{url('roles/create')}}" class="btn btn-success text-black float-end">Add Role</a>

                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $index => $role)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{$role -> name}}</td>
                                <td>
                                    <a href="{{url('roles/'.$role-> id.'/give-permission')}}" class="btn btn-info">Add/Edit Role Permission</a>
                                    @can('update role')
                                    <a href="{{url('roles/'.$role-> id.'/edit')}}" class="btn btn-info">Edit</a>
                                    @endcan
                                    @can('delete role')
                                    <a href="{{url('roles/'.$role-> id.'/delete')}}" class="btn btn-danger">Delete</a>
                                        @endcan
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection