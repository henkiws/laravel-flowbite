<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventGallery extends Model
{
    use HasFactory;

    protected $table = 'event_gallery';
    protected $fillable = ['fk_event','type','name','path','position','active','created_by'];
}
