<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Report;
use App\Repositories\ReportRepository;

class ReportController extends Controller
{
    /**
     * The report repository instance.
     *
     * @var ReportRepository
     */
    protected $reports;

    /**
     * Create a new controller instance.
     *
     * @param  ReportRepository  $reports
     * @return void
     */
    public function __construct(ReportRepository $reports)
    {
        $this->reports = $reports;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$report = $this->reports->balanceSummary();

        return view('reports.index', [ 'reports' => $report ]);
    }
}
