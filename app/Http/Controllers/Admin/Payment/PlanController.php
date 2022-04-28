<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Payment\PlanRequest;
use App\Models\Payment\Plan;
use App\Services\PagarmeRequestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->hasPermissionTo('Listar Planos de Pagamento')) {
            abort(403, 'Acesso não autorizado');
        }
        $plans = Plan::all();

        return view('admin.payment.plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Criar Planos de Pagamento')) {
            abort(403, 'Acesso não autorizado');
        }

        return view('admin.payment.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanRequest $request)
    {
        if (!Auth::user()->hasPermissionTo('Criar Planos de Pagamento')) {
            abort(403, 'Acesso não autorizado');
        }

        $pagarme = new PagarmeRequestService();
        $data = $request->all();

        $createPagarmePlan = $pagarme->createPlan($data['amount'], $data['interval'], $data['name'], $data['payment_methods'], $data['trial_days']);

        if (isset($createPagarmePlan['errors'])) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro de integração com o Gateway de Pagamento!');
        }

        dd($createPagarmePlan);

        $plan = Plan::create([
            'name' => $createPagarmePlan['name'],
            'code' => $createPagarmePlan['id'],
            'amount' => $createPagarmePlan['items'][0]['pricing_scheme']['price'],
            'interval' => $createPagarmePlan['interval'],
            'trial_days' => $createPagarmePlan['trial_days'],
            'status' => $data['status'],
            'payment_methods' => $data['payment_methods'],
            // 'benefits' => $data['benefits']
        ]);

        dd($plan);

        if ($academic->save()) {
            return redirect()
                ->route('admin.academics.index')
                ->with('success', 'Cadastro realizado!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao cadastrar!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
