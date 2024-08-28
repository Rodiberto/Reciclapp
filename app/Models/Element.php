<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;
    protected $fillable = ['materials_name','amount', 'unit', 'material_type', 'bag_id'];

    public function bag()
    {
        return $this->belongsTo(Bag::class);
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class, 'materials_has_element');
    }
    
}
