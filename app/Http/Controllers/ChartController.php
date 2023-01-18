<?php
namespace App\Http\Controllers;
use App\Charts\ExpensesChart;
use Illuminate\Http\Request;
class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ExpensesChart $chart)
    {
        return view('charts.expenses.index', ['chart' => $chart->build()]);   
    }
}