<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conf extends Model
{
    use HasFactory;

    protected $table = 'conf';
    protected $fillable = ['meta_key','meta_value'];

}
