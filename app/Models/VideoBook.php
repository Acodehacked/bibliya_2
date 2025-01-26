<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoBook extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'video_books';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'youtube_link',
        'publisher_id',
        'description',
    ];

    /**
     * Relationship with the Publisher model.
     */
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }
}
