<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventLocation extends Model
{
    use HasFactory;

    protected $table = 'event_location';
    protected $fillable = ['fk_event','name','day','time','date','location',
                    'maps','active','created_by','address','is_live','link_live',
                    'map_embed'];
}
