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
                            Permission
                            <a href="{{url('permission/create')}}" class="btn btn-success text-black float-end">Add Permission</a>

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
                            @foreach($permissions as  $permission)
                            <tr>

                                <td>{{$permission-> id}}</td>
                                <td>{{$permission-> name}}</td>
                                <td>
                                    <a href="{{url('permission/'.$permission-> id.'/edit')}}" class="btn btn-info">Edit</a>
                                    <a href="{{url('permission/'.$permission-> id.'/delete')}}" class="btn btn-danger">Delete</a>
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