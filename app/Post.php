<?php

namespace App;

use Carbon\Carbon;

/**
 * Class Post
 * @package App
 */
class Post extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
 		return $this->belongsTo(User::class);   	
    }

    public function addComment($body)
    {
    	$this->comments()->create(compact('body'));
    }

    /**
     * @param \Illuminate\Database\Query\Builder  $query $query
     * @param array $filters
     */
    public function scopeFilter($query, $filters)
    {
        if ($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) asc')
            ->get()
            ->toArray();
    }
}
