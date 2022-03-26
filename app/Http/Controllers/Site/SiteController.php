<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Post;
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
        $companies = Company::all();
        $vacancies = Vacancy::orderBy('created_at', 'desc')->take(3)->get();
        $posts = Post::orderBy('created_at', 'desc')->take(2)->get();
        return view('site.home.index', compact('head', 'vacancies', 'companies', 'posts'));
    }
}
