<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MaterialCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image'];

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
