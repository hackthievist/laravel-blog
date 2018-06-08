<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'author',
        'published_at'
    ];

    public function scopePublished($query) {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query) {
        $query->where('published_at', '>=', Carbon::now());
    }

    public function scopeForUser($query, $id) {
        $query->where('user_id', $id);
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
