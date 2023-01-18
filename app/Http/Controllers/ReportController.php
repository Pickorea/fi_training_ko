<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reports\MyReport;
use \koolreport\excel\ExcelExportable;
use App\Models\Url;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportTrainingAttendance;
use App\Exports\ExportTrainingAttendanceTable;
use PDF;
use DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $report = new MyReport;
        $report->run();
        // dd($report->render());
        return view("reports.trainings.training_attendance")->withReport($report);
    }

    public function _repo()
    {
                $urls = Url::select('name','url')->get();
        // dd($route);

        return view("reports._repo")->withUrls($urls);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function excel()
    {
        $report = new MyReport;
        $report->run()->exportToExcel()->toBrowser("myreport.xlsx");
    }

    public function exportTrainingAttendance(Request $request){
        
        return Excel::download(new ExportTrainingAttendance, 'Training_attendance.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
    public function export() 
    {
        return Excel::download(new ExportTrainingAttendanceTable, '_table.xlsx');
    }

    public function generatePDF()
    {
        $trainings = DB::table('islands')
        ->select('trainings.id', 'islands.island_name', 'villages.village_name', 'trainings.training_date', 'training_details.participant_first_name', 'training_details.participant_last_name', 'training_details.age', 'training_details.gender', 'training_types.training_name')
        ->leftJoin('trainings','islands.id','=','trainings.island_id')
        ->leftJoin('training_types','trainings.training_type_id','=','training_types.id')
        ->leftJoin('training_details','trainings.id','=','training_details.training_id')
        ->leftJoin('villages','training_details.village_id','=','villages.id')
        ->whereNotNull('trainings.training_type_id')
        ->whereNotNull('training_details.village_id')
        ->get();

      $pdf = PDF::loadView('reports.trainings._table', ['trainings' => $trainings ])->setPaper('a4', 'landscape');
    
        return $pdf->download('training_attendance.pdf');
    }
}
