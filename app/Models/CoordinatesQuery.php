<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Response;

class CoordinatesQuery extends Model
{
    use HasFactory;

    protected $fillable = ['longitude', 'latitude'];
    
    public function response()
    {
        return $this->hasOne(Response::class);
    }
}
