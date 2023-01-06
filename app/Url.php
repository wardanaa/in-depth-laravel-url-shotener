<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Url extends Model
{
    protected $fillable = ['original_url', 'shorten_url', 'user_id', 'title'];
    protected $appends = ['path'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($url) {
            $url->shorten_url = Str::random(6);
        });
    }

    public function getRouteKeyName()
    {
        return 'shorten_url';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getPathAttribute()
    {
        return asset("u/$this->shorten_url");
    }
}
