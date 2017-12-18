<?php

namespace App\Repositories;

use App\Book;

class ReportRepository
{
    /**
     * Get balance summary report
     *
     * @return Collection
     */
    public function balanceSummary()
    {        
        $report = [];
        $books = Book::orderBy('title')->get();

        foreach ($books as $book) {
            $book_loans = Book::find($book->id)->users()->where('status', 1)->count();
            $book->book_loans = $book_loans;
            $book->balance_quantity = $book->quantity - $book_loans;

            $report = array_add($report, $book->id, $book);
        }

        return $report;
    }
}
