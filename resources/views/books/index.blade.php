@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Books -->
            @if ( Auth::user()->is_admin )
	            @if (count($books) > 0)
	                <div class="panel panel-default">
	                    <div class="panel-heading">
	                    	Books
	                    </div>

	                    <!--@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif-->

	                    <div class="panel-body">
		                    <div>
	                        	<a href="{{ url('admin/books/create') }}" class="btn btn-primary">
	                                <i class="fa fa-btn fa-plus"></i>Add New Book
	                            </a>
	                        </div>

	                        <table class="table table-striped book-table">
	                            <thead>
	                                <th>Book</th>
	                                <th>Author</th>
	                                <th>ISBN</th>
	                                <th>Quantity</th>
	                            </thead>
	                            <tbody>
	                                @foreach ($books as $book)
	                                    <tr>
	                                        <td class="table-text"><div>{{ $book->title }}</div></td>
	                                        <td class="table-text"><div>{{ $book->author }}</div></td>
	                                        <td class="table-text"><div>{{ $book->isbn }}</div></td>
	                                        <td class="table-text"><div>{{ $book->quantity }}</div></td>

	                                        <!-- Book Edit Button -->
	                                        <td>
	                                            <form action="{{url('admin/books/' . $book->id . '/edit')}}" method="GET">
	                                                <button type="submit" id="edit-book-{{ $book->id }}" class="btn btn-primary">
	                                                    <i class="fa fa-btn fa-pencil"></i>Edit
	                                                </button>
	                                            </form>
	                                        </td>

	                                        <!-- Book Delete Button -->
	                                        <td>
	                                            <form action="{{url('admin/books/' . $book->id)}}" method="POST">
	                                                {{ csrf_field() }}
	                                                {{ method_field('DELETE') }}

	                                                <button type="submit" id="delete-book-{{ $book->id }}" class="btn btn-danger">
	                                                    <i class="fa fa-btn fa-trash"></i>Delete
	                                                </button>
	                                            </form>
	                                        </td>
	                                    </tr>
	                                @endforeach
	                            </tbody>
	                        </table>
	                    </div>
	                </div>
	            @endif
	        @else
                <div class="panel panel-default">
                    <div class="panel-heading">
                    	My Borrowed Books
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped book-table">
                            <thead>
                                <th>Book</th>
                                <th>Author</th>
                                <th>ISBN</th>
                                <th>Borrowed Date</th>
                                <th>Expiry Date</th>
                                <th>Penalty</th>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td class="table-text"><div>{{ $book->title }}</div></td>
                                        <td class="table-text"><div>{{ $book->author }}</div></td>
                                        <td class="table-text"><div>{{ $book->isbn }}</div></td>
                                        <td class="table-text"><div>{{ $book->pivot->created_at->format('Y-m-d') }}</div></td>
                                        <td class="table-text"><div>{{ $book->pivot->expire_on }}</div></td>
                                        <td class="table-text"><div>{{ $book->pivot->penalty_fee }}</div></td>

                                        <!-- Book Return Button -->
                                        <td>
                                            <form action="{{ url('member/books/' . $book->id . '/return') }}" method="POST">
                                            	{{ csrf_field() }}
                                                <button type="submit" id="return-book-{{ $book->id }}" class="btn btn-primary">
                                                	<i class="fa fa-btn fa-minus"></i>Return
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
	        @endif
        </div>
    </div>
@endsection
