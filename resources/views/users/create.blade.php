@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Member
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New User Form -->
                    <form action="{{ url('admin/members') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- User Details -->
                        <div class="form-group">
                            <label for="user-name" class="col-sm-3 control-label">Name</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="user-name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user-email" class="col-sm-3 control-label">Email</label>

                            <div class="col-sm-6">
                                <input type="text" name="email" id="user-email" class="form-control" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user-age" class="col-sm-3 control-label">Age</label>

                            <div class="col-sm-6">
                                <input type="text" name="age" id="user-age" class="form-control" value="{{ old('age') }}">
                            </div>
                        </div>
                        <!-- Add User Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-save"></i>Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
