<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'published_at',
        'user_id' //temporary
    ];

    // Threat a field as a date format
    // then we can use Carbon instance
    protected $dates = ['published_at'];

    // Scopes
    // Create a centralized query.
    // Usefull for long querys
    /**
     * @param $query
     */
    public function scopePublished($query) {

        $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * @param $query
     */
    public function scopeUnpublished($query) {

        $query->where('published_at', '>', Carbon::now());
    }

    // Mutators
    // to set a predefined format
    // before storage it in database
    /**
     * @param $date
     */
    public function setPublishedAtAttribute($date) {

        $this->attributes['published_at'] = Carbon::parse($date);
    }

    /**
     * An article is owned by a user.
     *
     */
    public function user() {
        return $this->belongsTo('App\User');
        // has the attribute 'user_id' in db
    }
}

