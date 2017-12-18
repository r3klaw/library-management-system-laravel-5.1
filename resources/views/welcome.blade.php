@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome!</div>

                <div class="panel-body text-center">
                    <div>
                        <a href="{{ url('login') }}" class="btn btn-primary btn-lg">
                          <span class="glyphicon glyphicon-wrench"></span> Login as Admin
                        </a>
                        <a href="{{ url('login') }}" class="btn btn-success btn-lg">
                          <span class="glyphicon glyphicon-user"></span> Login as Member
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
