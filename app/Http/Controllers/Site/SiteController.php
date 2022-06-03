<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Affiliation;
use App\Models\Company;
use App\Models\Post;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Meta;

class SiteController extends Controller
{

    public function index()
    {
        Meta::set('title', env('APP_NAME'));
        Meta::set('robots', 'index,follow');
        Meta::set('description', 'AGENTE INTEGRADOR entre Escola/Universidade e empresa');
        Meta::set('image', asset('img/hanshake-1400x700.jpg'));
        $vacancies = Vacancy::orderBy('created_at', 'desc')->take(3)->get();
        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        return view('site.home.index', compact('vacancies', 'posts'));
    }

    public function vacancies()
    {
        Meta::set('title', env('APP_NAME') . ' - Vagas');
        Meta::set('robots', 'index,follow');
        Meta::set('description', 'Vagas de estágio dissponíveis na ' . env('APP_NAME'));
        Meta::set('image', asset('img/hanshake-1400x700.jpg'));
        $vacancies = Vacancy::orderBy('created_at', 'desc')->paginate(9);
        return view('site.vacancies.index', compact('vacancies'));
    }

    public function vacancy($slug)
    {

        $vacancy = Vacancy::where('slug', $slug)->first();
        if (empty($vacancy->id)) {
            abort(404, 'Página não encontrada');
        }

        $vacancy->views += 1;
        $vacancy->update();

        $vacancies = Vacancy::whereNotIn('id', [$vacancy->id])->inRandomOrder()->limit(3)->get();

        Meta::set('title', env('APP_NAME') . ' - ' . $vacancy->title);
        Meta::set('robots', 'index,follow');
        Meta::set('description', $vacancy->description);
        Meta::set('image', $vacancy->brand_facebook ? url('storage/vacancies/' . $vacancy->brand_facebook) : asset('img/hanshake-1400x700.jpg'));
        return view('site.vacancies.item', compact('vacancy', 'vacancies'));
    }
}
