<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\BookRepository;

class ComputePenalty extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'penalty:compute';

    /**
     * The console command description.
     *  
     * @var string
     */
    protected $description = 'Computes the penalty for unreturned books after the set expiry date.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(BookRepository $books)
    {
        parent::__construct();

        $this->books = $books;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->books->computePenalty();
    }
}
