<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Shetabit\Visitor\Traits\Visitor;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Visitor, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'genre_id',
        'affiliation_id',
        'company_id',
        'photo',
        'scholarity_id',
        'telephone',
        'cell',
        /** documents */
        'birth',
        'first_parent',
        'second_parent',
        'civil_status',
        'children',
        'nationality',
        'document_person',
        'document_registry',
        'issuer',
        'date_issue',
        'work_card',
        'serie',
        /** address */
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'state',
        'city',
        /** social networks */
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'youtube',
        'whatsapp',
        'telegram',
        'discord',
        'document_person',
        'document_registry',
        'issuer',
        'date_issue',
        'work_card',
        'serie',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /** Relationships */
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function affiliation()
    {
        return $this->belongsTo(Affiliation::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scholarity()
    {
        return $this->belongsTo(Scholarity::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function vacancies()
    {
        return $this->hasMany(Post::class);
    }

    public function acadmics()
    {
        return $this->hasMany(Academic::class);
    }

    public function extra()
    {
        return $this->hasMany(Extra::class);
    }

    public function composing()
    {
        return $this->hasOne(Composing::class);
    }

    public function requiriment()
    {
        return $this->hasMany(Requiriment::class);
    }

    /** Aux */
    public function age()
    {
        return Carbon::parse($this->attributes['birth'])->age;
    }
}
