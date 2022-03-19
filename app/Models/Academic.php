<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Academic extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'scholarity_id',
        'institution',
        'city',
        'state',
        'year',
        'time',
        'graduation',
        'availability',
        'user_id',
    ];
}
