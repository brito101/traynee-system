<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Affiliation;
use App\Models\Candidate;
use App\Models\User;
use App\Models\Vacancy;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Shetabit\Visitor\Models\Visit;

class AdminController extends Controller
{
    public function index()
    {
        $onlineUsers = User::online()->get()->count();
        $administrators = User::role('Administrador')->get()->count();
        $affiliates = User::role('Franquiado')->get()->count();
        $companies = Company::all()->count();
        $cadidates = Candidate::all();
        $vacancies = Vacancy::all();

        $affiliations = Affiliation::all()->count();
        $businessmen = User::role('Empresário')->count();
        if (Auth::user()->hasRole('Franquiado')) {
            $companies = Company::where('affiliation_id', Auth::user()->affiliation_id)->count();
            $businessmen = User::role('Empresário')->where('affiliation_id', Auth::user()->affiliation_id)->count();
        }

        $trainee = User::role('Estagiário')->get()->count();

        $access = Visit::where('created_at', '>=', date("Y-m-d"))
            ->where('url', '!=', route('admin.home.chart'))
            ->get();
        $accessYesterday = Visit::where('created_at', '>=', Carbon::now()->subDays(1))
            ->where('created_at', '<', Carbon::now())
            ->where('url', '!=', route('admin.home.chart'))
            ->get();

        if ($accessYesterday->count() > 0) {
            $percent = number_format((($access->count() - $accessYesterday->count()) / $access->count() * 100), 2, ",", ".");
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
            'affiliates',
            'affiliations',
            'companies',
            'businessmen',
            'trainee',
            'vacancies',
            'cadidates',
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
        $accessYesterday = Visit::where('created_at', '>=', Carbon::now()->subDays(1))
            ->where('created_at', '<', Carbon::now())
            ->where('url', '!=', route('admin.home.chart'))
            ->get();

        if ($accessYesterday->count() > 0) {
            $percent = number_format((($access->count() - $accessYesterday->count()) / $access->count() * 100), 2, ",", ".");
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
