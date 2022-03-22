<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Vacancy extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'slug',
        'courses',
        'scholarity_id',
        'description',
        'benefits',
        'experience',
        'period',
        'requirements',
        'neighborhood',
        'state',
        'city',
        'brand_facebook',
        'brand_instagram',
        'brand_twitter',
        'company_id',
        'user_id',
        'views'
    ];

    /** Relationships */
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Anônimo',
        ]);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scholarity()
    {
        return $this->belongsTo(Scholarity::class);
    }

    public function candidate()
    {
        return $this->hasMany(Candidate::class);
    }

    /** Aux */
    public function trainee()
    {
        $candidate = Candidate::where('vacancy_id', $this->id)
            ->where('user_id', Auth::user()->id)->first();
        if ($candidate) {
            return '<i class="text-success fa fa-lg fa-thumbs-up"></i>';
        } else {
            return '<i class="text-danger fa fa-lg fa-thumbs-down"></i>';
        }
    }
}
