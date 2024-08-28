<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;
    protected $fillable = ['code','status', 'date', 'hour', 'location', 'scheduled_date', 'user_id',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function containers()
    {
        return $this->hasMany(Container::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    
}
