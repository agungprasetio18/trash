<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuid;

class Village extends Model
{
    use HasFactory, Uuid, SoftDeletes;

    protected $primaryKey = "id";
    protected $keyType = 'string';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name'
    ];
}
