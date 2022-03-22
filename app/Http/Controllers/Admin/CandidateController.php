<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CandidateRequest;
use App\Models\Candidate;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    public function candidateStore(CandidateRequest $request)
    {
        if (!Auth::user()->hasRole('Estagiário')) {
            abort(403, 'Acesso não autorizado');
        }

        $vacancy = Vacancy::where('id', $request->vacancy_id)->first();

        if (empty($vacancy->id)) {
            abort(403, 'Acesso não autorizado');
        }

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $candidate = Candidate::create($data);

        if ($candidate) {
            return redirect()
                ->route('admin.vacancies.show', ['vacancy' => $vacancy->id])
                ->with('success', 'Candidatura realizada!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao candidatar!');
        }
    }

    public function candidateCancel(CandidateRequest $request)
    {
        if (!Auth::user()->hasRole('Estagiário')) {
            abort(403, 'Acesso não autorizado');
        }

        $vacancy = Vacancy::where('id', $request->vacancy_id)->first();

        if (empty($vacancy->id)) {
            abort(403, 'Acesso não autorizado');
        }

        $candidate = Candidate::where('vacancy_id', $vacancy->id)
            ->where('user_id', Auth::user()->id)->first();

        if ($candidate->delete()) {
            return redirect()
                ->route('admin.vacancies.show', ['vacancy' => $vacancy->id])
                ->with('success', 'Candidatura cancelada!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao cancelar!');
        }
    }
}
