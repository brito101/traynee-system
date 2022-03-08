<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Franchise;
use App\Models\User;
use Carbon\Carbon;
use Shetabit\Visitor\Models\Visit;

class AdminController extends Controller
{
    public function index()
    {
        $onlineUsers = User::online()->get()->count();
        $administrators = User::role('Administrador')->get()->count();
        $franchisee = User::role('Franqueado')->get()->count();
        $companies = Company::all()->count();
        $franchises = Franchise::all()->count();
        $businessmen = User::role('Empresário')->get()->count();
        $trainee = User::role('Estagiário')->get()->count();

        $access = Visit::where('created_at', '>=', date("Y-m-d"))
            ->where('url', '!=', route('admin.home.chart'))
            ->get();
        $accessYesterday = Visit::where('created_at', '=', Carbon::now()->subDays(1))
            ->where('url', '!=', route('admin.home.chart'))
            ->get();

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
            $dataList[$key . 'H'] = count($value);
        }

        $chart = new \stdClass();
        $chart->labels = (array_keys($dataList));
        $chart->dataset = (array_values($dataList));

        return view('admin.home.index', compact(
            'administrators',
            'franchises',
            'franchisee',
            'companies',
            'businessmen',
            'trainee',
            'onlineUsers',
            'access',
            'chart',
            'percent'
        ));
    }

    public function chart()
    {
        $onlineUsers = User::online()->get()->count();

        $access = Visit::where('created_at', '>=', date("Y-m-d"))
            ->where('url', '!=', route('admin.home.chart'))
            ->get();
        $accessYesterday = Visit::where('created_at', '=', Carbon::now()->subDays(1))
            ->where('url', '!=', route('admin.home.chart'))
            ->get();

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
            $dataList[$key . 'H'] = count($value);
        }

        $chart = new \stdClass();
        $chart->labels = (array_keys($dataList));
        $chart->dataset = (array_values($dataList));

        return response()->json([
            'percent' => $percent,
            'onlineUsers' => $onlineUsers,
            'access' => $access->count(),
            'chart' => $chart
        ]);
    }
}
