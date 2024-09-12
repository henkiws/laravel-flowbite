<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventGift extends Model
{
    use HasFactory;

    protected $table = 'event_gift';
    protected $fillable = ['fk_event','type','fk_bank','account_name','account_number',
                        'account_qr','address','active','amount'];

    public function data_bank() {
        return $this->hasOne(Bank::class,'id','fk_bank');
    }
}
