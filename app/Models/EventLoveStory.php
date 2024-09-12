<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventLoveStory extends Model
{
    use HasFactory;

    protected $table = 'event_love_story';
    protected $fillable = ['fk_event','title','description','date','position',
                    'active','created_by','path'];
}
