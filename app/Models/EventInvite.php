<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventInvite extends Model
{
    use HasFactory;

    protected $table = 'event_invite';
    protected $fillable = ['fk_event','fk_event_couple','name','address','created_by'];

    public function data_groom() {
        return $this->hasOne(EventCouple::class,'id','fk_event_couple')->where('type','groom');
    }

    public function data_bride() {
        return $this->hasOne(EventCouple::class,'id','fk_event_couple')->where('type','bride');
    }
}
