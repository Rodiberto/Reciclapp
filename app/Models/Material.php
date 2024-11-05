<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'description', 'material_category_id', 'weight', 'value', 'code'];

    public function category()
    {
        return $this->belongsTo(MaterialCategory::class, 'material_category_id');
    }

    public function elements()
    {
        return $this->belongsToMany(Element::class, 'materials_has_element', 'material_id', 'element_id');
    }
}
