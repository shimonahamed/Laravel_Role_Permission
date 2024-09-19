@extends('layout.master')
@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 >
                            Create User
                            <a href="{{url('users')}}" class="btn btn-danger text-black float-end">Back</a>

                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('users')}}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label> Name</label>
                                <input type="text" name="name" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label>Roles</label>
                                <select name="roles[]" class="form-control" multiple>
                                    <option value="">select Role</option>
                                    @foreach($roles as $role)
                                    <option value="{{$role}}">{{$role}}</option>
                                        @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-success text-black">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection