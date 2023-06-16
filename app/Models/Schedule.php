<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = ['movie_id'];
    protected $dates = [
        'start_time',
        'end_time'
    ];

    public function movie()
        {
            return $this->belongsTo(Movie::class);

        }
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->attributes['start_time'] = now()->setTime(0, 0, 0);
        $this->attributes['end_time'] = now()->setTime(0, 0, 0);
    }
}
