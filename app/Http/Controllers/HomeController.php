<?php

namespace App\Http\Controllers;

use App\User;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        return view('customers', compact('users'));
    }


    public function export()
    {
      
        return Excel::download(  new UsersExport(), 'users.xlsx');
    }

    public function import()
    {
        Excel::import(new UsersImport, request()->file('import_file'));
    
        return redirect()->route('home');
       
    }
}
