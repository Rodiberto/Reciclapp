<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollectionPoint extends Model
{
    protected $fillable = ['name', 'address', 'schedule'];

    public function materials()
    {
        return $this->belongsToMany(Material::class);
    }
}
