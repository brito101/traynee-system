<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Carbon\Carbon;
use Shetabit\Visitor\Models\Visit;

class AdminController extends Controller
{
    public function index()
    {
        $onlineUsers = User::online()->get()->count();
        $administrators = User::role('Administrador')->get()->count();
        $companies = Company::all()->count();
        $businessmen = User::role('Empresário')->get()->count();
        $trainee = User::role('Estagiário')->get()->count();

        $access = Visit::where('created_at', '>=', date("Y-m-d"))->get();
        $accessYesterday = Visit::where('created_at', '=', Carbon::now()->subDays(1))->get();

        if ($accessYesterday->count() > 0) {
            $percent = ($access->count() - 200) / $access->count() * 100;
        } else {
            $percent = 0;
        }

        /**Visitor Chart */
        $data = $access->groupBy(function ($reg) {
            return date('H', strtotime($reg->created_at));
        });

        $dataList = [];
        foreach ($data as $key => $value) {
            $dataList[$key] = count($value);
        }

        $chart = new \stdClass();
        $chart->labels = (array_keys($dataList));
        $chart->dataset = (array_values($dataList));

        return view('admin.home.index', compact(
            'administrators',
            'companies',
            'businessmen',
            'trainee',
            'onlineUsers',
            'access',
            'chart',
            'percent'
        ));
    }
}
