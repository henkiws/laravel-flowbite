<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCouple extends Model
{
    use HasFactory;

    protected $table = 'event_couple';
    protected $fillable = ['fk_event','type','name','child','father','mother',
                    'photo','instagram','facebook','twitter','created_by',
                    'nickname','address'];
}
