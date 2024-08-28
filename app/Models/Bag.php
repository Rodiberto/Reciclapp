<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bag extends Model
{
    use HasFactory;
    protected $table = 'bag';
    protected $fillable = ['name','weight', 'value', 'container_id'];

    public function container()
    {
        return $this->belongsTo(Container::class);
    }

    public function elements()
    {
        return $this->hasMany(Element::class);
    }
    
}
