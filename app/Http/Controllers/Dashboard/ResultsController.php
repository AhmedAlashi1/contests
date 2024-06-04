<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\ContestsDataTable;
use App\DataTables\ResultsDataTable;
use App\Http\Controllers\Controller;

class ResultsController extends Controller
{
    public function index(ResultsDataTable $dataTable , $contests_id)
    {
        return $dataTable->withId($contests_id)->render('dashboard.results.index');
    }
}
