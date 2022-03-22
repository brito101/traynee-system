<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
