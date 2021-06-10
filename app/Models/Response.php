<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Region;

class Response extends Model
{
    use HasFactory;

    protected $fillable = ['region_id', 'address'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
