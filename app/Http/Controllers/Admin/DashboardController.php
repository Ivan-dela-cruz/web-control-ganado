<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}

