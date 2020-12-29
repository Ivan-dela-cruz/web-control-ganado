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
}

