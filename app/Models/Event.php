<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'date', 'organisateur_id', 'category_id', 'location_id', 'available_seats' ,'image' ,'accept_reservations' , 'accept_admin'];

    public function organisateur()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }


    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
