<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'type', 'material_category_id'];

    public function category()
    {
        return $this->belongsTo(MaterialCategory::class, 'material_category_id');
    }
}
