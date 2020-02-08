<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Movie
 * @package App\Models
 */
class Movie extends Model
{
    public $table = 'movies';

    public $fillable = [
        'vote_count',
        'vote_average',
        'title',
        'original_title',
        'original_language',
        'adult',
        'poster_path',
        'overview',
        'release_date',
        'popularity'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'vote_count' => 'integer',
        'vote_average' => 'float',
        'title' => 'string',
        'original_title' => 'string',
        'original_language' => 'string',
        'adult' => 'boolean',
        'poster_path' => 'string',
        'overview' => 'string',
        'release_date' => 'date',
        'popularity' => 'float'
    ];

    /**
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'vote_count' => 'required',
        'vote_average' => 'required',
        'title' => 'required',
        'original_title' => 'required',
        'original_language' => 'required',
        'adult' => 'required',
        'release_date' => 'required',
        'popularity' => 'required'
    ];
}
