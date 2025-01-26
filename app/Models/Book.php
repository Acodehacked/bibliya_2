<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'books';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'engl_name',
        'mal_name',
        'publisher',
        'max_chapters',
        'type',
        'image',
    ];

    /**
     * Relationship with the Verse model (if applicable for books like Bible).
     */
    public function verses()
    {
        return $this->hasMany(Verse::class, 'book_id');
    }
    public function questions()
    {
        return $this->hasMany(Question::class,'book_id');
    }
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }
}
