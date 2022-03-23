<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CurriculumController extends Controller
{
    public function show()
    {
        if (!Auth::user()->hasPermissionTo('Visualizar Currículo')) {
            abort(403, 'Acesso não autorizado');
        }

        $user = User::where('id', Auth::user()->id)->first();

        return view('admin.curriculums.curriculum', compact('user'));
    }
}
