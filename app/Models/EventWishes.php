<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventWishes extends Model
{
    use HasFactory;

    protected $table = 'event_wishes';
    protected $fillable = ['fk_event','name','attendance','address','message','active'];
}
