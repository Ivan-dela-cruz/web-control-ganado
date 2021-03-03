<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Income;
use App\Milking;
use App\Estate;
use App\Employ;
use App\Task;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
class DashboardController extends Controller
{

    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function roles(Request $request)
    {
        return view('admin.dashboard.roles.index');
    }


    public function users()
    {
        return view('admin.dashboard.users.index');
    }
    public function deliveries()
    {
         return view('admin.dashboard.deliveries.index');
    }


    public function periods()
    {
        return view('admin.dashboard.periods.index');
    }


    public function courses()
    {
        return view('admin.dashboard.courses.index');
    }


    public function students()
    {
        return view('admin.dashboard.students.index');
    }
     public function companies()
    {
        return view('admin.dashboard.companies.index');
    }

    public function estates()
    {
        return view('admin.dashboard.estates.index');

    }
    public function employes()
    {
        return view('admin.dashboard.employes.index');

    }
    public function veterinaries()
    {
        return view('admin.dashboard.veterinaries.index');

    }
    public function treatments()
    {
        return view('admin.dashboard.treatments.index');

    }
    public function diseases()
    {
        return view('admin.dashboard.diseases.index');

    }
    public function animals()
    {
        return view('admin.dashboard.animals.index');

    }
    public function mastitis()
    {
        return view('admin.dashboard.mastitis.index');

    }

    public function animalProduction()
    {
        return view('admin.dashboard.animals_production.index');

    }

    public function list_purchases()
    {
        return view('admin.dashboard.purchases.list');
    }

    public function purchases()
    {
        return view('admin.dashboard.purchases.index');
    }

    public function sales()
    {
        return view('admin.dashboard.sales.index');
    }

    public function list_sales()
    {
        return view('admin.dashboard.sales.list');
    }
    public function checkups()
    {
        return view('admin.dashboard.checkups.index');
    }
    public function aminalProductions()
    {
        return view('admin.dashboard.production.index');
    }
    public function milkingList()
    {
        return view('admin.dashboard.production.milkings');
    }
    public function tasks_employees()
    {
        return view('admin.dashboard.employes.tasks');
    }

    public function downloadapk()
    {
        $url_apk= "apk/control.apk";
        $name_pdf = "control.apk";
        return response()->download($url_apk,$name_pdf ,[
            'Content-Type'=>'application/vnd.android.package-archive',
            'apk' => 'application/vnd.android.package-archive',
            'jar' => 'application/java-archive'
        ]) ;
        
    }

    public function getPdfIncome($id)
    {
       $income = Income::find($id);


       $details = Milking::where('income_id',$income->id)->get();
        $estate = $income->estate;

       
       $pdf = PDF::loadView('pdf.income', compact('income', 'details','estate'));
       $nombrePdf = 'reporte-ordenio-' . $income->id . '.pdf';

       return $pdf->download($nombrePdf);
    }

    public function getPdfListIncomes(Request $request)
    {
        
        $timeWhere = $request->query('timeWhere');
        $estate_filter= $request->query('estate_filter');
        $search= $request->query('search');
        
      

        $estate = Estate::find($estate_filter);
        $now = Carbon::now();
        $incomes = null;
        switch($timeWhere){

            case 'day':
                $time = $now->day;
                $incomes = Income::where('estate_id', $estate_filter)
                ->whereDay('created_at',$time)
                ->get();
                break;
            case 'yesterday':
                $now = Carbon::yesterday();
                $time = $now->day;
            
                $incomes = Income::where('estate_id', $estate_filter)
                ->whereDay('created_at',$time)
                ->get();
            
                break;
            case 'week':
                $time = $now->startOfWeek()->format('Y-m-d');

                $incomes = Income::where('estate_id', $estate_filter)
                ->whereBetween('created_at',[Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->get();
                break;
            case 'month':
                $time = $now->month;
                $incomes = Income::where('estate_id', $estate_filter)
                ->whereMonth('created_at',$time)
                ->get();
            
                break;
            case 'year':
                $time = $now->year;
                $incomes = Income::where('estate_id', $estate_filter)
                ->whereYear('created_at',$time)
                ->get();
                break;
            case '':
                $time = "";
                $incomes = Income::where('estate_id', $estate_filter)
                ->get();
                break; 
        }


    
        $pdf = PDF::loadView('pdf.list_incomes', compact('incomes','estate','timeWhere'));
        $nombrePdf = 'reporte-lista-ordenio-' . time() . '.pdf';
 
        return $pdf->download($nombrePdf);
        
    }


    public function getWeekTaskByEmploye($id)
    {
        $now = Carbon::now();
        $employee = Employ::find($id);

        $tasks = Task::whereBetween('created_at',[Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();

      
        $pdf = PDF::loadView('pdf.report_weeks', compact('employee','tasks'));
        $nombrePdf = 'reporte-lista-tareas-semanal-' . time() . '.pdf';
 
        return $pdf->download($nombrePdf);
    }


}

