<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Template extends Model
{
    use HasFactory, HasSlug;

    protected $table = 'templates';
    protected $fillable = ['name','slug','description','path','active',
                    'created_by','image','original_price','markup_price',
                    'discount','is_featured','used_count'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
