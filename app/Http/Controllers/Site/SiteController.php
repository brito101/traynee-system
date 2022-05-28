<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Affiliation;
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
        $vacancies = Vacancy::orderBy('created_at', 'desc')->take(6)->get();
        $posts = Post::orderBy('created_at', 'desc')->take(2)->get();
        return view('site.home.index', compact('head', 'vacancies', 'posts'));
    }

    public function vacancies()
    {
        $head = new stdClass();
        $head->title = env('APP_NAME') . ' - Vagas';
        $head->description = 'Confira as vagas disponíveis na ' .  env('APP_NAME');
        $vacancies = Vacancy::orderBy('created_at', 'desc')->paginate(10);
        return view('site.vacancy.index', compact('head', 'vacancies'));
    }

    public function vacancy($slug)
    {
        $head = new stdClass();
        $head->title = env('APP_NAME');
        $head->description = 'Confira as vagas disponíveis na ' .  env('APP_NAME');
        $vacancy = Vacancy::where('slug', $slug)->first();
        if (empty($vacancy->id)) {
            abort(404, 'Página não encontrada');
        }

        return view('site.vacancy.page', compact('head', 'vacancy'));
    }
}
