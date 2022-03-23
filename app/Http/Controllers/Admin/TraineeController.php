<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->hasPermissionTo('Visualizar Estagiários')) {
            abort(403, 'Acesso não autorizado');
        }

        $trainees = User::role('Estagiário')->orderBy('created_at', 'desc')->paginate(9);
        return view('admin.trainees.index', compact('trainees'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Auth::user()->hasPermissionTo('Visualizar Estagiários')) {
            abort(403, 'Acesso não autorizado');
        }

        $user = User::role('Estagiário')
            ->where('id', $id)->first();

        if (empty($user->id)) {
            abort(403, 'Acesso não autorizado');
        }

        return view('admin.curriculums.curriculum', compact('user'));
    }

    public function vacancy($id)
    {
        if (!Auth::user()->hasPermissionTo('Visualizar Estagiários')) {
            abort(403, 'Acesso não autorizado');
        }

        $vacancies = Vacancy::where('id', $id)->first();

        if (empty($vacancies->id)) {
            abort(403, 'Acesso não autorizado');
        }

        $trainees = User::role('Estagiário')
            ->whereIn('id', $vacancies->candidate->pluck('user_id'))
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('admin.trainees.index', compact('trainees'));
    }
}
