<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Affiliation;
use App\Models\Post;
use App\Models\User;
use App\Models\Vacancy;
use App\Models\Views\Visit;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {

        if (Auth::user()->hasRole('Estagiário')) {
            return redirect()->route('admin.curriculum.show');
        }

        $onlineUsers = User::online()->count();
        $administrators = User::role('Administrador')->count();
        $affiliates = User::role('Franquiado')->count();
        $affiliations = Affiliation::count();


        if (Auth::user()->hasRole('Franquiado')) {
            $companies = Company::where('institution', 'Não')->where('affiliation_id', Auth::user()->affiliation_id)->get();
            $businessmen = User::role('Empresário')->where('affiliation_id', Auth::user()->affiliation_id)->count();
            $vacancies = Vacancy::whereIn('company_id', $companies->pluck('id'))->get();
            $trainee = User::role('Estagiário')->whereIn('state', $companies->pluck('state'))->orderBy('created_at', 'desc')->get();
        } elseif (Auth::user()->hasRole('Empresário')) {
            $companies = Company::where('institution', 'Não')->where('id', Auth::user()->company_id)->first();
            $businessmen = User::role('Empresário')->where('company_id', Auth::user()->company_id)->count();
            $vacancies = Vacancy::where('company_id', Auth::user()->company_id)->count();
            $trainee = User::role('Estagiário')->whereIn('state', $companies->pluck('state'))->orderBy('created_at', 'desc')->get();
        } else {
            $companies = Company::where('institution', 'Não')->get();
            $vacancies = Vacancy::all();
            $businessmen = User::role('Empresário')->count();
            $trainee = User::role('Estagiário')->orderBy('created_at', 'desc')->get();
        }

        $posts = Post::orderBy('created_at', 'desc')->take(6)->get();

        $access = Visit::where('created_at', '>=', date("Y-m-d"))
            ->where('url', '!=', route('admin.home.chart'))
            ->get();
        $accessYesterday = Visit::where('created_at', '>=', date("Y-m-d", strtotime('-1 day')))
            ->where('created_at', '<', date("Y-m-d"))
            ->where('url', '!=', route('admin.home.chart'))
            ->count();

        $totalDaily = $access->count();

        $percent = 0;
        if ($accessYesterday > 0) {
            $percent = number_format((($totalDaily - $accessYesterday) / $totalDaily * 100), 2, ",", ".");
        }

        /**Visitor Chart */
        $data = $access->groupBy(function ($reg) {
            return date('H', strtotime($reg->created_at));
        });

        $dataList = [];
        foreach ($data as $key => $value) {
            $dataList[$key . 'H'] = count($value);
        }

        $companiesList = [];

        foreach ($companies as $company) {
            if (Arr::accessible($company)) {
                $companiesList[$company->alias_name] = $company->vacancy->count();
            }
        }

        $chart = new \stdClass();
        $chart->labels = (array_keys($dataList));
        $chart->dataset = (array_values($dataList));
        $chart->companiesLabel = (array_keys($companiesList));
        $chart->companiesData =  (array_values($companiesList));

        return view('admin.home.index', compact(
            'administrators',
            'affiliates',
            'affiliations',
            'companies',
            'businessmen',
            'trainee',
            'vacancies',
            'posts',
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
        $accessYesterday = Visit::where('created_at', '>=', date("Y-m-d", strtotime('-1 day')))
            ->where('created_at', '<', date("Y-m-d"))
            ->where('url', '!=', route('admin.home.chart'))
            ->count();

        $totalDaily = $access->count();

        $percent = 0;
        if ($accessYesterday > 0) {
            $percent = number_format((($totalDaily - $accessYesterday) / $totalDaily * 100), 2, ",", ".");
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
