<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;
    protected $table = 'container';
    protected $fillable = ['bag_name','description', 'requests_id'];

    public function request()
    {
        return $this->belongsTo(Requests::class, 'requests_id');
    }

    public function bags()
    {
        return $this->hasMany(Bag::class);
    }
}
