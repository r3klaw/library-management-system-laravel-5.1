@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Books Balance Report
                </div>
                <div class="panel-body">
                    <table class="table table-striped report-table">
                        <thead>
                            <th>Title</th>
                            <th>Author</th>
                            <th>ISBN</th>
                            <th>Quantity</th>
                            <th>Loans</th>
                            <th>Balance</th>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td class="table-text"><div>{{ $report->title }}</div></td>
                                    <td class="table-text"><div>{{ $report->author }}</div></td>
                                    <td class="table-text"><div>{{ $report->isbn }}</div></td>
                                    <td class="table-text"><div>{{ $report->quantity }}</div></td>
                                    <td class="table-text"><div>{{ $report->book_loans }}</div></td>
                                    <td class="table-text"><div>{{ $report->balance_quantity }}</div></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
