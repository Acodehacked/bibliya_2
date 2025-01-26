<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verse extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'verses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'book',
        'chapter',
        'verse_number',
        'text',
        'category_id',
        'is_active',
    ];

    /**
     * Relationship with VerseCategory model.
     */
    public function category()
    {
        return $this->belongsTo(VerseCategory::class, 'category_id');
    }
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
