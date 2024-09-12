<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Event extends Model
{
    use HasFactory, HasSlug;

    protected $table = 'events';
    protected $fillable = ['name','slug','fk_event_group','fk_template','view_template','is_demo',
                'quotes','event_date','active','created_by','fk_music','title','initial_name','show_prokes',
                'event_expired','is_featured'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function data_groom() {
        return $this->hasOne(EventCouple::class,'fk_event','id')->where('type','groom');
    }

    public function data_bride() {
        return $this->hasOne(EventCouple::class,'fk_event','id')->where('type','bride');
    }

    public function data_group() {
        return $this->hasOne(EventGroup::class,'id','fk_event_group');
    }

    public function data_template() {
        return $this->hasOne(Template::class,'id','fk_template');
    }

    public function data_music() {
        return $this->hasOne(Music::class,'id','fk_music');
    }

    public function data_gallery() {
        return $this->hasMany(EventGallery::class,'fk_event','id')->where('type',1)->orderBy('position','ASC'); // gallery
    }

    public function data_cover() {
        return $this->hasMany(EventGallery::class,'fk_event','id')->where('type',2)->orderBy('position','ASC'); // cover image
    }

    public function data_location() {
        return $this->hasMany(EventLocation::class,'fk_event','id');
    }

    public function data_love_story() {
        return $this->hasMany(EventLoveStory::class,'fk_event','id')->orderBy('position','ASC');
    }

    public function data_attendance() {
        return $this->hasMany(EventWishes::class,'fk_event','id')->where('active',1)->orderBy('created_at','DESC');
    }

    public function data_invite() {
        return $this->hasMany(EventInvite::class,'fk_event','id')->orderBy('created_at','DESC');
    }

    public function data_gift_bank() {
        return $this->hasMany(EventGift::class,'fk_event','id')->where('type',1)->where('active',1)->orderBy('created_at','DESC');
    }

    public function data_gift_address() {
        return $this->hasMany(EventGift::class,'fk_event','id')->where('type',2)->where('active',1)->orderBy('created_at','DESC');
    }
}
