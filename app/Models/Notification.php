<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notification';
    
    protected $fillable = ['description','requests_id', 'date_sent', 'status'];

    public function request()
    {
        return $this->belongsTo(Requests::class);
    }
}
