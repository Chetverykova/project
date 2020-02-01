<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Transaction extends Model implements Searchable
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function note()
    {
        return $this->hasOne('App\Note');
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.home');

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->amount,
            $url
        );
    }
}
