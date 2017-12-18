@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Book
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Book Form -->
                    <form action="{{ url('admin/books') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Book Details -->
                        <div class="form-group">
                            <label for="book-title" class="col-sm-3 control-label">Title</label>

                            <div class="col-sm-6">
                                <input type="text" name="title" id="book-title" class="form-control" value="{{ old('title') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="book-author" class="col-sm-3 control-label">Author</label>

                            <div class="col-sm-6">
                                <input type="text" name="author" id="book-author" class="form-control" value="{{ old('author') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="book-isbn" class="col-sm-3 control-label">ISBN</label>

                            <div class="col-sm-6">
                                <input type="text" name="isbn" id="book-isbn" class="form-control" value="{{ old('isbn') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="book-quantity" class="col-sm-3 control-label">Quantity</label>

                            <div class="col-sm-6">
                                <input type="text" name="quantity" id="book-quantity" class="form-control" value="{{ old('quantity') }}">
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="book-shelf-location" class="col-sm-3 control-label">Shelf Location</label>

                            <div class="col-sm-6">
                                <input type="text" name="shelf_location" id="book-shelf-location" class="form-control" value="{{ old('shelf_location') }}">
                            </div>
                        </div>

                        <!-- Add Book Button -->
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
