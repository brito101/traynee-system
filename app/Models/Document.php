<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'document_person',
        'document_registry',
        'registration',
        'historic',
        'declaration',
        'residence',
        'user_id',
        'status',
        'company_id',
        'editor'
    ];

    /**Relationships */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
