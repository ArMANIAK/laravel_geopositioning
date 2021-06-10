<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Response;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['country', 'region', 'city'];

    public function response()
    {
        return $this->hasMany(Response::class);
    }
}
