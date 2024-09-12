<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventGiftSend extends Model
{
    use HasFactory;

    protected $table = 'event_gift_send';
    protected $fillable = ['fk_event','fk_event_gift','gift_type','amount',
                        'receipt_number','note','sender_name'];

}
