<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'publishers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'logo',
    ];

    /**
     * Relationship with VideoBook model.
     */
    public function videoBooks()
    {
        return $this->hasMany(VideoBook::class, 'publisher_id');
    }
    public function books()
    {
        return $this->hasMany(Book::class, 'publisher_id');
    }
}
