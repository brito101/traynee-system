<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use stdClass;

class SiteController extends Controller
{

    public function index()
    {
        $head = new stdClass();
        $head->title = env('APP_NAME');
        $head->description = 'A melhor agência de estágios do Brasil';

        $vacancies = Vacancy::orderBy('created_at', 'desc')->take(3)->get();
        return view('site.home.index', compact('head', 'vacancies'));
    }
}
