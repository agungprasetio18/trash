<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Member extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    protected $primaryKey = "id";
    protected $keyType = 'string';
    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'gender', 'phone', 'address', 'village_id'];

    public function village()
    {
    	return $this->belongsTo(Village::class);
    }

}
