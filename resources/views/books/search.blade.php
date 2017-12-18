@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Books
                </div>
                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <div>
                        <form action="{{ url('member/books/search') }}" method="GET">
                            {{ csrf_field() }}
                            <input type="input" name="keyword" value="{{ old('keyword') }}" placeholder="Search by title/author">
                        	<button type="submit" id="search-book" class="btn btn-primary">
                                <i class="fa fa-btn fa-search"></i>Search
                            </button>
                        </form>
                    </div><br>

                    <table class="table table-striped book-table">
                        <thead>
                            <th>Title</th>
                            <th>Author</th>
                            <th>ISBN</th>
                            <th>Shelf</th>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td class="table-text"><div>{{ $book->title }}</div></td>
                                    <td class="table-text"><div>{{ $book->author }}</div></td>
                                    <td class="table-text"><div>{{ $book->isbn }}</div></td>
                                    <td class="table-text"><div>{{ $book->shelf_location }}</div></td>
                                    <!-- Borrow Book -->
                                    <td>
                                        <form action="{{ url('member/books/' . $book->id . '/borrow') }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit" id="borrow-book-{{ $book->id }}" class="btn btn-primary">
                                                <i class="fa fa-btn fa-plus"></i>Borrow
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
