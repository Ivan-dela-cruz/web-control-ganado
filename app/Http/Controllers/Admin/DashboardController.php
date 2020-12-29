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
    public function subjects()
    {
         return view('admin.dashboard.subjects.index');
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
     public function teachers()
    {
        return view('admin.dashboard.teachers.index');
    }
    public function levels()
    {
        return view('admin.dashboard.levels.index');
    }
    public function tasks()
    {
        return view('admin.dashboard.tasks.index');
    }
    public function files()
    {
        return view('admin.dashboard.file.index');
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

