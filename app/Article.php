<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'published_at'
    ];

    // Threat a field as a date format
    // then we can use Carbon instance
    protected $dates = ['published_at'];

    // Scopes
    // Create a centralized query.
    // Usefull for long querys
    public function scopePublished($query) {

        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query) {

        $query->where('published_at', '>', Carbon::now());
    }

    // Mutators
    // to set a predefined format
    // before storage it in database
    public function setPublishedAtAttribute($date) {

        $this->attributes['published_at'] = Carbon::parse($date);
    }
}

