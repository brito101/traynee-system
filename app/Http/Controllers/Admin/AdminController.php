<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $administrators = User::role('Administrador')->get();
        $companies = Company::all();
        $businessmen = User::role('Estagiário')->get();
        $interns = User::role('Empresário')->get();
        return view('admin.home.index', compact('administrators', 'companies', 'businessmen', 'interns'));
    }
}
