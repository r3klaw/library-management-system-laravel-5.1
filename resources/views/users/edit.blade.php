@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit User
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New User Form -->
                    <form action="{{ url('admin/members/' . $user->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <!-- User Details -->
                        <div class="form-group">
                            <label for="user-name" class="col-sm-3 control-label">Name</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="user-name" class="form-control" value="{{ old('name',  isset($user->name) ? $user->name : null) }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user-email" class="col-sm-3 control-label">Email</label>

                            <div class="col-sm-6">
                                <input type="text" name="email" id="user-email" class="form-control" value="{{ old('email',  isset($user->email) ? $user->email : null) }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user-age" class="col-sm-3 control-label">Age</label>

                            <div class="col-sm-6">
                                <input type="text" name="age" id="user-age" class="form-control" value="{{ old('age',  isset($user->age) ? $user->age : null) }}">
                            </div>
                        </div>

                        <!-- Edit User Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-save"></i>Save Changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
