<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'address',
        'country',
        'state',
        'diocese',
        'parish',
        'phone',
        'birth_date',
        'gender',
        'profile_picture',
        'bio',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getFullAddressAttribute()
    {
        return "{$this->address}, {$this->state}, {$this->country}";
    }
}
